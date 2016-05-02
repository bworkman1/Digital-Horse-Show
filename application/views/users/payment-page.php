<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="well well-sm">
            <form class="form-horizontal payment-form" action="<?php echo base_url('user/payment/submit'); ?>" method="post" id="payment-form" role="form" data-type="credit" _lpchecked="1">
                <div class="tab-content">


                    <div role="tabpanel" class="tab-pane fade in active" id="settings">
                        <fieldset>
                            <legend><i class="fa fa-shopping-bag"></i> How many credits would you like?</legend>
                            <?php $this->load->view('ui-elements/ui-feedback'); ?>
                            <h5 class="text-info">What are Coaching Credits?</h5>
                            <p style="color: inherit">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna justo, viverra vehicula dictum eget, molestie vitae nulla. Nunc fermentum, turpis id pretium hendrerit, leo nisl hendrerit urna, quis fringilla ante arcu non augue. </p>
                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 col-sm-6 col-xs-5 text-right" for="card-holder-name"><span class="text-danger">*</span> Coaching Credits</label>
                                <div class="col-md-4 col-sm-6 col-xs-7">
                                    <select name="coaching_credits" class="form-control" data-payment="<?php echo $payment_settings->value; ?>" required>
                                        <?php
                                        for($i=6;$i<16;$i++) {
                                            echo '<option>'.$i.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <p style="color: inherit"><b>Credits are $<?php echo $payment_settings->value; ?> a credit.</b></p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-xs-5">

                                </div>
                                <div class="col-xs-7">
                                    <p class="pull-right"><a id="start-next" href="#payment" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Next</a></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                        </fieldset>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="payment">
                        <fieldset>
                            <legend><i class="fa fa-credit-card"></i> Purchase Credits</legend>
                            <img src="<?php echo base_url('assets/themes/default/images/secure.png'); ?>" width="150" height="75" class="pull-left">
                            <div style="margin-top: 8px">For your security, we do not store your credit card or payment information on our site. Your transaction details are secured with 128 bit encryption.</div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="card-holder-name"><span class="text-danger">*</span> Name on Card</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control name" name="card_name" id="card-holder-name" placeholder="Card Holder's Name" required="" maxlength="50">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="card-number"><span class="text-danger">*</span> Card Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="card_number" id="card-number" placeholder="Debit/Credit Card Number" required="" maxlength="19">
                                    <div id="credit-card-error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="expiry-month"><span class="text-danger">*</span> Expiration Date</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <select class="form-control col-sm-2" name="expiry_month" id="expiry-month" required="">
                                                <option value="">Month</option>
                                                <option value="01">Jan (01)</option>
                                                <option value="02">Feb (02)</option>
                                                <option value="03">Mar (03)</option>
                                                <option value="04">Apr (04)</option>
                                                <option value="05">May (05)</option>
                                                <option value="06">June (06)</option>
                                                <option value="07">July (07)</option>
                                                <option value="08">Aug (08)</option>
                                                <option value="09">Sep (09)</option>
                                                <option value="10">Oct (10)</option>
                                                <option value="11">Nov (11)</option>
                                                <option value="12">Dec (12)</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-3">
                                            <select class="form-control" name="expiry_year" required>
                                                <option value="">Year</option>
                                                <?php
                                                    $year = date('Y');
                                                    for($i=0;$i<8;$i++) {
                                                        echo '<option>'.$year.'</option>';
                                                        $year++;
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="cvv"><span class="text-danger">*</span> Card CVV</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" required="" name="cvv" id="cvv" placeholder="Security Code" maxlength="5">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <div id="total" class="alert alert-success"><b>Total:</b> $<?php echo number_format(($payment_settings->value*6), 2); ?></div>
                                    <input type="hidden" class="form-control total" maxlength="8" value="<?php echo number_format(($payment_settings->value*6), 2); ?>" name="total" required="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="text-center col-sm-offset-3 col-sm-6">
                                    By clicking the pay now button you are agreeing to our <a href="<?php echo base_url('terms-of-service'); ?>">Terms of Service</a> &amp; <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-info">Pay Now</button>
                                </div>

                                <div class="col-sm-3">
                                    <a href="#settings" class="btn btn-default pull-right" aria-controls="settings" role="tab" data-toggle="tab">Go Back</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </fieldset>
                    </div>



                </div>
            </form>
        </div>
    </div>
</div>

<div id="payment-success" data-url="<?php echo base_url('user/upload-video'); ?>"></div>