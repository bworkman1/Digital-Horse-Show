</div>
<h5 class="page-title"><i class="fa fa-money"></i> All Coach Payments</h5>

<div class="container">
    <div class="well well-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td class="text-right">#</td>
                    <td>Name:</td>
                    <td>User:</td>
                    <td>Submitted:</td>
                    <td class="text-center">Options</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if($waiting) {
                    $count = 0;
                    $graded = array();
                    $total = array();
                    foreach($waiting as $val) {
                        $count++;
                        echo '<tr>';
                        echo '<td class="text-right">';
                        echo '<b>'.$count.'.)</b>';
                        echo '</td>';

                        echo '<td>';
                        echo $val->client_name;
                        echo '</td>';

                        echo '<td>';
                        echo $val->first_name . ' ' . $val->last_name;
                        echo '</td>';

                        echo '<td>';
                        echo date('m-d-Y', strtotime($val->uploaded));
                        echo '</td>';



                        echo '<td class="text-center">';
                           echo '<a href="'.base_url('coach/scorecard/grade/'.$val->id).'" class="btn btn-info btn-sm" style="margin-right: 5px" data-toggle="tooltip" title="Grade Scorecard"><i class="fa fa-gavel"></i></a>';
                           echo '<a href="'.base_url('user/my-uploads/view/'.$val->id).'" class="btn btn-warning btn-sm" style="margin-right: 5px" data-toggle="tooltip" title="View Video"><i class="fa fa-youtube-play"></i></a>';
                           echo '<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View User Profile"><i class="fa fa-user"></i></a>';
                        echo '</td>';

                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="7"><br><div class="alert alert-info">This coach has not been paid yet.</div></td></tr>';
                }
                ?>
                </tbody>

            </table>


        </div>