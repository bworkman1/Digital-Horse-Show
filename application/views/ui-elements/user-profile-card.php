
<div class="well well-sm wow fadeInUp">
    <div class="row">
        <div class="col-sm-3">
            <img src="<?php echo base_url($profile->user_image); ?>" class="img-responsive img-center">
        </div>
        <div class="col-md-9">
            <h3 class="text-info" style="margin-top: 0"><?php echo $profile->first_name.' '.$profile->last_name; ?></h3>
            <h6>Member Since <?php echo date('M d, Y', $profile->created_on); ?></h6>
            <?php
                if($profile->profile_public == 'yes' && $profile->profile_name) {
                    echo '<a href="'.base_url('users/profile/'.$profile->profile_name).'" class="btn btn-info">View Profile</a>';
                }
            ?>
        </div>

    </div>
</div>