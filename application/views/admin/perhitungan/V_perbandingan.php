<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">KRITERIA</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perbandingan Kriteria</li>
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
                            <h4 class="card-title">Perbandingan Kriteria</h4>
                            <h5 class="card-subtitle">Tingkat Kepentingan Kriteria</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('index.php/c_perhitungan_ahp/hasil_ahp') ?>" method="POST">
                        <?php
                        // var_dump($kriteria);
                        $num_kriteria = array_values($kriteria); //convert dari assosiative array ke numeric array
                        $nomor = 1;
                        //matrix segitiga siku-sikus terbalik
                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak baris
                            for ($j = ($i + 1); $j < count($num_kriteria); $j++) { //sebanyak kolom
                        ?><input type="hidden" name="id[]" value="<?= $num_kriteria[$i]->id_kriteria ?>">
                                <table width="100%" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:2px black solid;">
                                    <th>
                                    <td width="3%"><?= $nomor . "." ?></td>
                                    <td width="75%"><?= $num_kriteria[$i]->kriteria . " Terhadap " . $num_kriteria[$j]->kriteria; ?>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="nilai[]" min="1" max="9" value="1">
                                    </td>
                                    </th>
                                </table>
                        <?php
                                echo "<br>";
                                $nomor++;
                            }
                        }
                        ?>


                        <div class="text-right">
                            <button class="btn btn-md btn-success" type="submit">Submit</button>
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