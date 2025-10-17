<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Statistical;

class StatusController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function create()
    {
        return view('admin.status.add', [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function list()
    {
        $status_orders = DB::table('status_orders')->get();
        return view('admin.status.list', compact('status_orders'), [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function store($id)

    {
        $status_orders = DB::table('status_orders')->where('id', $id)->get();
        return view('admin.status.edit', [
            'status_orders' => $status_orders,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $name = $request->input('name');
        $update = DB::table('status_orders')->where('id', $id)->update([
            'id' => $request->input('id'),
            'name' => $name,
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
        $add = DB::table('status_orders')->insert([
            'id' => $request->input('id'),
            'name' => $name,
        ]);
        if ($add) {
            return redirect()->back()->with('success', 'đã thêm thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
    public function delete($id)
    {
        $delete = DB::table('status_orders')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'đã Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
}
