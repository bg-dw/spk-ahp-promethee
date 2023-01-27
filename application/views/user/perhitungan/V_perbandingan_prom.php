<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<style>
    .select2-selection--multiple {
        overflow: hidden !important;
        height: auto !important;
    }
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">ALTERNATIF</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perbandingan Alternatif</li>
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
                            <h4 class="card-title">Perbandingan Alternatif</h4>
                            <h5 class="card-subtitle">Tingkat Kepentingan Alternatif</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('index.php/user/c_perhitungan_prom/hasil_prom') ?>" method="POST">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="checkbox" id="cek" name="cek" onclick="cek_hasil()">
                                <label for="cek"> Pilih Semua</label><br>
                                <select class="form-control col-auto col-md-auto select2-multiple" name="alternatif[]" multiple="multiple" id="sel" required>
                                    <?php
                                    foreach ($kedelai as $isi) { ?>
                                        <option value="<?= $isi->id_kedelai; ?>"> <?= $isi->nama_kedelai; ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="text-right m-t-20">
                                <button class="btn btn-md btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- title -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script>
    function cek_hasil() {
        var options = $('#sel option'); //inisialisasi select

        var values = $.map(options, function(option) { //mengambil semua value dari select
            return option.value;
        });
        var exampleMulti = $(".select2-multiple").select2();
        if ($('#cek').prop("checked") == true) {
            exampleMulti.val(values).trigger("change"); //set isi select
        } else if ($('#cek').prop("checked") == false) {
            exampleMulti.val(null).trigger("change"); //hapus isi select
        }
    };
</script>