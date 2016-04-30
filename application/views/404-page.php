<img src="<?php echo base_url('assets/themes/default/images/404-page-horse.jpg'); ?>" class="bg">

<div id="box-404" class="row">
    <div class="col-md-7 col-md-offset-5">
        <div class="well well-sm well-colored">
            <div id="error-box" class="pull-left">
                <h1 style="margin-top: 0; margin-bottom: 0">404</h1>
                <h3 class="highlight">Error</h3>
            </div>
            <h3 style="margin-top: 0">Oops! That Page Can’t Be Found.</h3>
            <h5>It looks like nothing was found at this location.</h5>
            <p>Try one of the links above or if you feel this is in error, <a href="#" data-target="#error"
                                                                              data-toggle="modal">contact support</a>.
            </p>
        </div>
    </div>
</div>


<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo form_open('error-404/contact-support', array('id'=>'support-form')); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">We Are Here To Help</h4>
                </div>
                <div class="modal-body">

                    <fieldset class="form-group">
                        <label for="email"><span class="text-danger">*</span> Email:</label>
                        <input class="form-control" maxlength="50" id="email" name="email"
                               value="<?php echo $this->session->userdata('email'); ?>" required>
                    </fieldset>

                    <fieldset class="form-group">
                        <label><span class="text-danger">*</span> Additional Info</label>
                        <textarea maxlength="500" class="form-control"
                                  name="info">What were you trying to do or go to?</textarea>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="url">Broken Url:</label>
                        <input class="form-control" maxlength="100" id="url" name="url"
                            readonly="readonly" value="<?php echo current_url(); ?>">
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit" class="btn btn-info"><i class="fa fa-paper-plane"></i> Send</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>