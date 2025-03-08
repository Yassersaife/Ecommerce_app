<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    const DIRECTORY = 'admin.categorys';

    public function index(Request $request)
    {
        try {
            $data = $this->getData($request->all());
            return view(self::DIRECTORY . ".index", compact('data'))
                   ->with('directory', self::DIRECTORY);
        } catch (\Exception $e) {
            Log::error('Failed to load categories: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load categories.'));
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

            $query = Category::when($word, function ($q) use ($word) {
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
            Log::error('Failed to fetch categories data: ' . $e->getMessage());
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
                $data['image'] = $request->file('image')->store('assets/uploads/Category', 'public');
            }

            Category::create($data);
            return response()->json(['success' => __('messages.sent')]);

        } catch (\Exception $e) {
            Log::error('Failed to create category: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to create category.')], 500);
        }
    }

    public function show(Category $category)
    {
        try {
            return view(self::DIRECTORY . ".show", compact('category'));
        } catch (\Exception $e) {
            Log::error('Failed to show category: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to show details.'));
        }
    }

    public function edit(Category $category)
    {
        try {
            return view(self::DIRECTORY . ".edit", compact('category'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Failed to load edit form.'));
        }
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $image = $category->image;

            if ($request->hasFile('image')) {
                if ($image) {
                    Storage::disk('public')->delete($image);
                }
                $data['image'] = $request->file('image')->store('assets/uploads/Category', 'public');
            }

            $category->update($data);
            return response()->json(['success' => __('messages.updated')]);

        } catch (\Exception $e) {
            Log::error('Failed to update category: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to update category.')], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            
            $category->delete();
            return response()->json(['success' => __('messages.deleted')]);

        } catch (\Exception $e) {
            Log::error('Failed to delete category: ' . $e->getMessage());
            return response()->json(['error' => __('Failed to delete category.')], 500);
        }
    }
}