<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Sub Kriteria</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Kriteria</li>
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
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">SUB KRITERIA</h4>
                            <h5 class="card-subtitle">Daftar Sub Kriteria</h5>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive mt-4">
                        <table class="table datatable table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="10">No.</th>
                                    <th style="text-align: center;">Nama Kriteria</th>
                                    <th style="text-align: center;">Nama Sub Kriteria</th>
                                    <th style="text-align: center;">Nilai</th>
                                    <th style="text-align: center;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($sub as $isi) { ?>
                                    <tr>
                                        <td><?= $i . "."; ?></td>
                                        <td><?= $isi->kriteria; ?></td>
                                        <td><?= $isi->sub_kriteria; ?></td>
                                        <td align="center"><?= $isi->nilai; ?></td>
                                        <td align="center"><?= $isi->keterangan_sub; ?></td>
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