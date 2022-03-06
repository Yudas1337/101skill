<div class="container-fluid" style="background-color: white;padding-left: 5rem;padding-top: 3rem;">
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>"><img width="200" src="<?= $uriHelper->baseUrl('assets/images/logo_text.png') ?>"></a>
				<p class="mt-3">Malang Snack adalah sebuah toko oleh-oleh khas malang yang menjual berbagai macam bentuk seperti keripik, buah, brownies, dan lainnya</p>
			</div>
		</div>
		<div class="col-md-2 ml-3">
			<div class="row d-flex flex-column">
				<h4 class="title mb-4">Site Link</h4>
				<a class="mb-3 <?= (isset($_GET['content']) && $_GET['content'] == 'home' ? 'text-primary' : '') ?>" href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>">Beranda</a>
				<a class="mb-3 <?= (isset($_GET['content']) && $_GET['content'] == 'product' || $_GET['content'] == 'detail' ? 'text-primary' : '') ?>" href="<?= $uriHelper->baseUrl("index.php?page=main&content=product") ?>">Produk</a>

				<a class="mb-3 <?= (isset($_GET['content']) && $_GET['content'] == 'about' ? 'text-primary' : '') ?>" href="<?= $uriHelper->baseUrl("index.php?page=main&content=about") ?>">Tentang Kami</a>
				<a class="<?= (isset($_GET['content']) && $_GET['content'] == 'cart' ? 'text-primary' : '') ?>" href="<?= $uriHelper->baseUrl("index.php?page=main&content=cart") ?>">Keranjang</a>
			</div>
		</div>
		<div class="col-md-2 ml-3">
			<div class="row d-flex flex-column">
				<h4 class="title mb-4">Malang Snack</h4>
				<a class="mb-3" href="<?= $uriHelper->baseUrl('index.php?page=login') ?>">Masuk</a>
				<a href="<?= $uriHelper->baseUrl('index.php?page=register') ?>">Daftar</a>
			</div>
		</div>
		<div class="col-md-3 ml-3">
			<div class="row d-flex flex-column">
				<h4 class="title mb-4">Kontak</h4>
				<p><i class="fa fa-home"></i> Jl. Kembang Turi No.4a Jatimulyo Kec. Lowokwaru Kota Malang</p>

				<p><i class="fa fa-phone"></i> +62 822 5718 1297</p>
				<p><i class="fa fa-envelope"></i> malangsnack@gmail.com</p>
			</div>
		</div>
	</div>
</div>

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= $uriHelper->baseUrl('assets/vendor/global/global.min.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') ?>"></script>

<!-- Counter Up -->
<script src="<?= $uriHelper->baseUrl('assets/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/vendor/jquery.counterup/jquery.counterup.min.js') ?>"></script>

<script src="<?= $uriHelper->baseUrl('assets/vendor/owl-carousel/owl.carousel.js') ?>"></script>

<script src="<?= $uriHelper->baseUrl('assets/js/custom.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/js/deznav-init.js') ?>"></script>
<script src="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>

<script src="<?= $uriHelper->assetUrl('vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') ?>"></script>

<script>
	function ItemsCarousel() {

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.item-carousel').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			center: true,
			autoWidth: true,
			autoplay: true,
			dots: false,
			items: 4,
			navText: ['', ''],
			breackpoint: [


			]

		})
	}

	const opensideBar = () => {
		$('#sidebarNya').addClass('active');
	}

	jQuery(document).ready(() => {
		ItemsCarousel();
	});
</script>

</body>

</html>