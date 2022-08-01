<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class ProductController extends Controller
{
    public function index()
    {
        $x = 1;
        $product = Product::select('id', 'name', 'price', 'thumbnail_url', 'status')->paginate(5);
        return view('admin.product.list', [
            'product' => $product,
            'x' => $x
        ]);
    }
    public function create()
    {
        return view('admin.product.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('thumbnail_url')) {
            # Nếu trường avatar có file thì trả về true
            $avatar = $request->thumbnail_url;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $product->thumbnail_url = $avatar->storeAs('images/product', $avatarName);
        }
        //4. Lưu
        $product->save();
        return redirect()->route('products.list');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return back()->with('thongbao', 'xoa thanh cong');
    }
    public function status(Product $product)
    {
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
        
        // dd($product);
        return back();
    }
    public function search(Request $request)
    {
        $x = 0;
        $search = $request->search;
        if (empty($search)) {
            $product =  Product::select('id', 'name', 'price', 'thumbnail_url', 'status')
                // ->paginate(5)
                ->get();
        } else {
            $product = Product::select('id', 'name', 'price', 'thumbnail_url', 'status')
                ->where('name', 'like', '%' . $search . '%')
                // ->paginate(5)
                ->get();
        }
        return view('admin.product.list', [
            'product' => $product,
            'x' => $x
        ]);
    }
}
