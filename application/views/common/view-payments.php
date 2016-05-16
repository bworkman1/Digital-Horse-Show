</div>
<div class="page-title-options">
    <div class="row">
        <div class="col-md-9">
            <h5><i class="fa fa-money"></i> All Coach Payments</h5>
        </div>
        <div class="col-md-3">
            <form action="<?php echo base_url('user/my-uploads/sort'); ?>" style="margin:0;" method="post" accept-charset="utf-8">
                <?php
                    if($user_selections) {
                        echo '<select class="form-control" id="switchUser" name="sort_by" onchange="this.form.submit()">';
                        if($this->uri->segment(4)) {
                            echo '<option>All Payments</option>';
                        } else {
                            echo '<option>Select a Coach...</option>';
                        }

                        foreach($user_selections as $selection) {
                            if($this->uri->segment(4) == $selection['user_id']) {
                                echo '<option value="'.current_url().'/'.$selection['user_id'].'" selected>'.$selection['coach_name'].'</option>';
                            } else {
                                echo '<option value="'.current_url().'/'.$selection['user_id'].'">'.$selection['coach_name'].'</option>';
                            }

                        }
                        echo '</select>';
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<div class="container">
 
    <div class="well well-sm">
        <div class="table-responsive">
            <table class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <td class="text-center">#</td>
                        <td>Name</td>
                        <td class="text-center">Videos</td>
                        <td>Mailed To</td>
                        <td>Date</td>
                        <td class="text-center">Amount</td>
                        <td class="text-center">Per Score</td>
                        <td class="text-center">Options</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $totals = array();
                        if($payments) {
                            $count = 0;
                            foreach($payments as $row) {
                                $totals[] = number_format((float)$row->amount, 2);
                                $videos = explode("|",$row->payment_groups_id);
                                $count++;
                                echo '<tr>';
                                    echo '<td class="text-center">'.$count.'.</td>';
                                    echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
                                    echo '<td class="text-center">';
                                        echo count($videos);
                                    echo '</td>';
                                    echo '<td>'.$row->address.' '.$row->city.', '.$row->state.'. '.$row->zip.'</td>';
                                    echo '<td>';
                                        echo date('m-d-Y', strtotime($row->ts));
                                    echo '</td>';
                                    echo '<td class="text-center">$'.number_format((float)$row->amount, 2).'</td>';
                                    echo '<td class="text-center">$'.number_format((float)$row->payment_per_video, 2).'</td>';
                                    echo '<td class="text-center">';
                                       // echo '<button class="btn btn-primary" title="View Videos" data-toggle="tooltip" data-toggle="modal" data-target="#videos"><i class="fa fa-youtube-play"></i></button>';
                                       // echo '<button class="btn btn-info" data-toggle="modal" data-toggle="tooltip" data-target="#videos" title="View Scores" style="margin-left: 5px;"><i class="fa fa-list-alt"></i></button>';
                                        if($row->notes) {
                                            echo '<button class="btn btn-warning showNote" data-toggle="tooltip" data-note="' . $row->notes . '" title="View Payment Note" style="margin-left: 5px;"><i class="fa fa-sticky-note"></i></button>';
                                        } else {
                                            echo '<button class="btn btn-default disabled" style="margin-left: 5px"><i class="fa fa-file"></i></button>';
                                        }
                                    echo '</td>';
                                echo '<tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7"><br><div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> No Payments Found</div><br></td></tr>';
                        }

                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>$<?php echo number_format(array_sum($totals), 2); ?></b></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>

<div id="menu-page" data-page="<?php echo 'payments'; ?>"></div>

<div class="modal fade" id="scores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showNote" tabindex="-1" role="dialog" aria-labelledby="showNote">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Payment Note</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>