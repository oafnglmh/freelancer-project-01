<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typeproduct;
use App\Models\Product;
use App\Models\Statusproduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Statistical;

class SlideController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function create()
    {
        return view('admin.slider.add', [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function list()
    {
        $slide = DB::table('sliders')->get();
        return view('admin.slider.list', [
            'slide' => $slide,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function setproduct(Request $request)
    {
        $id = DB::table('sliders')->where('id', $request->code_product)->first();

        $file = $request->file_upload;
        $extion = $file->extension();
        $file_name = time() . '-' . 'slide.' . $extion;
        $file->move(public_path('user-asset/img'), $file_name);

        DB::table('sliders')->insert([
            't_name' => $request->name_product,
            't_decription' => $request->info_product,
            't_Image' => $file_name,
            'identify' => $request->input('ide')
        ]);
        Session::flash('success', 'Đăng ký slide thành công.');
        return redirect()->back();
    }
    public function store($id)
    {
        $slide = DB::table('sliders')->where('id', $id)->get();
        return view('admin.slider.edit', [
            'slide' => $slide,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function edit(Request $request, $id)
    {
        $file = $request->file_upload;
        $extion = $file->extension();
        $file_name = time() . '-' . 'slide.' . $extion;
        $file->move(public_path('user-asset/img'), $file_name);
        DB::table('sliders')->where('id', $id)->update([
            't_name' => $request->name_product,
            't_decription' =>  $request->info_product,
            't_Image' =>
            $file_name,
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $delete = DB::table('sliders')->where('id', $id)->delete();
        return redirect()->back();
    }
}
