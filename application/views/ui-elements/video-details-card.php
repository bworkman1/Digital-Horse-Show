<ul id="related-videos" class="list-group wow fadeInUp">
    <li class="list-group-item active">Upload Details:</li>
    <?php
    echo '<li class="list-group-item">';
    echo '<h5>' . ucwords($video->client_name) . '</h5>';
    echo '<div class="clearfix"></div>';
    echo '<p><b><i class="fa fa-calendar-o"></i> Uploaded:</b> ' . date('m-d-Y', strtotime($video->uploaded)) . '</p>';
    if ($video->location) {
        echo '<p>' . $video->location . '</p>';
    }

    if (!empty($video->cords)) {
        $cords = explode('|', $video->cords);
        echo '<div id="lat" data-lat="' . $cords[0] . '"></div>';
        echo '<div id="lng" data-lng="' . $cords[1] . '"></div>';
        echo '<div id="googleMap" style="height:200px; width: 100%"></div>';
    }
    echo '<br>';


    if ($score) {
        echo '<div class="alert alert-success">
            <b><i class="fa fa-bullseye fa-fw fa-2x pull-left" style="margin-top: -5px"></i> Official Score:</b> '.$video->score.'
            </div>';
        echo '<a href="'.base_url('user/scorecard/view/'.$this->uri->segment('4')).'" class="btn btn-info btn-sm">View Score Card</a>';
    }

    echo '<div class="star-rating" style="margin: 15px 0;">';
    for ($i = 0; $i < 5; $i++) {
        if ($video->star_rating > $i) {
            echo '<i class="fa fa-fw fa-star text-info"></i>';
        } else {
            echo '<i class="fa fa-fw fa-star-o"></i>';
        }
    }
    echo '</div>';
    echo '</li>';
    ?>
</ul>
