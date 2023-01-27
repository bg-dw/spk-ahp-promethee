<?php if ($this->session->flashdata('success')) { ?>
    <script>
        setTimeout(function() {
            $('#alert_success').toggle(500);
        }, 4000);
    </script>
    <div id="alert_success" class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <center>
                <?= $this->session->flashdata('success') ?>
            </center>
        </div>
    </div>
<?php } else if ($this->session->flashdata('warning')) { ?>
    <script>
        setTimeout(function() {
            $('#alert_warning').toggle(500);
        }, 4000);
    </script>
    <div id="alert_warning" class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <center>
                <?= $this->session->flashdata('warning') ?>
            </center>
        </div>
    </div>
<?php } ?>