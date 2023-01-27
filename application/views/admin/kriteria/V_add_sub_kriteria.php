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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_sub_kriteria') ?>">Sub Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Sub Kriteria</li>
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
                            <h4 class="card-title">Tambah Sub-Kriteria</h4>
                            <h5 class="card-subtitle">Menambah Data Sub-Kriteria</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('index.php/c_sub_kriteria/ac_add_sub') ?>" class="repeater" method="POST" onsubmit="return confirm('Simpan data?');">
                        <div class="col-md-12">
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <label for="example-text-input" class="col-2 col-form-label">Jenis Kriteria</label>
                                    <div class="col-4">
                                        <select class="form-control select2-single" name="kriteria">
                                            <?php
                                            foreach ($kriteria as $isi) { ?>
                                                <option value="<?= $isi->id_kriteria; ?>"><?= $isi->kriteria; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div data-repeater-list="data">
                                    <div data-repeater-item>
                                        <hr>
                                        <button data-repeater-delete type="button" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i> Hapus</button>
                                        <div class="form-group mt-4 row">
                                            <label class="col-2 col-form-label">Nama Sub Kriteria</label>
                                            <div class="col-7">
                                                <input class="form-control" type="text" name="sub" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Nilai</label>
                                            <div class="col-3">
                                                <input class="form-control" type="number" min="1" value="1" name="nilai" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Keterangan</label>
                                            <div class="col-7">
                                                <input class="form-control" type="text" name="keterangan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button data-repeater-create type="button" class="btn btn-info btn-sm"><i class="mdi mdi-plus"></i> Tambah</button>
                                <hr>
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