<div class="row">
  <div class="col-lg-4 col-md-6 col-lg-offset-4 col-md-offset-3">
      <div class="well well-sm">
          <h3 class="text-info"><i class="fa fa-lock"></i> <?php echo lang('login_heading');?></h3>
          <p><?php echo lang('login_subheading');?></p>

          <?php $this->load->view('ui-elements/ui-feedback'); ?>

          <?php echo form_open("login", array("id"=>"login-form"));?>

          <fieldset class="form-group">
              <?php echo lang('login_identity_label', 'identity');?>
              <?php echo form_input($identity);?>
          </fieldset>

          <fieldset class="form-group">
              <?php echo lang('login_password_label', 'password');?>
              <?php echo form_input($password);?>
          </fieldset>

          <fieldset class="form-group">
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              <?php echo lang('login_remember_label', 'remember');?>
          </fieldset>
          <p>
              <button type="submit" name="submitButton" class="btn btn-primary">Login</button>
          </p>

          <?php echo form_close();?>

          <div class="row text-center">
              <div class="col-md-6">
                  <p><a href="<?php echo base_url('forgot-password'); ?>"><?php echo lang('login_forgot_password');?></a></p>
              </div>
              <div class="col-md-6">
                  <p><a href="<?php echo base_url('create-account'); ?>"><?php echo lang('create_user_heading');?></a></p>
              </div>
          </div>
      </div>
  </div>
</div>
