<div class="row">
      <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <div class="well well-sm">
                  <h3 class="text-info"><i class="fa fa-user"></i> <?php echo lang('create_user_heading');?></h3>
                  <p><?php echo lang('create_user_subheading');?></p>

                  <?php $this->load->view('ui-elements/ui-feedback'); ?>

                  <?php echo form_open("create-account", array('id'=>'create-account-form'));?>
                        <div class="row">
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <span class="text-danger">*</span> <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                                          <?php echo form_error('first_name'); ?>
                                          <?php echo form_input($first_name);?>
                                    </fieldset>
                              </div>
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <span class="text-danger">*</span> <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                                          <?php echo form_error('last_name'); ?>
                                          <?php echo form_input($last_name);?>
                                    </fieldset>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col-md-6">
                                    <?php
                                          if($identity_column!=='email') {
                                                echo '<fieldset class="form-group"><span class="text-danger">*</span> ';
                                                echo lang('create_user_identity_label', 'identity');
                                                echo '<br />';
                                                echo form_error('identity');
                                                echo form_input($identity);
                                                echo '</fieldset>';
                                          }
                                    ?>
                              </div>
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <span class="text-danger">*</span> <?php echo lang('create_user_email_label', 'email');?> <br />
                                          <?php echo form_error('email'); ?>
                                          <?php echo form_input($email);?>
                                    </fieldset>
                              </div>
                        </div>


                        <div class="row">
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <?php echo lang('create_user_phone_label', 'phone');?> <br />
                                          <?php echo form_error('phone'); ?>
                                          <?php echo form_input($phone);?>
                                    </fieldset>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <span class="text-danger">*</span>  <?php echo lang('create_user_password_label', 'password');?> <br />
                                          <?php echo form_error('password'); ?>
                                          <?php echo form_input($password);?>
                                    </fieldset>
                              </div>
                              <div class="col-md-6">
                                    <fieldset class="form-group">
                                          <span class="text-danger">*</span> <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                                          <?php echo form_error('password_confirm'); ?>
                                          <?php echo form_input($password_confirm);?>
                                    </fieldset>
                              </div>
                        </div>
                        <fieldset class="form-group">
                              <label><?php echo form_checkbox('terms', '1', FALSE, 'id="terms"');?> I agree to the <a href="#" target="_blank"><?php echo lang('create_user_terms_label', 'terms');?></a>
                             </label>
                              <?php echo form_error('terms'); ?>
                        </fieldset>
                        <hr>
                        <p><button type="submit" name="submitButton" class="btn btn-primary">Create Account</button></p>

                  <?php echo form_close();?>

                  <div class="row text-center">
                        <div class="col-md-6">
                              <p><a href="<?php echo base_url('forgot-password'); ?>"><?php echo lang('login_forgot_password');?></a></p>
                        </div>
                        <div class="col-md-6">
                              <p><a href="<?php echo base_url('login'); ?>"> Login</a></p>
                        </div>
                  </div>
            </div>
      </div>
</div>
