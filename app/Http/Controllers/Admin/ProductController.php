<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use DB;

class ProductController extends Controller
{
    //===============================Category=============================================================
    public function category(){
        $data=Category::orderBy('id','DESC')->get();
        return view('admin.product.category',compact('data'));
    }
    public function category_store(Request $request){
        $data=new Category();
        $data->category=$request->category;
        $data->save();
        return redirect()->back()->with('success',' Added Category');
    }
    public function category_edit($id){
        $data=Category::find($id);
         return $data;
          }
    public function category_delete($id){
            $data=Category::find($id);
             $data->delete();
        return redirect()->back()->with('danger','Deleted Category');

     }
     public function category_update(Request $request){
        $data=Category::find($request->id);
        $data->category=$request->category;
        $data->save();
        return redirect()->back()->with('info','Updated Category');
    }
    //============================================Product==================================================
    public function product(){
        $category=Category::orderBy('id','DESC')->get();
        $category2=Category::orderBy('id','DESC')->get();
        $product=DB::table('products')
                ->join('categories','categories.id','=','products.category')
                ->select('products.*','categories.category')
                ->orderBy('id','DESC')
                ->get();
        return view('admin.product.product',compact('category','category2','product'));
    }
    public function product_store(Request $request){
           $data=new Product();
           $data->category=$request->category;
           $data->name=$request->name;
           $data->code=$request->code;
           $data->unit=$request->unit;
           $data->price=$request->price;
           $data->save();
        return redirect()->back()->with('success',' Added Product');

    }
    public function product_edit($id){
        $data=Product::find($id);
        return $data;
    }
    public function product_delete($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('danger',' Deleted Product');
    }
    public function product_update(Request $request){
        $data=Product::find($request->id);
        $data->category=$request->category;
        $data->name=$request->name;
        $data->unit=$request->unit;
        $data->price=$request->price;
        $data->save();
     return redirect()->back()->with('info',' Updated Product');

 }
}
