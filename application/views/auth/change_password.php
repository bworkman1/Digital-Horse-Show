<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
        <div class="well well-sm">
            <h3 class="text-warning"><?php echo lang('reset_password_heading');?></h3>

            <?php $this->load->view('ui-elements/ui-feedback'); ?>
            <?php
            if(!empty($message)) {
                echo '<div class="alert alert-danger">';
                echo '<i class="fa fa-times-circle fa-fw fa-3x pull-left"></i>';
                echo '<p><b>Error: </b>' . $message . '</p>';
                echo '</div>';
            }
            ?>
            <?php echo form_open('forgot-password/reset/' . $code);?>

            <p>
                <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
                <?php echo form_input($new_password);?>
            </p>

            <p>
                <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                <?php echo form_input($new_password_confirm);?>
            </p>


            <?php echo form_input($user_id);?>
            <?php echo form_hidden($csrf); ?>

            <p>
                <button type="submit" name="submitButton" class="btn btn-primary">Reset</button>
            </p>

            <?php echo form_close();?>

        </div>
    </div>
</div>
