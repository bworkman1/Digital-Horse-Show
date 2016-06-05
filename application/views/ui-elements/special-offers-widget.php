<div id="special-offers-widget">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-tags" aria-hidden="true"></i> Special Offers
        </div>
        <div class="panel-body">

                <?php
                    if($special_offers) {
                        echo '<ul>';
                        foreach($special_offers as $offer) {
                            echo '<li>';
                                echo '<p>'.$offer->offer.'</p>';
                                echo '<p class="muted small">'.date('m-d-Y', strtotime($offer->start_date)).' - '.date('m-d-Y', strtotime($offer->end_date)).'</p>';
                            echo '</li>';
                        }
                        echo '</ul>';

                    } else {
                        echo '<div class="alert alert-info"><h4>No Special Offers</h4><p>Keep checking back for special offers</p></div>';
                    }
                ?>
        </div>
    </div>

</div>