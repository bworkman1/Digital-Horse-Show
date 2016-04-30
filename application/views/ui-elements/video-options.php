<div id="videoOptions" class="wow fadeInUp">
    <?php
    if ($video->flagged == 'y') {
        echo '<a disabled class="btn btn-warning"><i class="fa fa-flag fa-fw"></i> Video Reported</a>';
    } else {
        echo '<a href="#" data-target="#report" data-toggle="modal" class="btn btn-warning"><i class="fa fa-flag fa-fw"></i> Report Video</a>';
    }
    ?>

    <?php
        if($video->user_id == $this->session->userdata('user_id')) {
            if($user->profile_public == 'yes') {
                echo '<a href="" class="btn btn-success"><i class="fa fa-user"></i> View Profile</a>';
            }
        }
    ?>

    <?php if ($this->ion_auth->in_group('admin')) { ?>
        <a href="" id="deleteVideo" data-target="#delete" data-toggle="modal" class="btn btn-danger"><i
                class="fa fa-times fa-fw"></i> Delete Video</a>
    <?php } ?>

    <?php if ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('coach')) { ?>
        <a href="<?php echo base_url('coach/score-card/grade-ride/'.$this->uri->segment(4)); ?>" class="btn btn-info"><i class="fa fa-list fa-fw"></i> Grade Ride</a>
    <?php } ?>
</div>
<div id="report" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-danger">Report Video To Admin</h4>
            </div>
            <div class="modal-body">
                <p>You are about to report this video to the admin for any of the following reasons.</p>
                <label><input type="radio" name="reason"> Violations</label><br>
                <label><input type="radio" name="reason"> Violations</label><br>
                <label><input type="radio" name="reason"> Other</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Submit Report</button>
            </div>
        </div>
    </div>
</div>


<?php if ($this->ion_auth->in_group('admin')) { ?>
    <div id="delete" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-danger">Are you sure you want to delete this?</h4>
                </div>
                <div class="modal-body">
                    <p>Deleting this video cannot be undone and will delete all scores and comments associated with this
                        video.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url('user/my-uploads/delete-video/' . $video->id); ?>"
                       class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>