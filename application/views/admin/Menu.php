<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="<?= base_url(); ?>/assets/images/users/5.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium"><?= $this->session->userdata('nama') ?> <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"><?= $this->session->userdata('user') ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="<?= base_url('index.php/c_dashboard_admin/profile') ?>"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#acc_setting"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Navigation</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('index.php/c_dashboard_admin'); ?>" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu">Kriteria </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_kriteria') ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Daftar Kriteria </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_sub_kriteria') ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Daftar Sub Kriteria </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="hide-menu">Alternatif </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_kedelai'); ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Daftar Alternatif </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_nilai_alternatif'); ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Nilai Alternatif </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Perhitungan </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_perhitungan_ahp'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Perbandingan Kriteria </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_perhitungan_prom'); ?>" class="sidebar-link">
                                <i class="mdi mdi-laptop"></i>
                                <span class="hide-menu"> Perbandingan Alternatif </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Extra</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-content-paste"></i>
                        <span class="hide-menu">Petunjuk </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_dashboard_admin/petunjuk_ahp'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Pengisian Perbandingan </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_dashboard_admin/petunjuk_spk'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Penjelasan SPK </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false" data-toggle="modal" data-target="#logout">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>