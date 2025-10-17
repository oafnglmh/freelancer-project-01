<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
    public function index()
    {
        return view('admin.main', [
            'thongbaos' => $this->statis->thongbao(),
        ]);
    }
    public function main()

    {
        return view('admin.Statistical.main', [
            'total' => $this->statis->totalMoney(),
            'profit' => $this->statis->profitMoney(),
            'order' => $this->statis->totalOrder(),
            'sqls' => $this->statis->listUser(),
            'orderData' => $this->statis->getOrderData(),
            'orderDay' => $this->statis->getOderDay(),
            'thongbaos' => $this->statis->thongbao(),
        ]);
    }
    public function listStatisUser($id)
    {
        return view('admin.Statistical.listUser', [
            'listProductUsers' => $this->statis->detailListUser($id),
            'thongbaos' => $this->statis->thongbao(),
        ]);
    }
    public function role()
    {
        return view('admin.Statistical.role', [
            'sqls' => $this->statis->listUser(),
            'thongbaos' => $this->statis->thongbao(),
        ]);
    }
    public function chartday(Request $request)
    {
        $data = $request->all();
        $formdate = $data['formdate'];
        $to_date = $data['to_date'];
        $orders = Order::whereBetween('created_at', [$formdate, $to_date])->orderBy('created_at', 'ASC')->get();
        $chart_data = [];
        foreach ($orders as $order) {
            $date = $order->created_at->format('Y-m-d');
            if (!array_key_exists($date, $chart_data)) {
                // If the date does not exist in the chart data, initialize it
                $chart_data[$date] = [
                    'created_at' => $date,
                    'tongtien' => 0,
                ];
            }
            // Accumulate the 'tongtien' for the date
            $chart_data[$date]['tongtien'] += $order->tongtien;
        }
        // Chuỗi JSON đầu vào
        $chart_data1 = array_values($chart_data);
        return response()->json($chart_data1);
    }
    public function chartdayhai(Request $request)
    { {
            $data = $request->all();
            $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
            $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
            $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
            $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
            $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            if ($data['dashboard_value'] == '7ngay') {
                $get = Order::whereBetween('created_at', [$sub7days, $now])->orderBy('created_at', 'ASC')->get();
            } elseif ($data['dashboard_value'] == 'thangtruoc') {
                $get = Order::whereBetween('created_at', [$dauthangtruoc, $cuoithangtruoc])->orderBy('created_at', 'ASC')->get();
            } elseif ($data['dashboard_value'] == 'thangnay') {
                $get = Order::whereBetween('created_at', [$dauthangnay, $now])->orderBy('created_at', 'ASC')->get();
            } else {
                $get = Order::whereBetween('created_at', [$sub365days, $now])->orderBy('created_at', 'ASC')->get();
            }
            $chart_dataa = [];
            foreach ($get as $order) {
                $date = $order->created_at->format('Y-m-d');

                if (!array_key_exists($date, $chart_dataa)) {
                    // If the date does not exist in the chart data, initialize it
                    $chart_dataa[$date] = [
                        'created_at' => $date,
                        'tongtien' => 0,
                    ];
                }
                // Accumulate the 'tongtien' for the date
                $chart_dataa[$date]['tongtien'] += $order->tongtien;
            }
            $chart_date = array_values($chart_dataa);

            return response()->json($chart_date);
            // Your existing code here


        }
    }
    public function chart30day(Request $request)
    {
        $data = $request->all();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Order::whereBetween('created_at', [$sub365days, $now])->orderBy('created_at', 'ASC')->get();
        $chart_dataa = [];

        foreach ($get as $order) {
            $date = $order->created_at->format('Y-m-d');

            if (!array_key_exists($date, $chart_dataa)) {
                // If the date does not exist in the chart data, initialize it
                $chart_dataa[$date] = [
                    'created_at' => $date,
                    'tongtien' => 0,
                ];
            }

            // Accumulate the 'tongtien' for the date
            $chart_dataa[$date]['tongtien'] += $order->tongtien;
        }
        $chart_date = array_values($chart_dataa);

        return response()->json($chart_date);
    }
    public function updateQuantityCart(Request $request)
    {
        //id của giở hàng
        $idCartQuantity = $request->input('idCartQuantity');
        //số lượng
        $quantities = $request->input('quantity');
        try {
            // Duyệt qua từng cặp ID sản phẩm và số lượng để cập nhật vào CSDL
            foreach ($idCartQuantity as $cartId) {
                $quantity = $quantities[$cartId];
                DB::table('carts')->where('id', $cartId)->update(['quantity' => $quantity]);
            }
            return redirect()->back()->with('success', 'Đã cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.');
        }
    }
}
