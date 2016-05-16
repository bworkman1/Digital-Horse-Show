</div>
<h5 class="page-title"><i class="fa fa-money"></i> Payments</h5>

<div class="container">
       <div class="well well-sm">
           <div class="table-responsive">
               <table class="table table-striped table-hover">
                   <thead>
                        <tr>
                            <td>#</td>
                            <td>Name:</td>
                            <td>Address:</td>
                            <td>Date:</td>
                            <td>Note:</td>
                            <td class="text-center">Graded:</td>
                            <td class="text-right">Amount</td>
                        </tr>
                   </thead>
                   <tbody>
                       <?php
                           if($payments) {
                                $count = 0;
                               $graded = array();
                               $total = array();
                               foreach($payments as $payment) {
                                   $count++;
                                   echo '<tr>';
                                        echo '<td>';
                                            echo '<b>'.$count.'.)</b>';
                                        echo '</td>';

                                        echo '<td>';
                                            echo $payment->first_name . ' ' . $payment->last_name;
                                        echo '</td>';

                                        echo '<td>';
                                            echo $payment->address . ' ' . $payment->city . ', ' . $payment->state;
                                        echo '</td>';

                                        echo '<td>';
                                            echo date('m-d-Y', strtotime($payment->ts));
                                        echo '</td>';

                                        echo '<td>';
                                            echo $payment->notes;
                                        echo '</td>';

                                        echo '<td class="text-center">';
                                            $videos = explode('|', $payment->payment_groups_id);
                                            $graded[] = count($videos);
                                            echo count($videos);
                                        echo '</td>';

                                       echo '<td class="text-right">';
                                            echo '$'.number_format($payment->amount, 2);
                                       echo '</td>';

                                   echo '</tr>';
                                    $total[] = $payment->amount;
                               }
                           } else {
                               echo '<tr><td colspan="7"><br><div class="alert alert-info">This coach has not been paid yet.</div></td></tr>';
                           }
                       ?>
                   </tbody>
                   <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total: </b><?php echo array_sum($graded); ?></td>
                            <td class="text-right"><?php echo '<b>Total:</b> $'.number_format(array_sum($total), 2); ?></td>
                        </tr>
                   </tfoot>
               </table>


       </div>

           <div id="menu-page" data-page="<?php echo 'payments'; ?>"></div>