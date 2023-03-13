<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Str;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;

class BuildComponent extends Controller
{
    public function show()
    {
        return Inertia::render('Build/ComponentBuild', [
            'tags'                  => Tag::select('id', 'uuid', 'name')->get(),
            'discounts'           => Discount::select('id', 'uuid', 'code')->get(),
            'categories'          => Category::select('id', 'uuid', 'name', 'slug')->get()
        ])->with('success', 'test for flash');
    }

    public function image()
    {
        $specialChars     = [';', ',', '\\', '/', ':', '*', '?', '<', '>', '|', '.'];
        $product           = Product::find(1);
        $images            = request()->file()['images'];
        $productName   = str_replace($specialChars, "", $product->name);
        $path               = "images/$productName";

        foreach ($images as $image) {
            $imageName      = $image->getClientOriginalName();

            ProductImages::create([
                'product_id'       => $product->id,
                'uuid'                => Str::uuid(),
                'name'              => $imageName,
                'path'               => asset('storage/images/' . $imageName)
            ]);

            Storage::putFileAs($path, $image, $imageName);
        };
        return back()->with('success', 'image uploaded and saved');
    }
}
