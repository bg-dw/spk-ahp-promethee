<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Petunjuk SPK</li>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Petunjuk SPK</h4>
                            <h5 class="card-subtitle">Keterangan SPK</h5>
                        </div>

                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" onclick="location.href='<?= base_url('index.php/c_dashboard_admin/add_petunjuk_spk') ?>'"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive m-t-20">

                        <table class="table datatable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>ID Keterangan</th>
                                    <th>Isi Keterangan</th>
                                    <th width="150">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($data as $isi) {

                                    $petunjuk = $isi->p_spk_keterangan;
                                    $get_text = strip_tags($petunjuk);
                                    $string = substr($get_text, 0, 300); ?>
                                    <tr>
                                        <td><?= $i . "."; ?></td>
                                        <td><?= $isi->id_p_spk; ?></td>
                                        <td>
                                            <p><?php
                                                if (strlen($petunjuk) > 100) {
                                                    echo strip_tags($string) . " . . .";
                                                } else {
                                                    echo strip_tags($petunjuk);
                                                }
                                                ?></p>
                                        </td>
                                        <td align="center">
                                            <button class="btn btn-rounded btn-sm btn-warning" onclick="location.href='<?= base_url('index.php/c_dashboard_admin/edit_petunjuk_spk/' . $isi->id_p_spk) ?>'">
                                                <i class="mdi mdi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-rounded btn-sm btn-danger" data-toggle="modal" data-target="#hapus_petunjuk" onclick="hapus_keterangan('<?= $isi->id_p_spk ?>')">
                                                <i class="mdi mdi-delete"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- title -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<!-- Modal HAPUS -->
<div class="modal fade" id="hapus_petunjuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_dashboard_admin/ac_del_petunjuk_spk') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="h_id_kedelai">ID Keterangan</label>
                        <input type="text" class="form-control" name="id_keterangan" id="h_id_keterangan" readonly>
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
    function hapus_keterangan(id) {
        $('#h_id_keterangan').val(id);
    }
</script>