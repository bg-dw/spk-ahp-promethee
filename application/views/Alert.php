<?php if ($this->session->flashdata('success')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            swal("Sukses!", "<?php echo $this->session->flashdata('success'); ?>", "success");
        });
    </script>
<?php } else if ($this->session->flashdata('warning')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            swal("Peringatan!", "<?php echo $this->session->flashdata('warning'); ?>", "warning");
        });
    </script>
<?php } ?>