</div>
<h5 class="page-title"><i class="fa fa-gavel"></i> Needs Graded</h5>
<div class="container">
    <?php $this->load->view('ui-elements/ui-feedback'); ?>

    <?php
    $count = 0;
    if($videos) {
        echo '<div class="row">';
        foreach ($videos as $val) {

            $link = base_url('coach/scorecard/grade/' . $val->id);
            echo '<div class="col-md-3 col-sm-6">';
            echo '<div class="well well-sm wow fadeInUp" data-wow-delay="' . ($count * 10) . 'ms">';

            if ($val->flagged == 'y') {
                echo '<div class="marked"><i class="fa fa-flag"></i></div>';
            }

            echo '<a href="' . $link . '">';
            if (!file_exists($val->thumb)) {
                $val->thumb = base_url('assets/themes/default/images/video-default.jpg');
            }
            echo '<img src="' . $val->thumb . '" class="img-responsive">';
            echo '</a>';

            echo '<h4>' . htmlspecialchars($val->client_name) . '</h4>';

            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo '<small></small><i class="fa fa-calendar-o fa-fw"></i> ' . date('m-d-Y', strtotime($val->uploaded));
            echo '<br><i class="fa fa-clock-o fa-fw"></i> ' . date('h:i a', strtotime($val->uploaded)) . '</small>';
            echo '</div>';
            echo '<div class="col-md-6 text-right">';
            echo '<a href="' . $link . '" class="btn btn-primary">Grade</a>';
            echo '</div>';
            echo '</div>';

            if($val->star_rating>0) {
                echo '<div class="well-footer">';
                echo '<div class="star-rating pull-left">';
                for ($i = 0; $i < 5; $i++) {
                    if ($val->star_rating > $i) {
                        echo '<i class="fa fa-fw fa-star text-info"></i>';
                    } else {
                        echo '<i class="fa fa-fw fa-star-o"></i>';
                    }
                }
                echo '</div>';

                echo '<div class="pull-right">';
                echo '<b>Score:</b> '.$val->total;
                echo '</div>';
                echo '</div>';

                echo '<div class="clearfix"></div>';
            } else {
                echo '<div class="well-footer">';
                echo '<b>Score coming soon</b>';
                echo '</div>';
            }


            echo '</div>';
            echo '</div>';

            $count++;
            if ($count % 4 == 0) {
                echo '</div><div class="row">';
            }
        }
        echo '</div>';
    } else {
        if($this->session->userdata('user_type') == 'coach') {
            echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> No users have submitted any videos to you yet, check back later.</div>';
        } else {
            echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You haven\'t uploaded any videos yet</div>';
            echo '<a href="'.base_url('user/upload-video').'" class="btn btn-primary"><i class="fa fa-upload"></i> Upload Video</a>';
        }

    }

    echo $links;

    ?>

    <div id="menu-page" data-page="<?php echo 'grade'; ?>"></div>
