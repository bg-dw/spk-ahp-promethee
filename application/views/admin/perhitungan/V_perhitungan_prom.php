<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">ALTERNATIF</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_perhitungan_prom') ?>">Alternatif</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Perhitungan PROMETHEE</li>
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
                            <h5 class="card-subtitle">Peragkingan Alternatif</h5>
                        </div>
                        <div class="ml-auto align-items-center">
                            <div class="dl">
                                <button class="btn btn-success btn-md" id="btn-show" onclick="myFunction()">Tampilkan Perhitungan</button>
                                <button class="btn btn-success btn-md" id="btn-hide" onclick="myFunction()" style="display: none;">Sembunyikan Perhitungan</button>
                            </div>
                        </div>
                    </div>
                    <div id="hasil_prom" style="display: none;" class="m-t-20">
                        <div class="table-responsive m-t-40">
                            <h5>- Normalisasi</h5>
                            <table class="table table-bordered table-responsive-lg" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Kriteria</th>
                                        <th scope="col" colspan="<?= count($kedelai); ?>" style="text-align: center;font-weight:bold;">Alternatif</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($kedelai as $isi) {
                                        ?>
                                            <th scope="col" style="text-align: center;font-weight:bold;"><?= $isi->nama_kedelai; ?></th>
                                        <?php
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($kriteria as $baris) { ?>
                                        <tr>
                                            <td><?= $baris->kriteria; ?></td>
                                            <?php
                                            $j = 0;
                                            foreach ($nilai as $isi) {
                                                // echo $baris->id_kriteria . "->" . $baris->id_kriteria . "=" . $isi->nilai . "|";
                                                if ($baris->id_kriteria == $isi->id_kriteria) {
                                                    // echo $isi->nilai . " | ";
                                            ?>
                                                    <td><?php echo $isi->nilai; ?></td>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                        $i++;
                                        // echo "<br>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive m-t-40">
                            <h5>- Mengalikan Bobot dengan Nilai Alternatif</h5>
                            <table class="table table-bordered table-responsive-lg" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Kriteria</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Bobot</th>
                                        <th scope="col" colspan="<?= count($kedelai); ?>" style="text-align: center;font-weight:bold;">Alternatif</th>
                                    </tr>
                                    <tr>
                                        <?php foreach ($kedelai as $isi) {
                                        ?>
                                            <th scope="col" style="text-align: center;font-weight:bold;"><?= $isi->nama_kedelai; ?></th>
                                        <?php
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($kriteria as $baris) { ?>
                                        <tr>
                                            <td><?= $baris->kriteria; ?></td>
                                            <td><?= $baris->bobot; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($n1[$i]); $j++) {

                                            ?>
                                                <td><?= $bxn[$i][$j]; ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive m-t-40">
                            <h5>- Mencari Nilai Threshold</h5>
                            <table class="table table-bordered table-responsive-lg" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Kriteria</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Max Min</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Bobot</th>
                                        <th scope="col" colspan="<?= count($kedelai); ?>" style="text-align: center;font-weight:bold;">Alternatif</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Tipe Preferensi</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">K1</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">k2</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">V</th>
                                        <th scope="col" colspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">Parameter</th>
                                    </tr>
                                    <tr>
                                        <?php $i = 0;
                                        foreach ($kedelai as $isi) {
                                        ?>
                                            <th scope="col" style="text-align: center;font-weight:bold;"><?= $isi->nama_kedelai . " (" . $id_as[0][$i] . ")"; ?></th>
                                        <?php $i++;
                                        } ?>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">q</th>
                                        <th scope="col" rowspan="2" style="text-align: center;vertical-align: middle;font-weight:bold;">p</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($kriteria as $baris) { ?>
                                        <tr>
                                            <td><?= $baris->kriteria; ?></td>
                                            <td><?= "Max"; ?></td>
                                            <td><?= $baris->bobot; ?></td>
                                            <?php
                                            for ($j = 0; $j < count($n1[$i]); $j++) {

                                            ?>
                                                <td><?= $bxn[$i][$j]; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?= $p1[$i]; ?></td>
                                            <td><?= $k1[$i]; ?></td>
                                            <td><?= $k2[$i]; ?></td>
                                            <td><?= $v[$i]; ?></td>
                                            <td><?= $q[$i]; ?></td>
                                            <td><?= $p[$i]; ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive m-t-40">
                            <h5>- Mencari Nilai Threshold</h5>
                            <?php
                            $i = 0;
                            foreach ($kriteria as $baris) {
                                $x = 0;
                                echo "<h5><center>- " . $baris->kriteria . " -</center></h5>";
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-lg" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2" style="text-align: center;font-weight:bold;"><?= $baris->kriteria ?></th>
                                                <th scope="col" style="text-align: center;font-weight:bold;">a</th>
                                                <th scope="col" style="text-align: center;font-weight:bold;">b</th>
                                                <th scope="col" style="text-align: center;font-weight:bold;">d (Jarak)</th>
                                                <th scope="col" style="text-align: center;font-weight:bold;">
                                                    <?php if ($baris->tipe_preferensi == 2) {
                                                        echo "p";
                                                    } elseif ($baris->tipe_preferensi == 3) {
                                                        echo "q";
                                                    } ?>
                                                </th>
                                                <th scope="col" style="text-align: center;font-weight:bold;">IP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($j = 0; $j < count($n1[$i]); $j++) { ?>
                                                <?php
                                                for ($k = 0; $k < count($n1[$i]); $k++) {
                                                    if ($id_as[$i][$j] != $id_as[$i][$k]) { //agar tidak membandingkan dengan dirinya sendiri
                                                ?>
                                                        <tr>
                                                            <td><?= $id_as[$i][$j]  ?></td>
                                                            <td><?= $id_as[$i][$k] ?></td>
                                                            <td><?= $bxn[$i][$j] ?></td>
                                                            <td><?= $bxn[$i][$k] ?></td>
                                                            <td><?= $d[$i][$j][$k] ?></td>
                                                            <?php
                                                            // echo $id_as[$i][$j] . "=" . $id_as[$j][$k] . " | ";
                                                            // echo $bxn[$i][$j] . "=" . $bxn[$j][$k] . " | ";
                                                            // echo $d[$i][$j][$k] . " | ";
                                                            if ($baris->tipe_preferensi == 2) { //q
                                                            ?>
                                                                <td><?= $q[$i] ?></td>
                                                            <?php
                                                                // echo  . " | ";
                                                            } elseif ($baris->tipe_preferensi == 3) { //p
                                                            ?>
                                                                <td><?= $p[$i] ?></td>
                                                            <?php
                                                                // echo $p[$i] . " | ";
                                                            }
                                                            ?>
                                                            <td><?= $index_p[$i][$j][$k] ?></td>
                                                        </tr>
                                                <?php
                                                        // echo $index_p[$i][$j][$k] . " | ";
                                                        // echo "<br>";
                                                    }
                                                    $x++;
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            <?php
                                echo "<br>";
                                $i++;
                            }
                            ?>
                            <!-- title -->
                        </div>

                        <div class="table-responsive m-t-40">
                            <h5>- Hasil Penjumlahan Nilai IP</h5>
                            <?php
                            // var_dump($tot_index); 
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-lg" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3" style="text-align: center;font-weight:bold;">Total Index Preferensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $i = 0;
                                        $x = 0;
                                        // foreach ($kriteria as $baris) {
                                        //     $j = 0;
                                        for ($j = 0; $j < count($id_as[0]); $j++) {
                                        ?>
                                            <?php
                                            for ($k = 0; $k < count($id_as[0]); $k++) {
                                                if ($id_as[0][$j] != $id_as[0][$k]) { //agar tidak membandingkan dengan dirinya sendiri
                                            ?>
                                                    <tr>
                                                        <td><?= $id_as[0][$j]  ?></td>
                                                        <td><?= $id_as[0][$k] ?></td>
                                                        <td><?= $tot_index[$x] ?></td>
                                                    </tr>
                                            <?php
                                                } else {
                                                    //perbandingan dengan dirinya sendiri
                                                }
                                                $x++;
                                            }
                                            ?>
                                        <?php
                                            // $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- title -->
                        </div>

                        <div class="table-responsive m-t-40">
                            <h5>- Hasil Penjumlahan Nilai IP</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-lg" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center;font-weight:bold;">Alternatif</th>
                                            <?php for ($i = 0; $i < count($id_as[0]); $i++) {
                                            ?>
                                                <th scope="col" style="text-align: center;font-weight:bold;"><?= $id_as[0][$i] ?></th>
                                            <?php
                                            } ?>
                                            <th scope="col" style="text-align: center;font-weight:bold;">Jumlah</th>
                                            <th scope="col" style="text-align: center;font-weight:bold;">Leaving Flow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < count($n1[0]); $i++) {
                                            $tot = 0;
                                        ?>
                                            <tr>
                                                <td><?= $id_as[0][$i] ?></td>
                                                <?php
                                                for ($j = 0; $j < count($n1[0]); $j++) { ?>
                                                    <td><?= $tot_index_baru[$i][$j] ?></td>
                                                <?php
                                                    $tot += $tot_index_baru[$i][$j];
                                                } ?>
                                                <td><?= $tot ?></td>
                                                <td><?= round(($tot_lf[$i]), 3, PHP_ROUND_HALF_UP); ?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                        <tr>
                                            <td>Jumlah</td>
                                            <?php
                                            for ($i = 0; $i < count($n1[0]); $i++) {
                                            ?>
                                                <td>
                                                    <?= array_sum($tot_index_baru[$i]) ?></td>
                                            <?php } ?>
                                            <td rowspan="2" colspan="2" style="background-color: grey;"></td>
                                        </tr>
                                        <tr>
                                            <td>Entering Flow</td>
                                            <?php
                                            for ($i = 0; $i < count($n1[0]); $i++) {
                                            ?>
                                                <td>
                                                    <?= round(($tot_ef[$i]), 3, PHP_ROUND_HALF_UP); ?></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- title -->
                        </div>
                    </div>

                    <div class="table-responsive m-t-40">
                        <h5>- Hasil Perangkingan</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-lg" width="100%" id="hasil_prom_akhir">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;font-weight:bold;">Alternatif</th>
                                        <!-- <th scope="col" style="text-align: center;font-weight:bold;">Leaving Flow</th>
                                        <th scope="col" style="text-align: center;font-weight:bold;">Entering Flow</th>
                                        <th scope="col" style="text-align: center;font-weight:bold;">Net Flow</th>
                                        <th scope="col" style="text-align: center;font-weight:bold;">Total Nilai</th> -->
                                        <th scope="col" style="text-align: center;font-weight:bold;">Rangking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // rsort($id_kedelai);
                                    for ($i = 0; $i < count($n1[0]); $i++) {
                                    ?><tr>
                                            <td style="text-align: center;font-weight:bold;">
                                                <button class="btn btn-info" onclick="get_normalisasi('<?= $tot_akhir[$i][4] ?>')" data-toggle="modal" data-target="#rincian_normalisasi"><?= $tot_akhir[$i][2] ?></button>
                                            </td>
                                            <!-- <td><?php $hasil[$i][0] ?></td>
                                            <td><?php $hasil[$i][1] ?></td>
                                            <td><?php $hasil[$i][2] ?></td>
                                            <td><?php $tot_akhir[$i][0] ?></td> -->
                                            <td><?= $tot_akhir[$i][3] ?></td>
                                        </tr>
                                    <?php
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
    <div class="modal fade" id="rincian_normalisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul_modal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_rincian">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var elm = document.getElementById("hasil_prom");
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
    <script type="text/javascript">
        function get_normalisasi(id) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('index.php/c_perhitungan_prom/get_normalisasi'); ?>",
                dataType: "JSON",
                data: {
                    id_alternatif: id
                },
                success: function(data) {
                    var table = '';
                    var rows = data.length;
                    var cols = 2;
                    table += '<tr>';
                    table += '<th style="text-align:center">Nama Kriteria</th>';
                    table += '<th style="text-align:center">Nilai</th>';
                    table += '</tr>';
                    for (var r = 0; r < rows; r++) {
                        table += '<tr>';
                        table += '<td>' + data[r].kriteria + '</td>';
                        table += '<td style="text-align:center">' + data[r].nilai + '</td>';
                        table += '</tr>';
                    }
                    $("#judul_modal").html('Normalisasi ' + data[0].nama_kedelai);
                    $("#modal_rincian").html('<table border="1" width="100%">' + table + '</table>');
                }
            });
        }
    </script>