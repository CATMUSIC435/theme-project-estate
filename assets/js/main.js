document.addEventListener('DOMContentLoaded', () => {

	// Register GSAP ScrollTrigger
	gsap.registerPlugin(ScrollTrigger);

	// Initialize GSAP ScrollSmoother
	if (typeof ScrollSmoother !== 'undefined') {
		ScrollSmoother.create({
			wrapper: '#smooth-wrapper',
			content: '#smooth-content',
			smooth: 1.5,
			effects: true,
			smoothTouch: 0.1,
		});
	}

	// Header Scroll Effect
	const header = document.getElementById('masthead');
	window.addEventListener('scroll', () => {
		if (window.scrollY > 50) {
			header.classList.add('scrolled');
		} else {
			header.classList.remove('scrolled');
		}
	});

	// Mobile Menu Toggle
	const menuToggle = document.querySelector('.menu-toggle');
	const mainNav = document.querySelector('.main-navigation');
	const navLinks = document.querySelectorAll('.main-navigation a');

	if(menuToggle && mainNav) {
		menuToggle.addEventListener('click', () => {
			menuToggle.classList.toggle('active');
			mainNav.classList.toggle('active');
			document.body.classList.toggle('menu-open');
		});

		navLinks.forEach(link => {
			link.addEventListener('click', () => {
				menuToggle.classList.remove('active');
				mainNav.classList.remove('active');
				document.body.classList.remove('menu-open');
			});
		});
	}

	// Smooth Scroll for Nav Links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const targetId = this.getAttribute('href');
			if (targetId === '#' || targetId === '#projects') return;
			const target = document.querySelector(targetId);
			if (target) {
				e.preventDefault();
				if (typeof ScrollSmoother !== 'undefined') {
					let smoother = ScrollSmoother.get();
					if(smoother) {
						// True means smooth scrolling animation applies
						smoother.scrollTo(target, true, "top top"); 
					}
				} else {
					window.scrollTo({
						top: target.offsetTop - 80, // offset for fixed header
						behavior: 'smooth'
					});
				}
			}
		});
	});

	// --- SWIPER CAROUSEL INITIALIZATION --- //
	// Hero Swiper
	const heroSwiper = new Swiper('.hero-swiper', {
		effect: 'fade',
		speed: 1500,
		autoplay: {
			delay: 6000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.hero-pagination',
			clickable: true,
		},
		loop: true,
		on: {
			slideChangeTransitionStart: function () {
				// Only animate the incoming background image
				gsap.fromTo(this.slides[this.activeIndex].querySelector('.hero-bg img'), 
					{ scale: 1.15 },
					{ scale: 1.05, duration: 3, ease: 'power2.out' }
				);
			}
		}
	});

	// --- GSAP ANIMATIONS --- //

	// Initial Hero Load Animation for Minimalist Centered Layout
	const tlHero = gsap.timeline({ defaults: { ease: 'power3.out' } });
	
	tlHero.fromTo('.swiper-slide-active .hero-bg img', 
		{ scale: 1.15 },
		{ scale: 1.05, duration: 2.5, ease: 'power2.out' }
	)
	.to('.hero-title-line', {
		y: '0%',
		opacity: 1,
		duration: 1.5,
		stagger: 0.15,
		ease: 'expo.out'
	}, '-=2')
	.to('.hero-btn-wrap', {
		y: 0,
		opacity: 1,
		duration: 1,
		ease: 'back.out(1.2)'
	}, '-=1');

	// Section Titles fade in
	gsap.utils.toArray('.section-title').forEach(title => {
		gsap.from(title, {
			scrollTrigger: {
				trigger: title,
				start: 'top 85%',
				toggleActions: 'play none none reverse'
			},
			y: 60,
			opacity: 0,
			duration: 1.2,
			ease: 'expo.out'
		});
	});

	// About Section Parallax Image
	gsap.to('.about-image img', {
		scrollTrigger: {
			trigger: '.about-section',
			start: 'top bottom',
			end: 'bottom top',
			scrub: 1.5
		},
		y: 80, // Parallax movement
		ease: 'none'
	});

		// Timeline Horizontal Swiper Initialization
	if(document.querySelector('.timeline-swiper')) {
		const timelineSwiper = new Swiper('.timeline-swiper', {
			slidesPerView: 1,
			spaceBetween: 0,
			speed: 1200,
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next-tl',
				prevEl: '.swiper-button-prev-tl',
			},
			breakpoints: {
				640: { slidesPerView: 2 },
				1024: { slidesPerView: 3 },
				1400: { slidesPerView: 4 }
			}
		});
	}

	// Timeline Horizontal GSAP Entrance
	gsap.from('.timeline-horizontal-section', {
		scrollTrigger: {
			trigger: '.timeline-horizontal-section',
			start: 'top 80%'
		},
		opacity: 0,
		y: 80,
		duration: 1.5,
		ease: 'expo.out'
	});

	// Gallery Grid Stagger Reveal
	gsap.from('.gallery-masonry-item', {
		scrollTrigger: {
			trigger: '#gallery',
			start: 'top 85%'
		},
		scale: 0.9,
		y: 60,
		opacity: 0,
		stagger: 0.1,
		duration: 1.2,
		ease: 'power4.out'
	});

	// News Cards Stagger Reveal
	gsap.from('.news-card', {
		scrollTrigger: {
			trigger: '.news-section',
			start: 'top 85%'
		},
		y: 80,
		opacity: 0,
		stagger: 0.1,
		duration: 1.2,
		ease: 'power3.out'
	});

	// --- MULTI-SELECT PROJECTS FILTERING --- //
	const filterStatus = document.getElementById('filter-status');
	const filterType = document.getElementById('filter-type');
	const filterLocation = document.getElementById('filter-location');
	const projectFilterItems = document.querySelectorAll('.project-card-filter');

	if (filterStatus && filterType && filterLocation && projectFilterItems.length > 0) {
		const filters = [filterStatus, filterType, filterLocation];

		filters.forEach(filterEl => {
			filterEl.addEventListener('change', () => {
				const statusVal = filterStatus.value;
				const typeVal = filterType.value;
				const locationVal = filterLocation.value;

				// Smooth GSAP exit animation
				gsap.to(projectFilterItems, {
					scale: 0.95,
					opacity: 0,
					duration: 0.3,
					onComplete: () => {
						// Setup visibility based on all 3 conditions
						projectFilterItems.forEach(item => {
							const itemStatus = item.getAttribute('data-status');
							const itemType = item.getAttribute('data-type');
							const itemLocation = item.getAttribute('data-location');

							const matchStatus = (statusVal === 'all' || itemStatus === statusVal);
							const matchType = (typeVal === 'all' || itemType === typeVal);
							const matchLocation = (locationVal === 'all' || itemLocation === locationVal);

							if (matchStatus && matchType && matchLocation) {
								item.style.display = 'block';
							} else {
								item.style.display = 'none';
							}
						});

						// Capture newly visible items
						const visibleFilterItems = Array.from(projectFilterItems).filter(item => item.style.display === 'block');

						if(visibleFilterItems.length > 0) {
							// Reset state before animating in
							gsap.set(visibleFilterItems, { scale: 0.95, opacity: 0, y: 30 });
							
							// Animate in
							gsap.to(visibleFilterItems, {
								y: 0,
								scale: 1,
								opacity: 1,
								duration: 0.5,
								stagger: 0.05,
								ease: 'back.out(1.2)'
							});
						}
					}
				});
			});
		});

		// Initial Entrance Animation for Project Cards
		gsap.from(projectFilterItems, {
			scrollTrigger: {
				trigger: '#projects-grid',
				start: 'top 80%'
			},
			y: 60,
			opacity: 0,
			stagger: 0.1,
			duration: 0.8,
			ease: 'power2.out'
		});
	}

});

