<?php $this->load->view('ui-elements/ui-feedback'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="alert alert-primary text-center">
            <i class="fa fa-trophy fa-3x inset-text-success"></i>
            <h5>You scored <?php echo $scoredThisMonth; ?> rider(s) this month.</h5>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="alert alert-warning text-center">
            <i class="fa fa-gavel fa-3x"></i>
            <h5><?php echo $credits['left']; ?> still need scored.</h5>
            <a href="<?php echo base_url('coach/score-card/needs-scored/'); ?>" class="btn btn-default">View</a>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="alert alert-success text-center">
            <i class="fa fa-gavel fa-3x"></i>
            <h5><?php echo $credits['left']; ?> still need scored.</h5>
            <a href="<?php echo base_url('coach/score-card/needs-scored/'); ?>" class="btn btn-info">View</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="alert alert-info text-center">
            <i class="fa fa-ticket fa-3x"></i>
            <h5><?php echo $credits['total']; ?> users have bought credits for you.</h5>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-info">
            <div class="panel-heading">
                User Submitted Videos
            </div>
            <div class="panel-body" id="graph-chart" data-graphurl="<?php echo base_url('coach/dashboard/getCoachVideos'); ?>">
                <div id="noneFound"></div>
                <canvas id="linechart-canvas" height="300" width="550"></canvas>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <?php $this->load->view('ui-elements/needs-scored', $scored); ?>
    </div>
</div>









<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>