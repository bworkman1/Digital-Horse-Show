<?php $this->load->view('ui-elements/ui-feedback'); ?>

<div class="row">

    <div class="col-md-4">
        <?php $this->load->view('ui-elements/needs-scored', $scored); ?>
    </div>

    <div class="col-md-3">
        <div class="alert alert-success text-center">
            <i class="fa fa-trophy fa-5x inset-text-success"></i>
            <h5>You scored <?php echo $scoredThisMonth; ?> rider(s) this month.</h5>
        </div>
        <div class="alert alert-success text-center">
            <i class="fa fa-gavel fa-5x"></i>
            <h5><?php echo $credits['left']; ?> still need scored.</h5>
            <a href="<?php echo base_url('coach/score-card/needs-scored/'); ?>" class="btn btn-info">View</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="alert alert-success text-center">
            <i class="fa fa-ticket fa-5x"></i>
            <h5><?php echo $credits['total']; ?> users have bought credits for you.</h5>
        </div>
    </div>

</div>







<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>