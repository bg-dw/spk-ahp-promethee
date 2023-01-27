<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Sub Kriteria</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Penjelasan Bibit</li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center mb-3">
                        <div>
                            <h4 class="card-title">Tambah Penjelasan Bibit</h4>
                            <h5 class="card-subtitle">Menambah Data Keterangan Bibit Kedelai</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('index.php/c_dashboard_admin/ac_add_post') ?>" enctype="multipart/form-data" method="POST" onsubmit="return confirm('Simpan data?');">
                        <div class="col-md-12">
                            <div class="col-md-12 mt-3">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Judul</label>
                                    <div class="col-7">
                                        <input class="form-control" type="text" name="judul" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Gambar</label>
                                    <div class="col-7">
                                        <input type="file" name="gambar" required><br>
                                        <span><i>*ukuran maksimal 2Mb, resolusi 1366 pixel dengan format jpg / png</i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Keterangan</label>
                                    <div class="col-10">
                                        <textarea class="summernote" name="keterangan" id=""></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-md btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- title -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->