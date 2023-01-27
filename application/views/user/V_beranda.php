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
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-6" onclick="location.href='<?= base_url('index.php/c_dashboard_user/petunjuk_ahp') ?>'">
                            <div class="card card-hover bg-orange">
                                <div class="card-body">
                                    <center>
                                        <h2 style="color: white;">
                                            Petunjuk Pengisian Perbandingan
                                        </h2>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-6 col-lg-6" onclick="location.href='<?= base_url('index.php/c_dashboard_user/petunjuk_spk') ?>'">
                            <div class="card card-hover bg-info">
                                <div class="card-body">
                                    <center>
                                        <h2 style="color: white;">
                                            Sistem Penunjang <br>
                                            Keputusan
                                        </h2>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- title -->

                    <ul class="search-listing list-style-none m-t-40">
                        <?php foreach ($data as $row) { ?>
                            <li class="border-bottom m-t-10">
                                <h4 class="m-b-2">
                                    <a href="<?= base_url('index.php/c_dashboard_user/lihat_post/' . $row->id_post) ?>" class="text-cyan font-medium p-0">
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