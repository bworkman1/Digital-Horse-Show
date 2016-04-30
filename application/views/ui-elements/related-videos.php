<ul id="related-videos" class="list-group">
    <li class="list-group-item active">Related Videos:</li>
    <?php
        foreach($related as $val) {
            echo '<li class="list-group-item">';
                echo '<a href="'.base_url('user/my-uploads/view/'.$val->id).'">';
                    echo '<img src="'.base_url($val->thumb).'" class="img-responsive pull-left related-img" width="75" height="50">';
                    echo '<p>'.substr($val->client_name, 0, 40).'</p>';
                    echo '<div class="clearfix"></div>';
                echo '</a>';
            echo '</li>';
        }
    ?>
</ul>