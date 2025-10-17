@extends('admin.main')
@section('content')
    <form action="{{ route('setproduct') }}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <h1 style="text-align: center">Thêm sản phẩm</h1>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="form-group">
                <label for="menu">Mã Sản Phẩm</label>
                <input type="text" name="code_product" class="form-control" style="color: aliceblue;"
                    placeholder="Nhập mã sản phẩm" required>
            </div>
            <div class="form-group">
                <label for="menu">Tên Sản Phẩm</label>
                <input type="text" name="name_product" style="color: aliceblue;" class="form-control"
                    placeholder="Nhập tên sản phẩm" required>
            </div>
            <div class="form-group">
                <label for="menu">Danh Mục Sản Phẩm</label>
                <select class="form-control" style="color: aliceblue;" name="type_product" required>

                    @foreach ($type_products as $type_product)
                        <option value="{{ $type_product->id }}">{{ $type_product->name_type }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="menu">Màu Sản Phẩm</label>
                <select class="form-control" style="color: aliceblue;" name="color" required>

                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color }}</option>
                    @endforeach

                </select>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="cost" style="color: aliceblue;" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Giá Bán</label>
                        <input type="number" name="price" style="color: aliceblue;" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menu">Phần trăm giảm giá</label>
                        <input type="number" name="sale" style="color: aliceblue;" class="form-control" min="0" max="100" step="1">
                    </div>
                </div>
            </div>

            <div class="form-group" style="color: black"  >
                <label style="color: white">Mô tả</label> <br>


                <textarea id="editor" name="info_product">
                    <p>Mô tả sản phẩm</p>
                </textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
           

   
            </div>
       



            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" class="form-control" name="file_upload0" required>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh sản phẩm mô tả 1</label>
                <input type="file" class="form-control" name="file_upload1" required>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh sản phẩm mô tả 2</label>
                <input type="file" class="form-control" name="file_upload2" required>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh sản phẩm mô tả 3</label>
                <input type="file" class="form-control" name="file_upload3" required>
            </div>

            <div class="form-group">
                <label>Tình trạng sản phẩm</label>
                <select class="form-control" style="color: aliceblue;" name="status_product">

                    @foreach ($status_products as $status_product)
                        <option value="{{ $status_product->id }}">{{ $status_product->name_status }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection
