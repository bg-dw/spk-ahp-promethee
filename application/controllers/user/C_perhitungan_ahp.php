<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_perhitungan_ahp extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
        $this->load->model('M_ahp'); //memanggil model M_ahp
    }

    public function index()
    {
        $data['content'] = "user/perhitungan/V_perbandingan"; //admin merupakan folder didalam view, v_perbandingan merupakan file php yg merupakan isi dari halam
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $this->load->view('user/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    public function hasil_ahp()
    {
        $nilai = $this->input->post('nilai'); //mengambil data nilai dengan menggunakan method POST

        //mengambil data kriteria
        $kriteria = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $num_kriteria = array_values($kriteria); //mengubah assosiative array ke numeric array

        //ratio index
        $ratio_index = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.46, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);

        // var_dump($ratio_index);
        //re-index array sesuai data perbandingan(matrix segitiga siku-siku terbalik)
        //#ahp_p1
        $index = 0;
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            for ($j = ($i + 1); $j < count($num_kriteria); $j++) { //sebanyak kriteria tanpa perbandingan bolak balik (kolom dari matrix)
                $perbandingan[$i][$j] = $nilai[$index];
                $index++;
            }
        }

        // var_dump($perbandingan);

        //perbandingan berpasangan (matrix persegi) 
        #ahp_p2
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                    // echo "[" . $i . "," . $j . "] 1 || ";
                    $perbandingan_awal[$i][$j] = "1";
                } else {
                    if (isset($perbandingan[$i][$j])) { //hasil inputan user berdasarkan kepentingan
                        // echo "[" . $i . "," . $j . "] " . $perbandingan[$i][$j] . " || ";
                        $perbandingan_awal[$i][$j] = $perbandingan[$i][$j];
                    } else { //matrix awal yang belum terisi nilai
                        // echo "[" . $i . "," . $j . "] - || ";
                        $perbandingan_awal[$i][$j] = "-";
                    }
                }
            }
            // echo "<br>";
        }
        // var_dump($perbandingan_awal);

        //perbandingan berpasangan hasil
        #ahp_p3
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                if ($num_kriteria[$i]->id_kriteria == $num_kriteria[$j]->id_kriteria) { //jika perbandingan dengan kriteria yang sama
                    $hasil_perbandingan[$i][$j] = "1";
                } else {
                    if ($perbandingan_awal[$i][$j] == "-") {
                        $hasil_perbandingan[$i][$j] = 1 / $perbandingan_awal[$j][$i];
                    } else {
                        $hasil_perbandingan[$i][$j] = $perbandingan_awal[$i][$j];
                    }
                }
            }
        }

        //total penjumlahan setiap kolom
        #ahp_p4
        for ($z = 0; $z < count($num_kriteria); $z++) { //sebanyak kriteria (z dari matrix)
            $total = 0;
            for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                    if ($z == $j) {
                        $total += $hasil_perbandingan[$i][$j];
                    }
                }
            }
            $total_perbandingan_per_kolom[$z] = $total;
        }

        // var_dump($total_perbandingan_per_kolom);
        // echo "<br>";

        //normalisasi
        //#ahp_n1
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                // echo number_format(($hasil_perbandingan[$i][$j] / $total_perbandingan_per_kolom[$j]), 3) . " || ";
                $normalisasi[$i][$j] = round(($hasil_perbandingan[$i][$j] / $total_perbandingan_per_kolom[$j]), 4, PHP_ROUND_HALF_UP);
            }
            // echo "<br>";
        }

        // var_dump($normalisasi);

        //prioritas
        //#ahp_n2
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            $nilai_p = 0;
            for ($j = 0; $j < count($num_kriteria); $j++) { //sebanyak kriteria (kolom dari matrix)
                $nilai_p += $normalisasi[$i][$j];
            }
            $prioritas[$i] =
                $normalisasi[$i][$j] = round(($nilai_p / count($num_kriteria)), 4, PHP_ROUND_HALF_UP);
        }
        // echo "<br>";
        // echo "prioritas";
        // var_dump($prioritas);

        //PEV
        //#ahp_n3
        for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
            $pev[$i] = round(($total_perbandingan_per_kolom[$i] * $prioritas[$i]), 4, PHP_ROUND_HALF_UP);
            $id_kriteria[$i] = $num_kriteria[$i]->id_kriteria;
        }

        // var_dump($pev);

        $pev = array_sum($pev); //nilai PEV
        $ci = round((($pev - count($num_kriteria)) / (count($num_kriteria) - 1)), 4, PHP_ROUND_HALF_UP); //nilai CI
        $cr = round(($ci / $ratio_index[count($num_kriteria) - 1]), 4, PHP_ROUND_HALF_UP); //nilai CR

        //update bobot kriteria
        if (count($num_kriteria) > 0) {
            for ($i = 0; $i < count($num_kriteria); $i++) { //sebanyak kriteria (baris dari matrix)
                $where = "id_kriteria='" . $id_kriteria[$i] . "'";
                $data = array( //membuat array untuk menyimpan variable
                    'bobot' => $prioritas[$i] //menyimpan data kedalam variable
                );
                $this->M_ahp->update($where, $data, 't_kriteria'); //kirim data baru ke model
                $this->session->set_flashdata("success", "Bobot Kriteria berhasil diperbaharui!"); //flashdata
            }
        }

        $data['content'] = "user/perhitungan/V_perhitungan_ahp"; //admin merupakan folder didalam view, v_daftar_kriteria merupakan file php yg merupakan isi dari halaman
        $data['kriteria'] = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $data['num_kriteria'] = $num_kriteria;
        $data['ratio_index'] = $ratio_index;
        $data['perbandingan'] = $perbandingan;
        $data['perbandingan_awal'] = $perbandingan_awal;
        $data['hasil_perbandingan'] = $hasil_perbandingan;
        $data['total_perbandingan_per_kolom'] = $total_perbandingan_per_kolom;
        $data['normalisasi'] = $normalisasi;
        $data['prioritas'] = $prioritas;
        $data['pev'] = $pev;
        $data['ci'] = $ci;
        $data['cr'] = $cr;
        $this->load->view('user/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }
}
