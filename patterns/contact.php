<?php
/**
 * Title: Liên Hệ
 * Slug: alize/contact
 * Categories: alize-blocks
 */
/**
 * Contact Block Template
 */

$contact_phone   = get_theme_mod('contact_phone', '090 123 4567');
$contact_email   = get_theme_mod('contact_email', 'contact@alizeluxury.com');
?>
<section id="contact" class="g-section py-20 md:py-32 bg-white">
	<div class="container mx-auto px-6 md:px-10 max-w-[1400px]">
		<div class="grid grid-cols-1 xl:grid-cols-12 gap-16 xl:gap-24">
			
			<!-- Left Column: Info & Socials -->
			<div class="xl:col-span-5 flex flex-col">
				<!-- Contact Us Label -->
				<div class="flex items-center gap-3 mb-8">
					<span class="w-1.5 h-1.5 rounded-full bg-[#FF5A5A] block mt-0.5"></span>
					<span class="text-[11px] font-semibold tracking-widest text-[#111] uppercase">Liên Hệ</span>
				</div>
				
				<!-- Heading -->
				<h2 class="font-heading text-4xl md:text-5xl lg:text-[56px] text-text-main font-light leading-[1.1] mb-12">
					Điền vào biểu mẫu<br>để kết nối cùng chúng tôi
				</h2>
				
				<!-- Follow Us -->
				<div class="mb-10">
					<span class="text-xs font-medium tracking-widest text-text-muted uppercase mb-5 block">Theo Dõi:</span>
					<div class="flex gap-4">
						<a href="#" class="w-11 h-11 rounded-full bg-[#f4f4f4] flex items-center justify-center text-[#111] hover:bg-[#e0e0e0] transition-colors">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.01.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 2.06-.69 4.11-1.92 5.75-1.18 1.6-2.85 2.75-4.8 3.23-2.61.64-5.59.3-7.85-1.1-2.15-1.34-3.66-3.6-4.04-6.17-.45-3.08.38-6.38 2.5-8.56 1.83-1.89 4.54-2.84 7.15-2.58.07 1.48.15 2.96.22 4.44-1.28-.4-2.73-.25-3.87.41-1.36.79-2.22 2.37-2.1 3.96.15 1.94 1.71 3.63 3.64 3.86 1.61.19 3.25-.49 4.22-1.78.7-.93 1.07-2.1 1.05-3.26-.06-4.99-.03-9.98-.03-14.98z"/></svg>
						</a>
						<a href="#" class="w-11 h-11 rounded-full bg-[#f4f4f4] flex items-center justify-center text-[#111] hover:bg-[#e0e0e0] transition-colors">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
						</a>
						<a href="#" class="w-11 h-11 rounded-full bg-[#f4f4f4] flex items-center justify-center text-[#111] hover:bg-[#e0e0e0] transition-colors">
							<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
						</a>
					</div>
				</div>
				
				<!-- Skyline Image -->
				<div class="mt-auto hidden xl:block">
					<img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=800" alt="Dubai Skyline" class="w-full h-56 object-cover rounded-[24px] shadow-sm">
				</div>
			</div>
			
			<!-- Right Column: Minimal Form -->
			<div class="xl:col-span-7 xl:pl-10">
				<form class="flex flex-col gap-5 w-full">
					<!-- Name Row -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-full">
						<input type="text" placeholder="Tên*" required class="w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 outline-none focus:border-black transition-colors placeholder-[#a0aab2] text-text-main font-body text-base m-0">
						<input type="text" placeholder="Họ*" required class="w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 outline-none focus:border-black transition-colors placeholder-[#a0aab2] text-text-main font-body text-base m-0">
					</div>
					
					<!-- Email Row -->
					<input type="email" placeholder="Địa chỉ Email*" required class="w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 outline-none focus:border-black transition-colors placeholder-[#a0aab2] text-text-main font-body text-base m-0">
					
					<!-- Location Select -->
					<div class="relative w-full">
						<select required class="w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 appearance-none outline-none focus:border-black transition-colors text-text-main font-body text-base cursor-pointer
						<?php /* use a hack to show placeholder color if value is empty */ ?> text-[#a0aab2] m-0" onchange="this.className = this.value ? 'w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 appearance-none outline-none focus:border-black transition-colors text-text-main font-body text-base cursor-pointer m-0' : 'w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-4 appearance-none outline-none focus:border-black transition-colors text-text-main font-body text-base cursor-pointer text-[#a0aab2] m-0'">
							<option value="" disabled selected hidden>Khu Vực</option>
							<option value="hanoi">Hà Nội</option>
							<option value="hcm">TP. Hồ Chí Minh</option>
							<option value="other">Khác</option>
						</select>
						<!-- Custom Arrow -->
						<div class="absolute inset-y-0 right-6 flex items-center pointer-events-none text-[#111]">
							<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
						</div>
					</div>
					
					<!-- Message Textarea -->
					<textarea placeholder="Nội dung" rows="6" class="w-full bg-[#f8f8f8] border border-[#666] rounded-2xl px-6 py-5 outline-none focus:border-black transition-colors placeholder-[#a0aab2] text-text-main font-body text-base resize-none m-0"></textarea>
					
					<!-- Submit Button -->
					<div class="mt-2">
						<button type="submit" class="px-14 py-4 rounded-full bg-[#0a0a0a] text-white hover:bg-primary transition-colors font-body text-sm font-semibold tracking-wide border border-[#0a0a0a] hover:border-primary">
							Gửi Thông Tin
						</button>
					</div>
				</form>
				
				<!-- Mobile Skyline Image -->
				<div class="mt-12 xl:hidden">
					<img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=800" alt="Dubai Skyline" class="w-full h-48 object-cover rounded-[24px] shadow-sm">
				</div>
			</div>
			
		</div>
	</div>
</section>
