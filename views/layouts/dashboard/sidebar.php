<?php
require_once __DIR__ . "/preload.php";
require_once __DIR__ . "/navbar.php";
?>

<!--**********************************
        Sidebar start
    ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">

        <ul class="metismenu" id="menu">
            <li><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=main") ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                <li><a class="has-arrow ai-icon active" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-book"></i>
                        <span class="nav-text">Produk</span>
                    </a>
                    <ul aria-expanded="true">
                        <li class="<?= (isset($_GET['content']) && $_GET['content'] == "product" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "product" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=product&menu=list") ?>">List Produk</a></li>
                        <li class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=list") ?>">Kategori</a></li>
                    </ul>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "order" ? "mm-active" : "") ?>"><a class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "order" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=order&menu=list&filter=all") ?>" aria-expanded="false">
                        <i class="flaticon-381-bookmark-1"></i>
                        <span class="nav-text">Order</span>
                    </a>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "supplier" ? "mm-active" : "") ?>">
                    <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=supplier&menu=list") ?>" class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "supplier" ? "mm-active" : "") ?>" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">Supplier</span>
                    </a>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=customer&menu=list") ?>" class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>" aria-expanded="false">
                        <i class="flaticon-381-user-8"></i>
                        <span class="nav-text">Pelanggan</span>
                    </a>
                </li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'public') : ?>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "invoice" ? "mm-active" : "") ?>"><a class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "invoice" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=invoice&menu=list") ?>" aria-expanded="false">
                        <i class="flaticon-381-bookmark-1"></i>
                        <span class="nav-text">Tagihan</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</div>
<!--**********************************
        Sidebar end
    ***********************************-->