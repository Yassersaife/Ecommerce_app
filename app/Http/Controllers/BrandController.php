<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    const DIRECTORY = 'admin.brands';

    public function index(Request $request)
    {
        try {
            $data = $this->getData($request->all());
            return view(self::DIRECTORY . ".index", compact('data'))
                   ->with('directory', self::DIRECTORY);
        } catch (\Exception $e) {
            Log::error('Failed to load brands: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load brands.'));
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

            $query = Brand::when($word, function ($q) use ($word) {
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
            Log::error('Failed to fetch brands data: ' . $e->getMessage());
            return ['error' => __('Failed to fetch data.')];
        }
    }

    public function create()
    {
        try {
            return view(self::DIRECTORY . ".create");
        } catch (\Exception $e) {
            Log::error('Failed to load create form: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load form.'));
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('assets/uploads/Brand', 'public');
            }

            Brand::create($data);
            return response()->json(['success' => __('messages.sent')]);

        } catch (\Exception $e) {
            Log::error('Failed to create brand: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to create brand.')], 500);
        }
    }

    public function show(Brand $brand)
    {
        try {
            return view(self::DIRECTORY . ".show", compact('brand'));
        } catch (\Exception $e) {
            Log::error('Failed to show brand: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to show details.'));
        }
    }

    public function edit(Brand $brand)
    {
        try {
            return view(self::DIRECTORY . ".edit", compact('brand'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load edit form.'));
        }
    }

    public function update(UpdateCategoryRequest $request, Brand $brand)
    {
        try {
            $data = $request->validated();
            $image = $brand->image;

            if ($request->hasFile('image')) {
                if ($image) {
                    Storage::disk('public')->delete($image);
                }
                $data['image'] = $request->file('image')->store('assets/uploads/Brand', 'public');
            }

            $brand->update($data);
            return response()->json(['success' => __('messages.updated')]);

        } catch (\Exception $e) {
            Log::error('Failed to update brand: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to update brand.')], 500);
        }
    }

    public function destroy(Brand $brand)
    {
        try {
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }
            
            $brand->delete();
            return response()->json(['success' => __('messages.deleted')]);

        } catch (\Exception $e) {
            Log::error('Failed to delete brand: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to delete brand.')], 500);
        }
    }
}