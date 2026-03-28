<?php
/**
 * Template part for displaying project video
 */

$video_url = get_field('project_video_url');
$video_thumbnail = get_field('project_video_thumbnail');

if ( ! $video_url ) {
    return;
}

$thumb_url = $video_thumbnail ? $video_thumbnail['url'] : get_the_post_thumbnail_url(get_the_ID(), 'large');
?>

<section class="project-video py-20 bg-zinc-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-serif text-zinc-900 mb-12 uppercase tracking-wide">Video Trải Nghiệm</h2>
        <div class="relative max-w-5xl mx-auto rounded-3xl overflow-hidden shadow-2xl group aspect-video bg-zinc-900">
            <?php if ($thumb_url): ?>
                <img src="<?php echo esc_url($thumb_url); ?>" alt="Video Thumbnail" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-70 group-hover:opacity-40">
            <?php endif; ?>
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="w-20 h-20 bg-champagne-gold/90 rounded-full flex items-center justify-center text-zinc-900 hover:scale-110 hover:bg-white transition-all duration-300 shadow-lg z-10 cursor-pointer js-play-video" aria-label="Play Video">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
            </div>
            
            <div class="hidden js-video-container absolute inset-0 w-full h-full z-20">
                <?php echo $video_url; // oEmbed HTML ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const playBtn = document.querySelector('.js-play-video');
    const container = document.querySelector('.js-video-container');
    
    if (playBtn && container) {
        playBtn.addEventListener('click', function() {
            container.classList.remove('hidden');
            // If it's an iframe, we could add autoplay parameter here depending on provider
            const iframe = container.querySelector('iframe');
            if (iframe) {
                let src = iframe.getAttribute('src');
                if (src.indexOf('?') > -1) {
                    iframe.setAttribute('src', src + '&autoplay=1');
                } else {
                    iframe.setAttribute('src', src + '?autoplay=1');
                }
            }
        });
    }
});
</script>
