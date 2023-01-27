<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Nilai Alternatif</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nilai Alternatif</li>
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
                            <h4 class="card-title">Nilai Alternatif</h4>
                            <h5 class="card-subtitle">Daftar Nilai</h5>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive">
                        <table class="table datatable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Nama Kedelai</th>
                                    <th>Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($nilai as $isi) { ?>
                                    <tr>
                                        <td><?= $i . "."; ?></td>
                                        <td><?= $isi->nama_kedelai; ?></td>
                                        <td><?= $isi->kriteria; ?></td>
                                        <td><?= $isi->nilai; ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->