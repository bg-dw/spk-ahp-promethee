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
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
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
                            <h4 class="card-title">Dashboard</h4>
                            <h5 class="card-subtitle">Halaman Beranda</h5>
                        </div>

                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-rounded btn-md btn-success" onclick="window.location.href='<?= base_url('index.php/c_dashboard_admin/add_post') ?>'"><i class="mdi mdi-plus-circle"> </i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <!-- title -->

                    <ul class="search-listing list-style-none m-t-40">
                        <?php foreach ($data as $row) { ?>
                            <li class="border-bottom m-t-10">
                                <div class="float-right">
                                    <button class="btn btn-sm btn-warning" onclick="window.location.href='<?= base_url('index.php/c_dashboard_admin/edit_post/') . $row->id_post ?>'"><i class="mdi mdi-pencil"> </i> Edit</button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_post" onclick="hapus_post('<?= $row->id_post ?>','<?= $row->judul_post ?>','<?= $row->gambar_post ?>')"><i class="mdi mdi-delete"> </i> Hapus</button>

                                </div>
                                <h4 class="m-b-2">
                                    <a href="<?= base_url('index.php/c_dashboard_admin/lihat_post/' . $row->id_post) ?>" class="text-cyan font-medium p-0">
                                        <?= $row->judul_post; ?>
                                    </a>
                                </h4>
                                <?php
                                $post = $row->keterangan_post;
                                $get_text = strip_tags($post);
                                $string = substr($get_text, 0, 300); ?>
                                <p><?php
                                    if (strlen($post) > 100) {
                                        echo strip_tags($string) . " . . .";
                                    } else {
                                        echo strip_tags($post);
                                    }
                                    ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="row m-t-20">
                        <div class="col">
                            <!--Tampilkan pagination-->
                            <?php echo $pagination; ?>
                        </div>
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
<div class="modal fade" id="hapus_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('index.php/c_dashboard_admin/ac_del_post') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Kedelai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="foto_lama" id="h_ft_lama">
                    <div class="form-group">
                        <label for="h_id_kedelai">ID Kedelai</label>
                        <input type="text" class="form-control" name="id_post" id="h_id_post" readonly>
                    </div>
                    <div class="form-group">
                        <label for="h_nama_kedelai">Judul Post</label>
                        <input type="text" class="form-control" name="judul" id="h_judul" readonly>
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
    function hapus_post(id, judul, ft_lama) {
        $('#h_id_post').val(id);
        $('#h_judul').val(judul);
        $('#h_ft_lama').val(ft_lama);
    }
</script>