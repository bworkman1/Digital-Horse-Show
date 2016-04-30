</div>
<h5 class="page-title"><i class="fa fa-user"></i> My Profile</h5>
<div class="container">
<div class="well well-sm">
    <div class="row">
        <div class="col-lg-3 col-md-4 text-center">
            <img src="<?php echo base_url($user->user_image); ?>" class="img-responsive img-center">
            <div class="social-links">
                <?php
                    if($user->facebook) {
                        echo '<a href="'.$user->facebook.'" target="_blank" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>';
                    }
                    if($user->google) {
                        echo '<a href="'.$user->google.'" target="_blank" class="google"><i class="fa fa-google fa-fw"></i></a>';
                    }
                    if($user->twitter) {
                        echo '<a href="'.$user->twitter.'" target="_blank" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>';
                    }
                    if($user->instagram) {
                        echo '<a href="'.$user->instagram.'" target="_blank" class="instagram"><i class="fa fa-instagram fa-fw"></i></a>';
                    }
                ?>
            </div>
            <?php
                if($user->email_public) {
                    echo '<p class="text-center">'.safe_mailto($user->email, $user->email).'</p>';
                }

                if($user->profile_public != 'yes') {
                    echo '<p class="text-danger">Your profile is set to private, only you can see your profile page.</p>';
                }
            ?>
        </div>
        <div class="col-lg-9 col-md-8">
            <h3 class="text-info" style="margin-top:0;"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
            <h6>Member Since <?php echo gmdate('M j, Y', $user->created_on); ?></h6>
            <p><?php echo $user->bio; ?></p>
            <a href="<?php echo base_url('user/my-profile/edit'); ?>" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="well well-sm well-primary">
            <h4>My Awards</h4>
            <p>Building this out once we get everything else done</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-sm well-primary">
            <h4>My Uploads</h4>
            <?php echo count($videos); ?>
            <p>Building this out once we get everything else done</p>
        </div>
    </div>
    <div class="col-md-4">

    </div>

</div>


<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>