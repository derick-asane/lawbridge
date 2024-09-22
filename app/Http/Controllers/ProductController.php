<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role === 'admin'){

            $products = Product::all();
            return view('admin.product', compact('products'));
        }else{
            return view('client.shop');
        } 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'gender' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // adjust the rules as needed
        ]);
    
        // Get the image from the request
        $image = $request->file('image');

        // Encode the image to Base64
        $imageData = base64_encode(file_get_contents($image));

        // Prepare the Base64 string with the appropriate prefix
        $base64Image = 'data:' . $image->getClientMimeType() . ';base64,' . $imageData;
        // Store the product using the create() method
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'gender' => $request->input('gender'),
            'price' => $request->input('price'),
            'image' => $base64Image,
        ]);

        // Return a response
        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Find the product by ID
        return view('product.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'price' => 'required|numeric',
        'image' => 'nullable|image', // Validate image as a string
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update the product details
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->category = $request->input('category');
    $product->gender = $request->input('gender');
    $product->price = $request->input('price');

   // Handle Base64 image if a new image is provided
   if ($request->hasFile('image')) {
    $image = $request->file('image'); // Get the uploaded file

    // Read the file contents and encode it to Base64
    $imageData = base64_encode(file_get_contents($image->getRealPath()));

    // Prepare the Base64 string with the appropriate prefix
    $base64Image = 'data:' . $image->getClientMimeType() . ';base64,' . $imageData;
    $product->image = $base64Image; // Store the Base64 image
}

    // Save the updated product
    $product->save();

    // Redirect back to the product index with a success message
    return redirect()->route('admin.product')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
