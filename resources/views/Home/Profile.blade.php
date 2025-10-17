@extends('layout.content')
@section('other')
<link rel="stylesheet" href="{{asset('user-asset/CSS/accout.css')}}">
@endsection
@section('content')
           
    <div class="linksmall">

        <a href="./index.html"> TRANG CHỦ </a>
        <span>/</span>
        <a href="">TÀI KHOẢN</a>

    </div>
    <div class="xinchao">Xin Chào,</div>

<div class="home">
    <div class="home-left">
        <div class="name">{{(auth()->check()) ? auth()->user()->name : "Chưa đăng nhập"}}</div>
        <div class="info">
            <a href="">Thông tin tài khoản</a>
            <a href="{{route('orders')}}">Quản lý đơn</a>  
            <a href="">Thông tin giao Hàng</a> 
        </div>
    </div>
    <div class="home-right">    
        <label  for="">Họ và Tên</label> <br>   
        <input type="text" value="{{(auth()->check()) ? auth()->user()->name : "Chưa đăng nhập"}}" readonly><br>
        <label for="">Quốc gia</label><br>
        <input type="text" value="Vietnam" readonly><br>
        <label for="">Số điện thoại</label><br>
        <input type="text" value="{{(auth()->check()) ? auth()->user()->number_phone : "Chưa đăng nhập"}}" readonly><br>
        
    </div>
</div>


    
        

    </div>
    <div class="dangkibangtien">
        <div class="MAP">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7333963918236!2d108.24978007500275!3d15.97529308469066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1686645400615!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="chu">
            <div class="dangkibangtin"> Đăng Kí Bảng Tin </div>
            <div class="dangkibangtinmail">
                Đăng kí bảng tin để nhận mẫu thiết kế mới nhất
            </div>

            <input type="text" placeholder="Vui lòng nhập email.... " />
            <input
                style="height: 40px;width: 50px ; background-color: rgb(0, 0, 0);color: aliceblue; margin-left:-2px ;"
                type="submit" value="Gửi"> <br>
            <div class="icon">
                <a href="" class="facebook">
                    <div class="fa-brands fa-facebook"></div>
                </a>
                <a href="" class="instagram">
                    <div class="fa-brands fa-instagram"></div>
                </a>
                <a href="" class="youtube">
                    <div class="fa-brands fa-youtube"></div>
                </a>
            </div>



        </div>
    </div>
    </div>
</body>

</html>