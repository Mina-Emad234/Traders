<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(){
        $products = Product::all();
        return view('dashboard',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $category=Product::create(['name'=>$request->name,'price'=>$request->price]);
            DB::commit();
                return redirect()->route('products.create')->with(['success' => 'تم إضافة منتج بنجاح']);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => 'حدث خطأ ما حالو مرة أخرى']);
        }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit-product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $category=$product->update(['name'=>$request->name,'price'=>$request->price]);
            DB::commit();
            return redirect()->route('products.create')->with(['success' => 'تم تحديث منتج بنجاح']);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => 'حدث خطأ ما حالو مرة أخرى']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with(['success' => 'تم جذف منتج بنجاح']);
        }catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withInput()->with(['error' => 'حدث خطأ ما حالو مرة أخرى']);
        }
    }
}
