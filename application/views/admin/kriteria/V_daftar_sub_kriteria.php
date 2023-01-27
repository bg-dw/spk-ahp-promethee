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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
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
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" onclick="location.href='<?= base_url('index.php/c_sub_kriteria/add_sub_kriteria') ?>';"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
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
                                    <th style="text-align: center;">Opsi</th>
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
                                        <td align="center" width="18%">
                                            <button class="btn btn-rounded btn-sm btn-warning" data-toggle="modal" data-target="#edit_sub" onclick="edit_sub('<?= $isi->id_sub ?>','<?= $isi->sub_kriteria ?>','<?= $isi->nilai ?>','<?= $isi->keterangan_sub ?>')">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-rounded btn-sm btn-danger" data-toggle="modal" data-target="#hapus_sub" onclick="hapus_sub('<?= $isi->id_sub ?>','<?= $isi->sub_kriteria ?>','<?= $isi->nilai ?>','<?= $isi->keterangan_sub ?>')">
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

<!-- Modal EDIT -->
<div class="modal fade" id="edit_sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_sub_kriteria/ac_update_sub') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit sub</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="e_id_sub">ID sub</label>
                        <input type="text" class="form-control" name="id_sub" id="e_id_sub" readonly>
                    </div>
                    <div class="form-group">
                        <label for="e_nama_sub">Sub-Kriteria</label>
                        <input type="text" class="form-control" name="nama_sub" id="e_nama_sub" required>
                    </div>
                    <div class="form-group">
                        <label for="e_nilai">Nilai</label>
                        <input type="number" min="1" class="form-control" name="nilai" id="e_nilai" required>
                    </div>
                    <div class="form-group">
                        <label for="e_keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="e_keterangan" required>
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
<div class="modal fade" id="hapus_sub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_sub_kriteria/ac_del_sub') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus sub</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="h_id_sub">ID Sub-Kriteria</label>
                        <input type="text" class="form-control" name="id_sub" id="h_id_sub" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nama_sub">Sub-Kriteria</label>
                        <input type="text" class="form-control" name="nama_sub" id="h_nama_sub" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nilai">Nilai</label>
                        <input type="text" class="form-control" name="nilai" id="h_nilai" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="h_keterangan" readonly>
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
    function edit_sub(id, nama_sub, nilai, keterangan) {
        $('#e_id_sub').val(id);
        $('#e_nama_sub').val(nama_sub);
        $('#e_nilai').val(nilai);
        $('#e_keterangan').val(keterangan);
    }

    function hapus_sub(id, nama_sub, nilai, keterangan) {
        $('#h_id_sub').val(id);
        $('#h_nama_sub').val(nama_sub);
        $('#h_nilai').val(nilai);
        $('#h_keterangan').val(keterangan);
    }
</script>