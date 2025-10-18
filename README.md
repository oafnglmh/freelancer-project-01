# Hướng dẫn chạy dự án 

Chào bạn, cảm ơn bạn đã nhận dự án. Đây là hướng dẫn chi tiết để chạy dự án từ đầu đến cuối, sử dụng **file dump** đã gửi qua Zalo.

## Chuẩn bị môi trường

- Cài đặt các công cụ cần thiết:
  - **PHP** >= 8.1
  - **Composer**
  - **MySQL**
  - **Node.js** & **npm** (hoặc **yarn** nếu dự án sử dụng asset JavaScript)
- Clone dự án và cài đặt các package:
  ```bash
  git clone https://github.com/oafnglmh/freelancer-project-01.git
  cd freelancer-project-01
  composer install
  npm install # hoặc yarn install
  ```

## Cấu hình file `.env`

- Tạo file `.env` từ file mẫu:
  ```bash
  cp .env.example .env
  ```

- **Lưu ý**: Sử dụng **file dump** đã gửi qua Zalo. Không cần chạy migration.

## Import database

- Tạo database mới, ví dụ: `freelancer_db`.
- Import **file dump** đã gửi vào database vừa tạo.
- Sau khi import, toàn bộ dữ liệu đã sẵn sàng. **Không chạy** `php artisan migrate`.

## Chạy dự án

- Tạo key ứng dụng Laravel và khởi động server:
  ```bash
  php artisan key:generate
  php artisan serve
  ```
- Truy cập dự án qua trình duyệt tại: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Đăng nhập

- Sử dụng thông tin tài khoản admin có sẵn trong database:
  ```
  Email: admin@gmail.com
  Password: 123456789
  ```
- Các tài khoản người dùng khác đã được cung cấp trong file dump.

## Lưu ý quan trọng

- **Không chạy** `php artisan migrate` vì database đã có đầy đủ dữ liệu.
- Nếu gặp lỗi trong quá trình setup hoặc chạy dự án, liên hệ qua **Zalo**: 0384252407.
- Nếu có vấn đề liên quan đến project, database, hoặc front-end, cũng liên hệ qua Zalo trên.

Chúc bạn cài đặt và chạy dự án thành công!
