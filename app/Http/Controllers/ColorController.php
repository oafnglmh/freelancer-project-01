<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Color;
use App\Models\Statistical;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function create()
    {
        return view('admin.color.add', [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function list()
    {
        $colors = DB::table('colors')->get();
        return view('admin.color.list', [
            'colors' => $colors,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }

    public function store($id)

    {
        $colors = Color::select('id', 'color')->where('id', $id)->get();
        return view('admin.color.edit', [
            'colors' => $colors,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('nameColor');
        $slug = Str::slug($name);
        $update = DB::table('colors')->where('id', $id)->update([
            'id' => $request->input('idColor'),
            'color' => $name,
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
        $name = $request->input('nameColor');
        $slug = Str::slug($name);
        $add = DB::table('colors')->insert([
            'id' => $request->input('idColor'),
            'color' => $name,
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
        $delete = DB::table('colors')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'đã Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
}
