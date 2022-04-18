<?= $this->include('partials/main') ?>

<head>

    <?= $title ?>

    <?= $this->include('partials/head-css') ?>

    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.css">
    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.min.css">

</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu_petugas') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1 class="card-title"><?= $title ?></h1>
                                <form action="/Admin_pengaduan/input" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="isi">Status Pengaduan</label>
                                        <select name="status" class="form-select" aria-label="Default select example">
                                            <option value="Selesai diproses">Selesai diproses</option>
                                            <option value="Sedang diproses">Sedang diproses</option>
                                            <option value="Tidak dapat diproses">Tidak dapat diproses</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Uraian Tanggapan</label>
                                        <textarea name="isi" class="form-control" required minlength="5" rows="3" placeholder="Masukkan Isi"><?= old('isi'); ?></textarea>
                                    </div>

                                    <label for="lampiran">Lampiran</label>
                                    <div class="mb-3">
                                        <input type="file" class="dropify" name="lampiran" />
                                    </div>
                                    <p class="text-muted">file yang dilampirkan menggunakan format jpg, png, pdf, dan rar</p>

                                    <input type="hidden" name="idPengaduan" value="<?= $idPengaduan; ?>">

                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="tanggapan">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Plugins js -->
<!-- validation -->
<script src="/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="/assets/js/pages/form-validation.init.js"></script>
<!-- drag n drop file -->
<script src="/assets/libs/dropify/js/dropify.js"></script>
<script src="/assets/libs/dropify/js/dropify.min.js"></script>
<script src="/assets/js/custom-dropify.js"></script>

<!-- App js -->
<script src="/assets/js/app.js"></script>

</body>

</html>