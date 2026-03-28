<?php
/**
 * Template part for displaying project gallery
 */

$gallery = get_field('project_gallery');

if ( ! $gallery || ! is_array($gallery) ) {
    return;
}
?>

<section class="project-gallery py-20 bg-zinc-900 text-white" id="project-gallery">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-serif mb-4 tracking-wide uppercase text-champagne-gold">Thư viện Hình ảnh</h2>
                <p class="text-zinc-400 max-w-xl">Khám phá không gian sống chân thực qua từng góc nhìn.</p>
            </div>
            <div class="hidden md:flex gap-4">
                <button class="gallery-prev w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center hover:bg-champagne-gold hover:text-zinc-900 hover:border-champagne-gold transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                </button>
                <button class="gallery-next w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center hover:bg-champagne-gold hover:text-zinc-900 hover:border-champagne-gold transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                </button>
            </div>
        </div>

        <div class="swiper project-gallery-swiper overflow-visible">
            <div class="swiper-wrapper">
                <?php foreach ($gallery as $image): ?>
                    <div class="swiper-slide w-[80%] md:w-[60%] lg:w-[40%]">
                        <a href="<?php echo esc_url($image['url']); ?>" class="block rounded-2xl overflow-hidden aspect-[4/5] group js-lightbox">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" /></svg>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="gallery-lightbox" class="fixed inset-0 z-50 bg-black/95 hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
    <button class="absolute top-6 right-6 text-white hover:text-champagne-gold transition-colors js-close-lightbox">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
    <img id="lightbox-img" src="" alt="" class="max-h-[90vh] max-w-[90vw] object-contain">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper for gallery
    if (typeof Swiper !== 'undefined') {
        new Swiper('.project-gallery-swiper', {
            slidesPerView: 'auto',
            spaceBetween: 30,
            grabCursor: true,
            navigation: {
                nextEl: '.gallery-next',
                prevEl: '.gallery-prev',
            },
        });
    }

    // Lightbox Logic
    const links = document.querySelectorAll('.js-lightbox');
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.querySelector('.js-close-lightbox');

    if (links.length > 0 && lightbox) {
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const src = this.getAttribute('href');
                lightboxImg.setAttribute('src', src);
                lightbox.classList.remove('hidden');
                // slight delay for fade transition
                setTimeout(() => {
                    lightbox.classList.remove('opacity-0');
                }, 10);
            });
        });

        closeBtn.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        function closeLightbox() {
            lightbox.classList.add('opacity-0');
            setTimeout(() => {
                lightbox.classList.add('hidden');
                lightboxImg.setAttribute('src', '');
            }, 300);
        }
    }
});
</script>
