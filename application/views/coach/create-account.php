<div id="coach-login" class="container">
    <h2 class="emphasis">Coach/Judge Sign Up!</h2>

    <div class="row">
        <div class="col-md-6">

            <?php echo form_open('create-coach-account/create-account', ['id'=>'create-account', 'data-redirect'=>base_url('create-coach-account/account-created')]); ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 id="step-title">Create Account:</h5>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab" data-step="1"><span class="hidden-xs">Step</span> 1</a></li>
                            <li role="presentation"><a href="#second" aria-controls="second" role="tab" data-toggle="tab" data-step="2"><span class="hidden-xs">Step</span> 2</a></li>
                            <li role="presentation"><a href="#third" aria-controls="third" role="tab" data-toggle="tab" data-step="3"><span class="hidden-xs">Step</span> 3</a></li>
                            <li role="presentation"><a href="#fourth" aria-controls="fourth" role="tab" data-toggle="tab" data-step="4"><span class="hidden-xs">Step</span> 4</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="first"> <!-- First Step Starts -->
                                <br>
                                <h5 class="border-bottom"><i class="fa fa-user text-primary"></i> Account Details</h5>
                                <p>Your details are never shared with third party services and we take your privacy seriously.</p>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Email:</label>
                                            <input type="email" class="form-control" name="email" required maxlength="70">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Username:</label>
                                            <input type="text" class="form-control" name="username" required maxlength="20">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> First Name:</label>
                                            <input type="text" class="form-control" name="first_name" required maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Last Name:</label>
                                            <input type="text" class="form-control" name="last_name" required maxlength="30">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Password:</label>
                                            <input type="password" class="form-control" name="password" required maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Confirm Password:</label>
                                            <input type="password" class="form-control" name="password_confirm" required maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a class="btn btn-primary pull-right nextStep" href="#second" aria-controls="first" role="tab" data-toggle="tab" data-step="2">Next Step</a>
                            </div> <!-- First Step Ends -->
                            <div role="tabpanel" class="tab-pane" id="second"> <!-- Second Step Starts -->
                                <br>
                                <h5 class="border-bottom"><i class="fa fa-map-marker text-primary"></i> Mailing Address</h5>
                                <p>Your mailing address is used for mailing you the commission checks.</p>
                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Street Address:</label>
                                    <input type="text" class="form-control" name="address" required maxlength="50">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> City:</label>
                                            <input type="text" required class="form-control" name="city" required maxlength="30">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> State:</label>
                                            <select name="state" required class="form-control">
                                            <?php
                                                $us_state_abbrevs_names = array(
                                                    '' => 'Select State',
                                                    'AL'=>'ALABAMA',
                                                    'AK'=>'ALASKA',
                                                    'AZ'=>'ARIZONA',
                                                    'AR'=>'ARKANSAS',
                                                    'CA'=>'CALIFORNIA',
                                                    'CO'=>'COLORADO',
                                                    'CT'=>'CONNECTICUT',
                                                    'DE'=>'DELAWARE',
                                                    'DC'=>'DISTRICT OF COLUMBIA',
                                                    'FL'=>'FLORIDA',
                                                    'GA'=>'GEORGIA',
                                                    'GU'=>'GUAM GU',
                                                    'HI'=>'HAWAII',
                                                    'ID'=>'IDAHO',
                                                    'IL'=>'ILLINOIS',
                                                    'IN'=>'INDIANA',
                                                    'IA'=>'IOWA',
                                                    'KS'=>'KANSAS',
                                                    'KY'=>'KENTUCKY',
                                                    'LA'=>'LOUISIANA',
                                                    'ME'=>'MAINE',
                                                    'MD'=>'MARYLAND',
                                                    'MA'=>'MASSACHUSETTS',
                                                    'MI'=>'MICHIGAN',
                                                    'MN'=>'MINNESOTA',
                                                    'MS'=>'MISSISSIPPI',
                                                    'MO'=>'MISSOURI',
                                                    'MT'=>'MONTANA',
                                                    'NE'=>'NEBRASKA',
                                                    'NV'=>'NEVADA',
                                                    'NH'=>'NEW HAMPSHIRE',
                                                    'NJ'=>'NEW JERSEY',
                                                    'NM'=>'NEW MEXICO',
                                                    'NY'=>'NEW YORK',
                                                    'NC'=>'NORTH CAROLINA',
                                                    'ND'=>'NORTH DAKOTA',
                                                    'OH'=>'OHIO',
                                                    'OK'=>'OKLAHOMA',
                                                    'OR'=>'OREGON',
                                                    'PW'=>'PALAU',
                                                    'PA'=>'PENNSYLVANIA',
                                                    'PR'=>'PUERTO RICO',
                                                    'RI'=>'RHODE ISLAND',
                                                    'SC'=>'SOUTH CAROLINA',
                                                    'SD'=>'SOUTH DAKOTA',
                                                    'TN'=>'TENNESSEE',
                                                    'TX'=>'TEXAS',
                                                    'UT'=>'UTAH',
                                                    'VT'=>'VERMONT',
                                                    'VI'=>'VIRGIN ISLANDS',
                                                    'VA'=>'VIRGINIA',
                                                    'WA'=>'WASHINGTON',
                                                    'WV'=>'WEST VIRGINIA',
                                                    'WI'=>'WISCONSIN',
                                                    'WY'=>'WYOMING',
                                                );
                                                foreach($us_state_abbrevs_names as $key => $state) {
                                                    echo '<option value="'.$key.'">'.$state.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><span class="text-danger">*</span> Zip:</label>
                                            <input type="text" class="form-control" name="zip" required maxlength="10s">
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <a class="btn btn-primary pull-right nextStep" href="#third" aria-controls="second" role="tab" data-toggle="tab" data-step="3">Next Step</a>

                            </div> <!-- Second Step Ends -->
                            <div role="tabpanel" class="tab-pane" id="third"> <!-- Third Steps Starts -->

                                <br>
                                <h5 class="border-bottom"><i class="fa fa-files-o text-primary"></i> Contracts & Documents</h5>
                                <p>The following documents are required to complete your account. Please read each document and click the I agree checkbox and type your name in the box provided. Typing your name in the box under each contract serves as your digital signature.</p>
                                <!-- First Document Start -->
                                <h6 class="border-bottom"><b><i class="fa fa-file-o"></i> Confidentiality Agreement</b></h6>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label><input type="checkbox" class="checkbox" name="agree_confidentiality" value="yes" required> I Agree</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="<?php echo base_url('assets/uploads/ConfidentialityAgreement.pdf'); ?>" class="contract-link" target="_blank"><i class="fa fa-file-pdf-o"></i> Confidentiality Agreement</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Type your full name:</label>
                                    <input type="text" class="form-control signature" name="sign_confidentiality" required maxlength="30">
                                </div>
                                <!-- First Document Ends -->
                                <br>
                                <!-- Second Document Start -->
                                <h6 class="border-bottom"><b><i class="fa fa-file-o"></i> Policies for Trot to the Top</b></h6>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label><input type="checkbox" class="checkbox" name="agree_policies" value="yes" required> I Agree</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="<?php echo base_url('assets/uploads/PoliciesforTrottotheTop.pdf'); ?>" class="contract-link" target="_blank"><i class="fa fa-file-pdf-o"></i> Policies for Trot to the Top</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Type your full name:</label>
                                    <input type="text" class="form-control signature" name="sign_policies" required maxlength="30">
                                </div>
                                <!-- Second Document Ends -->
                                <br>
                                <!-- Third Document Start -->
                                <h6 class="border-bottom"><b><i class="fa fa-file-o"></i> Professional Ethics</b></h6>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label><input type="checkbox" class="checkbox" name="agree_ethics" value="yes" required> I Agree</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="<?php echo base_url('assets/uploads/ProfessionalEthics.pdf'); ?>" class="contract-link" target="_blank"><i class="fa fa-file-pdf-o"></i> Professional Ethics</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><span class="text-danger">*</span> Type your full name:</label>
                                    <input type="text" class="form-control signature" name="sign_ethics" required maxlength="30">
                                </div>
                                <!-- Third Document Ends -->

                                <br>
                                <a class="btn btn-primary pull-right nextStep" href="#fourth" aria-controls="first" role="tab" data-toggle="tab" data-step="4">Next Step</a>
                            </div> <!-- Third Step Ends -->
                            <div role="tabpanel" class="tab-pane" id="fourth">
                                <br>
                                <h5 class="border-bottom"><i class="fa fa-folder-open text-primary"></i> Finalize</h5>
                                <p>Once you submit your account details we will send you an email to the email address you provided to verify your email. Click on the link in the email to activate your account.</p>

                                <div class="form-group">
                                    <label><input type="checkbox" class="checkbox" name="terms_of_service" value="yes" required> I Agree to the <a href="<?php echo base_url('terms-of-service'); ?>" target="_blank">Terms of Service</a></label>
                                </div>

                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>





                    </div><!-- End Panel Body -->
                </div>

            <?php echo form_close(); ?>

        </div>

        <div class="col-md-6 hidden-sm hidden-xs">

            <section class="coach-list">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <div class="round-icon-bkg">
                            <i class="fa fa-money fa-3x"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h5>Incredible Commissions</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed turpis eu tellus porttitor egestas</p>
                    </div>
                </div>
            </section>

            <section class="coach-list">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <div class="round-icon-bkg">
                            <i class="fa fa-bullhorn fa-3x"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h5>Incredible Commissions</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed turpis eu tellus porttitor egestas</p>
                    </div>
                </div>
            </section>

            <section class="coach-list">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <div class="round-icon-bkg">
                            <i class="fa fa-cloud fa-3x"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h5>Incredible Commissions</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed turpis eu tellus porttitor egestas</p>
                    </div>
                </div>
            </section>

            <h2 class="emphasis">Free!</h2>
        </div>
    </div>
</div>


