</div>
<div class="page-title-options">
    <div class="row">
        <div class="col-md-9">
            <h5><i class="fa fa-bullhorn"></i> Registered Coaches</h5>
        </div>
        <div class="col-md-3">
            <?php
            echo form_open('user/my-uploads/sort', array('style'=>'margin:0;'));
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
<div class="container">
    <?php $this->load->view('ui-elements/ui-feedback'); ?>

    <?php
    $count = 0;
    if($coaches) {
        echo '<div class="row coaches">';
        foreach ($coaches as $val) {
            $link = base_url('profile/user/'.$val->profile_name);
            echo '<div class="col-md-4 col-sm-6">';
                echo '<div class="well well-sm wow fadeInUp" data-wow-delay="' . ($count * 10) . 'ms">';
                    echo '<div class="row coach">';
                        echo '<div class="col-md-4">';
                            echo '<a href="' . $link . '">';
                                echo '<img src="' . base_url($val->user_image) . '" class="img-responsive img-center">';
                            echo '</a>';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                            echo '<h4 style="margin: 0">' . htmlspecialchars($val->first_name.' '.$val->last_name) . '</h4>';
                            echo '<p style="margin:0; padding: 0;"><b><i class="fa fa-calendar-o fa-fw text-primary" style="margin-top: 8px;"></i> Joined: </b>' . date('m-d-Y', $val->created_on).'</p>';
                            echo '<p style="margin:0; padding: 0;"><b><i class="fa fa-check-circle fa-fw text-success" style="margin-top: 8px;"></i>Users Scored: </b>'.$val->scored.'</small></p>';
                        echo '</div>';
                    echo '</div>';
                    echo '<hr style="margin: 8px">';
                    $data = array(
                        'url' => $link,
                        'id' => $val->id,
                        'payments' => $val->payments,
                        'surveys' => $val->surveys,
                        'waiting' => $val->waiting,
                    );

                    $this->load->view('ui-elements/Coach-admin-labels', $data);
                echo '</div>';
            echo '</div>';

            $count++;
            if ($count % 3 == 0) {
                echo '</div><div class="row">';
            }
        }
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> No Registered Coaches Yet</div>';
    }

    echo $links;

    ?>



    <div id="menu-page" data-page="<?php echo $page_name; ?>"></div>