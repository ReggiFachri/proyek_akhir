<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $title ?>

    <?= $this->include('partials/head-css') ?>

    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.css">
    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.min.css">
</head>

<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <?= $title ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"> <?= $title ?></h4>

                                <form action="/Pengaduan_online/input" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->

                                    <div class="my-3">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" class="form-select" aria-label="Default select example">
                                            <?php foreach ($kategori as $a) : ?>
                                                <option value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                                        <input class="form-control" type="text" name="judul" required minlength="5" placeholder="Masukkan judul" value="<?= old('judul'); ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Isi</label>
                                        <textarea name="isi" class="form-control" rows="3" required minlength="5" placeholder="Masukkan Isi"><?= old('isi'); ?></textarea>
                                        <input type="hidden" name="idCustomer" value="<?= session('idCustomer'); ?>">
                                    </div>

                                    <label for="lampiran">Lampiran</label>
                                    <div class="mb-3">
                                        <input type="file" class="dropify" name="lampiran" />
                                    </div>
                                    <p class="text-muted">file yang dilampirkan menggunakan format jpg, png, pdf, dan rar</p>

                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="input_PO">Submit</button>
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
<?= $this->include('/partials/vendor-scripts') ?>

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