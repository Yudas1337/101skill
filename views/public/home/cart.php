<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../app/controllers/CartController.php";
$product = new ClassroomController();
$total = 0;
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Keranjang Belanja</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($_SESSION['cart'])) : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">NO</th>
                                            <th class="align-middle text-center">Judul</th>
                                            <th class="align-middle text-center">Kategori</th>
                                            <th class="align-middle text-center">Deskripsi</th>
                                            <th class="align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        <?php $i = 1;
                                        foreach ($_SESSION['cart'] as $cart) :
                                            $data = $product->getPublicById($cart['id']); ?>
                                            <tr class="btn-reveal-trigger">
                                                <td><?= $i ?></td>
                                                <td class="text-center">
                                                    <img width="250" height="150" src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $data['thumbnail']) ?>"><br><br>
                                                    <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $data['id']) ?>">
                                                        <strong><?= $data['title']; ?> </strong> </a>
                                                </td>
                                                <td class="text-center"><?= $data['category_name'] ?></td>
                                                <td class="text-center">
                                                    <?= $data['description'] ?>
                                                </td>
                                                <td>
                                                    <form method="POST">
                                                        <input type="hidden" value="<?= $data['id'] ?>" autocomplete="off" name="id">
                                                        <button onclick="return confirm('Apa anda yakin ingin menghapus kelas dari keranjang?')" type="submit" name="delete" class="btn btn-sm btn-danger light"><i class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                            <form method="POST">
                                <button type="submit" name="deleteCart" onclick="return confirm('Apa anda yakin ingin mengosongkan keranjang?')" class="btn btn-danger btn-md light mt-5 kosongkanKeranjang"><i class="fa fa-trash"></i> Kosongkan keranjang</button>
                                <a data-user="<?= (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null) ?>" href="<?= $uriHelper->baseUrl('index.php?page=main&content=checkout#profile_section') ?>" class="btn btn-success btn-md light mt-5 checkout"><i class="fa fa-shopping-cart"></i> Checkout</a>
                            </form>

                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-md-12 mt-5">
                        <h3 class="title mb-4">Keranjang belanja masih kosong :( </h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
require_once __DIR__ . "/../../layouts/main/footer.php";
$cart = new CartController();
if (isset($_POST['delete'])) {
    $id = intval(abs($_POST['id']));
    $cart->delete($id);
}

if (isset($_POST['deleteCart'])) {
    $cart->destroy();
}
?>

<script>
    $('.checkout').click(function(e) {

        e.preventDefault();
        const href = $(this).attr('href');
        const user_id = $(this).data('user');

        swal({
                title: "Apa Anda Yakin?",
                text: "selanjutnya akan mengarah ke halaman pembayaran",
                icon: "warning",
                buttons: {
                    confirm: 'YA',
                    cancel: 'Batal'
                },
                dangerMode: true,
            })
            .then((willCheckout) => {
                if (willCheckout) {
                    if (user_id == null || user_id == '') {
                        swal({
                            title: "Gagal",
                            text: "Anda harus login terlebih dahulu",
                            icon: "warning",
                            buttons: {
                                confirm: 'Login',
                            },
                            dangerMode: true,
                        }).then((redirect) => {
                            document.location.href = href;
                        })
                    } else {
                        document.location.href = href;
                    }
                }

            });
    });
</script>