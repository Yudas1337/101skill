 <!--**********************************
            Content body end
        ***********************************-->

 <!--**********************************
            Footer start
        ***********************************-->
 <div class="footer">
     <div class="copyright">
         <p>Copyright <?= date('Y'); ?> © Developed by <a href="https://yudas1337.github.io/" target="_blank">Yudas Malabi</a></p>
     </div>
 </div>
 <!--**********************************
            Footer end
        ***********************************-->

 <!--**********************************
           Support ticket button start
        ***********************************-->

 <!--**********************************
           Support ticket button end
        ***********************************-->


 </div>
 <!--**********************************
        Main wrapper end
    ***********************************-->
 <!--**********************************
        Scripts
    ***********************************-->
 <!-- Required vendors -->
 <script src="<?= $uriHelper->assetUrl("js/jquery.min.js") ?>"></script>

 <script src="<?= $uriHelper->assetUrl("vendor/global/global.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("vendor/bootstrap-select/dist/js/bootstrap-select.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("js/custom.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("js/deznav-init.js") ?>"></script>


 <script src="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("vendor/datatables/js/jquery.dataTables.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("js/plugins-init/datatables.init.js") ?>"></script>

 <script src="<?= $uriHelper->assetUrl("vendor/select2/js/select2.full.min.js") ?>"></script>


 <script>
     $(document).ready(function() {
         $("#category-select").select2();
         $("#supplier-select").select2();
     });
 </script>

 <script>
     $('.hapus').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin?",
                 text: "Data yang dihapus tidak bisa kembali lagi!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Hapus',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 document.location.href = href
             });
     });

     $('.hapusProduk').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin?",
                 text: "Data yang dihapus tidak bisa kembali lagi!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Hapus',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     swal({
                         title: "Sukses",
                         text: "Data berhasil Dihapus",
                         icon: "success",
                     }).then((redirect) => {
                         document.location.href = href
                     });
                 }
             });
     });

     $('.sweetalertNya').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin Akan Logout?",
                 text: "Sesi anda akan berakhir dan anda harus login ulang!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Logout',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     swal({
                         title: "Berhasil",
                         text: "Logout akun berhasil!",
                         icon: "success",
                     }).then((redirect) => {
                         document.location.href = href
                     });
                 }
             });
     });
 </script>
 </body>


 </html>