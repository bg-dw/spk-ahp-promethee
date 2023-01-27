<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <h3><b><?= $post->judul_post ?></b></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="<?= base_url('assets/images/post/' . $post->gambar_post) ?>" alt="Gambar Kedelai" style="max-width:600px;max-height: 400px;">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <?= $post->keterangan_post ?>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-left">
                            <button class="btn btn-info" type="button" onclick="location.href='<?= base_url('index.php/c_dashboard_admin/') ?>'">
                                <i class="fa fa-arrow-left"></i> Kembali </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>