</div>

<div class="page-title-options">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h5><i class="fa fa-upload text-info"></i> User Uploads</h5>
            </div>
            <div class="col-md-3">
                <?php
                    echo form_open('admin/uploads/sort', array('style'=>'margin:0;'));
                        echo '<select class="form-control" name="sort_by" onchange="this.form.submit()">';
                        foreach($options as $key => $val) {
                            $sortBy = $this->session->userdata('video_sort');
                            if($sortBy == $key) {
                                echo '<option value="'.$key.'" selected="selected">'.$val.'</option>';
                            } else {
                                echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        }
                        echo '</select>';
                    echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container">

<?php $this->load->view('ui-elements/ui-feedback'); ?>

<?php
$count = 0;
if($videos) {
    echo '<div class="row">';
    foreach ($videos as $val) {
        $link = base_url('/admin/uploads/view/' . $val->id);
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
        echo '<a href="' . $link . '" class="btn btn-primary">View</a>';
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
            echo '<b><i class="fa fa-exclamation-triangle text-info"></i> Waiting On Score</b>';
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
    echo '<div class="alert alert-primary"><i class="fa fa-exclamation-triangle"></i> No users have uploaded any videos yet</div>';
}

echo $links;

?>

<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>
