        @extends('admin.main')
        @section('content')
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                <link rel="stylesheet" href="/resources/demos/style.css">
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                <script>
                    $(function() {
                        $("#datepicker").datepicker();
                    });
                </script>

                <link rel="stylesheet" href="/template/assets/vendors/mdi/css/materialdesignicons.min.css">
                <link rel="stylesheet" href="/template/assets/vendors/css/vendor.bundle.base.css">
                {{-- Thu vien chart --}}
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
                <link rel="stylesheet" href="/template/assets/css/style.css">
            </head>
            <div style="margin-top: -200px;" class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div style="color: aliceblue;" class="card">
                                <div class="card-body">
                                    <h5>Tổng doanh thu</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{ number_format($total, 0, ',', '.') }} VND</h2>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div style="color: aliceblue;" class="card">
                                <div class="card-body">
                                    <h5>Lợi Nhuận</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{ number_format($profit, 0, ',', '.') }} VND</h2>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div style="color: aliceblue;" class="card">
                                <div class="card-body">
                                    <h5>Tổng đơn hàng</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{ $order }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Customer Orders</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Tên Khách Hàng </th>
                                                    <th> Mã Khách Hàng </th>
                                                    <th> Số tiền đã mua </th>
                                                    <th> Số sản phẩm đã mua </th>
                                                    <th> Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sqls as $sql)
                                                    <tr>
                                                        <td>
                                                            <img src="https://media.istockphoto.com/id/1273355370/vi/vec-to/h%C3%ACnh-%E1%BA%A3nh-%C4%91%E1%BA%A1i-di%E1%BB%87n-avatar-nam-minh-h%E1%BB%8Da-vector-eps10.jpg?s=612x612&w=0&k=20&c=k4RfS7qZxAN2MdrKMaE5JNnvYWs9fxASnPzCH-8sT-k="
                                                                alt="image" />
                                                            <span class="pl-2">{{ $sql->name }}</span>
                                                        </td>
                                                        <td> {{ $sql->id }} </td>

                                                        <td>{{ number_format($sql->total_amount, 0, ',', '.') }} VND </td>
                                                        <td> {{ $sql->order_count }} </td>
                                                        <td>
                                                            <a href="/statistical/list/{{ $sql->id }}"
                                                                class="badge badge-outline-success">Chi tiết</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{ $sqls->links() }}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">

                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <h4 class="card-title">Doanh Thu Từng Thang</h4>
                                <canvas style="background-color: #191c24"
                                    id="myChart"style="height: 407px; display: block; width: 814px;" width="1017"
                                    height="508"></canvas>

                                <?php
                                
                                // Chuỗi JSON đầu vào
                                $jsonResponse = $orderData->getContent();
                                $dataArray = json_decode($jsonResponse, true);
                                
                                ?>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var areaOptions = {
                                        plugins: {
                                            filler: {
                                                propagate: true
                                            }
                                        },
                                        scales: {
                                            yAxes: [{
                                                gridLines: {
                                                    color: "rgba(204,34,32)"
                                                }
                                            }],
                                            xAxes: [{
                                                gridLines: {
                                                    color: "rgba(204,34,32)"
                                                }
                                            }]
                                        }
                                    };
                                    var myData = <?php echo json_encode(array_values($dataArray), true); ?>;
                                    console.log(myData);
                                    var chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                            datasets: [{
                                                label: 'VNĐ',
                                                data: myData,
                                                fill: true,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 2,
                                                pointStyle: 'circle', // Change to 'rectRounded', 'triangle', etc.
                                                pointBorderColor: 'rgba(75, 192, 192, 1)',
                                                pointBackgroundColor: 'rgba(55, 234,322)',
                                                tension: 0.4 // Adjust the tension for a smoother curve
                                            }]
                                        },
                                        options: areaOptions
                                    });
                                </script>
                            </div>
                        </div>

                    </div>

                    <div class="row">



                        <script>
                            jQuery(function($) {
                                $("#datepicker").datepicker({
                                    dateFormat: 'yy-mm-dd', // Định dạng formmat Năm-Tháng-Ngày

                                });

                                $("#datepicker2").datepicker({
                                    dateFormat: 'yy-mm-dd' //  Định dạng formmat Năm-Tháng-Ngày
                                });
                            });
                        </script>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="menu">Từ Ngày</label>
                                    <input type="text" name="cost" id="datepicker" style="color: aliceblue;"
                                        class="form-control">
                                    <br>
                                    <button type="button" id="btn_dash" class="btn btn-primary btn-fw" value="">Lọc
                                        Kết
                                        Quả</button>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="menu">Đến Ngày</label>
                                <input type="text" name="cost" id="datepicker2" style="color: aliceblue;"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="menu">Lọc Theo</label>
                                <select id="dashboard" class="dashboard form-control" style="color: aliceblue;">
                                    <option value="">--Chọn--</option>
                                    <option value="7ngay">7 Ngày Qua </option>
                                    <option value="thangtruoc">Tháng Trước</option>
                                    <option value="thangnay">Tháng này</option>
                                    <option value="365ngayqua">365 Ngày Qua</option>
                                </select>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                        <script>
                            // Move this script inside the script tag at the bottom of the document

                            document.addEventListener("DOMContentLoaded", function() {



                                chart30day();

function chart30day() {
    var _token = $('input[name="_token"]').val();
    
    $.ajax({
        url: '/chart30day', //call api
        method: 'POST', // gui method post
        dataType: 'JSON', // dạng json
        data: {
            _token: _token,
        },
        success: function (data) {
            console.log(data);
            chart.setData(data);
        },
        error: function (xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
}
                                $('#dashboard').change(function() {
                                    var dashboard_value = $(this).val();
                                    var token = $('input[name="_token"]').val();
                                    $.ajax({
                                        _token: '{{ csrf_token() }}',
                                        url: '/chartdayhai', 
                                        method: 'POST', 
                                        dataType: 'JSON',
                                        data: {
                                            _token: token,
                                            dashboard_value: dashboard_value,
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            chart.setData(data);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error("AJAX request failed:", status, error);
                                        }
                                    });
                                });
                                var btnDash = document.getElementById("btn_dash");
                                btnDash.addEventListener("click", function() {
                                    var token = $('input[name="_token"]').val();
                                    var formdate = $('#datepicker').val();
                                    var to_date = $('#datepicker2').val();
                                 
                                    $.ajax({
                                        _token: '{{ csrf_token() }}',
                                        url: '/chartday',
                                        method: 'POST',
                                        dataType: 'JSON', 
                                        data: {
                                            _token: token, 
                                            formdate: formdate,
                                            to_date: to_date
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            chart.setData(data);


                                        },
                                        error: function(xhr, status, error) {
                                            console.error("AJAX Error: " + status, error);
                                        }

                                    });
                                });
                            });
                        </script>

                        </form>


                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">

                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <h4 class="card-title">Doanh Thu Từng Ngày</h4>

                                <div id="myfirstchart" style="background-color: #191c24" tyle="height: 407px; display: block; width: 814px;" width="1017"
                                    height="508"></div>

                                <script>
                                    var chart = new Morris.Bar({
                                        // ID of the element in which to draw the chart.
                                        element: 'myfirstchart',
                                        // Chart data records -- each entry in this array corresponds to a point on
                                        // the chart.
                                        barColors: ['rgba(75, 192, 192, 1)'],
                                        parseTime:false,
                                        // The name of the data record attribute that contains x-values.
                                        xkey: 'created_at',
                                        // A list of names of data record attributes that contain y-values.
                                        ykeys: ['tongtien'],
                                        // Labels for the ykeys -- will be displayed when you hover over the
                                        // chart.

                                        labels: ['Tổng doanh thu VNĐ'],
                                    });
                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script src="/template/assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="/template/assets/vendors/chart.js/Chart.min.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="/template/assets/js/off-canvas.js"></script>
            <script src="/template/assets/js/hoverable-collapse.js"></script>
            <script src="/template/assets/js/misc.js"></script>
            <script src="/template/assetsnpm install chart.js/js/settings.js"></script>
            <script src="/template/assets/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            {{-- <script src="/template/assets/js/chart.js"></script> --}}
        @endsection
