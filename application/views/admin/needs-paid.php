</div>
<h5 class="page-title"><i class="fa fa-money"></i> Needs Paid</h5>

    <form id="makePayment" data-url="<?php echo base_url('admin/view/post-payment'); ?>">
    <div class="container">


            <div class="row">
                <div class="col-md-9">
                    <div class="well well-sm">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Awaiting Payment
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Video</td>
                                            <td class="text-center">Score</td>
                                            <td class="text-center">Errors</td>
                                            <td class="text-center">Date</td>
                                            <td class="text-center">Pay</td>
                                            <td class="text-center">Options</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($needs_paid) {
                                                $count = 0;
                                                foreach($needs_paid as $pay) {
                                                    $count++;
                                                    echo '<tr>';
                                                        echo '<td>'.$count.'.)</td>';
                                                        echo '<td>';
                                                            echo '<a href="'.base_url('admin/uploads/view/'.$pay->id).'"><img
                                                                    src="'.base_url($pay->thumb).'"
                                                                    class="img-center img-responsive pull-left view-video" data-video="'.base_url($pay->path).'" data-title="'.$pay->client_name.'" width="60" height="40"></a>';
                                                        echo '</td>';
                                                        echo '<td class="text-center">49</td>';
                                                        echo '<td class="text-center">4</td>';
                                                        echo '<td class="text-center">05/12/2016</td>';
                                                        echo '<td class="text-center"><input type="checkbox" name="video_id[]" value="'.$pay->id.'" class="pay-me"></td>';
                                                        echo '<td class="text-center">';
                                                            echo '<a href="'.base_url('admin/uploads/view/'.$pay->id).'" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View Video"><i class="fa fa-eye"></i></a>';
                                                            echo '<a href="'.base_url('/user/scorecard/view/'.$pay->id).'" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-clipboard" data-toggle="tooltip" title="View Scorecard"></i></a>';
                                                           // echo '<button class="btn btn-primary btn-sm noSubmit"><i class="fa fa-trophy"></i></button>';
                                                        echo '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="7"><br><div class="alert alert-info">No Payments needed for this user at this time!</div></td></tr>';
                                            }
                                        ?>
                                        </tbody>
                                        <?php if($needs_paid) { ?>
                                            <tfoot>
                                                <tr>
                                                    <td id="paidPer" data-amount="<?php echo $paid_per->value; ?>" colspan="4"><b>Paid Per Video:</b> $<?php echo $paid_per->value; ?></td>
                                                    <td class="text-center"><a href="#" class="btn btn-primary btn-sm noSubmit" id="mark-all">Mark All</a></td>
                                                    <td colspan="2" id="total">

                                                    </td>
                                                </tr>

                                            </tfoot>
                                        <?php } ?>
                                    </table>
                                    <input type="hidden" id="totalInput" name="total" required>
                                    <input type="hidden" name="per_video" value="<?php echo $paid_per->value; ?>" required>
                                    <input type="hidden" name="coach_id" value="<?php echo $coach->id; ?>" required>
                                </div>
                            </div>
                        </div>

                        <?php if($needs_paid) { ?>
                            <button id="finalize" class="btn btn-primary noSubmit" disabled>Finalize Payment</button>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="well well-sm">
                        <img
                            src="<?php echo base_url($coach->user_image); ?>"
                            class="img-center img-responsive">
                        <h4><?php echo $coach->first_name.' '.$coach->last_name; ?></h4>

                        <?php if($coach->phone) { ?>
                            <h5><?php echo "(".substr($coach->phone, 0, 3).") ".substr($coach->phone, 3, 3)."-".substr($coach->phone,6); ?></h5>
                        <?php } ?>

                        <p><?php echo $coach->email; ?></p>
                        <a href="<?php echo base_url('/profile/user/'.$coach->profile_name); ?>" target="_blank" class="btn btn-info">View Profile</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- VIDEO MODAL -->
        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="paymentTitle">Payment Details</h4>
                    </div>
                    <div class="modal-body">
                        <h4><?php echo $coach->first_name.' '.$coach->last_name; ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span> Mailing Address:</label>
                                <input type="text" class="form-control" value="<?php echo $coach->mailing_address; ?>" id="type-selector" name="address" maxlength="100" required>
                            </div>
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span> Mailing City:</label>
                                <input type="text" class="form-control" value="<?php echo $coach->mailing_city; ?>" name="city" maxlength="100" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label><span class="text-danger">*</span> Mailing State:</label>
                                <select name="state" class="form-control">
                                    <?php
                                    $states = array(
                                        'AL'=>'Alabama',
                                        'AK'=>'Alaska',
                                        'AZ'=>'Arizona',
                                        'AR'=>'Arkansas',
                                        'CA'=>'California',
                                        'CO'=>'Colorado',
                                        'CT'=>'Connecticut',
                                        'DE'=>'Delaware',
                                        'DC'=>'District of Columbia',
                                        'FL'=>'Florida',
                                        'GA'=>'Georgia',
                                        'HI'=>'Hawaii',
                                        'ID'=>'Idaho',
                                        'IL'=>'Illinois',
                                        'IN'=>'Indiana',
                                        'IA'=>'Iowa',
                                        'KS'=>'Kansas',
                                        'KY'=>'Kentucky',
                                        'LA'=>'Louisiana',
                                        'ME'=>'Maine',
                                        'MD'=>'Maryland',
                                        'MA'=>'Massachusetts',
                                        'MI'=>'Michigan',
                                        'MN'=>'Minnesota',
                                        'MS'=>'Mississippi',
                                        'MO'=>'Missouri',
                                        'MT'=>'Montana',
                                        'NE'=>'Nebraska',
                                        'NV'=>'Nevada',
                                        'NH'=>'New Hampshire',
                                        'NJ'=>'New Jersey',
                                        'NM'=>'New Mexico',
                                        'NY'=>'New York',
                                        'NC'=>'North Carolina',
                                        'ND'=>'North Dakota',
                                        'OH'=>'Ohio',
                                        'OK'=>'Oklahoma',
                                        'OR'=>'Oregon',
                                        'PA'=>'Pennsylvania',
                                        'RI'=>'Rhode Island',
                                        'SC'=>'South Carolina',
                                        'SD'=>'South Dakota',
                                        'TN'=>'Tennessee',
                                        'TX'=>'Texas',
                                        'UT'=>'Utah',
                                        'VT'=>'Vermont',
                                        'VA'=>'Virginia',
                                        'WA'=>'Washington',
                                        'WV'=>'West Virginia',
                                        'WI'=>'Wisconsin',
                                        'WY'=>'Wyoming'
                                    );
                                    echo '<option value="">Select One..</option>';
                                    foreach($states as $key => $state) {
                                        if($key == $coach->mailing_state) {
                                            echo '<option selected value="'.$key.'">'.$state.'</option>';
                                        } else {
                                            echo '<option value="'.$key.'">'.$state.'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                             </div>
                            <div class="col-md-4">
                                <label><span class="text-danger">*</span> Mailing Zip</label>
                                <input type="text" class="form-control" value="<?php echo $coach->mailing_zip; ?>" name="zip" maxlength="100" required>
                            </div>
                        </div>
                        <br>
                        <label>Payment Notes:</label>
                        <textarea class="form-control" name="notes" style="height: 140px"></textarea>
                        <br>
                        <p><i class="fa fa-question text-warning"></i> Once you submit this, the coach will be notified via email to watch for their check.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default  noSubmit" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>