<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/favicon.png">
    <title>Sistem Penunjang Keputusan</title>
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/libs/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>/assets/libs/select2/dist/css/select.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/summernote-bs4.min.css" rel="stylesheet">
    <!-- Popup CSS -->
    <link href="<?= base_url(); ?>/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body data-theme="light">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?= base_url('index.php/c_dashboard_user') ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-icon2.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-icon2.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?= base_url(); ?>/assets/images/logo-light-text2.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url(); ?>/assets/images/logo-light-text2.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse bg-info" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto navbar-">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24 text-white"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url(); ?>/assets/images/users/5.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-info"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-info text-white m-b-10">
                                    <div class=""><img src="<?= base_url(); ?>/assets/images/users/5.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?= $this->session->userdata('nama') ?></h4>
                                        <p class=" m-b-0"><?= $this->session->userdata('user') ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('index.php/c_dashboard_admin/profile') ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#acc_setting"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php $this->load->view("admin/Menu"); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php $this->load->view($content); ?>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Xtreme admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
            <!-- Modal logout -->
            <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Keluar!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin keluar dari sistem?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" onclick="location.href='<?= base_url('index.php/c_login/logout') ?>'" class="btn btn-success">Ya</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Setting -->
            <div class="modal fade" id="acc_setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('index.php/c_dashboard_admin/ac_update_profile') ?>" onsubmit="return validasi_set(this);" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title">Pengaturan Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>ID</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" name="id" class="form-control" value="<?= $this->session->userdata('id') ?>" aria-label="ID" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" name="user" class="form-control" placeholder="Username" aria-label="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="pass_lama" class="form-control" placeholder="Password" aria-label="Password" id="pw_lama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password" id="pw_baru" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password Baru</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" onkeyup="cek_password_set();" id="conf_pw_baru">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="<?= base_url(); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?= base_url(); ?>/dist/js/app.min.js"></script>
    <script src="<?= base_url(); ?>/dist/js/app.init.light-sidebar.js"></script>
    <!-- Theme settings -->
    <script src="<?= base_url(); ?>/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url(); ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>/dist/js/custom.js"></script>

    <!--popup foto JavaScript -->
    <script src="<?= base_url(); ?>assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/magnific-popup/meg.init.js"></script>
    <!--This page JavaScript -->
    <script src="<?= base_url(); ?>/assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?= base_url(); ?>/assets/extra-libs/c3/c3.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/gaugeJS/dist/gauge.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/flot/excanvas.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url(); ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url(); ?>/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <!--Datatable -->
    <script src="<?= base_url(); ?>/assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- <script src="<?= base_url(); ?>/dist/js/pages/datatable/datatable-basic.init.js"></script> -->
    <script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="<?= base_url(); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/summernote-bs4.min.js"></script>
    <!-- Import repeater js  -->
    <script src="<?= base_url(); ?>assets/libs/repeater/jquery.repeater.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/dist/js/pages/dashboards/dashboard2.js"></script><!-- creator  -->
    <script src="<?= base_url(); ?>/assets/libs/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "textarea#mymce",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
            $('#hasil_prom_akhir').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
            $('.datatable-scrollX').DataTable({
                "scrollX": true
            });
            $('.datatable-scrollY').DataTable({
                "scrollY": true
            });
            $('.select2-single').select2();
            $('.select2-multiple').select2();

            $('.summernote').summernote({
                height: 400,
                toolbar: [
                    // [groupName, [list of button]] summernote editor
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // 'use strict';

            $('.repeater').repeater({
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Hapus data terpilih?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            });
        });
    </script>
    <?php $this->load->view('Alert'); ?>
    <script>
        function cek_password_set() {
            $('#conf_pw_baru').removeClass('is-valid');
            $('#conf_pw_baru').removeClass('is-invalid');
            var p1 = $('#pw_baru').val();
            var p2 = $('#conf_pw_baru').val();
            if (p1 == p2) {
                $('#conf_pw_baru').addClass('is-valid');
            } else {
                $('#conf_pw_baru').addClass('is-invalid');
            }
        }

        function validasi_set(form) {
            var p1 = $('#pw_baru').val();
            var p2 = $('#conf_pw_baru').val();
            if (p1 != p2) {
                $('#conf_pw_baru').addClass('is-invalid');
                return false;
            } else {
                return confirm('Simpan Data?');
            }
        }
    </script>


    <script type="text/javascript">
        // $('#cek').click(function() {
        //     $('.opt').prop('selected', true);
        //     console.log('berhasil');
        // });
    </script>
</body>

</html>