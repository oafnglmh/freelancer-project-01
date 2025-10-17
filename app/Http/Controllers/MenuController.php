<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Typeproduct;
use Illuminate\Support\Str;
use App\Models\Statistical;

class MenuController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function create()
    {
        return view('admin.menu.add', [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function list()
    {
        $type_products = DB::table('type_products')->get();
        return view('admin.menu.list', compact('type_products'), [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function store($id)

    {
        $type_products = Typeproduct::select('id', 'name_type')->where('id', $id)->get();
        return view('admin.menu.edit', [
            'type_products' => $type_products,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        $slug = Str::slug($name);
        $update = DB::table('type_products')->where('id', $id)->update([
            'id' => $request->input('sp_product'),
            'name_type' => $name,
            'url' => $slug,
        ]);
        if ($update) {
            return redirect()->back()->with('success', 'đã cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
    public function add(Request $request)
    {
        $name = $request->input('name');
        $slug = Str::slug($name);
        $add = DB::table('type_products')->insert([
            'id' => $request->input('sp_product'),
            'name_type' => $name,
            'url' => $slug,
        ]);
        if ($add) {
            return redirect()->back()->with('success', 'đã thêm thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
    public function delete($id)
    {
        $delete = DB::table('type_products')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'đã Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
}
