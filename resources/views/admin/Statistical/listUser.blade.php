@extends('admin.main')
@section('content')
<div style="margin-top: -200px;" class="main-panel">
    <div class="content-wrapper">
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Order </h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Mã đơn hàng </th>
                                        <th> Hình ảnh </th>
                                        <th> Số lượng </th>
                                        <th> Giá </th>
                                        <th> Ngày mua </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listProductUsers as $listProductUser)
                                    <tr>
                                        <td>
                                            <span class="pl-2">{{$listProductUser->sp_ma}}</span>
                                        </td>
                                        <td><img style="width: 100px;height: 100px;" src="/user-asset/img/{{$listProductUser->sp_hinh}}"></td>

                                        <td>{{$listProductUser->soluong}}</td>
                                        <td>{{ number_format( $listProductUser->gia , 0, ',', '.') }} VND</td>
                                        <td>{{$listProductUser->create}}</td>
                                    </tr>
                                    @endforeach
                                    {{$listProductUsers->links()}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection