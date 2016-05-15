<?php if ($this->ion_auth->in_group('admin')) { ?>
<p>
    <?php
        if($surveys) {
            echo '<span class="label label-success" style="margin-right: 5px">'.$surveys.' Surveys</span>';
        }

        if($payments) {
            echo '<span class="label label-danger" style="margin-right: 5px">'.$payments.' Pending Payments</span>';
        }

        if($waiting) {
            echo '<span class="label label-info">'.$waiting.' Waiting</span>';
        }
    ?>
    <div class="clearfix"></div>
<?php } ?>
<a href="<?php echo $url; ?>" class="btn btn-primary btn-sm pull-left">Full Profile</a>

<?php if ($this->ion_auth->in_group('admin')) { ?>
    <div class="btn-group pull-right">
        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#"><span class="badge"><?php echo $payments; ?></span> View Surveys</a></li>
            <li><a href="<?php echo base_url('admin/view/pay-coach/'.$id); ?>"><span class="badge"><?php echo $payments; ?></span> Pay Coach</a></li>

            <li><a href="<?php echo base_url('admin/view/coach-payments/'.$id); ?>"><span class="badge"><?php echo $payments; ?></span> View Payments</a></li>
            <li><a href="<?php echo base_url('admin/view/waiting-to-be-scored/'.$id); ?>"><span class="badge"><?php echo $waiting; ?></span> Waiting Scores</a></li>

            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('admin/users/all-users/edit/'.$id); ?>"><i class="fa fa-pencil"></i> Edit Coach</a></li>

        </ul>
    </div>
<?php } ?>
<div class="clearfix"></div>