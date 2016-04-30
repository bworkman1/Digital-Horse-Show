<div class="well well-sm wow fadeInUp">
    <?php echo form_open('user/my-uploads/submit-comment', array('id'=>'add-comment-form')); ?>
        <h5 class="border-bottom"><i class="fa fa-comment"></i> Leave A Comment:</h5>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-2 col-xs-3">
                <img src="<?php echo base_url($this->session->userdata('user_image')); ?>" class="img-responsive" alt="">
            </div>
            <div class="col-lg-10 col-md-9 col-sm-10 col-xs-9">
                <textarea id="comment-field" name="comment" class="form-control"></textarea>
            </div>
        </div>
        <br>
        <input type="hidden" name="video_id" value="<?php echo $this->uri->segment(4); ?>" required>
        <button id="add-comment" type="submit" class="btn btn-primary pull-right" style="margin-left: 15px;">Submit</button>
        <button id="cancel-comment" class="btn btn-default pull-right">Cancel</button>
        <div class="clearfix"></div>
    <?php echo form_close(); ?>
</div>