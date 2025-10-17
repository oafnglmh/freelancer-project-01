<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistical extends Model
{
    use HasFactory;
    // Danh Thu Tổng
    public function totalMoney()
    {
        $totals = DB::table('orders')->distinct()->get();
        $money = 0;
        foreach ($totals as $total) {
            if ($total->id_status_orders == "2") {
                $money += $total->tongtien;
            }
        }
        return $money;
    }
    // Tính lợi nhuận của sản phẩm
    public function profitMoney()
    {

        $totals = DB::table('detail_orders')
            ->join('orders', 'orders.id_donhang', '=', 'detail_orders.id_order')
            ->join('products', 'detail_orders.ma_sp', '=', 'products.sp_ma')
            ->select(
                'detail_orders.*',
                'products.sp_giaBan as giaBan',
                'products.sp_giaGoc as giaGoc',
                'products.sp_sale as sale',
                'orders.tongtien as tongTien',
                'orders.id_status_orders as id_status_orders'
            )
            ->distinct()
            ->get();

        $productMoney = 0;
        $OrderMoney = 0;
        $sum = 0;

        foreach ($totals as $total) {
            //Giá gốc của sản phẩm
            if ($total->id_status_orders == "2") {


                $productMoney += $total->giaGoc * $total->soluong;
            }

            if ($total->id_status_orders == "2") {

                //tiền sản phẩm bán
                $tienSale = ($total->giaBan - ($total->giaBan * $total->sale) / 100) * $total->soluong;

                $OrderMoney = $OrderMoney + $tienSale;
                // tiền sản phẩm quay về không
                $tienSale = 0;
            }
        }
        //tổng tiền lợi nhuận = tổng doanh thuc- tổng tiền sản phẩm bán được với giá gốc
        $sum = $OrderMoney - $productMoney;
        return $sum;
    }

    public function totalOrder()
    {
        $totals = DB::table('orders')->get();
        $order = 0;
        foreach ($totals as $total) {
            if ($total->id_status_orders == "2") {
                $order++;
            }
        }
        return $order;
    }
    public function listUser()
    {
        $sqls = DB::table('users')
            ->select('users.*', 'order_totals.total_amount', 'order_counts.order_count')
            ->leftJoin(DB::raw('(SELECT user_id, SUM(CASE WHEN id_status_orders = 2 THEN tongtien ELSE 0 END) as total_amount FROM orders GROUP BY user_id) as order_totals'), function ($join) {
                $join->on('users.id', '=', 'order_totals.user_id');
            })

            ->leftJoin(DB::raw('(SELECT user_id, COUNT(CASE WHEN id_status_orders = 2 THEN 1 END) as order_count FROM orders GROUP BY user_id) as order_counts'), function ($join) {
                $join->on('users.id', '=', 'order_counts.user_id');
            })

            ->paginate(5);
        return $sqls;
    }
    public function detailListUser($id)
    {
        $sql = DB::table('orders')
            ->join('detail_orders', 'orders.id_donhang', '=', 'detail_orders.id_order')
            ->join('products', 'detail_orders.ma_sp', '=', 'products.sp_ma')
            ->select('products.*', 'detail_orders.soluong as soluong', 'detail_orders.gia as gia', 'detail_orders.created_at as create')
            ->where('user_id', $id)
            ->paginate(10);
        return $sql;
    }
    public function postRole($id, Request $request)
    {
        $update = DB::table('users')->where('id', $id)->update([
            'Role' => $request->input('tinhtrang'),
        ]);
        if ($update) {
            return redirect()->back()->with('success', 'đã cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Thất Bại');
        }
    }
    public function deleteRole($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->orders()->delete();
        $user->comments()->delete();
        $deleted = $user->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user');
        }
    }

    public function getOderDay()
    {
    }
    // Dữ liệu tháng
    public function getOrderData()
    {
        // Get the data from the database
        $orderData = Order::selectRaw('MONTH(created_at) as month, SUM(tongtien) as total_amount')
            ->where('id_status_orders', 2)
            ->groupBy('month')
            ->get();


        // Create an array to store the result for each month
        $result = [];

        // Initialize the result array with zero values for each month
        for ($i = 1; $i <= 12; $i++) {
            $result[$i] = 0;
        }

        // Fill in the actual values for months with data
        foreach ($orderData as $data) {
            $result[$data->month] = $data->total_amount;
        }
        return response()->json($result);
    }
    public function thongbao()
    {
        return DB::table("orders")
            ->join('detail_orders', 'detail_orders.id_order', '=', 'orders.id_donhang')
            ->select('detail_orders.*', 'orders.name as nameUser', 'orders.created_at as create')
            ->orderBy('created_at', 'desc')->get();
    }
};
