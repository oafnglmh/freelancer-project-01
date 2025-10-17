<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('sp_ma')->comment('Mã sản phẩm')->unique();
            $table->string('sp_ten', 191)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('sp_giaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');
            $table->unsignedInteger('sp_giaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->unsignedInteger('sp_sale')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->string('sp_hinh', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->string('sp_hinh1', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->string('sp_hinh2', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->string('sp_hinh3', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('sp_thongTin')->comment('Thông tin # Thông tin về sản phẩm');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->unsignedBigInteger('sp_trangThai')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedBigInteger('l_ma')->comment('Loại sản phẩm # l_ma # l_ten # Mã loại sản phẩm');
            $table->unsignedBigInteger('color_id');

        });
 
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('l_ma')
                  ->references('id')
                  ->on('type_products')
                  ->onDelete('cascade'); // Tuỳ chọn: cascade để tự động xóa liên quan khi xóa dữ liệu từ bảng loại sản phẩm.
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('color_id')
                  ->references('id')
                  ->on('colors')
                  ->onDelete('cascade'); // Tuỳ chọn: cascade để tự động xóa liên quan khi xóa dữ liệu từ bảng loại sản phẩm.
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('sp_trangThai')
                  ->references('id')
                  ->on('status_products')
                  ->onDelete('cascade'); // Tuỳ chọn: cascade để tự động xóa liên quan khi xóa dữ liệu từ bảng loại sản phẩm.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};