<div id="redeem-points-widget">
    <div class="alert alert-success">
        <h4><i class="fa fa-trophy"></i> <?php echo $points->star_rating; ?> Points</h4>
        <p>You can trade in points for stuff in our gift shop.</p>
        <p><a href="#" class="btn btn-primary">Shop Now</a></p>
    </div>
</div>

<?php if($credits->coaching_credits>0 && $credits->coaching_credits<10) { ?>
    <div class="alert alert-warning">
        <h4><i class="fa fa-warning"></i> Low On Credits</h4>
        <p>You are getting low on credits (<?php echo $credits->coaching_credits; ?>).</p>
        <p><a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase More</a></p>
    </div>
<?php } elseif($credits->coaching_credits == 0) { ?>
    <div class="alert alert-danger">
        <h4><i class="fa fa-warning"></i> Out of Coaching Credits</h4>
        <p>You have no coaching credits. In order to submit videos and receive grades you have to have credits.</p>
        <p><a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase</a></p>
    </div>
<?php } ?>