<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

	<!--- basic page needs
    ================================================== -->
	<meta charset="utf-8">
	<title>Widodo Makmur Perkasa</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/base.css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/vendor.css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/main.css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/slideshow.css">

	<!-- script
    ================================================== -->
	<script src="<?= base_url() ?>frontend/js/modernizr.js"></script>
	<script src="<?= base_url() ?>frontend/js/pace.min.js"></script>

	<!-- favicons
    ================================================== -->
	<link rel="shortcut icon" href="<?= base_url() ?>images/logo/63-512.png" type="image/x-icon">
	<link rel="icon" href="<?= base_url() ?>images/logo/63-512.png" type="image/x-icon">

</head>

<body id="top">

	<!-- header
================================================== -->
	<header class="s-header">

		<!-- <div class="header-logo">
			<a class="site-logo" href="<?= site_url('login'); ?>">
				<img src="<? base_url()?>frontend/images/logo.JPG" alt="Login">
			</a>
		</div> -->
		<!-- end header-logo -->

		<!-- <nav class="header-nav">

			<a href="<?= site_url('login') ?>" title="close"><span>Close</span></a>

			<div class="header-nav__content">
				<h3>Menu</h3>

				

			</div> 

		</nav> 

		<a class="header-menu-toggle" href="<?= site_url('login') ?>">
			<span></span>
		</a> -->

		<div class="full-width" style="position: unset;">
			<div class="pull-right" style="margin: 20px 50px;">
				<a class="site-logo" href="<?= site_url('login'); ?>">
					<i class="icon-user home-scroll__text" style="font-size: 16px;" aria-hidden="true"> Login</i>
				</a>
			</div>
		</div>

	</header> <!-- end s-header -->


	<!-- home
================================================== -->
	<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="<?= base_url() ?>uploads/paste.png" data-natural-width=3000 data-natural-height=2000 data-position-y=top>

		<div class="shadow-overlay"></div>

		<div class="home-content">

			<div class="row home-content__main">
				<h1>
					Widodo Makmur Perkasa. <br>
				</h1>

				<p>
					Provide Food For The Nation
				</p>
			</div> <!-- end home-content__main -->

		</div> <!-- end home-content -->

		<!-- <ul class="home-sidelinks">
			<li><a class="smoothscroll" href="#gallery">Gallery<span>who are we</span></a></li>
			<li><a class="smoothscroll" href="#location">Location<span>where are we</span></a></li>
			<li><a class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li>
		</ul> end home-sidelinks -->

		<!-- <ul class="home-social">
			<li class="home-social-title">Follow Us</li>
			<li><a href="#0">
					<i class="fab fa-facebook"></i>
					<span class="home-social-text">Facebook</span>
				</a></li>
			<li><a href="#0">
					<i class="fab fa-twitter"></i>
					<span class="home-social-text">Twitter</span>
				</a></li>
			<li><a href="#0">
					<i class="fab fa-linkedin"></i>
					<span class="home-social-text">LinkedIn</span>
				</a></li>
		</ul> end home-social -->

		<a href="#gallery" class="home-scroll smoothscroll">
			<span class="home-scroll__text">Scroll Down</span>
			<span class="home-scroll__icon"></span>
		</a> <!-- end home-scroll -->

	</section> <!-- end s-home -->


	<!-- about
================================================== -->
	<!-- end s-about -->


	<!-- services
================================================== -->
	<!-- <section id='gallery' class="s-services light-gray">

		<div class="row section-header" data-aos="fade-up">
			<div class="col-full">
				<h3 class="subhead">Gallery</h3>
				
			</div>
		</div> 

		<div class="row" data-aos="fade-up">
			<div class="col-full">
				
				<div class="slideshow-container">

					
					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)" style="background-color: rgba(0, 0, 0, 0.7)">1 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/alyssa.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Alyssa Ponsel</b>, Jalan Suka Karya Kecamatan Tampan</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">2 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/aurel.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Aurel Ponsel</b>, Jalan Suka Karya, Kecamatan Tampan</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">3 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/dana.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Dana Ponsel</b>, Jalan Paus, Kelurahan Tangkerang Tengah</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">4 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/inara.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Inara Ponsel</b>, Jalan Suka Karya, Kecamatan Tampan</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">5 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/namira.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Namira Ponsel</b>, Jalan Suka Karya, Kecamatan Tampan</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">6 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/selkom.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Selkom Ponsel</b>, Jalan Terubuk, Kecamatan Marpoyan Damai</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">7 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/sk.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>SK Ponsel</b>, Jalan Duyung, Kecamatan Marpoyan Damai</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">8 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/syafian.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Syafian Ponsel</b>, Jalan Suka Karya Ujung, Tarai Bangun</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">9 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/syafitra.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Syafitra Ponsel</b>, Jalan Suka Karya, Kecamatan Tampan</div>
					</div>

					<div class="mySlides fade" style="width: 100%">
						<div class="numbertext" style="background-color: rgba(0, 0, 0, 0.7)">10 / 10</div>
						<img src="<?= base_url() ?>frontend/images/sigaka/syahdan.jpeg" style="width: 100%; height: 650px; margin: 0 auto">
						<div class="text" style="background-color: rgba(0, 0, 0, 0.7)"><b>Syahdan Ponsel</b>, Jalan Duyung, Kecamatan Marpoyan Damai</div>
					</div>

					
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div>
				<br>

				
				<div style="text-align:center">
					<span class="dot" onclick="currentSlide(1)"></span>
					<span class="dot" onclick="currentSlide(2)"></span>
					<span class="dot" onclick="currentSlide(3)"></span>
					<span class="dot" onclick="currentSlide(4)"></span>
					<span class="dot" onclick="currentSlide(5)"></span>
					<span class="dot" onclick="currentSlide(6)"></span>
					<span class="dot" onclick="currentSlide(7)"></span>
					<span class="dot" onclick="currentSlide(8)"></span>
					<span class="dot" onclick="currentSlide(9)"></span>
					<span class="dot" onclick="currentSlide(10)"></span>
				</div>
			</div>
		</div> 

	</section> -->
	<!-- end s-services -->


	<!-- works
================================================== -->
	<!-- <section id='location' class="s-works">

		<div class="row section-header" data-aos="fade-up">
			<div class="col-full">
				<h3 class="subhead">Location</h3>
				
			</div>
		</div> 

		<div class="row masonry-wrap">
			<div class="masonry">

				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/alyssa.jpeg" class="thumb-link" title="Alyssa" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/alyssa.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/alyssa.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/alyssa.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Alyssa Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Tampan
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Kecamatan Tampan</p>
						</span>

					</div> 
				</div> 


				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/aurel.jpeg" class="thumb-link" title="Aurel" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/aurel.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/aurel.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/aurel.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Aurel Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Tampan
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Kecamatan Tampan</p>
						</span>

					</div> 
				</div> 


				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/dana.jpeg" class="thumb-link" title="Dana" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/dana.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/dana.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/dana.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Dana Ponsel
							</h3>
							<p class="item-folio__cat">
								Kelurahan Tangkerang Tengah
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Paus, Kelurahan Tangkerang Tengah</p>
						</span>

					</div> 
				</div> 



				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/namira.jpeg" class="thumb-link" title="Namira" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/namira.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/namira.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/namira.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Namira Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Tampan
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Kecamatan Tampan</p>
						</span>

					</div> 
				</div> 

				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/sk.jpeg" class="thumb-link" title="SK" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/sk.jpeg" style="width: 100%" srcset="<?= base_url() ?>frontend/images/sigaka/sk.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/sk.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								SK Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Marpoyan Damai
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Duyung, Kecamatan Marpoyan Damai</p>
						</span>

					</div> 
				</div> 


				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/syafian.jpeg" class="thumb-link" title="Syafian" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/syafian.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/syafian.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/syafian.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Syafian Ponsel
							</h3>
							<p class="item-folio__cat">
								Tarai Bangun
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Ujung, Tarai Bangun</p>
						</span>

					</div> 
				</div> 


				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/selkom.jpeg" class="thumb-link" title="Selkom" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/selkom.jpeg" style="width: 100%" srcset="<?= base_url() ?>frontend/images/sigaka/selkom.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/selkom.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Selkom Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Marpoyan Damai
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Terubuk, Kecamatan Marpoyan Damai</p>
						</span>

					</div> 
				</div> 



				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/syafitra.jpeg" class="thumb-link" title="Syafitra" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/syafitra.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/syafitra.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/syafitra.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Syafitra Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Tampan
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Kecamatan Tampan</p>
						</span>

					</div> 
				</div> 



				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/inara.jpeg" class="thumb-link" title="Inara" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/inara.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/inara.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/inara.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Inara Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Tampan
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Suka Karya Kecamatan Tampan</p>
						</span>

					</div> 
				</div>

				<div class="masonry__brick" data-aos="fade-up">
					<div class="item-folio">

						<div class="item-folio__thumb">
							<a href="<?= base_url() ?>frontend/images/sigaka/syahdan.jpeg" class="thumb-link" title="Syahdan" data-size="1050x700">
								<img src="<?= base_url() ?>frontend/images/sigaka/syahdan.jpeg" srcset="<?= base_url() ?>frontend/images/sigaka/syahdan.jpeg 1x, <?= base_url() ?>frontend/images/sigaka/syahdan.jpeg 2x" alt="">
							</a>
						</div>

						<div class="item-folio__text">
							<h3 class="item-folio__title">
								Syahdan Ponsel
							</h3>
							<p class="item-folio__cat">
								Kecamatan Marpoyan Damai
							</p>
						</div>

						<span class="item-folio__caption">
							<p>Jalan Duyung, Kecamatan Marpoyan Damai</p>
						</span>

					</div> 
				</div> 



			</div> 
		</div> 


	</section>  -->


	<!-- stats
================================================== -->


	<!-- contact
================================================== -->
	<section id="contact" class="s-contact">

		<div class="row section-header" data-aos="fade-up">
			<div class="col-full">
				<h3 class="subhead subhead--light">KONTAK KAMI</h3>
			
			</div>
		</div> <!-- end section-header -->

		<div class="row">

			<div class="col-full contact-main" data-aos="fade-up">
				<p>
					<a href="mailto:#0" class="contact-email">info@wmp-group.co.id </a>
					<span class="contact-number">(+62 21) 8430 6787 / 88</span>
				</p>
			</div> <!-- end contact-main -->

		</div> <!-- end row -->

		<div class="row">

			<div class="col-five tab-full contact-secondary" data-aos="fade-up">
				<h3 class="subhead subhead--light">Where To Find Us</h3>

				<p class="contact-address">
				Jl. Raya Cilangkap No. 58 <br>
				Cipayung Jakarta Timur 13870 Indonesia <br>
				</p>
			</div> <!-- end contact-secondary -->

			<div class="col-five tab-full contact-secondary" data-aos="fade-up">
				<h3 class="subhead subhead--light">Follow Us</h3>

				<ul class="contact-social">
					<li>
						<a href="#0"><i class="fab fa-facebook"></i></a>
					</li>
					<li>
						<a href="#0"><i class="fab fa-twitter"></i></a>
					</li>
					<li>
						<a href="#0"><i class="fab fa-instagram"></i></a>
					</li>
					<li>
						<a href="#0"><i class="fab fa-behance"></i></a>
					</li>
					<li>
						<a href="#0"><i class="fab fa-dribbble"></i></a>
					</li>
				</ul> <!-- end contact-social -->

				<div class="contact-subscribe">
					<form id="mc-form" class="group mc-form" novalidate="true">
						<input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
						<input type="submit" name="subscribe" value="Subscribe">
						<label for="mc-email" class="subscribe-message"></label>
					</form>
				</div> <!-- end contact-subscribe -->
			</div> <!-- end contact-secondary -->

		</div> <!-- end row -->

		<div class="row">
			<div class="col-full cl-copyright">
				<span>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | <a href="#" target="_blank">WMPDev</a> 
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
			</div>
		</div>

		<div class="cl-go-top">
			<a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
		</div>

	</section> 
	
	<!-- end s-contact -->


	<!-- photoswipe background
================================================== -->
	<!-- <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">

			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>

		</div>

	</div> end photoSwipe background -->


	<!-- preloader
================================================== -->
	<div id="preloader">
		<div id="loader">
		</div>
	</div>


	<!-- Java Script
================================================== -->
	<script src="<?= base_url() ?>frontend/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/plugins.js"></script>
	<script src="<?= base_url() ?>frontend/js/main.js"></script>
	<script type="text/javascript">
		var slideIndex = 1;
		showSlides(slideIndex);

		// Next/previous controls
		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		// Thumbnail image controls
		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
		}
	</script>

</body>

</html>