# Nhật Ký Phát Triển (Changelog)

### Version 1.2.0 (Latest Update)
- **Tối ưu hóa GSAP Animation**: Kích hoạt GSAP `ScrollSmoother` nội bộ thay vì dùng Lenis.
- **Khắc phục lỗi SSL Localhost**: Sửa lỗi `ERR_CERT_AUTHORITY_INVALID` bằng cách chuyển từ CDN CodePen sang CDN chính quy jsDelivr.
- **Tái thiết kế Navigation Header (Máy Tính)**:
  - Loại bỏ các thành phần thẻ ẩn lẻ lóa.
  - Phổ cập Menu Tiếng Việt chính thức.
  - Cập nhật hiệu ứng đổi màu *thông minh* khi cuộn chuột: Nền thành trắng, thẻ menu tự động chuyển từ text trắng -> chữ Xám/Đen để tối đa độ tương phản.
  - Thêm viền border mảnh mai cho các nút Map, Menu Burger khi nền màu sáng.
- **Thiết kế Mobile Menu**: Layout Menu ẩn (Off-Canvas) trượt từ góc trái thay thế menu dropdown cổ điển. Chữ hiển thị font có chân (Serif) cỡ khổng lồ.
- **Hiệu ứng Parallax Image**: Được tinh chỉnh thông số `scrub: 1.5`, mang lại cảm giác sâu ảnh cao hơn khi cuộn lướt xem Giới Thiệu (About Section).

### Version 1.1.0
- **Redesign Theme Cốt Lõi**: Loại bỏ hoàn toàn ngôn ngữ thiết kế Bootstrap nhám cũ, chuyển sang phong cách "Rounded FourthWall".
- **Hệ Thống Component / Part**: Tách các khối single project ra thành từng tệp nhỏ trong `parts/project/`.
- **Tối ưu Hóa Hiệu Suất Ảnh**: Đổi toàn bộ ảnh Thumbnail List Project từ load full kích cỡ sang hàm lấy ảnh đại diện WordPress đúng size.

### Version 1.0.0
- Khởi tạo lần đầu Theme Alize Real Estate Luxury.
- Đăng ký hệ thống Post Types (Nhà đất, Tuyển dụng, Lịch sử).
- Đăng ký Taxonomy vị trí, tình trạng.
- Tích hợp TailWind CSS classes.
- Upload Dummy Data tự động hóa 100%.
