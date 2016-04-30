
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
        <div class="well well-sm">
            <h3 class="text-info"><i class="fa fa-key"></i> <?php echo lang('forgot_password_heading');?></h3>
            <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

            <?php $this->load->view('ui-elements/ui-feedback'); ?>

            <?php echo form_open("forgot-password", array('id'=>'forgot-password-form'));?>

                <fieldset class="form-group">
                    <label for="identity"><?php echo (($type=='email') ? sprintf(lang('login_identity_label'), $identity_label) : sprintf(lang('login_identity_label'), $identity_label));?></label> <br />
                    <?php echo form_input($identity);?>
                </fieldset>
                <p>
                    <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                </p>
                <div class="row text-center">
                    <div class="col-md-6">
                        <p>
                            <a href="<?php echo base_url('login'); ?>"><?php echo lang('login_heading');?></a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <a href="<?php echo base_url('create-account'); ?>">Create Account</a>
                        </p>
                    </div>
                </div>


            <?php echo form_close();?>
        </div>
    </div>
</div>