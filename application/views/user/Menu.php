<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Navigation</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('index.php/c_dashboard_user'); ?>" aria-expanded="false">
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
                            <a href="<?= base_url('index.php/user/c_kriteria') ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Daftar Kriteria </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/user/c_sub_kriteria') ?>" class="sidebar-link">
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
                            <a href="<?= base_url('index.php/user/c_kedelai'); ?>" class="sidebar-link">
                                <i class="mdi mdi-book"></i>
                                <span class="hide-menu"> Daftar Alternatif </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/user/c_nilai_alternatif'); ?>" class="sidebar-link">
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
                            <a href="<?= base_url('index.php/user/c_perhitungan_ahp'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Perbandingan Kriteria </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/user/c_perhitungan_prom'); ?>" class="sidebar-link">
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
                            <a href="<?= base_url('index.php/c_dashboard_user/petunjuk_ahp'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Pengisian Perbandingan </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('index.php/c_dashboard_user/petunjuk_spk'); ?>" class="sidebar-link">
                                <i class="mdi mdi-monitor"></i>
                                <span class="hide-menu"> Penjelasan SPK </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('index.php/c_login') ?>" aria-expanded="false">
                        <i class="ti-shift-right"></i>
                        <span class="hide-menu">Masuk</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>