<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fashionproduct;
use App\traits\Common;

class FashionController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Fashionproduct::latest()->where('published','=',1)->limit(3)->get();

        return view('index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request-> validate (['title'=>'required|string',
                                      'description'=> 'required|string|max:100',
                                      'price'=> 'required|decimal:0,2',
                                      'image'=>'required|image|mimes:jpeg,jpg,png,gif|max:2000',
                                      'published'=>'boolean',
                                      'status'=>'string',
               ]);

       $product['image']=$this->uploadFile($request->image, 'assets/images/product');
       Fashionproduct::create($product);    

       return redirect()->route('product.productshow');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Fashionproduct::findOrFail($id);
        return view ('product_details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Fashionproduct::findOrFail($id);
        return view ('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = $request-> validate (['title'=>'required|string',
                                      'description'=> 'required|string|max:100',
                                      'price'=> 'required| new \App\Rules\GreaterThanTen',
                                      'image'=>'mimes:jpeg,jpg,png,gif',
                                      'published'=>'boolean',
                                      'status'=>'string',
               ]);

       if ($request->hasFile('image')) {
          $product['image']=$this->uploadFile($request->image, 'assets/images/product');
       }

        Fashionproduct::where('id', $id)->update($product);  

       return redirect()->route('product.productshow');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function productshow()
    {
        //$products=Fashionproduct::orderBy('id','desc')->limit(3)->get();
        $products=Fashionproduct::get();
        return view('products',compact('products'));
    }
}
