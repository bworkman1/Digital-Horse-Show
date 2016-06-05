<div id="whats-new-widget">

    <div class="panel panel-info">
        <div class="panel-heading">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> Whats New
        </div>
        <div class="panel-body">
            <ul class="list-unstyled">
                <?php
                    foreach($new as $item) {
                        echo '<li>';
                            echo '<p>'.$item->what;
                            if($item->type == 'scorecard') {
                                echo '<a class="btn btn-sm btn-primary" href="'.base_url('user/scorecard/preview/'.$item->ref_id).'">View</a>';
                            }

                            echo '</p>';
                        echo '</li>';
                    }
                ?>

            </ul>
        </div>
    </div>

</div>