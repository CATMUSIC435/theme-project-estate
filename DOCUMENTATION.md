# 📚 Tài Liệu Hướng Dẫn Sử Dụng (Documentation)

Theme **Alize Luxury** cung cấp bảng quản trị rất trực quan. Tài liệu này sẽ hướng dẫn bạn cách tùy biến và quản trị các khối nội dung.

---

## 1. Tùy Biến Chung (Theme Customizer)

Bạn truy cập trang quản trị hệ thống: **Giao diện (Appearance) -> Tùy biến (Customize)**

Tại đây, bạn sẽ thấy tab **Alize Theme Settings**, bao gồm:
- Tùy chỉnh thông tin Cơ bản (Tọa độ Map, Email liên hệ, Địa chỉ công ty).
- Slogan chân trang, text giới thiệu Footer.

## 2. Quản Trị Dự Án (Projects)

Là phần quan trọng nhất của theme Bất Động Sản. Dữ liệu này được điều khiển toàn bộ bởi mã nguồn Custom Post Type (`inc/cpt-project.php`) kết hợp ACF (`inc/acf-project-fields.php`).

Để thêm mới 1 dự án:
1. Vào mục quản trị **Dự Án -> Thêm Dự Án**.
2. **Tiêu đề:** Nhập tên dự án (VD: *Alize Ocean View*).
3. **Ảnh đại diện (Featured Image):** Sẽ là ảnh bìa khi dự án hiển thị ở danh sách ngoài trang chủ.
4. Cuộn xuống hộp thoại **Project Settings (ACF):**
   - **Basic Info:** Nhập Vị trí (VD: *Sơn Trà, Đà Nẵng*), Trạng thái (VD: *Đang mở bán*), Diện tích quỹ đất, Thể loại (Villas, Apartments).
   - **Giá cả (Pricing):** Chọn kiểu tiền tệ, số tiền tối thiểu.
   - **Đặc quyền (Amenities):** Checkbox tích chọn các tiện ích có sẵn (Hồ bơi, Rạp phim, v.v).
   - **Thư Viện Ảnh (Gallery):** Tải lên hàng loạt ảnh độ phân giải cao để module *Swiper / Masonry* xử lý.
   - **Mặt Bằng (Floorplans):** Upload ảnh bản vẽ của căn hộ/villa.
   - **Video:** Dán Link Youtube để hiển thị tại trang chi tiết.

## 3. Khung Thời Gian (Timeline)

Sử dụng để liệt kê "Lịch Sử Hình Thành" hoặc "Tiến Độ Dự Án". Hiển thị ở Trang chủ bằng Swiper ngang. 
- Vào mục **Timeline -> Thêm Mốc Thời Gian**.
- Nhập Năm (VD: *2024*).
- Nhập mốc sự kiện (VD: *Cất Nócc Dự Án Alize Bay*).
- Thêm Ảnh Đại Diện nếu muốn có background cho thẻ thời gian đó.

## 4. Tuyển Dụng (Careers)

Xử lý trang Tuyển Dụng.
- Vào mục **Tuyển dụng -> Thêm Vị Trí**.
- Form điền đầy đủ: *Địa điểm (Hà Nội, TP.HCM), Hạn nộp hồ sơ (DatePicker), Yêu cầu, Mức lương*.

## 5. CSS Class Đặc Biệt Cho Menu

Trong bảng quản trị **Giao diện -> Menu**. Nếu bạn muốn 1 mục Menu có style là **"Nút bấm / Button"** (ví dụ nút `Liên hệ`):
- Click mở rộng mục menu đó.
- Tại ô `CSS Classes (Tùy chọn)`, bạn điền chữ: `btn-contact`
- *(Hệ thống tự động thiết kế hình nút bo viền cho thẻ đó).*

Mục nào là menu chính dành cho di động, chỉ cần thêm vào Main Menu, mã nguồn di động tự động đồng bộ (Mobile Off-canvas Menu).

---
*Developed by DeepMind Antigravity AI.*
