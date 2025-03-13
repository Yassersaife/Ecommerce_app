<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    const DIRECTORY = 'admin.products';

    public function index(Request $request)
    {
        try {
            $data = $this->getData($request->all());
            return view(self::DIRECTORY . ".index", compact('data'))
                   ->with('directory', self::DIRECTORY);
        } catch (\Exception $e) {
            Log::error('Failed to load products: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load products.'));
        }
    }

    public function getData(array $filters): array
    {
        try {
            $order   = $filters['order'] ?? 'created_at';
            $sort    = $filters['sort'] ?? 'desc';
            $perpage = $filters['perpage'] ?? config('app.paginate');
            $start   = $filters['start'] ?? null;
            $end     = $filters['end'] ?? null;
            $word    = $filters['word'] ?? null;

            $query = Product::when($word, function ($q) use ($word) {
                    $q->where('name', 'like', '%' . $word . '%');
                })
                ->when($start, function ($q) use ($start) {
                    $q->whereDate('created_at', '>=', $start);
                })
                ->when($end, function ($q) use ($end) {
                    $q->whereDate('created_at', '<=', $end);
                })
                ->orderBy($order, $sort)
                ->paginate($perpage);

            return ['data' => $query];

        } catch (\Exception $e) {
            Log::error('Failed to fetch products data: ' . $e->getMessage());
            return ['error' => __('Failed to fetch products data.')];
        }
    }

    public function create()
    {
        try {
            $categories = Category::all(); 
            $brands = Brand::all(); 
            
            return view(self::DIRECTORY . ".create", compact('categories', 'brands')); 
               } catch (\Exception $e) {
            Log::error('Failed to load create form: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load form.'));
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('assets/uploads/products', 'public');
            }

            Product::create($data);
            return redirect()->back()->with(['success' => __('messages.sent')]);


        } catch (\Exception $e) {
            Log::error('Failed to create product: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to create product.')], 500);
        }
    }

    public function show(Product $product)
    {
        try {
            $product->load(['category', 'brand']); // تحميل العلاقات

            return view(self::DIRECTORY . ".show", compact('product'))->render();
        } catch (\Exception $e) {
            Log::error('Failed to show product: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to show product.'));
        }
    }

    public function edit(Product $product)
    {
        try {
            $categories = Category::all(); 
            $brands = Brand::all(); 
            return view(self::DIRECTORY . ".edit", compact('product','categories','brands'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load edit form.'));
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $data = $request->validated();
            $image = $product->image;

            if ($request->hasFile('image')) {
                if ($image) {
                    Storage::disk('public')->delete($image);
                }
                $data['image'] = $request->file('image')->store('assets/uploads/products', 'public');
            }

            $product->update($data);
            return response()->json(['success' => __('messages.updated')]);

        } catch (\Exception $e) {
            Log::error('Failed to update product: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to update product.')], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $product->delete();
            return response()->json(['success' => __('messages.deleted')]);

        } catch (\Exception $e) {
            Log::error('Failed to delete product: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to delete product.')], 500);
        }
    }
}
