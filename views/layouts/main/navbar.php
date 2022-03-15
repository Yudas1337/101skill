<?php
require_once __DIR__ . "/../../layouts/main/preload.php";
?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper" class="overflow-unset">


	<header class="site-header mo-left header style-1">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container-fluid clearfix">
					<!-- Website Logo -->
					<div class="logo-header mostion logo-dark">
						<a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>"><img width="200" src="<?= $uriHelper->baseUrl('assets/images/logo_text.png') ?>"></a>
					</div>
					<!-- Nav Toggle Button -->
					<button onclick="return opensideBar()" class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<?php if (isset($_SESSION['user_id'])) : ?>
								<a href="<?= $uriHelper->baseUrl('index.php?page=dashboard') ?>" class="profile-box">
									<div class="header-info">
										<span><?= $user['name']; ?></span>
									</div>
									<div class="img-bx">
										<img src="<?= $uriHelper->assetUrl('images/profile/' . $user['photo']) ?>" alt="<?= $user['name']; ?>">
									</div>
								</a>
							<?php else : ?>
								<a href="<?= $uriHelper->baseUrl('index.php?page=login') ?>" class="btn btn-primary mr-2">Masuk</a>
								<a href="<?= $uriHelper->baseUrl('index.php?page=register') ?>" class="btn btn-outline-primary">Daftar</a>
							<?php endif; ?>
						</div>
					</div>

					<div class="header-nav navbar-collapse collapse">
						<ul class="nav navbar-nav navbar navbar-left" style="justify-content: center">
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'home' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>">
									Beranda</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'product' || $_GET['content'] == 'detail' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=course") ?>">
									Materi</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'cart' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=cart") ?>">
									Keranjang</a></li>
							<li>
								<form class="form-inline" action="/action_page.php">
									<input class="form-control mr-sm-2" type="text" placeholder="Search Course">
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<div class="menu-sidebar" id="sidebarNya">
		<div class="contact-box">
			<ul class="home-nav">
				<li class="nav-item <?= (isset($_GET['content']) && $_GET['content'] == 'home' ? 'active' : '') ?>">
					<a href="<?= $uriHelper->baseUrl('index.php?page=main&content=home') ?>">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"></rect>
								<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"></path>
								<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"></path>
								<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"></rect>
								<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"></rect>
							</g>
						</svg>
						Beranda
					</a>
				</li>
				<li class="nav-item <?= (isset($_GET['content']) && $_GET['content'] == 'course' ? 'active' : '') ?>">
					<a href="<?= $uriHelper->baseUrl('index.php?page=main&content=course') ?>">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"></rect>
								<path d="M12.5,19 C8.91014913,19 6,16.0898509 6,12.5 C6,8.91014913 8.91014913,6 12.5,6 C16.0898509,6 19,8.91014913 19,12.5 C19,16.0898509 16.0898509,19 12.5,19 Z M12.5,16.4 C14.6539105,16.4 16.4,14.6539105 16.4,12.5 C16.4,10.3460895 14.6539105,8.6 12.5,8.6 C10.3460895,8.6 8.6,10.3460895 8.6,12.5 C8.6,14.6539105 10.3460895,16.4 12.5,16.4 Z M12.5,15.1 C11.0640597,15.1 9.9,13.9359403 9.9,12.5 C9.9,11.0640597 11.0640597,9.9 12.5,9.9 C13.9359403,9.9 15.1,11.0640597 15.1,12.5 C15.1,13.9359403 13.9359403,15.1 12.5,15.1 Z" fill="#000000" opacity="0.3"></path>
								<path d="M22,13.5 L22,13.5 C22.2864451,13.5 22.5288541,13.7115967 22.5675566,13.9954151 L23.0979976,17.8853161 C23.1712756,18.4226878 22.7950533,18.9177172 22.2576815,18.9909952 C22.2137086,18.9969915 22.1693798,19 22.125,19 L22.125,19 C21.5576012,19 21.0976335,18.5400324 21.0976335,17.9726335 C21.0976335,17.9415812 21.0990414,17.9105449 21.1018527,17.8796201 L21.4547321,13.9979466 C21.4803698,13.7159323 21.7168228,13.5 22,13.5 Z" fill="#000000" opacity="0.3"></path>
								<path d="M24,5 L24,12 L21,12 L21,8 C21,6.34314575 22.3431458,5 24,5 Z" fill="#000000" transform="translate(22.500000, 8.500000) scale(-1, 1) translate(-22.500000, -8.500000) "></path>
								<path d="M0.714285714,5 L1.03696911,8.32873399 C1.05651593,8.5303749 1.22598532,8.68421053 1.42857143,8.68421053 C1.63115754,8.68421053 1.80062692,8.5303749 1.82017375,8.32873399 L2.14285714,5 L2.85714286,5 L3.17982625,8.32873399 C3.19937308,8.5303749 3.36884246,8.68421053 3.57142857,8.68421053 C3.77401468,8.68421053 3.94348407,8.5303749 3.96303089,8.32873399 L4.28571429,5 L5,5 L5,8.39473684 C5,9.77544872 3.88071187,10.8947368 2.5,10.8947368 C1.11928813,10.8947368 -7.19089982e-16,9.77544872 -8.8817842e-16,8.39473684 L0,5 L0.714285714,5 Z" fill="#000000"></path>
								<path d="M2.5,12.3684211 L2.5,12.3684211 C2.90055463,12.3684211 3.23115721,12.6816982 3.25269782,13.0816732 L3.51381042,17.9301218 C3.54396441,18.4900338 3.11451066,18.9683769 2.55459863,18.9985309 C2.53641556,18.9995101 2.51820943,19 2.5,19 L2.5,19 C1.93927659,19 1.48472045,18.5454439 1.48472045,17.9847204 C1.48472045,17.966511 1.48521034,17.9483049 1.48618958,17.9301218 L1.74730218,13.0816732 C1.76884279,12.6816982 2.09944537,12.3684211 2.5,12.3684211 Z" fill="#000000" opacity="0.3"></path>
							</g>
						</svg>
						Kursus
					</a>
				</li>
				<li class="nav-item <?= (isset($_GET['content']) && $_GET['content'] == 'cart' ? 'active' : '') ?>">
					<a href="<?= $uriHelper->baseUrl('index.php?page=main&content=cart') ?>">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"></rect>
								<rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"></rect>
								<path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"></path>
							</g>
						</svg>
						Keranjang
					</a>
				</li>
			</ul>

		</div>
	</div>