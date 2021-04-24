<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Utilities\Common;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();

        if($request->get('search')!=null){
        $products = $products->where('id', '=' ,$request->get('search'));
        }


        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        $categories = ProductCategory::all();
        $restaurants = Restaurant::all();
        return view('admin.product.create-edit',compact('products', 'categories','restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['image_old']);

        //Xử lý file:
        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'front/data-images/products');
        }

        $product = Product::create($data);

        return redirect('admin/product/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $restaurants = Restaurant::all();
        return view('admin.product.create-edit',compact('product', 'categories','restaurants'));
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
        $data = $request->all();

        //Bỏ trường này khỏi $data
        unset($data['image_old']);

        //Xử lý file:
        if ($request->hasFile('image')) {
            //Thêm file mới:
            $data['image'] = Common::uploadFile($request->file('image'), 'front/data-images/products/');

            //Xóa file cũ:
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/data-images/products/' . $file_name_old);
            }
        }

        Product::findOrFail($id)->update($data);

        return redirect('admin/product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['deleted'] = true;

        Product::findOrFail($id)->update($data);

        return redirect('admin/product');
    }
}
