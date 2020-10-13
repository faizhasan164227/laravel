<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

  public function index(){
    $data = Product::paginate(5);
    // dd($data);
    return view('product', compact('data'));
  }
  public function edit($slug)
  {
    $data = \DB::table('products')->where('product_slug',$slug)->get();
    return view('edit',compact('data'));
    }

    public function showProduct($slug)
    {
        $data = Product::where('product_slug', $slug)->first();
        // dd($data);
        if(!$data){
            abort(404);
        }
        return view('show', compact('data'));
    }

    public function showTable(Product $product){
        $product = $product->all();
        if(!$product) {
            abort(404);
        }
        return view('table', ['product' => $product]);
    }

    public function update(Request $request, Product $product, $slug)
    {
        if(Product::where('product_slug', $request->slug)->first()){
            if(Product::where('product_slug', $request->slug)->exists()){
                return redirect('product/edit/'. $slug)->with('info','product slug sudah ada!');
            }else{
                Product::where('product_slug', $slug)->update([
                    'product_title' => $request->title,
                    'product_slug' => $request->slug,
                    'product_image' => $request->image,
                ]);
            }
        }else{
            Product::where('product_slug', $slug)->update([
                'product_title' => $request->title,
                'product_slug' => $request->slug,
                'product_image' => $request->image,
            ]);
        }
        
        return redirect('product')->with('info','data berhasil diubah!');
    }

    public function delete(Product $product) 
    {
        $product->delete();
        return redirect('/product');
    }

    public function destroy(Product $product)
    {
      $product->delete();
    }

    public function simpan(Request $request) {
      $product = new Product;
        $product->product_title = $request->product_title;
        $product->product_slug =\Str::slug ($request->product_slug);
        $product->product_image = $request->product_image;

      if (Product::where('product_slug', $request->product_slug)->exists()) {
        return redirect('/product')->with('error','Slug sudah tersedia');
      } else{
        $product->save();
        return redirect('product')->with('info','Sukses tambah data!');
      }

    }

    public function add() {
      return view('add');
    }
}
