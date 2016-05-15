<div class="row">
    <div class="col-md-3">
        <div class="alert alert-primary">
            <span class='fa fa-cloud-upload block-icon'></span>
            <span class="icon-text"> <?php echo $uploaded; ?> Videos Uploaded</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-warning">
            <span class='fa fa-clock-o block-icon'></span>
            <span class="icon-text"> <?php echo $waiting; ?> Waiting to be Scored</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-info">
            <span class='fa fa-trophy block-icon'></span>
            <span class="icon-text"> <?php echo $score; ?> Best Score</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="alert alert-danger">
            <span class='fa fa-key block-icon'></span>
            <span class="icon-text"><?php echo $last_login; ?> Last Login</span>
        </div>
    </div>
</div>
