<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;


class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'desc')->get();     
        return view('admin.products.index',
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        $categories = Category::all();     
        return view('admin.products.create',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'category_id' => 'required|numeric|min:1',
        ]);
       
        if ($validator->fails()) {
            return redirect('admin/products/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        //
        $files = [];

        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $file)
            {

                $name = time().rand(1,100).'.'.$file->extension();

                $file->move(public_path('product-images'), $name);  

                $files[] = $name;  

            }

        }
        // TODO: add complete validations
        $product = Product::create($request->all());        
        $lastId = $product->id;
        foreach($files as $f) 
        {
            $file= new ProductImage();
            $file->image = $f;
            $file->product_id = $lastId;
            $file->save();
        }
        
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
