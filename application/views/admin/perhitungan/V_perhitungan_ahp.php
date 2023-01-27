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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/user/c_dashboard_user') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/user/c_perhitungan_ahp') ?>">Perbandingan Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Perhitungan AHP</li>
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
                                <button class="btn btn-success btn-md" id="btn-show" onclick="myFunction()">Tampilkan Perhitungan</button>
                                <button class="btn btn-success btn-md" id="btn-hide" onclick="myFunction()" style="display: none;">Sembunyikan Perhitungan</button>
                            </div>
                        </div>
                    </div>
                    <div id="hasil" style="display: none;" class="m-t-20">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Ordo Matriks</td>
                                        <?php for ($i = 0; $i < count($ratio_index); $i++) { ?>
                                            <td style="text-align: center;"><?= $i + 1; ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Ratio Index</td>
                                        <?php for ($i = 0; $i < count($ratio_index); $i++) { ?>
                                            <td style="text-align: center;"><?= $ratio_index[$i]; ?></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="m-t-40">- Perbandingan Berpasangan</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <th scope="col" style="text-align: center;vertical-align: middle;"><?= $num_kriteria[$i]->kriteria; ?></th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                    ?>
                                        <tr>
                                            <td><?= $num_kriteria[$i]->kriteria; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                                                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                                            ?>
                                                    <td style="text-align: center;">
                                                        <?= $hasil_perbandingan[$i][$j] = "1"; ?>
                                                    </td>
                                                    <?php
                                                } else {
                                                    if ($perbandingan_awal[$i][$j] == "-") {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = 1 / $perbandingan_awal[$j][$i]; ?>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = $perbandingan_awal[$i][$j]; ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>Total</td>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <td scope="col" style="text-align: center;"><?= $total_perbandingan_per_kolom[$i]; ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="m-t-40">- Nilai Prioritas Kriteria</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;vertical-align: middle;"></th>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <th scope="col" style="text-align: center;"><?= $num_kriteria[$i]->kriteria; ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th scope="col" style="text-align: center;vertical-align: middle;">Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                    ?>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;"><?= $num_kriteria[$i]->kriteria; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                                            ?>
                                                <td style="text-align: center;">
                                                    <?= $normalisasi[$i][$j]; ?>
                                                </td>
                                            <?php
                                            } ?>
                                            <td style="text-align: center;">
                                                <?= $prioritas[$i]; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="m-t-40">- Mencari <i>Principal Eigen Value</i> </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;vertical-align: middle;"></th>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <th scope="col" style="text-align: center;vertical-align: middle;"><?= $num_kriteria[$i]->kriteria; ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th scope="col" style="text-align: center;vertical-align: middle;">Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                    ?>
                                        <tr>
                                            <td><?= $num_kriteria[$i]->kriteria; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                                                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                                            ?>
                                                    <td style="text-align: center;">
                                                        <?= $hasil_perbandingan[$i][$j] = "1"; ?>
                                                    </td>
                                                    <?php
                                                } else {
                                                    if ($perbandingan_awal[$i][$j] == "-") {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = 1 / $perbandingan_awal[$j][$i]; ?>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = $perbandingan_awal[$i][$j]; ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                            <td style="text-align: center;">
                                                <?= $prioritas[$i]; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Principal Eigen Value</i></td>
                                        <td><?= $pev ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="m-t-40">- Mencari Konsistensi Indeks (CI) </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;vertical-align: middle;"></th>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <th scope="col" style="text-align: center;vertical-align: middle;"><?= $num_kriteria[$i]->kriteria; ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th scope="col" style="text-align: center;vertical-align: middle;">Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                    ?>
                                        <tr>
                                            <td><?= $num_kriteria[$i]->kriteria; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                                                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                                            ?>
                                                    <td style="text-align: center;">
                                                        <?= $hasil_perbandingan[$i][$j] = "1"; ?>
                                                    </td>
                                                    <?php
                                                } else {
                                                    if ($perbandingan_awal[$i][$j] == "-") {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = 1 / $perbandingan_awal[$j][$i]; ?>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = $perbandingan_awal[$i][$j]; ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                            <td style="text-align: center;">
                                                <?= $prioritas[$i]; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Principal Eigen Value</i></td>
                                        <td><?= $pev ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Konsistensi Indeks</i></td>
                                        <td><?= $ci ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="m-t-40">- Mencari Rasio Konsistensi (CR) </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;vertical-align: middle;"></th>
                                        <?php
                                        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                        ?>
                                            <th scope="col" style="text-align: center;vertical-align: middle;"><?= $num_kriteria[$i]->kriteria; ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th scope="col" style="text-align: center;vertical-align: middle;">Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                                    ?>
                                        <tr>
                                            <td><?= $num_kriteria[$i]->kriteria; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                                                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                                            ?>
                                                    <td style="text-align: center;">
                                                        <?= $hasil_perbandingan[$i][$j] = "1"; ?>
                                                    </td>
                                                    <?php
                                                } else {
                                                    if ($perbandingan_awal[$i][$j] == "-") {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = 1 / $perbandingan_awal[$j][$i]; ?>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td style="text-align: center;">
                                                            <?= $hasil_perbandingan[$i][$j] = $perbandingan_awal[$i][$j]; ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                            <td style="text-align: center;">
                                                <?= $prioritas[$i]; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Principal Eigen Value</i></td>
                                        <td><?= $pev ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Konsistensi Indeks</i></td>
                                        <td><?= $ci ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="<?= count($num_kriteria) + 1; ?>" style="text-align: center;"><i>Konsistensi Indeks</i></td>
                                        <td><?= $cr ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive m-t-40">
                        <h5>- Hasil Perhitungan Kriteria</h5>
                        <table class="table table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">No.</th>
                                    <th scope="col" style="text-align: center;">Kriteria</th>
                                    <th scope="col" style="text-align: center;">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kriteria as $isi) { ?>
                                    <tr>
                                        <td style="text-align: center;" width="15"><?= $i . "."; ?></td>
                                        <td><?= $isi->kriteria; ?></td>
                                        <td><?= $isi->bobot; ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
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

<script>
    function myFunction() {
        var elm = document.getElementById("hasil");
        var btn_show = document.getElementById("btn-show");
        var btn_hide = document.getElementById("btn-hide");
        if (elm.style.display === "none") {
            elm.style.display = "block";
            btn_hide.style.display = "block";
            btn_show.style.display = "none";
        } else {
            elm.style.display = "none";
            btn_hide.style.display = "none";
            btn_show.style.display = "block";
        }
    }
</script>