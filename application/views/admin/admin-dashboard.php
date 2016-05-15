<br>
<div class="row">
    <div class="col-md-3 col-xs 6">
        <div class="alert alert-primary dashboard-card">
            <a href="<?php echo base_url('admin/users'); ?>" class="pull-left icon-link"><i class="fa fa-users pull-left fa-4x"></i></a>
            <h5><b><?php echo $new_users; ?></b></h5>
            <p>Users <small class="muted">(30 Days)</small></p>
            <a href="<?php echo base_url('admin/users'); ?>" class="view">View</a>
        </div>
    </div>
    <div class="col-md-3 col-xs 6">
        <div class="alert alert-success dashboard-card">
            <a href="#" class="pull-left icon-link"><i class="fa fa-money pull-left fa-4x"></i></a>
            <h5><b>$<?php echo number_format($sales30->amount, 2); ?></b></h5>
            <p>Sales <small>(30 Days)</small></p>
            <a href="<?php echo base_url('admin/sales'); ?>" class="view">View</a>
        </div>
    </div>
    <div class="col-md-3 col-xs 6">
        <div class="alert alert-info dashboard-card">
            <a href="#" class="pull-left icon-link"><i class="fa fa-gavel pull-left fa-4x"></i></a>
            <h5><b><?php echo $coaches; ?></b></h5>
            <p>Coaches <small>(30 Days)</small></p>
            <a href="<?php echo base_url('user/coaches'); ?>" class="view">View</a>
        </div>
    </div>
    <div class="col-md-3 col-xs 6">
        <div class="alert alert-scarlet dashboard-card">
            <a href="#" class="pull-left icon-link"><i class="fa fa-dollar pull-left fa-fw fa-4x"></i></a>
            <h5><b>25</b></h5>
            <p>Needs Paid</p>
            <a href="#" class="view">View</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="well well-sm survey-widget">
            <h5 class="border-bottom"><b><i class="fa fa-list-alt fa-fw"></i> Recent Surveys</b></h5>
            <ul>
                <?php
                    if($surveys) {
                        foreach($surveys as $row) {
                            echo '<li>'.$row->first_name.' '.$row->last_name.' <br><span class="text-muted"><small><i class="fa fa-calendar"></i> '.date('m-d-Y', strtotime($row->ts)).'</small></span><a href="#">View</a></li>';
                        }
                    } else {
                        echo '<li><div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> No surveys completed yet</div></li>';
                    }
                ?>
            </ul>
            <br>
            <?php
                if($surveys) {
                    echo '<a href="#" class="btn btn-info btm-sm">View All</a>';
                }
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="well well-sm survey-widget">
            <h5 class="border-bottom"><b><i class="fa fa-play-circle-o fa-fw"></i> Recent Uploads</b></h5>
            <ul>
                <?php
                    if($recent_uploads) {
                        foreach($recent_uploads as $row) {
                            echo '<li>'.$row->first_name.' '.$row->last_name.' <br>';
                            echo '<span class="text-muted"><small><i class="fa fa-calendar"></i> '.date('m-d-Y', strtotime($row->uploaded)).'</small></span>';
                            echo '<a href="'.base_url('admin/uploads/view/'.$row->id).'">View</a></li>';
                        }
                    } else {
                        echo '<li><div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> No recent uploads</div></li>';
                    }
                ?>
            </ul>
            <br>
            <?php  if($recent_uploads) { ?>
                <a href="<?php echo base_url('admin/uploads/all'); ?>" class="btn btn-primary btm-sm">View All</a>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 style="color: #ffffff;"><i class="fa fa-line-chart"></i> Sales</h5>
            </div>
            <div id="graph-chart" class="panel-body" data-graphurl="<?php echo base_url('admin/dashboard/getSalesGraphValues'); ?>">
                <canvas id="linechart-canvas" height="300" width="550"></canvas>
            </div>
        </div>
    </div>
</div>

<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>