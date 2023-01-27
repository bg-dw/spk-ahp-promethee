<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Kriteria</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
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
                            <h4 class="card-title">KRITERIA</h4>
                            <h5 class="card-subtitle">Daftar Kriteria</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" data-toggle="modal" data-target="#add_kriteria"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive m-t-30">
                        <table class="table datatable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Nama Kriteria</th>
                                    <th style="text-align: center;">Tipe Preferensi</th>
                                    <th style="text-align: center;">Bobot</th>
                                    <th style="text-align: center;" width="20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kriteria as $isi) { ?>
                                    <tr>
                                        <td><?= $i . "."; ?></td>
                                        <td><?= $isi->kriteria; ?></td>
                                        <td><?= $isi->tipe_preferensi; ?></td>
                                        <td><?= $isi->bobot; ?></td>
                                        <td align="center">
                                            <button class="btn btn-rounded btn-sm btn-warning" data-toggle="modal" data-target="#edit_kriteria" onclick="edit_kriteria('<?= $isi->id_kriteria ?>','<?= $isi->kriteria ?>','<?= $isi->tipe_preferensi ?>')">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-rounded btn-sm btn-danger" data-toggle="modal" data-target="#hapus_kriteria" onclick="hapus_kriteria('<?= $isi->id_kriteria ?>','<?= $isi->kriteria ?>','<?= $isi->tipe_preferensi ?>')">
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
<div class="modal fade" id="add_kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kriteria/ac_add_kriteria') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="a_kt">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" id="a_kt" placeholder="Contoh : Umur Berbunga" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Tipe Preferensi</label>
                        <select class="form-control" name="pf" id="a_pf" required>
                            <option value="">--Pilih Tipe Preferensi--</option>
                            <option value="2">Tipe 2</option>
                            <option value="3">Tipe 3</option>
                        </select>
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
<div class="modal fade" id="edit_kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kriteria/ac_update_kriteria') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_kriteria" id="e_id_kriteria" required>
                    <div class="form-group">
                        <label for="a_kt">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" id="e_kt" placeholder="Contoh : Umur Berbunga" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Tipe Preferensi</label>
                        <select class="form-control" name="pf" id="e_pf" required>
                            <option value="">--Pilih Tipe Preferensi--</option>
                            <option value="2">Tipe 2</option>
                            <option value="3">Tipe 3</option>
                        </select>
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
<div class="modal fade" id="hapus_kriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_kriteria/ac_del_kriteria') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_kriteria" id="h_id_kriteria" required>
                    <div class="form-group">
                        <label for="a_kt">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama_kriteria" id="h_kt" placeholder="Contoh : Umur Berbunga" readonly>
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
    function edit_kriteria(id, kriteria, pf) {
        $('#e_id_kriteria').val(id);
        $('#e_kt').val(kriteria);
        $('#e_pf').val(pf);
    }

    function hapus_kriteria(id, kriteria) {
        $('#h_id_kriteria').val(id);
        $('#h_kt').val(kriteria);
    }
</script>