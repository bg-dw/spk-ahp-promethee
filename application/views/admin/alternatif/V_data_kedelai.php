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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
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
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" data-toggle="modal" data-target="#add_kedelai"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
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
                                    <th width="150">Opsi</th>
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
                                        <td align="center">
                                            <button class="btn btn-rounded btn-sm btn-warning" data-toggle="modal" data-target="#edit_kedelai" onclick="edit_kedelai('<?= $isi->id_kedelai ?>','<?= $isi->nama_kedelai ?>','<?= $isi->foto_kedelai ?>')">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-rounded btn-sm btn-danger" data-toggle="modal" data-target="#hapus_kedelai" onclick="hapus_kedelai('<?= $isi->id_kedelai ?>','<?= $isi->nama_kedelai ?>','<?= $isi->foto_kedelai ?>')">
                                                <i class="mdi mdi-delete"></i> Hapus
                                            </button>
                                        </td>
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

<!-- Modal TAMBAH -->
<div class="modal fade" id="add_kedelai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kedelai/ac_add_kedelai') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kedelai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto_kedelai">Gambar Kedelai</label><br>
                        <input type="file" class="form-control" name="foto" required>
                        <span><i>*ukuran maksimal 2Mb, resolusi 1366 pixel dengan format jpg / png</i></span>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kedelai">Nama Kedelai</label>
                        <input type="text" class="form-control" name="nama_kedelai" id="nama_kedelai" placeholder="Contoh : Kedelai Baluran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal EDIT -->
<div class="modal fade" id="edit_kedelai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kedelai/ac_update_kedelai') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kedelai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="foto_lama" id="e_ft_lama_kedelai">
                    <div class="form-group">
                        <label for="e_id_kedelai">ID Kedelai</label>
                        <input type="text" class="form-control" name="id_kedelai" id="e_id_kedelai" readonly>
                    </div>
                    <div class="form-group">
                        <label for="e_ft_kedelai">Gambar Kedelai</label>
                        <input type="file" class="form-control" name="foto" id="e_ft_kedelai">
                        <span><i>*ukuran maksimal 2Mb, resolusi 1366 pixel dengan format jpg / png</i></span>
                    </div>
                    <div class="form-group">
                        <label for="e_nama_kedelai">Nama Kedelai</label>
                        <input type="text" class="form-control" name="nama_kedelai" id="e_nama_kedelai" placeholder="Contoh : Kedelai Baluran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal HAPUS -->
<div class="modal fade" id="hapus_kedelai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kedelai/ac_del_kedelai') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kedelai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="foto_lama" id="h_ft_lama_kedelai">
                    <div class="form-group">
                        <label for="h_id_kedelai">ID Kedelai</label>
                        <input type="text" class="form-control" name="id_kedelai" id="h_id_kedelai" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nama_kedelai">Nama Kedelai</label>
                        <input type="text" class="form-control" name="nama_kedelai" id="h_nama_kedelai" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function edit_kedelai(id, nama_kedelai, foto) {
        $('#e_id_kedelai').val(id);
        $('#e_nama_kedelai').val(nama_kedelai);
        $('#e_ft_lama_kedelai').val(foto);
    }

    function hapus_kedelai(id, nama_kedelai, foto) {
        $('#h_id_kedelai').val(id);
        $('#h_nama_kedelai').val(nama_kedelai);
        $('#h_ft_lama_kedelai').val(foto);
    }
</script>