<div id="recent-comments" class="card card-purple">
    <div class="card-head">
        <h5><i class="fa fa-comments"></i> <?php echo count($recentComments); ?> Recent Comment(s)</h5>
    </div>
    <?php
        echo '<ul>';
            if($recentComments) {
                echo '<ul>';
                foreach($recentComments as $val) {
                    echo '<li>';
                    echo '<a href="'.base_url('user/profile/view/'.$val->video_id).'">';
                    echo '<img src="'.base_url($val->user_image).'" class="img-circle pull-left" width="40" height="40">';
                    if($val->profile_public == 'yes') {
                        echo '<h6>'.$val->first_name.'</h6>';
                    } else {
                        echo '<h6>'.$val->first_name.'</h6>';
                    }
                    echo substr($val->comment, 0, 75).'</p>';
                    echo '<div class="clearfix"></div>';
                    echo '</a>';
                    echo '</li>';
                }

            } else {
                echo '<li class="no-style"><p>No Comments have been left on any of your videos. Once someone leaves a comment you will see it here.</p><br></li>';
            }
        echo '</ul>';
    ?>
</div>