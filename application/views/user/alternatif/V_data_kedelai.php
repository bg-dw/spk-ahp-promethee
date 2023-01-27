<style>
    .view-foto {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .view-foto img {
        width: 100%;
        height: auto;
    }

    .view-foto .btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: grey;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }

    .view-foto .btn:hover {
        background-color: royalblue;
    }
</style>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Data Kedelai</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
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
                            <h4 class="card-title">Alternatif</h4>
                            <h5 class="card-subtitle">Data Kedelai</h5>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive">
                        <table class="table datatable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Gambar Kedelai</th>
                                    <th>Nama Kedelai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kedelai as $isi) { ?>
                                    <tr>
                                        <td><?= $i . "."; ?></td>
                                        <td>
                                            <div class="view-foto" style="width: 100px; height:100px">
                                                <img src="<?php if ($isi->foto_kedelai != "") {
                                                                echo base_url('assets/images/kedelai/') . $isi->foto_kedelai;
                                                            } else {
                                                                echo base_url('assets/images/no-image/no-image1.gif');
                                                            } ?>" alt="foto kedelai">
                                                <a class="btn btn-sm btn-outline image-popup-vertical-fit el-link" href="<?php if ($isi->foto_kedelai != "") {
                                                                                                                                echo base_url('assets/images/kedelai/') . $isi->foto_kedelai;
                                                                                                                            } else {
                                                                                                                                echo base_url('assets/images/no-image/no-image1.gif');
                                                                                                                            } ?>"><i class="icon-magnifier"></i></a>
                                            </div>
                                        </td>
                                        <td><?= $isi->nama_kedelai; ?></td>
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