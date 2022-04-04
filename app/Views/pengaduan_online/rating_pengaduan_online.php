<?= $this->include('partials/main') ?>

<head>
    <meta charset="utf-8">

    <?= $title ?>

    <?= $this->include('partials/head-css') ?>

    <link href="/assets/libs/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css" />


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

                                <form action="/Pengaduan_online/rate" class="custom-validation" method="POST" enctype="multipart/form-data">
                                    <!-- beri penjelasan tiap input/desc -->

                                    <div class="my-3">
                                        <label for="rating">Rating</label>
                                        <i class="mdi mdi-star"></i>
                                        <div class="rating-star">
                                            <input type="hidden" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-muted" />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ulasan">Ulasan</label>
                                        <input class="form-control" type="text" name="ulasan" required minlength="5" placeholder="Berikan ulasan" value="<?= old('ulasan'); ?>">
                                    </div>

                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="rate">Submit</button>
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

<!-- Bootstrap rating js -->
<script src="<?php base_url('/assets/libs/bootstrap-rating/bootstrap-rating.min.js') ?>"></script>
<script src="<?php base_url('/assets/js/pages/rating-init.js') ?>"></script>

<!-- Bootstrap rating js -->
<script type="text/javascript" src="<?php base_url('/assets/libs/bootstrap-rating/bootstrap-rating.min.js') ?>"></script>
<script type="text/javascript" src=" <?php base_url('/assets/js/pages/rating-init.js') ?>"></script>

<!-- App js -->
<script src="<?php base_url('/assets/js/app.js') ?>"></script>

</body>

</html>