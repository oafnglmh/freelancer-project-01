<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Typeproduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Statusproduct;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use App\Models\Statistical;

class ProductController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function create()
    {
        $status_products = Statusproduct::select('id', 'name_status')->get();
        $type_products = Typeproduct::select('id', 'name_type')->get();
        $colors = Color::select('id', 'color')->get();
        return view('admin.product.add', [
            'type_products' => $type_products,
            'colors' => $colors,
            'status_products' => $status_products,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function list()
    {
        $products = Product::all();
        return view(
            'admin.product.list',
            [
                'products' => $products,
                'thongbaos' => $this->statis->thongbao()
            ]
        );
    }

    public function setproduct(Request $request)
    {
        //Them san pham
        $sp_ma = DB::table('products')->where('sp_ma', $request->code_product)->first();

        if ($sp_ma) {
            Session::flash('error', 'Mã sản phẩm đã tồn tại');
            return redirect()->back();
        }
        $uploadedFiles = [];
        for ($i = 0; $i < 4; $i++) {
            $fieldName = "file_upload$i";
            $file = $request->$fieldName;

            if ($file) {
                $ext = $file->extension();
                $fileName = time() . $i . "-product.$ext";
                $file->move(public_path('user-asset/img'), $fileName);
                $uploadedFiles[] = $fileName;
            }
        }
        DB::table('products')->insert([
            'sp_ma' => $request->code_product,
            'sp_ten' => $request->name_product,
            'sp_giaGoc' => $request->cost,
            'sp_giaBan' => $request->price,
            'sp_sale' => $request->sale,
            'color_id' => $request->color,
            'sp_hinh' => $uploadedFiles[0] ?? null,
            'sp_hinh1' => $uploadedFiles[1] ?? null,
            'sp_hinh2' => $uploadedFiles[2] ?? null,
            'sp_hinh3' => $uploadedFiles[3] ?? null,
            'sp_thongTin' => $request->info_product,
            'sp_trangThai' => $request->status_product,
            'l_ma' => $request->type_product,
        ]);


        Session::flash('success', 'Đăng ký sản phẩm thành công.');
        return redirect()->back();
    }
    public function store($id)

    {
        $type_products = Typeproduct::select('id', 'name_type')->get();
        $status_products = Statusproduct::select('id', 'name_status')->get();
        $product = Product::where('sp_ma', $id)->get();
        $colors = Color::select('id', 'color')->get();
        return view('admin.product.edit', [
            'type_products' => $type_products,
            'status_products' => $status_products,
            'products' => $product,
            'colors' => $colors,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }

    public function edit(Request $request, $id)
    //Edit san pham
    {

        DB::table('products')->where('sp_ma', $id)->update([
            'sp_ten' => $request->input('name_product'),
            'sp_giaGoc' => $request->input('cost'),
            'sp_giaBan' => $request->input('price'),
            'color_id' => $request->input('color'),
            'sp_sale' => $request->input('sale'),
            'sp_thongTin' => $request->input('info_product'),
            'sp_trangThai' => $request->input('status_product'),
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $delete = DB::table('products')->where('sp_ma', $id)->delete();
        return redirect()->back();
    }
    public function getproductbelow()
    {

        // $products = Product::all();
        // return view('Home/Home', ['products' => $products]);


    }
    public function click($id)
    {
        $type_products = DB::table('type_products')->where('id', '!=', '6')->get();

        $sql = Product::where('sp_ma', $id)->get();
        $sql2 = DB::table('products')->get();
        $sql3 = DB::table('sizes')->get();
        $comment = DB::table('comments')->where('product_id', $id)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.name as name')
            ->paginate(6);
        return view('Home.Product_Description', [
            'products' => $sql,
            'productss' => $sql2,
            'sizes' => $sql3,
            'comment' => $comment,
        ], compact('type_products'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $type_products = DB::table('type_products')->where('id', '!=', '6')->get();
        $results = DB::table('products')->where('sp_ten', 'like', '%' . $keyword . '%')->paginate(9);
        $colors = Color::select('id', 'color')->get();
        return view('Home.Search', [
            'results' => $results,
            'key' => $keyword,
            'colors' => $colors
        ], compact('type_products'));
    }

    public function viewhome()
    {
        $slide = DB::table('sliders')->where('identify', 1)->get();
        $banner = DB::table('sliders')->where('identify', 2)->get();
        $product = DB::table('products')->where('l_ma', '!=', '6')->get();
        $productaovets = DB::table('products')->where('l_ma', 4)->get();
        $productaothuns = DB::table('products')->where('l_ma', 5)->get();
        $blogs = DB::table('products')->where('l_ma', 6)->get();
        $type_products = DB::table('type_products')->where('id', '!=', '6')->get();

        return view('Home.home', [
            'sliders' => $slide,
            'banners' => $banner,
            'products' => $product,
            'productaovets' => $productaovets,
            'productaothuns' => $productaothuns,
            'blogs' => $blogs,
        ], compact('type_products'));
    }
    public function menuproduct()
    {
        $type_products = DB::table('type_products')->get();
        return view('Layout.content', [
            'type_products' => $type_products
        ]);
    }
    public function type_product($url, Request $request)
    {

        $results = Product::whereHas('type_Product', function ($query) use ($url) {
            $query->where('url', $url);
        })->paginate(9);
        $productnews = DB::table('products')
            ->where('l_ma', '!=', '6');
        if ($request->input('price')) {
            $productnews->orderBy('sp_giaBan', $request->input('price'));
        }
        $colors = DB::table('colors')->get();
        // $results = DB::table('products')->select()->where('l_ma', $id_type)->get();
        $keys = DB::table('type_products')->select()->where('url', $url)->get();
        $type_products = DB::table('type_products')->get();

        return view('Home.Search', compact('results', 'keys', 'type_products', 'colors'));
    }
}
