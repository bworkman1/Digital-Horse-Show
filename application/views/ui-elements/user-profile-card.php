
<div class="well well-sm wow fadeInUp">
    <div class="row">
        <?php if($this->session->user_id == $video->user_id) { ?>
            <div class="col-sm-3">
                <img src="<?php echo base_url($coach->user_image); ?>" class="img-responsive img-center">
            </div>
            <div class="col-md-9">
                <h3 class="text-info" style="margin-top: 0"><?php echo $coach->first_name.' '.$coach->last_name; ?></h3>
                <h6>Member Since <?php echo date('M d, Y', $video->created_on); ?></h6>
                <?php
                    if($coach->profile_public == 'yes' && $coach->profile_name) {
                        echo '<a href="'.base_url('users/profile/'.$coach->profile_name).'" class="btn btn-info">View Profile</a>';
                    }
                ?>
            </div>
        <?php } else { ?>
            <div class="col-sm-3">
                <img src="<?php echo base_url($user->user_image); ?>" class="img-responsive img-center">
            </div>
            <div class="col-md-9">
                <h3 class="text-info" style="margin-top: 0"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
                <h6>Member Since <?php echo date('M d, Y', $user->created_on); ?></h6>
                <?php
                    if($user->profile_public == 'yes' && $user->profile_name) {
                        echo '<a href="'.base_url('users/profile/'.$coach->profile_name).'" class="btn btn-info">View Profile</a>';
                    }
                ?>
            </div>

        <?php } ?>
    </div>
</div>