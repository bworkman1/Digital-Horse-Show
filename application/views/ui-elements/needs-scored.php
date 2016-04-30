<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-check-circle"></i> Needs Scored
    </div>
    <div class="panel-body">
        <?php
            if(!empty($scored)) {
                echo '<div class="limited-height">';
                    echo '<ul>';
                        foreach($scored as $item) {
                            echo '<li class="needs-scored">';
                                echo '<a href="'.base_url('coach/scorecard/grade/'.$item->id).'">';
                                    echo '<img src="'.base_url($item->user_image).'" class="img-circle pull-left" width="50" height="50">';
                                    echo '<h5 class="no-margin">'.$item->first_name.' '.$item->last_name.'</h5>';
                                    echo '<p><i class="fa fa-calendar"></i> '.date('m-d-Y h:i a', strtotime($item->uploaded)).'</p>';
                                echo '</a>';
                                echo '<div class="clearfix"></div>';
                            echo '</li>';
                        }
                    echo '</ul>';
                echo '</div>';
            } else {
                echo '<i class="fa fa-thumbs-o-up margin text-info fa-3x pull-left"></i>';
                echo '<h5 class="no-margin">You are all caught up</h5>';
                echo '<p>As users submit videos they will show up here.</p>';
            }
        ?>
    </div>
</div>
