<?php
/**
 * Title: Ban Lãnh Đạo
 * Slug: alize/leadership
 * Categories: alize-blocks
 */
/**
 * Leadership 3D Stack Block
 */

$team_query = new WP_Query( array(
	'post_type'      => 'cpt_team',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'order'          => 'ASC'
) );

$team_data = array();
$total_members = $team_query->found_posts;

if ( $team_query->have_posts() ) {
	while ( $team_query->have_posts() ) {
		$team_query->the_post();
		$thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		if ( ! $thumb ) {
			$thumb = 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=800'; // Default photo
		}
		
		$team_data[] = array(
			'title'      => get_the_title(),
			'role'       => get_post_meta( get_the_ID(), '_team_role', true ),
			'experience' => get_post_meta( get_the_ID(), '_team_experience', true ),
			'focus'      => get_post_meta( get_the_ID(), '_team_focus', true ),
			'excerpt'    => get_the_excerpt(),
			'image'      => $thumb
		);
	}
	wp_reset_postdata();
}

// Fallback if empty (should never happen if dummy data ran, but safe)
if ( empty($team_data) ) {
	$team_data[] = array(
		'title'      => 'Sophia Patel',
		'role'       => 'CEO & Co-Founder',
		'experience' => '12 years',
		'focus'      => 'Dubai Marina, Bluewaters Island',
		'excerpt'    => 'Specializes in high-yield investment opportunities with a client-first approach.',
		'image'      => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800'
	);
	$total_members = 1;
}
?>

<section id="leadership" class="g-section py-24 bg-white border-t border-gray-100 overflow-hidden relative">
	<div class="container mx-auto px-6 md:px-10 max-w-[1400px] min-h-[600px] md:min-h-[850px] xl:min-h-[600px] flex flex-col justify-between">
		
		<!-- Top Row: Title & Pagination -->
		<div class="flex flex-col items-start z-10 relative">
			<h2 class="font-heading text-5xl md:text-6xl text-[#111] font-light tracking-tight mb-6">
				Ban Lãnh Đạo
			</h2>
			<div class="px-6 py-2 rounded-[30px] border border-gray-200 text-sm font-medium text-[#111] bg-white shadow-sm flex items-center justify-center min-w-[80px]">
				<span id="ld-current">1</span> / <span id="ld-total"><?php echo esc_html($total_members); ?></span>
			</div>
		</div>

		<!-- Center: 3D Image Stack -->
		<div class="absolute inset-0 flex items-center justify-center pointer-events-none mt-10 md:mt-0">
			<div class="relative w-[280px] h-[360px] sm:w-[320px] sm:h-[420px] md:w-[380px] md:h-[500px]">
				<?php foreach ( $team_data as $index => $member ) : ?>
					<img 
						src="<?php echo esc_url( $member['image'] ); ?>" 
						alt="<?php echo esc_attr( $member['title'] ); ?>" 
						class="leadership-img absolute top-0 left-0 w-full h-full object-cover rounded-[24px] shadow-xl origin-center will-change-transform"
						style="transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.8s ease, filter 0.8s ease;"
						data-index="<?php echo $index; ?>"
					>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Bottom Row: Info & Controls -->
		<div class="grid grid-cols-1 xl:grid-cols-12 gap-10 xl:gap-4 mt-auto z-10 relative pt-96 md:pt-[450px] xl:pt-0">
			
			<!-- Left Info (Bio) -->
			<div class="xl:col-span-4 flex flex-col justify-end text-center xl:text-left items-center xl:items-start">
				<!-- Animated details wrapper -->
				<div id="ld-left-content" class="transition-opacity duration-300">
					<h3 id="ld-name" class="font-body text-xl md:text-2xl font-medium text-[#111] mb-1">
						<?php echo esc_html( $team_data[0]['title'] ); ?>
					</h3>
					<p id="ld-role" class="text-sm font-medium text-gray-400 mb-8 font-body">
						<?php echo esc_html( $team_data[0]['role'] ); ?>
					</p>
					
					<!-- Border line below name (like image) -->
					<div class="w-full h-px bg-gray-200 mb-8 hidden xl:block"></div>
					
					<p id="ld-bio" class="text-gray-400 text-sm md:text-base font-light leading-relaxed max-w-[400px] xl:max-w-[280px]">
						<?php echo wp_kses_post( $team_data[0]['excerpt'] ); ?>
					</p>
				</div>
			</div>
			
			<div class="xl:col-span-4 hidden xl:block relative">
				<!-- Middle spacer divider -->
				<div class="absolute top-1/2 left-0 right-0 h-px bg-gray-200 -z-10 mt-[26px]"></div>
			</div>

			<!-- Right Info (Stats & Button) -->
			<div class="xl:col-span-4 flex flex-col justify-end items-center xl:items-end text-center xl:text-left pb-10 xl:pb-0">
				<div class="flex gap-10 md:gap-16 w-full justify-center xl:justify-end mb-10">
					<div id="ld-right-content-1" class="transition-opacity duration-300">
						<span class="block text-xs font-medium text-gray-400 mb-2">Kinh nghiệm</span>
						<strong id="ld-exp" class="block font-body text-base md:text-lg font-medium text-[#111]">
							<?php echo esc_html( $team_data[0]['experience'] ); ?>
						</strong>
					</div>
					<div id="ld-right-content-2" class="transition-opacity duration-300">
						<span class="block text-xs font-medium text-gray-400 mb-2">Lĩnh vực chuyên môn</span>
						<strong id="ld-focus" class="block font-body text-base md:text-lg font-medium text-[#111] max-w-[160px] leading-tight">
							<?php echo esc_html( $team_data[0]['focus'] ); ?>
						</strong>
					</div>
				</div>

				<div class="w-full h-px bg-gray-200 mb-8 hidden xl:block"></div>
				
				<button id="ld-next-btn" class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center text-[#111] hover:bg-gray-200 transition-colors shadow-sm self-center xl:self-end group focus:outline-none mb-4">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="transform group-hover:translate-y-1 transition-transform">
						<path d="M12 5v14M19 12l-7 7-7-7"/>
					</svg>
				</button>
			</div>

		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const teamData = <?php echo json_encode($team_data); ?>;
	const total = teamData.length;
	let currentIndex = 0;
	
	const images = document.querySelectorAll('.leadership-img');
	const nameEl = document.getElementById('ld-name');
	const roleEl = document.getElementById('ld-role');
	const bioEl = document.getElementById('ld-bio');
	const expEl = document.getElementById('ld-exp');
	const focusEl = document.getElementById('ld-focus');
	const currentPagination = document.getElementById('ld-current');
	
	const leftContent = document.getElementById('ld-left-content');
	const rightContent1 = document.getElementById('ld-right-content-1');
	const rightContent2 = document.getElementById('ld-right-content-2');
	
	const nextBtn = document.getElementById('ld-next-btn');

	function updateStack() {
		// Update Images
		images.forEach((img, index) => {
			let relativeIndex = (index - currentIndex + total) % total;
			
			if (relativeIndex === 0) {
				// Front Bottom Right
				img.style.transform = "translate(50px, 50px) scale(1)";
				img.style.zIndex = "30";
				img.style.filter = "blur(0px)";
				img.style.opacity = "1";
			} else if (relativeIndex === 1) {
				// Middle Center
				img.style.transform = "translate(0px, 0px) scale(0.9)";
				img.style.zIndex = "20";
				img.style.filter = "blur(1px)";
				img.style.opacity = "0.85";
			} else if (relativeIndex === 2) {
				// Back Top Left
				img.style.transform = "translate(-50px, -50px) scale(0.8)";
				img.style.zIndex = "10";
				img.style.filter = "blur(3px)";
				img.style.opacity = "0.6";
			} else {
				// Hidden behind the back
				img.style.transform = "translate(-80px, -80px) scale(0.7)";
				img.style.zIndex = "5";
				img.style.filter = "blur(5px)";
				img.style.opacity = "0";
			}
		});

		// Fade out text, swap, fade in
		leftContent.style.opacity = '0';
		rightContent1.style.opacity = '0';
		rightContent2.style.opacity = '0';
		
		setTimeout(() => {
			const member = teamData[currentIndex];
			nameEl.innerText = member.title;
			roleEl.innerText = member.role;
			bioEl.innerHTML = member.excerpt;
			expEl.innerText = member.experience;
			focusEl.innerText = member.focus;
			currentPagination.innerText = currentIndex + 1;
			
			leftContent.style.opacity = '1';
			rightContent1.style.opacity = '1';
			rightContent2.style.opacity = '1';
		}, 300);
	}

	// Initialize layout
	if(total > 0) {
		updateStack();
	}

	if (nextBtn && total > 1) {
		nextBtn.addEventListener('click', () => {
			currentIndex = (currentIndex + 1) % total;
			updateStack();
		});
	}
});
</script>
