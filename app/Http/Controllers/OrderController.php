<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Statistical;

class OrderController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function list()
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('status_orders', 'status_orders.id', '=', 'orders.id_status_orders')
            ->select('orders.*', 'status_orders.name as tinhtrang', 'users.name as userName')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.order.list', compact('orders'), [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function store($id)
    {
        $orders = DB::table('orders')->where('id_donhang', $id)->get();
        $statusOrder = DB::table('status_orders')->get();
        return view('admin.order.edit', [
            'orders' => $orders,
            'statusOrders' => $statusOrder,
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
    public function edit(Request $request, $id)
    {

        $name = $request->input('tinhtrang');
        $update = DB::table('orders')->where('id_donhang', $id)->update([
            'id_status_orders' => $name,
        ]);

        // $update = DB::table('orders')->where('id_donhang', $id)->update([
        //     'id_status_orders' => $name,
        // ]);

        if ($update) {
            return redirect()->back()->with('success', 'Đã cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
    public function detail($id)
    {
        $details = DB::table('detail_orders')->where('id_order', $id)->get();
        return view('admin.order.listOrder', compact('details'), [
            'thongbaos' => $this->statis->thongbao()
        ]);
    }
}
