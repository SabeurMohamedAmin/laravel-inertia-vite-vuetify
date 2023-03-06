<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class ProductController extends Controller
{
    //: This method should display a list of all products in your store.
    public function index()
    {
        dd(Product::all()[1]);
        return Inertia::render('HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
    //: This method should display a form for adding a new product.
    public function create()
    {
        return Inertia::render('Build/ComponentBuild');
    }
    //: This method should store the new product in the database after validating the input data.
    public function store()
    {
    }
    //: This method should display a single product details based on the product ID.
    public function show($id)
    {
    }
    //: This method should display a form for editing the product.
    public function edit($id)
    {
    }
    //: This method should update the product in the database after validating the input data.
    public function update($id)
    {
    }
    //: This method should delete the product from the database.
    public function destroy($id)
    {
    }
    //: This method should handle product search functionality based on a keyword, category, or any other filter criteria.
    public function search(Request $request)
    {
    }
    //: This method should add the selected product to the user's cart.
    public function addToCart(Request $request)
    {
    }
    //: This method should remove the selected product from the user's cart.
    public function removeFromCart(Request $request)
    {
    }
}
