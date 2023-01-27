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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengisian Perbandingan</li>
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
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Petunjuk Pengisian Perbandingan</h4>
                            <h5 class="card-subtitle">Menambahkan Petunjuk Pengisian Perbandingan</h5>
                        </div>
                    </div>
                    <!-- title -->

                    <form action="<?= base_url('index.php/c_dashboard_admin/ac_add_petunjuk_ahp') ?>" method="POST" onsubmit="return confirm('Simpan data?');">
                        <div class="col-md-12">
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="col-2 col-form-label">Petunjuk :</label>
                                    <div class="col-12">
                                        <textarea name="keterangan" id="mymce"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-md btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->