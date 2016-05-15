</div>
<h5 class="page-title"><i class="fa fa-video-camera"></i> Upload Video File</h5>
<div class="container">
<?php if($user->coaching_credits>0) { ?>
    <?php echo form_open_multipart('user/upload-video/upload', array('id' => 'upload-form')); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm wow fadeInUp" data-wow-delay="200ms">
                <div id="upload-heading"></div>
                <?php $this->load->view('ui-elements/ui-feedback'); ?>
                <h5 class="border-bottom"><i class="fa fa-upload"></i> Upload Details</h5>
                <fieldset class="form-group">
                    <label><span class="text-danger">*</span> Video Name:</label>
                    <input id="video-name" name="name" type="text" value="" class="form-control input-md" required maxlength="100">
                </fieldset>

                <fieldset class="form-group">
                    <label>Video Location:</label>
                    <input id="pac-input" name="location" type="text" value="" class="form-control input-md" maxlength="100">
                </fieldset>

                <br>
                <h5 class="border-bottom"><i class="fa fa-play"></i> Add Video File</h5>
                <fieldset class="form-group">
                    <label><span class="text-danger">*</span> Add Video File:</label>
                    <input type="file" class="form-control" id="file" name="file">
                </fieldset>

                <br>
                <h5 class="border-bottom"><i class="fa fa-gears"></i> Scoring Settings</h5>
                <div class="row">
                    <div class="col-sm-8">
                        <fieldset class="form-group">
                            <?php if(count($coaches)>1) { ?>
                                <label><span class="text-danger">*</span> Select Coach:</label>
                                <select name="coach" class="form-control selector">
                                    <?php
                                    foreach($coaches as $coach) {
                                        echo '<option value="'.$coach->id.'">'.ucwords($coach->first_name).' '.ucwords($coach->last_name).'</option>';
                                    }
                                    ?>
                                </select>
                            <?php } else {
                                echo '<div class="alert alert-info"><img src="'.base_url($coaches[0]->user_image).'" height="50" width="50" class="img-circle pull-left"><h5 style="color: #ffffff; margin: 0">'.ucwords($coaches[0]->first_name).' '.ucwords($coaches[0]->last_name).' will be your coach</h5><p style="color: #ffffff">Once your upload completes he will be notified to judge your ride.</p></div>';
                                echo '<input type="hidden" name="coach" value="'.$coaches[0]->coach_id.'" required>';
                            } ?>
                        </fieldset>
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <p><button id="coach-help" class="btn btn-info" data-toggle="modal" data-target="#coach-help-modal">Need Help?</button></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label><span class="text-danger">*</span> Scoring Level:</label>
                        <fieldset class="form-group">
                            <select class="form-control selector level">
                                <option value="">Select One...</option>
                                <?php
                                    foreach($options['lvls'] as $val) {
                                        echo '<option data-option="'.strtolower(str_replace(' ', '-', $val)).'">'.$val.'</option>';
                                    }
                                ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-6">

                        <?php
                            $selections = array();
                            foreach($options['options'] as $row) {
                                if(isset($selections[$row['parent']])) {
                                    $selections[$row['parent']][] = array('name' => $row['name'], 'id' => $row['id']);
                                } else {
                                    $selections[$row['parent']] = array(array('name' => $row['name'], 'id' => $row['id']));
                                }
                            }

                            foreach($selections as $key => $selection) {
                                echo '<div class="scoring-type hide '.strtolower(str_replace(' ', '-', $key)).'">';
                                    echo '<label><span class="text-danger">*</span> Scoring Type</label>';
                                    echo '<fieldset class="form-group">';
                                        echo '<select class="form-control selector">';
                                            echo '<option value="">Select One...</option>';

                                            foreach ($selection as $val) {
                                                echo '<option value="'.$val['id'].'">' . $val['name'] . '</option>';
                                            }

                                        echo '</select>';
                                    echo '</fieldset>';
                                echo '</div>';
                            }

                        ?>
                    </div>
                </div>
                <hr>
                <div id="feedback"></div>

                <div class="progress hide">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                        40%
                    </div>
                </div>

                <input type="hidden" id="locLat" name="lat">
                <input type="hidden" id="locLng" name="lng">
                <input type="hidden" id="chunks" name="chunks" value="true">
                <input type="hidden" id="chunk" name="chunk" value="0">
                <br>
                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Start Upload</button>

            </div>
        </div>

        <div class="col-md-6">
            <?php echo '<div class="alert alert-primary" style="font-size: 1.3em;  font-weight: bold;"><i class="fa fa-question-circle"></i> You have '.$user->coaching_credits.' coaching credits left.</div>'; ?>
            <div class="well well-sm wow fadeInUp" data-wow-delay="400ms">
                <div id="map" style="height: 400px; width: 100%"></div>
            </div>
        </div>

    </div>

    <?php echo form_close(); ?>
<?php } else { ?>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 style="color: #ffffff">Oh No! You Need Coaching Credits!</h5>
        </div>
        <div class="panel-body">
            <p>No worries, head over to the payment page and select the coach you would like and enter your payment info and <b>BAM!</b> You're back in business.</p><p>This is where you will want to sell it to the user on why to buy credits and all the benefits.</p>
            <a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase Credits</a>
        </div>
    </div>




<?php } ?>

<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>
<div id="user-lat" data-lat="<?php echo $this->session->userdata('lat'); ?>"></div>
<div id="user-lng" data-lng="<?php echo $this->session->userdata('lng'); ?>"></div>

<div id="upsale" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-success">Special Offer!</h4>
            </div>
            <div class="modal-body">
                <p>Would you like to have your scored/reviewed by one of our professional coaches?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default noUpsale" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-success yesUpsale">Yes</button>
            </div>
        </div>
    </div>
</div>

<div id="payment" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Payment Details</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="<?php echo base_url('assets/themes/default/images/credit-cards.png'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">CARD NUMBER</label>
                                        <div class="input-group">
                                            <input
                                                type="tel"
                                                class="form-control"
                                                name="cardNumber"
                                                placeholder="Valid Card Number"
                                                autocomplete="cc-number"
                                                required autofocus
                                            />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            name="cardExpiry"
                                            placeholder="MM / YY"
                                            autocomplete="cc-exp"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">CV CODE</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            name="cardCVC"
                                            placeholder="CVC"
                                            autocomplete="cc-csc"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="couponCode">COUPON CODE</label>
                                        <input type="text" class="form-control" name="couponCode" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-success btn-lg btn-block" type="submit">Submit Payment</button>
                                </div>
                            </div>
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default noUpsale" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div id="coach-help-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Our Coaches</h4>
            </div>
            <div class="modal-body">
                <!-- TODO: Make this paged for better user experience -->
                <div class="row">
                    <?php
                    foreach($coaches as $coach) {
                        echo '<div class="col-sm-4 col-xs-6">';
                        echo '<div class="well well-sm">';
                        echo '<img src="' . base_url($coach->user_image) . '" class="pull-left img-circle" width="50" height="50">';
                        echo '<h5 style="margin: 0;">' . $coach->first_name . ' ' . $coach->last_name . '</h5>';
                        echo '<p>Member Since ' .date('m-d-Y', $coach->created_on) . '</p>';

                        echo '<div class="row">';
                        echo '<div class="col-xs-6">';
                        echo '<a href="'.base_url('user/profile/'.$coach->profile_name).'" target="_blank" class="btn btn-primary btn-sm">View Profile</a>';
                        echo '</div>';
                        echo '<div class="col-xs-6">';
                        echo '<a  href="#" class="coach-selected btn btn-info btn-sm" data-id="'.$coach->id.'">Pick Me</a>';
                        echo '</div>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="baseUrl" data-base="<?php echo base_url(); ?>"></div>