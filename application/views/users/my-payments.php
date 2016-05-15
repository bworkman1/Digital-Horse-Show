</div>
<h5 class="page-title"><i class="fa fa-clock-o"></i> My Purchase History</h5>
<div class="container">

<div class="well well-sm">
    <table class="table table-striped table-hover table-condensed">
        <thead style="font-weight: bold">
            <tr>
                <td>Trans Id</td>
                <td>Date</td>
                <td>Amount</td>
                <td class="text-center">Credits</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $footer_totals = array(
                    'amount'    => 0,
                    'credits'   => 0,
                );
                foreach($payments as $payment) {
                    echo '<tr>';
                        echo '<td>'.$payment->trans_id.'</td>';
                        echo '<td>'.date('m-d-Y', strtotime($payment->paid_on)).'</td>';
                        echo '<td>$'.number_format($payment->amount, 2).'</td>';
                        echo '<td class="text-center">'.$payment->credits.'</td>';
                    echo '</tr>';

                    $footer_totals['amount'] = $footer_totals['amount']+$payment->amount;
                    $footer_totals['credits'] = $footer_totals['credits']+$payment->credits;
                }
            ?>
        </tbody>
        <tfooter style="font-weight: bold">
            <tr>
                <td colspan="2" class="text-right"><b>Total:</b></td>
                <td><?php echo '$'. number_format($footer_totals['amount'], 2); ?></td>
                <td class="text-center"><b>Total:</b> <?php echo $footer_totals['credits']; ?></td>
            </tr>
        </tfooter>
    </table>
    <a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase More</a>
</div>




<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>