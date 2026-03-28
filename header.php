<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
	
	<!-- Tailwind CSS Integration for future customizable components -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			corePlugins: {
				preflight: false, // Disabled to prevent conflicts with the existing custom-theme CSS
			},
			theme: {
				extend: {
					colors: {
						primary: 'var(--primary-color)',
						'primary-hover': 'var(--primary-hover)',
						'bg-dark': 'var(--bg-dark)',
						'bg-dark-elem': 'var(--bg-dark-elem)',
						'text-main': 'var(--text-light)',
						'text-muted': 'var(--text-muted)',
						'border-color': 'var(--border-color)',
						'champagne-gold': '#d4af37'
					},
					fontFamily: {
						heading: ['"Playfair Display"', 'serif'],
						body: ['Montserrat', 'sans-serif']
					}
				}
			}
		}
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Chuyển đến nội dung chính', 'alize-luxury' ); ?></a>

	<!-- Desktop & Mobile Header -->
	<style>
		/* ==========================================================================
		   Scrolled State Overrides (When Header Background Becomes White)
		   ========================================================================== */
		/* Logo Sizing */
		#masthead .site-branding img { max-height: 28px !important; width: auto; }
		
		/* Logo Scrolled State */
		#masthead.scrolled .site-branding a { color: #1a1a1a !important; }
		#masthead.scrolled .site-branding svg { color: #1a1a1a !important; fill: #1a1a1a !important; }
		
		/* Desktop Nav Pill */
		#masthead.scrolled #desktop-nav-pill { background-color: rgba(0, 0, 0, 0.05) !important; }
		#masthead.scrolled #desktop-nav-pill a:not(.bg-white) { color: #4a4a4a !important; }
		#masthead.scrolled #desktop-nav-pill a:not(.bg-white):hover { color: #1a1a1a !important; background-color: rgba(0, 0, 0, 0.05) !important; }
		#masthead.scrolled #desktop-nav-pill a.text-champagne-gold { color: #b8863f !important; }
		#masthead.scrolled #desktop-nav-pill a.bg-white { background-color: #1a1a1a !important; color: #fff !important; }
		
		/* Map Button - Needs contrast against white background */
		#masthead.scrolled a[href="#location"] { background-color: rgba(0, 0, 0, 0.05) !important; color: #1a1a1a !important; box-shadow: none !important; border: 1px solid rgba(0,0,0,0.05) !important; }
		#masthead.scrolled a[href="#location"]:hover { background-color: rgba(0, 0, 0, 0.1) !important; }
		
		/* Menu Burger Button */
		#masthead.scrolled #mobile-menu-toggle { background-color: rgba(0, 0, 0, 0.05) !important; }
		#masthead.scrolled #mobile-menu-toggle span { background-color: #1a1a1a !important; }
		#masthead.scrolled #mobile-menu-toggle:hover { background-color: rgba(0, 0, 0, 0.1) !important; }
	</style>
	<header id="masthead" class="fixed top-0 left-0 w-full z-50 pt-5 px-2 md:px-8 transition-all duration-300">
		<div class="container mx-auto max-w-8xl text-white">
			<div class="flex items-center justify-between">
				
				<!-- Left Group: Logo -->
				<div class="flex items-center">
					<!-- Site Branding / Logo -->
					<div class="site-branding flex items-center font-serif text-lg leading-tight uppercase tracking-widest font-semibold">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center text-white hover:text-champagne-gold transition-colors">
								<!-- Standard fallback logo icon -->
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
								  <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
								  <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
								</svg>
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<!-- Center Center: Nav Pill (Hidden on smaller screens, shown on lg) -->
				<nav id="site-navigation" class="hidden lg:block absolute left-1/2 -translate-x-1/2 mt-0">
					<!-- Force override the WordPress default dots from old CSS when preflight is off, using a scoped style -->
					<style>
						#desktop-nav-pill ul, #desktop-nav-pill li { list-style: none !important; margin: 0; padding: 0; }
					</style>
					<div id="desktop-nav-pill" class="bg-black/10 backdrop-blur-md rounded-full p-1.5 flex items-center shadow-sm">
						<ul class="flex items-center text-[15px] font-medium tracking-wide space-x-1">
							<li><a href="<?php echo esc_url(home_url('/')); ?>#about" class="block px-6 py-2 text-white/90 hover:text-white hover:bg-white/10 rounded-full transition-colors">Giới thiệu</a></li>
							<li><a href="<?php echo esc_url(home_url('/')); ?>#timeline" class="block px-6 py-2 text-white/90 hover:text-white hover:bg-white/10 rounded-full transition-colors">Timeline</a></li>
							<li><a href="<?php echo esc_url(home_url('/')); ?>#projects" class="block px-6 py-2 bg-white text-zinc-900 rounded-full shadow-sm">Dự án</a></li>
							<li><a href="<?php echo esc_url(get_post_type_archive_link('career')); ?>" class="block px-6 py-2 text-white/90 hover:text-white hover:bg-white/10 rounded-full transition-colors">Tuyển dụng</a></li>
							<li><a href="<?php echo esc_url(home_url('/')); ?>#contact" class="block px-6 py-2 text-champagne-gold hover:text-white hover:bg-champagne-gold/20 rounded-full transition-colors">Liên hệ</a></li>
						</ul>
					</div>
				</nav>

				<!-- Right Group: Extras -->
				<div class="flex items-center space-x-3">
					<!-- Map Button (Solid White) -->
					<a href="#location" class="w-11 h-11 bg-white rounded-[14px] flex items-center justify-center text-zinc-900 hover:bg-zinc-100 transition-colors shadow-sm">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
						  <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
						</svg>
					</a>
					
					<!-- Menu Toggle Button (Translucent, No Border) -->
					<button id="mobile-menu-toggle" class="w-11 h-11 bg-white/20 backdrop-blur-md rounded-[14px] flex flex-col items-center justify-center space-y-[4px] hover:bg-white/30 transition-colors focus:outline-none shadow-sm">
						<span class="w-5 h-[1.5px] bg-white rounded-full"></span>
						<span class="w-5 h-[1.5px] bg-white rounded-full"></span>
						<span class="w-5 h-[1.5px] bg-white rounded-full"></span>
					</button>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<!-- Slide-in Mobile Menu (Left to Right) -->
	<style>
		/* Force override for mobile menu links to prevent dark text from older CSS */
		#mobile-menu-drawer ul, #mobile-menu-drawer li {
			list-style: none !important;
			padding: 0 !important;
			margin: 0 !important;
		}
		#mobile-menu-drawer li {
			margin-bottom: 24px !important;
		}
		#mobile-menu-drawer a {
			color: #ffffff !important;
			opacity: 0.8;
			text-decoration: none !important;
			display: block;
			font-family: serif;
			transition: all 0.3s ease;
		}
		#mobile-menu-drawer a:hover {
			opacity: 1;
			color: #d4af37 !important; /* champagne-gold */
		}
	</style>

	<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[90] opacity-0 pointer-events-none transition-opacity duration-300"></div>
	
	<div id="mobile-menu-drawer" class="fixed top-0 left-0 w-[85vw] max-w-sm h-screen bg-zinc-900 z-[100] transform -translate-x-full transition-transform duration-500 ease-in-out flex flex-col shadow-2xl border-r border-zinc-800">
		<div class="p-6 flex justify-between items-center border-b border-white/10">
			<span class="text-white font-serif uppercase tracking-wider text-xl font-bold"><?php bloginfo( 'name' ); ?></span>
			<button id="mobile-menu-close" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-white hover:bg-white/20 hover:text-champagne-gold transition-colors focus:outline-none">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>
		
		<div class="flex-grow overflow-y-auto px-8 py-10">
			<!-- WordPress Menu logic -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'mobile-primary-menu',
				'container'      => false,
				'menu_class'     => 'text-2xl',
				'fallback_cb'    => false,
			) );
			?>
			
			<?php if ( ! has_nav_menu( 'menu-1' ) ) : ?>
			<ul class="text-2xl">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about">Giới thiệu</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#timeline">Timeline</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#projects">Dự án</a></li>
				<li><a href="<?php echo esc_url( get_post_type_archive_link('career') ); ?>">Tuyển dụng</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contact" style="color: #d4af37 !important; opacity: 1;">Liên hệ</a></li>
			</ul>
			<?php endif; ?>
		</div>
		
		<div class="p-6 border-t border-white/10 text-white/50 text-sm">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
		</div>
	</div>

	<!-- Mobile Menu JS Toggle Logic -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const toggleBtn = document.getElementById('mobile-menu-toggle');
			const closeBtn = document.getElementById('mobile-menu-close');
			const drawer = document.getElementById('mobile-menu-drawer');
			const overlay = document.getElementById('mobile-menu-overlay');

			function openMenu() {
				drawer.classList.remove('-translate-x-full');
				overlay.classList.remove('opacity-0', 'pointer-events-none');
				document.body.style.overflow = 'hidden'; // Prevent scrolling
			}

			function closeMenu() {
				drawer.classList.add('-translate-x-full');
				overlay.classList.add('opacity-0', 'pointer-events-none');
				document.body.style.overflow = '';
			}

			if(toggleBtn) toggleBtn.addEventListener('click', openMenu);
			if(closeBtn) closeBtn.addEventListener('click', closeMenu);
			if(overlay) overlay.addEventListener('click', closeMenu);
			
			// Close menu when clicking on an anchor link
			const drawerLinks = drawer.querySelectorAll('a[href*="#"]');
			drawerLinks.forEach(link => {
				link.addEventListener('click', closeMenu);
			});
		});
	</script>

	<!-- ScrollSmoother Structure Starts Here -->
	<div id="smooth-wrapper">
		<div id="smooth-content">
