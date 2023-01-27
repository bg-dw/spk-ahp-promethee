<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Nilai Alternatif</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_nilai_alternatif') ?>">Nilai Alternatif</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Nilai Alternatif</li>
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
                            <h4 class="card-title">Tambah Nilai</h4>
                            <h5 class="card-subtitle">Menambah Nilai Alternatif</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('index.php/c_nilai_alternatif/ac_add_nilai') ?>" method="POST" onsubmit="return confirm('Simpan data?');">
                        <div class="col-md-12">
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <label for="example-text-input" class="col-2 col-form-label">Alternatif</label>
                                    <div class="col-4">
                                        <select class="form-control select2-single" name="alternatif" required>
                                            <option value="">--Pilih Alternatif--</option>
                                            <?php
                                            foreach ($kedelai as $isi) { ?>
                                                <option value="<?= $isi->id_kedelai; ?>"><?= $isi->nama_kedelai; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <hr>
                                <?php
                                foreach ($kriteria as $isi) {
                                ?>
                                    <div class="form-group mt-4 row">
                                        <label class="col-2 col-form-label"><?= $isi->kriteria ?></label>
                                        <div class="col-4">
                                            <input type="hidden" name="id_kriteria[]" value="<?= $isi->id_kriteria ?>">
                                            <select class="form-control" name="nilai[]" required>
                                                <option value="">--Pilih nilai--</option>
                                                <?php
                                                foreach ($sub as $baris) {
                                                    if ($isi->id_kriteria == $baris->id_kriteria) { ?>
                                                        <option value="<?= $baris->id_sub; ?>"><?= $baris->nilai; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
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