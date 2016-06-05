<ul id="related-videos" class="list-group wow fadeInUp">
    <li class="list-group-item active">Upload Details:</li>
    <?php
    echo '<li class="list-group-item">';
    echo '<h5><b>' . ucwords($video->client_name) . '</b></h5>';
    echo '<div class="clearfix"></div>';
    echo '<h6 style="margin-bottom: 0"><b>Uploaded:</b></h6><p>' . date('m-d-Y', strtotime($video->uploaded)) . '</p>';
    if ($video->horse) {
        echo '<h6 style="margin-bottom: 0"><b>Horse Name:</b></h6><p>' . htmlspecialchars($video->horse) . '</p>';
    }
    if ($video->barn) {
        echo '<h6 style="margin-bottom: 0"><b>Barn Name:</b></h6><p>' . htmlspecialchars($video->barn) . '</p>';
    }
    if ($video->user_comment) {
        echo '<h6 style="margin-bottom: 0"><b>Comment:</b></h6><p>' . htmlspecialchars($video->user_comment) . '</p>';
    }

    if ($score) {
        echo '<div class="alert alert-success">
            <b><i class="fa fa-bullseye fa-fw fa-2x pull-left" style="margin-top: -5px"></i> Official Score:</b> '.$video->score.'
            </div>';
        echo '<a href="'.base_url('user/scorecard/view/'.$this->uri->segment('4')).'" class="btn btn-info btn-sm">View Score Card</a>';
    }

    if($video->star_rating>0) {
        echo '<div class="star-rating" style="margin: 15px 0;">';
        for ($i = 0; $i < 5; $i++) {
            if ($video->star_rating > $i) {
                echo '<i class="fa fa-fw fa-star text-info"></i>';
            } else {
                echo '<i class="fa fa-fw fa-star-o"></i>';
            }
        }
    }
    echo '</div>';
    echo '</li>';
    ?>
</ul>
