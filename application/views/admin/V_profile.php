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
                        <li class="breadcrumb-item"><a href="<?= base_url('index.php/c_dashboard_admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="<?= base_url(); ?>/assets/images/users/5.jpg" class="rounded-circle" width="150" />
                        <h4 class="card-title m-t-10"><?= $this->session->userdata('nama'); ?></h4>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                    <font class="font-medium"><?= $this->session->userdata('id'); ?></font>
                                </a></div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Lengkap</strong>
                                    <br>
                                    <p class="text-muted"><?= $this->session->userdata('nama'); ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                    <br>
                                    <p class="text-muted"><?= $this->session->userdata('nama'); ?></p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Password</strong>
                                    <br>
                                    <p class="text-muted">*********</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="<?= base_url('index.php/c_dashboard_admin/ac_update_nama/' . $this->session->userdata('id')) ?>" method="POST" onsubmit="return confirm('Simpan Perubahan?')">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nama" id="inp_user" value="<?= $this->session->userdata('nama') ?>" class="form-control form-control-line" readonly>
                                        <div class="form-check form-check-inline mt-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="inp_check" onclick="showHideSub(this.checked)">
                                                <label class="custom-control-label" for="inp_check">Edit</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="btn_sub" style="display: none;">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>

<script>
    function showHideSub(isChecked) {
        if (isChecked) {
            $("#btn_sub").show()
            $("#inp_user").removeAttr("readonly");
        } else {
            $("#btn_sub").hide()
            $("#btn_sub input[type=checkbox]").removeAttr("checked");
            $("#inp_user").attr('readonly', true);

        }

    }
</script>