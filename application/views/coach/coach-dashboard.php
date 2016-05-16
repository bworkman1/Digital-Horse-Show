<?php $this->load->view('ui-elements/ui-feedback'); ?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="alert alert-primary text-center">
            <i class="fa fa-trophy fa-3x inset-text-success"></i>
            <h5>You scored <?php echo $scoredThisMonth; ?> rider(s) this month</h5>
        </div>
    </div>

    <div class="col-sm-3 col-sm-6 col-xs-6">
        <div class="alert alert-warning text-center">
            <i class="fa fa-gavel fa-3x"></i>
            <h5><?php echo $waiting_score; ?> Waiting to be scored</h5>
            <a href="<?php echo base_url('coach/scorecard/needs-scored/'); ?>" class="btn btn-default">View</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="alert alert-success text-center">
            <i class="fa fa-money fa-3x"></i>
            <h5>$<?php echo $money_made; ?> Made so far</h5>
            <a href="<?php echo base_url('coach/my-payments'); ?>" class="btn btn-default">View</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="alert alert-info text-center">
            <i class="fa fa-list-alt fa-3x"></i>
            <h5><?php echo $waiting_approval; ?> Waiting Payment</h5>
            <a href="<?php echo base_url('coach/my-payments/waiting-to-be-paid/'); ?>" class="btn btn-default">View</a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o"></i> User Submitted Videos
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