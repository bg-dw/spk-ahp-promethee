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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
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
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" onclick="location.href='<?= base_url('index.php/c_nilai_alternatif/add_nilai') ?>'"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
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
                                    <th width="150">Opsi</th>
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
                                        <td align="center">
                                            <button class="btn btn-rounded btn-sm btn-warning" onclick="location.href='<?= base_url('index.php/c_nilai_alternatif/edit_nilai/' . $isi->id_nilai) ?>'">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-rounded btn-sm btn-danger" data-toggle="modal" data-target="#hapus_nilai" onclick="hapus_nilai('<?= $isi->id_nilai ?>','<?= $isi->nama_kedelai ?>','<?= $isi->kriteria ?>','<?= $isi->nilai ?>')">
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

<!-- Modal HAPUS -->
<div class="modal fade" id="hapus_nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_nilai_alternatif/ac_del_nilai') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="h_id_nilai">ID Nilai</label>
                        <input type="text" class="form-control" name="id_nilai" id="h_id_nilai" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nama_kedelai">Nama Kedelai</label>
                        <input type="text" class="form-control" name="nama_kedelai" id="h_nama_kedelai" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nama_nilai">Kriteria</label>
                        <input type="text" class="form-control" name="kriteria" id="h_kriteria" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nilai">nilai</label>
                        <input type="text" class="form-control" name="nilai" id="h_nilai" readonly>
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
    function hapus_nilai(id, nama_kedelai, kriteria, nilai) {
        $('#h_id_nilai').val(id);
        $('#h_nama_kedelai').val(nama_kedelai);
        $('#h_kriteria').val(kriteria);
        $('#h_nilai').val(nilai);
    }
</script>