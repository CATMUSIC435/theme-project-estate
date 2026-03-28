# Alize Luxury - Bất Động Sản Hạng Sang

**Alize Luxury** là một theme WordPress được thiết kế riêng (custom-build) dành cho doanh nghiệp và các dự án Bất Động Sản hạng sang. Giao diện tập trung vào trải nghiệm thị giác cao cấp (Premium UI/UX), sử dụng các hiệu ứng animation mượt mà từ **GSAP ScrollSmoother** và thiết kế tối giản, sang trọng lấy cảm hứng từ các website đạt giải Awwwards.

## 🌟 Tính Năng Nổi Bật

- **Giao diện Thiết Kế Độc Bản (Bespoke UI):** Phong cách "FourthWall", typography kết hợp giữa Serif (Playfair Display) và Sans-serif (Montserrat) hiện đại.
- **Hiệu Ứng Bồng Bềnh (Butter-Smooth Animations):** Được tối ưu hóa bằng GSAP ScrollTrigger và **ScrollSmoother** mang lại cảm giác cuộn mượt mà có quán tính (inertia scroll).
- **Hệ Thống Custom Post Types Tiên Tiến:** Quản lý Dự Án (Projects), Dòng Thời Gian (Timeline), Tuyển Dụng (Careers) độc lập.
- **Off-Canvas Mobile Menu:** Menu điện thoại ẩn thanh lịch, trượt từ trái sang (Left to Right) theo chuẩn UI di động cao cấp.
- **Tích Hợp Sẵn Dummy Data:** File `dummy-data.php` dễ dàng khởi tạo nội dung demo lập tức khi cài theme.
- **CSS Tối Ưu Mạng Lưới (Utility-First):** Xây dựng trên nền tảng lai giữa CSS truyền thống và sức mạnh của Tailwind CSS utility classes.

## 🔌 Yêu Cầu Header / Plugin
Để theme hoạt động hoàn hảo 100%, trang web cần có:
1. **Advanced Custom Fields (ACF) PRO:** Bắt buộc để hiển thị các trường dữ liệu phong phú (Gallery, Floorplans, Amenities, Pricing, Settings) của Dự Án, Nguồn Nhân Lực.
2. **Contact Form 7 / WPForms:** Dành cho Form liên hệ phía chân trang (hoặc tích hợp Zalo Native).
3. **Rank Math SEO:** Theme đã có sẵn mã nguồn khai báo Breadcrumbs hỗ trợ `rank-math-breadcrumbs`.

## 🛠 Hướng Dẫn Cài Đặt
1. Chép thư mục `custom-theme` (hoặc đổi tên thành `alize-luxury`) vào thư mục `wp-content/themes/`.
2. Đăng nhập vào trang quản trị WordPress (WP Admin) -> Dao diện (Appearance) -> Kích hoạt (Activate) Theme **Alize Luxury**.
3. *Khuyến nghị:* Mở file `inc/dummy-data.php` và chạy hàm `alize_create_dummy_projects()` một lần để nạp dữ liệu mẫu (hoặc để theme tự động chèn).

## 🗂 Cấu Trúc File Chính

- `header.php`: Chứa cấu trúc `<head>`, Navigation Pill trên máy tính và Off-Canvas Drawer trên Mobile.
- `footer.php`: Chân trang đa cột, form đăng ký nhận email và map location. Nơi khởi tạo kết thúc của *GSAP ScrollSmoother*.
- `functions.php`: Cột sống của theme. Kết nối ACF, CPTs, khai báo Menu, Enqueue CSS/JS.
- `assets/js/main.js`: Trái tim của toàn bộ Animation (GSAP, Swiper, DOM events).
- `assets/css/main.css`: CSS cốt lõi định nghĩa biến (`:root`), font chữ, và các layout chính.

## 🚨 Lưu Ý Quan Trọng Về GSAP ScrollSmoother
Thư viện `ScrollSmoother.min.js` đang được trỏ tạm từ *GSAP Trial CDN (jsDelivr)* để phục vụ lập trình trên `localhost`.
⚠️ **Tuyệt đối không dùng URL CDN Trial trên thư mục Production (tên miền thật)** (sẽ phát sinh lỗi).
Khi đưa lên máy chủ thật, bạn cần tải file bản quyền từ GSAP Club vào thư mục `assets/js/ScrollSmoother.min.js` và cập nhật đường dẫn trong `functions.php`.
