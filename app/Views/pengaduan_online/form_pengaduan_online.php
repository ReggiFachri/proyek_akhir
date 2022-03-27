<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $title ?>

    <?= $this->include('partials/head-css') ?>

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

                                <form action="/Pengaduan_online/input" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
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
                                        <input class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" type="text" name="judul" placeholder="Masukkan judul" value="<?= old('judul'); ?>">
                                        <div class="invalid-feedback"><?= $validation->getError('judul'); ?></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Isi</label>
                                        <textarea name="isi" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Masukkan Isi"><?= old('isi'); ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('isi'); ?></div>
                                        <input type="hidden" name="idCustomer" value="<?= session('idCustomer'); ?>">
                                    </div>

                                    <label for="lampiran">Lampiran</label>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="file" name="lampiran" class="form-control" id="customFile">
                                        </div>
                                        <p class="mt-2 ml text-secondary">file yang dilampirkan menggunakan format jpg, png, pdf, dan rar</p>
                                    </div>

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
<?= $this->include('partials/vendor-scripts') ?>

<!-- Plugins js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>