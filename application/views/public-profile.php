</div>

<div class="container">

    <div class="row">
        <div class="col-lg-3 col-md-4 text-center">
            <div class="well well-sm">
                <img src="<?php echo base_url($user->user_image); ?>" class="img-responsive img-center">

                <?php
                if($user->email_public) {
                    echo '<br><p class="text-center"><i class="fa fa-envelope"></i> '.safe_mailto($user->email, $user->email).'</p>';
                }

                if($user->profile_public != 'yes') {
                    echo '<p class="text-danger">Only Admin Can View Profile</p>';
                }
                ?>
            </div>

            <?php $this->load->view('ui-elements/carousel-widget', $carousel); ?>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="well well-sm">
                <h3 class="text-info border-bottom" style="margin-top:0;"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
                <h6 style="margin-top:-10px">Member Since <?php echo gmdate('M j, Y', $user->created_on); ?></h6>
                <p><?php echo $user->bio; ?></p>
                <div class="social-links" style="text-align: left">
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
            </div>
            <div class="well well-sm awards">
                <h4 class="border-bottom"><i class="fa fa-trophy"></i> Awards</h4>
                <?php
                    $award = array(
                        'assets/themes/default/images/awards/control.png',
                        'assets/themes/default/images/awards/Showmanship.png'
                    );

                    for($i=0;$i<20;$i++) {
                        $num = rand(0, 1);
                        echo '<img src="'.base_url($award[$num]).'" data-toggle="tooltip" data-placement="top" alt="Award Name" title="Award Name" width="76" height="76">';
                    }

                ?>
            </div>
        </div>
    </div>




<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>