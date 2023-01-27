<?php
defined('BASEPATH') or exit('No direct script access allowed'); //untuk memproteksi agar script tidak dapat dialses secara langsung dan harus melalui base_url>controller

class C_perhitungan_prom extends CI_Controller
{
    //fungsi yang akan dijalankan pertama kali oleh c_kedelai
    function __construct()
    {
        //akan berjalan ketika controller C_register di jalankan
        parent::__construct();
        $this->load->model('M_kedelai'); //memanggil model M_kedelai
        $this->load->model('M_kriteria'); //memanggil model M_kriteria
        $this->load->model('M_nilai_alternatif'); //memanggil model M_nilai_alternatif
        if ($this->session->userdata('login') == FALSE) {
            $this->session->sess_destroy();
            redirect(base_url('index.php/c_login'));
        }
    }

    //halaman default c_perhitungan_prom
    public function index()
    {
        $data['content'] = "admin/perhitungan/V_perbandingan_prom"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
        $data['kedelai'] = $this->M_kedelai->get_data()->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
        $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
    }

    public function hasil_prom()
    {
        $alt = $this->input->post('alternatif'); //mengambil data nilai dengan menggunakan method POST
        if (count($alt) > 1) { //jika kedelai yang dibandingkan lebih dari 1

            // var_dump($alt);
            $kriteria = $this->M_kriteria->get_data()->result(); //memanggil fungsi get_data didalam model M_kriteria, dengan return query result()
            $data['kedelai'] = $this->M_kedelai->get_where($alt)->result(); //memanggil fungsi get_data didalam model M_kedelai, dengan return query result()
            $nilai = $this->M_nilai_alternatif->get_where($alt)->result(); //memanggil fungsi get_data didalam model M_nilai_alternatif, dengan return query result()

            // var_dump($nilai);

            //normalisasi
            //#n1
            $i = 0;
            foreach ($kriteria as $baris) {
                // echo $baris->kriteria . " | ";
                $j = 0;
                foreach ($nilai as $isi) {
                    if ($baris->id_kriteria == $isi->id_kriteria) {
                        // echo $isi->nilai . " | ";
                        $n1[$i][$j] = $isi->nilai;
                        $id_kedelai[$i][$j] = $isi->id_kedelai;
                        $name_alt[$i][$j] = $isi->nama_kedelai;
                        $id_as[$i][$j] = "A" . ($j + 1); //inisialisasi
                        $j++;
                    }
                }
                $i++;
                // echo "<br>";
            }

            // echo "<br>";
            // var_dump($n1[0]);
            // echo "<hr>";
            // echo "<br>";


            //Mengalikan bobot dengan nilai alternatif
            //#bxn
            $i = 0;
            foreach ($kriteria as $baris) {
                // echo $baris->kriteria . " | ";
                // echo $baris->bobot . " | ";
                for ($j = 0; $j < count($n1[$i]); $j++) {
                    // echo round($baris->bobot * $n1[$i][$j], 3, PHP_ROUND_HALF_UP) . " | ";
                    $bxn[$i][$j] = round($baris->bobot * $n1[$i][$j], 3, PHP_ROUND_HALF_UP); // mengalikan bobot dengan nilai alternatif dan menyimpannya kedalam array
                }
                $i++;
                // echo "<br>";
            }

            // echo "<br>";
            // var_dump($bxn);
            // echo "<hr>";
            // echo "<br>";


            //tipe preferensi
            //#p1
            $i = 0;
            foreach ($kriteria as $baris) {
                // echo $baris->kriteria . " | ";
                // echo $baris->tipe_preferensi . " | ";
                $p1[$i] = $baris->tipe_preferensi;
                for ($j = 0; $j < count($n1[$i]); $j++) {
                    // echo $bxn[$i][$j] . " | ";
                }
                $i++;
                // echo "<br>";
            }

            // echo "<br>";
            // var_dump($p1);
            // echo "<hr>";
            // echo "<br>";

            //mencari nilai threshold
            //#th1
            $i = 0;
            foreach ($kriteria as $baris) {
                // echo $baris->kriteria . " | ";
                // echo $baris->tipe_preferensi . " | ";
                $p1[$i] = $baris->tipe_preferensi;
                // for ($j = 0; $j < count($n1[$i]); $j++) {
                // echo $bxn[$i][$j] . " | ";
                // }

                //k1
                // echo " k1= ";
                $k1[$i] = max($bxn[$i]) - min($bxn[$i]); //nilai maksimum - nilai minimum pada masing2 baris
                // echo $k1[$i] . " | ";

                //k2
                $arr = $bxn[$i];
                sort($arr, SORT_NUMERIC); //mengurutkan nilai didalam array
                $sm_1 = array_shift($arr); //nilai terkecil pertama
                $sm_2 = array_shift($arr); //nilai terkecil kedua
                // echo " m1= " . $sm_1 . " | m2= " . $sm_2 . " | ";
                $k2[$i] = ($sm_2) - ($sm_1); //k2, mengurangi nilai terkecil ke dua terhadap nilai terkecil pertama dalam setiap baris

                // echo " k2= " . $k2[$i] . " | ";

                //V
                $v[$i] = $k1[$i] - $k2[$i]; //nilai dari k1-k2
                // echo " V= " . $v[$i] . " | ";

                //q
                $q[$i] = $v[$i] / count($n1[$i]); //nilai V dibagi banyak alternatif
                // echo " q= " . $q[$i] . " | ";

                //p
                $p[$i] = $v[$i] - $q[$i]; //nilai V - q
                // echo " p= " . $p[$i] . " | ";

                $i++;
                // echo "<br>";
            }

            // echo "<br>";
            // echo $k2;
            // echo "<hr>";
            // echo "<br>";

            // var_dump($bxn);

            //mencari nilai preferensi
            //#fp1
            $i = 0;
            // echo count($n1[$i]);
            foreach ($kriteria as $baris) {
                $x = 0;
                // echo $baris->kriteria . " | ";
                // echo "<br>";
                for ($j = 0; $j < count($n1[$i]); $j++) {
                    // echo $id_kedelai[$i][$j] . "j=" . $j . " | ";
                    for ($k = 0; $k < count($n1[$i]); $k++) {
                        // echo $id_kedelai[$j][$k] . "k=" . $k . " | ";
                        // echo $id_kedelai[$i][$j] . "=" . $id_kedelai[$i][$k] . " | "; //perubahan 18 nov 2020
                        if ($id_kedelai[$i][$j] != $id_kedelai[$i][$k]) { //agar tidak membandingkan dengan dirinya sendiri
                            // echo $id_kedelai[$i][$j] . "=" . $id_kedelai[$j][$k] . " | ";
                            // echo $bxn[$i][$j] . "(" . $i . $j . ") | " . $bxn[$i][$k] . "  (" . $j . $k . ")|";
                            $d[$i][$j][$k] = $bxn[$i][$j] - $bxn[$i][$k]; //nilai d 
                            // echo $d[$i][$j][$k] . " | ";
                            if ($baris->tipe_preferensi == 2) {
                                // echo "q=" . $q[$i] . " | ";
                                if ($d[$i][$j][$k] <= $q[$i]) { //jika nilai d <= nilai q
                                    $index_p[$i][$j][$k] = 0;
                                    // echo $index_p[$i][$j][$k] . " (2)| ";
                                } else { //jika nilai d > nilai q
                                    $index_p[$i][$j][$k] = 1;
                                    // echo $index_p[$i][$j][$k] . " (2)| ";
                                }
                            } elseif ($baris->tipe_preferensi == 3) {
                                // echo "p=" . $p[$i] . " | ";
                                if ($d[$i][$j][$k] <= $p[$i]) { //jika nilai d <= nilai p
                                    if ($p[$i] != 0) {
                                        $index_p[$i][$j][$k] = round(($d[$i][$j][$k] / $p[$i]), 3, PHP_ROUND_HALF_UP);
                                    } else {
                                        $index_p[$i][$j][$k] = "Tidak dapat dibagi dengan nol(0)";
                                    }
                                    // echo $index_p[$i][$j][$k] . " (3)| ";
                                } else { //jika nilai d > nilai p
                                    $index_p[$i][$j][$k] = 1;
                                    // echo $index_p[$i][$j][$k] . " (3)| ";
                                }
                            }
                        } else {
                            $d[$i][$j][$k] = 0;
                            // echo $d[$i][$j][$k] . " | ";
                            $index_p[$i][$j][$k] = 0;
                            // echo $index_p[$i][$j][$k] . " | ";
                        }
                        $tot_ip[$i][$x] = $index_p[$i][$j][$k];
                        // echo " (" . $i . $j . $k . ") " . $x . "| ";
                        // echo "<br>";
                        $x++;
                    }
                    // echo "<br>";
                }
                // echo "<br>";
                $i++;
            }

            // echo "<br>";
            // var_dump($d);
            // var_dump($index_p);
            // echo "<hr>";
            // echo "<br>";

            //menjumlahkan nilai preferensi
            //#fp2
            for ($j = 0; $j < count($tot_ip[0]); $j++) {
                // echo $tot_ip[$i][$j] . "| " . "(" . $i . "=" . $j . ") ";
                $tot_index[$j] = (array_sum(array_column($tot_ip, $j))) / (count($kriteria)); //menjumlahkan perbandingan alternatif
                // echo  $tot_index[$j] . "| ";
            }


            // echo "<br>";
            // var_dump($tot_ip);
            // echo "<hr>";
            // echo "<br>";

            //convert array dari #fp2
            //#fp3            
            $x = 0;
            for ($i = 0; $i < count($n1[0]); $i++) {
                for ($j = 0; $j < count($n1[0]); $j++) {
                    $tot_index_baru[$i][$j] = $tot_index[$x]; //menjadikan array 1 dimensi kedalam 2 dimensi
                    $x++;
                }
            }


            // echo "<br>";
            // var_dump($tot_index_baru);
            // echo "<hr>";
            // echo "<br>";


            // echo "Preferensi";
            // echo "<br>";
            //jumlah alternatif terhadap alternatif lainnya
            //#jpa1            
            // for ($i = 0; $i < count($n1[0]); $i++) {
            //     for ($j = 0; $j < count($n1[0]); $j++) {
            //         echo $tot_index_baru[$i][$j] . " | ";
            //     }
            //     echo "<br>";
            // }


            // echo "<br>";
            // var_dump($tot_index_baru);
            // echo "<hr>";
            // echo "leaving";
            // echo (count($n1[0]));
            // echo "<br>";

            //mencari nilai leaving flow
            //#lf1            
            for ($i = 0; $i < count($n1[0]); $i++) {
                $tot = 0;
                for ($j = 0; $j < count($n1[0]); $j++) {
                    $tot += $tot_index_baru[$i][$j];
                }
                // echo $tot . "=";
                $tot_lf[$i] = (1 / (count($n1[0]) - 1)) * ($tot);
                // echo $tot_lf[$i] . "| ";
                // echo "<br>";
            }


            // echo "<br>";
            // var_dump($tot_lf);
            // echo "<hr>";
            // echo "entering";
            // echo "<br>";

            //mencari nilai entering flow
            //#ef1            
            for ($i = 0; $i < count($n1[0]); $i++) {
                $tot_ef[$i] = (1 / (count($n1[0]) - 1)) * array_sum(array_column($tot_index_baru, $i));
                // echo $tot_ef[$i] . "| ";
                // echo "<br>";
            }

            // echo "<br>";
            // var_dump($tot_ef);
            // echo "<hr>";
            // echo "net flow";
            // echo "<br>";

            //mencari nilai net flow
            //#nf1            
            for ($i = 0; $i < count($n1[0]); $i++) {
                $tot_nf[$i] = ($tot_lf[$i]) - ($tot_ef[$i]);
                // echo $tot_nf[$i] . "| ";
                // echo "<br>";
            }

            // echo "<br>";
            // echo "<hr>";
            // echo "<br>";

            //menggabungkan leaving,entering, dan net flow menjadi array 2 dimensi
            //#na1  

            for ($i = 0; $i < count($n1[0]); $i++) {
                $hasil[$i][0] = round(($tot_lf[$i]), 3, PHP_ROUND_HALF_UP); //leaving flow
                $hasil[$i][1] = round(($tot_ef[$i]), 3, PHP_ROUND_HALF_UP); //entering flow
                $hasil[$i][2] = round(($tot_nf[$i]), 3, PHP_ROUND_HALF_UP); //net flow
            }

            rsort($hasil);
            for ($i = 0; $i < count($n1[0]); $i++) {
                $tot_akhir[$i][0] = round((array_sum($hasil[$i])), 3, PHP_ROUND_HALF_UP); //hasil penjumlahan lf,ef,nfround($baris->bobot * $n1[$i][$j], 3, PHP_ROUND_HALF_UP);
                $tot_akhir[$i][1] = $id_as[0][$i]; //id kedelai/alternatif(inisialisasi)
                $tot_akhir[$i][2] = $name_alt[0][$i]; //id kedelai/alternatif(inisialisasi)
                $tot_akhir[$i][4] = $id_kedelai[0][$i]; //id kedelai/alternatif(inisialisasi)
                // $hasil[$i][3] = $i + 1; //rangking
                // $tot_akhir[$i][4] = $id_kedelai[0][$i];
                // echo $tot_akhir[$i][0] . "| ";
                // echo $tot_akhir[$i][1] . "| ";
                // echo "<br>";
            }

            // echo "<br>";
            // var_dump($tot_akhir);
            // echo "<hr>";
            // echo "<br>";
            // echo "rangking";
            // echo "<br>";
            // var_dump($hasil);
            rsort($tot_akhir);
            // echo "<br>";
            // var_dump($hasil);
            // var_dump($tot_nf);
            // for ($i = 0; $i < count($n1[0]); $i++) {
            //     // echo $tot_akhir[$i][0] . "| ";
            //     // echo $tot_akhir[$i][1] . "| ";
            //     $hasil[$i][3] = $i + 1; //rangking
            // }

            for ($i = 0; $i < count($n1[0]); $i++) {
                // echo $tot_akhir[$i][0] . "| ";
                // echo $tot_akhir[$i][1] . "| ";
                $tot_akhir[$i][3] = $i + 1; //rangking
            }

            $data['kriteria'] = $kriteria;
            $data['nilai'] = $nilai;
            $data['n1'] = $n1;
            $data['id_kedelai'] = $id_kedelai;
            $data['id_as'] = $id_as;
            $data['bxn'] = $bxn;
            $data['p1'] = $p1;
            $data['k1'] = $k1;
            $data['k2'] = $k2;
            $data['v'] = $v;
            $data['q'] = $q;
            $data['p'] = $p;
            $data['d'] = $d;
            $data['index_p'] = $index_p;
            $data['tot_ip'] = $tot_ip;
            $data['tot_index'] = $tot_index;
            $data['tot_index_baru'] = $tot_index_baru;
            $data['tot_lf'] = $tot_lf;
            $data['tot_ef'] = $tot_ef;
            $data['tot_nf'] = $tot_nf;
            $data['hasil'] = $hasil;
            $data['tot_akhir'] = $tot_akhir;
            $data['content'] = "admin/perhitungan/V_perhitungan_prom"; //admin merupakan folder didalam view, v_data_kedelai merupakan file php yg merupakan isi dari halam
            $this->load->view('admin/main', $data); //memanggil file main.php yang berada didalam folder admin pada bagian view, sekaligus menyisipkan $data pada file tsb
        } else { // jika hanya memilih 1 kedelai

            $this->session->set_flashdata('warning', 'Harap Pilih 2 atau lebih data kedelai!');
            redirect(base_url('index.php/c_perhitungan_prom'));
        }
    }

    public function get_normalisasi()
    {
        $id = $this->input->post('id_alternatif');
        $data = $this->M_nilai_alternatif->get_where_rincian($id)->result();
        echo json_encode($data);
    }
}
