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
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Kelas</span>
                    </a>
                    <ul aria-expanded="true">
                        <li class="<?= (isset($_GET['content']) && $_GET['content'] == "classroom" || $_GET['content'] == "module" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "classroom" || $_GET['content'] == "module" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=classroom&menu=list") ?>">List Kelas</a></li>
                        <li class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=list") ?>">Kategori</a></li>
                    </ul>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "history" ? "mm-active" : "") ?>"><a class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "history" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=history&menu=list") ?>" aria-expanded="false">
                        <i class="flaticon-381-bookmark-1"></i>
                        <span class="nav-text">Riwayat Klaim</span>
                    </a>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=customer&menu=list") ?>" class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>" aria-expanded="false">
                        <i class="flaticon-381-user-8"></i>
                        <span class="nav-text">Pengguna</span>
                    </a>
                </li>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'public') : ?>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "myclass" ? "mm-active" : "") ?>"><a class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "myclass" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=myclass") ?>" aria-expanded="false">
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Kelas Saya</span>
                    </a>
                </li>
                <li class="<?= (isset($_GET['content']) && $_GET['content'] == "myhistory" ? "mm-active" : "") ?>"><a class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "myhistory" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=myhistory&menu=list") ?>" aria-expanded="false">
                        <i class="flaticon-381-bookmark-1"></i>
                        <span class="nav-text">Riwayat Klaim</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</div>
<!--**********************************
        Sidebar end
    ***********************************-->