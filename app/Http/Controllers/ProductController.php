<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\Discount;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $fullProductsList = Product::paginate(25);
        //dd($fullProductsList);
        $productsList   = $fullProductsList->through(
            fn ($product) => [
                'uuid' => $product->uuid,
                'category_id' => $product->category_id,
                'tag_id' => $product->tag_id,
                'discount_id' => $product->discount_id,
                'name' => $product->name,
                'slug' => $product->slug,
                'amount' => $product->amount,
                'quantity' => $product->quantity,
                'description' => $product->description,
                'img'   => json_decode($product->images)[0],
                'height' => $product->height,
                'width' => $product->width,
                'length' => $product->length,
                'weight' => $product->weight,
                'meta_title' => $product->meta_title,
                'meta_description' => $product->description,
                'meta_words' => $product->meta_words,
            ]
        );
        //dd($productsList);

        return Inertia::render('HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'productsList' => $productsList,
        ]);
    }
    public function create()
    {
        return Inertia::render(
            'ProductForm',
            [
                'categories'          => Category::select('id', 'uuid', 'name', 'slug')->get(),
                'tags'                  => Tag::select('id', 'uuid', 'name')->get(),
                'discounts'           => Discount::select('id', 'uuid', 'code')->get(),
            ]
        );
    }
    //: This method should store the new product in the database after validating the input data.
    public function store()
    {
        //dd(request());
        // Validate the incoming request data
        $validated = request()->validate([
            'category_id'               => ['required', 'exists:categories,id'],
            'discount_id'               => ['required', 'exists:discounts,id'],
            'tag_id'                      => ['nullable', 'exists:tags,id'],
            'name'                       => ['required', 'string', 'max:50', 'min:3'],
            'slug'                         => ['required', 'string', 'max:255', 'unique:products,slug'],
            'amount'                    => ['required', 'numeric', 'between:0,999999'],
            'quantity'                   => ['required', 'integer', 'min:1'],
            'description'               => ['required', 'string'],
            'images.*'                    => ['image', 'mimes:jpeg,png,jpg,gif', 'max:7048'],
            'height'                      => ['required', 'integer', 'min:0'],
            'width'                       => ['required', 'integer', 'min:0'],
            'length'                      => ['required', 'integer', 'min:0'],
            'weight'                      => ['required', 'integer', 'min:0'],
            'meta_title'                 => ['nullable', 'string', 'max:255'],
            'meta_description'        => ['nullable', 'string', 'max:500'],
            'meta_keywords'          => ['nullable', 'json']
        ]);
        // Create a new product using the validated data
        dd($validated);

        $product = Product::create($validated);
        // If the request contains files for images, upload and save them
        if (request()->hasFile('images')) {
            $images = [];
            foreach (request()->file('images') as $image) {
                // Get the original name of the image
                $imageName = $image->getClientOriginalName();
                // Store the image in the "images" directory with a unique filename
                $url_img = $image->storeAs("images/{$product->name}", $imageName);
                // Add the image URL to the images array
                array_push($images, $url_img);
                // Create a new ProductImage record for the image
                ProductImages::create([
                    'product_id' => $product->id,
                    'uuid' => Str::uuid()->toString(),
                    'name' => $imageName,
                    'path' => asset("storage/{$url_img}")
                ]);
            }
            // Save the array of image URLs as a JSON string in the product's "images" field
            $product->images = json_encode($images);
            $product->save();
        }
        // Redirect back to the previous page with a success message
        return back()->with('success', 'Image uploaded and saved');
    }
    //: This method should display a single product details based on the product ID.
    public function show(Product $slug)
    {
        $product = [
            'uuid' => $slug->uuid,
            'category_id' => $slug->category_id,
            'tag_id' => $slug->tag_id,
            'discount_id' => $slug->discount_id,
            'name' => $slug->name,
            'slug' => $slug->slug,
            'amount' => $slug->amount,
            'quantity' => $slug->quantity,
            'description' => $slug->description,
            'img'   => json_decode($slug->images),
            'height' => $slug->height,
            'width' => $slug->width,
            'length' => $slug->length,
            'weight' => $slug->weight,
            'meta_title' => $slug->meta_title,
            'meta_description' => $slug->description,
            'meta_words' => $slug->meta_words,
        ];
        //dd($productsList);
        return Inertia::render('ProductPage', ['product' => $product]);
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
