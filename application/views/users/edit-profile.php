</div>
<h5 class="page-title"><i class="fa fa-pencil"></i> Edit My Profile</h5>
<div class="container">
<?php $this->load->view('ui-elements/ui-feedback'); ?>

<?php echo form_open_multipart('user/my-profile/save/', array('id'=>'edit-profile')); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="well well-sm">
                <h5 class="border-bottom"><i class="fa fa-user"></i> Personal Details</h5>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <span class="text-danger">*</span> <?php echo lang('edit_user_fname_label', 'first-name');?>
                            <input id="first-name" name="first_name" type="text" value="<?php echo htmlspecialchars($user->first_name); ?>" class="form-control input-md" required>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <span class="text-danger">*</span> <?php echo lang('edit_user_validation_lname_label', 'last-name');?>
                            <input id="last-name" name="last_name" type="text" class="form-control input-md" value="<?php echo htmlspecialchars($user->last_name); ?>" required>
                        </fieldset>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <span class="text-danger">*</span> <?php echo lang('edit_user_email_label', 'email');?>
                            <input id="email" name="email" type="text" value="<?php echo htmlspecialchars($user->email); ?>" class="form-control input-md" required>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('picture_label', 'my-picture');?>
                            <input id="my-picture" name="file" type="file" class="form-control input-md">
                        </fieldset>
                    </div>

                </div>

                <fieldset class="form-group">
                    <?php echo lang('bio_label', 'bio');?>
                    <textarea id="bio" name="bio" style="height: 150px" maxlength="999" class="form-control input-md" placeholder="Write a short bio about yourself"><?php echo htmlspecialchars($user->bio); ?></textarea>
                </fieldset>

                <div class="row">

                    <div class="col-md-6 text-right hidden-sm hidden-xs">
                        <div style="height:30px"></div>
                        <h6 class="text-primary">http://digitalhorseshow.com/user/profile/</h6>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('profile_name_label', 'profile_name');?>
                            <input id="profile_name" name="profile_name" type="text" value="<?php echo htmlspecialchars($user->profile_name); ?>" class="form-control input-md" required>
                        </fieldset>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-warning">Save Settings</button>
                <div data-target="#change-password" data-toggle="modal" class="btn btn-info pull-right">Change Password</div>
            </div>

            <div class="well well-sm">
                <h5 class="border-bottom"><i class="fa fa-bullhorn"></i> Social Settings</h5>

                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('facebook_label', 'facebook');?>
                            <input id="first-name" name="facebook" type="text" value="<?php echo htmlspecialchars($user->facebook); ?>" class="form-control input-md" placeholder="https://facebook.com/profile">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('twitter_label', 'twitter');?>
                            <input id="last-name" name="twitter" value="<?php echo htmlspecialchars($user->twitter); ?>" type="text" class="form-control input-md" placeholder="https://twitter.com/profile">
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('google_plus_label', 'google');?>
                            <input id="first-name" name="google" type="text" value="<?php echo htmlspecialchars($user->google); ?>" class="form-control input-md" placeholder="https://googleplus.com/profile">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <?php echo lang('instagram_label', 'instagram');?>
                            <input id="instagram" name="instagram" type="text" value="<?php echo htmlspecialchars($user->instagram); ?>" class="form-control input-md" placeholder="https://instagram.com/profile">
                        </fieldset>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-warning">Save Settings</button>
            </div>

        </div>
        <div class="col-md-3">

            <div id="user-photo" class="well well-sm">

                <h5 class="border-bottom"><i class="fa fa-image"></i> My Photo</h5>
                <img src="<?php echo base_url($user->user_image); ?>" class="img-responsive img-center">
                <br>
                <?php if($user->user_image != '/assets/themes/default/images/user-default.jpg') { ?>
                    <div class="text-center">
                        <a href="<?php echo base_url('user/my-profile/delete-image'); ?>"><i class="fa fa-times"></i> Delete Image</a>
                    </div>
                <?php } ?>
            </div>

            <div id="settings" class="well well-sm">

                <h5 class="border-bottom"><i class="fa fa-gears"></i> Settings</h5>

                <div class="border-bottom option">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-xs-8 control-label" for="checkboxes">In-App Emails</label>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label for="emails-on" class="pull-right">
                                        <input type="checkbox" name="emails_on" id="emails-on" value="yes" <?php if($user->emails_on=='yes'){echo 'checked';}?>>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom option">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-xs-8 control-label" for="checkboxes">Receive Newsletters</label>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label for="newsletter" class="pull-right">
                                        <input type="checkbox" name="newsletter" id="newsletter" value="yes" <?php if($user->newsletter=='yes'){echo 'checked';}?>>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom option">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-xs-8 control-label" for="email-public">Public Email</label>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label for="email-public" class="pull-right">
                                        <input type="checkbox" name="email_public" id="email-public" value="yes" <?php if($user->email_public=='yes'){echo 'checked';}?>>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom option">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-xs-8 control-label" for="profile-public">Public Profile</label>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label for="profile-public" class="pull-right">
                                        <input type="checkbox" name="profile_public" id="profile-public" value="yes" <?php if($user->profile_public=='yes'){echo 'checked';}?>>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-warning btn-block">Save Settings</button>

            </div>
        </div>
    </div>


<?php echo form_close(); ?>

<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php echo form_open('user/my-profile/password', array('id'=>'change-password')); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group">
                        Old Password
                        <input id="first-name" name="old" type="password" class="form-control input-md">
                    </fieldset>
                    <fieldset class="form-group">
                        Password
                        <input id="first-name" name="password" type="password" class="form-control input-md">
                    </fieldset>
                    <fieldset class="form-group">
                        Confirm Password
                        <input id="first-name" name="confirm_password" type="password" class="form-control input-md">
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>