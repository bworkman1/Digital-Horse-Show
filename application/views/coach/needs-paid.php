</div>
<h5 class="page-title"><i class="fa fa-money"></i> Waiting on Payment</h5>

<form id="makePayment" data-url="<?php echo base_url('admin/view/post-payment'); ?>">
    <div class="container">


        <div class="row">
            <div class="col-md-9">

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Awaiting Payment
                        </div>
                        <div class="panel-body">
                            <p>Once the scorecard has been accepted you will receive an email with the payment details and they will fall off this list.</p>
                            <div class="table-responsive">
                                <table class="table table-condensed table-striped">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Video</td>
                                        <td class="text-center">Score</td>
                                        <td class="text-center">Errors</td>
                                        <td class="text-center">Date</td>
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
                                            echo '<td>'.$pay->client_name.'</td>';
                                            echo '<td class="text-center">49</td>';
                                            echo '<td class="text-center">4</td>';
                                            echo '<td class="text-center">05/12/2016</td>';
                                            echo '<td class="text-center">';
                                            echo '<a href="'.base_url('/user/scorecard/view/'.$pay->id).'" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-clipboard" data-toggle="tooltip" title="View Scorecard"></i></a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="7"><br><div class="alert alert-info">No payments where found at this time!</div></td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                    <?php if($needs_paid) { ?>
                                        <tfoot>
                                        <tr>
                                            <td id="paidPer" data-amount="<?php echo $paid_per->value; ?>" colspan="3"><b>Paid Per Grade:</b> $<?php echo $paid_per->value; ?></td>
                                            <td class="text-center"></td>
                                            <td colspan="2" class="text-right" id="total">
                                                Total: $<?php echo number_format($count*$paid_per->value, 2); ?>
                                            </td>
                                        </tr>

                                        </tfoot>
                                    <?php } ?>
                                </table>

                            </div>
                        </div>



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

                    <p><?php echo '<a href="mailto:'.$coach->email.'">'.$coach->email.'</a>'; ?><br>
                    <?php echo $coach->mailing_address.', '.$coach->mailing_city.' '.$coach->mailing_state; ?></p>

                    <?php
                        if($this->session->userdata('user_id')==$coach->id) {
                            echo '<p class="text-danger">* Please make sure mailing address is correct in order to receive payment.</p>';
                            echo '<a href="'.base_url('/user/my-profile/edit').'" class="btn btn-primary">Edit Profile</a>';
                        } else {
                            echo '<a href="'.base_url('/profile/user/'.$coach->profile_name).'" target="_blank" class="btn btn-info">View Profile</a>';
                        }
                    ?>


                </div>
            </div>
        </div>
    </div>



    <div id="menu-page" data-page="<?php echo 'grade'; ?>"></div>