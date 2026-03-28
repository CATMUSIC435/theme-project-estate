<?php
/**
 * Template part for displaying project contact form
 */
?>

<section class="project-contact py-24 bg-zinc-900 text-white relative" id="project-contact">
    <div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
        <!-- Abstract Pattern Background optional -->
        <svg class="absolute w-full h-full text-champagne-gold" width="100%" height="100%" fill="none" stroke="currentColor" stroke-width="1.5">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 40V0h40"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto bg-zinc-800/80 backdrop-blur-lg p-10 md:p-14 rounded-3xl border border-zinc-700 shadow-2xl">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-serif text-white mb-4 tracking-wide uppercase">Nhận Tâm Điểm Đầu Tư</h2>
                <p class="text-zinc-400">Đăng ký ngay để nhận thông tin chi tiết, bảng giá và chính sách ưu đãi mới nhất.</p>
            </div>

            <form id="project-registration-form" class="space-y-6">
                <!-- Nonce -->
                <?php wp_nonce_field('submit_project_form', 'project_nonce'); ?>
                <input type="hidden" name="project_id" value="<?php echo get_the_ID(); ?>">
                <input type="hidden" name="action" value="submit_project_registration">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-zinc-300 mb-2">Họ và tên *</label>
                        <input type="text" id="customer_name" name="customer_name" required class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập họ và tên">
                    </div>
                    <div>
                        <label for="customer_phone" class="block text-sm font-medium text-zinc-300 mb-2">Số điện thoại *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" required class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div>
                    <label for="customer_email" class="block text-sm font-medium text-zinc-300 mb-2">Email</label>
                    <input type="email" id="customer_email" name="customer_email" class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập email của bạn (không bắt buộc)">
                </div>

                <div>
                    <label for="customer_content" class="block text-sm font-medium text-zinc-300 mb-2">Lời nhắn / Yêu cầu</label>
                    <textarea id="customer_content" name="customer_content" rows="4" class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300 resize-none" placeholder="Bạn cần tư vấn thêm về..."></textarea>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit" id="btn-submit-registration" class="inline-flex items-center justify-center w-full md:w-auto px-10 py-4 font-serif text-lg tracking-wide uppercase bg-champagne-gold text-zinc-900 hover:bg-white transition-colors duration-300 rounded-full font-medium min-w-[200px]">
                        <span id="btn-text">Gửi Yêu Cầu</span>
                        <svg id="btn-loader" class="hidden animate-spin ml-3 h-5 w-5 text-zinc-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="form-message" class="hidden mt-4 text-center text-sm font-medium p-3 rounded-lg"></div>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('project-registration-form');
    const msgBox = document.getElementById('form-message');
    const btnSubmit = document.getElementById('btn-submit-registration');
    const btnText = document.getElementById('btn-text');
    const btnLoader = document.getElementById('btn-loader');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // UI Loading state
            btnSubmit.disabled = true;
            btnSubmit.classList.add('opacity-80', 'cursor-not-allowed');
            btnText.textContent = 'Đang xử lý...';
            btnLoader.classList.remove('hidden');
            msgBox.classList.add('hidden');
            msgBox.className = 'hidden mt-4 text-center text-sm font-medium p-3 rounded-lg'; // reset classes
            
            const formData = new FormData(form);
            
            fetch(typeof alizeData !== 'undefined' ? alizeData.ajax_url : '/wp-admin/admin-ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                msgBox.classList.remove('hidden');
                form.reset();
                if (data.success) {
                    msgBox.classList.add('bg-green-100', 'text-green-700');
                    msgBox.innerHTML = data.data.message || 'Gửi yêu cầu thành công!';
                } else {
                    msgBox.classList.add('bg-red-100', 'text-red-700');
                    msgBox.innerHTML = data.data.message || 'Có lỗi xảy ra. Vui lòng thử lại sau.';
                }
            })
            .catch(error => {
                msgBox.classList.remove('hidden');
                msgBox.classList.add('bg-red-100', 'text-red-700');
                msgBox.innerHTML = 'Lỗi kết nối. Vui lòng thử lại.';
                console.error('Error:', error);
            })
            .finally(() => {
                // Remove loading state
                btnSubmit.disabled = false;
                btnSubmit.classList.remove('opacity-80', 'cursor-not-allowed');
                btnText.textContent = 'Gửi Yêu Cầu';
                btnLoader.classList.add('hidden');
            });
        });
    }
});
</script>
