<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function  __invoke(Request $request)
    {
        $categoriesCount = Category::count();
        $brandsCount = Brand::count();
        $productsCount = Product::count();
        $usersCount = User::count();

        return view('admin.home', compact('categoriesCount', 'brandsCount', 'productsCount', 'usersCount'));

    }
}
