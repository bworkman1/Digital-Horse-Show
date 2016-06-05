</div>
<h5 class="page-title"><i class="fa fa-list"></i> Score Card Preview</h5>
<div class="container-fluid">
    <div class="row scrollContain">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="well well-sm">
                <h4 class="border-bottom"><?php echo htmlspecialchars($scorecard->name); ?></h4>
                <p class="label label-info"><?php echo htmlspecialchars($scorecard->child_of); ?></p>

                <?php if($scorecard->heading) { ?>
                    <button id="scoringHelp" class="btn btn-success pull-right" data-target="#score-help" data-toggle="modal">Scoring Instructions</button>
                <?php } ?>

                <legend><i class="fa fa-list-alt"></i> Score Card</legend>
                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table id="scoreCard" class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Letters</td>
                            <td>Test</td>
                            <td>Directive Ideas</td>
                            <td class="text-center">Points</td>
                            <td class="text-center">Coefficent</td>
                            <td class="text-center">Total</td>
                            <td>Remarks</td>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $count = 1;
                        foreach($sections as $row) {
                            if($row->divider == 'y') {
                                echo '<tr class="highlight-columns">';
                                echo '<td colspan="8" style="text-align: left !important">'.$row->test.'</td>';
                                echo '</tr>';
                            } else {
                                echo '<tr>';
                                echo '<td>';
                                echo '<b>'.$count.'</b>';
                                echo '</td>';
                                echo '<td>'.$row->letters.'</td>';
                                echo '<td>'.$row->test.'</td>';
                                echo '<td>'.$row->directive.'</td>';
                                echo '<td class="text-center">'.$row->points.'</td>';
                                echo '<td class="text-center">'.$row->co_effecient.'</td>';
                                if($row->co_effecient>0) {
                                    echo '<td class="text-center">'.$row->points*$row->co_effecient.'</td>';
                                } else {
                                    echo '<td class="text-center">'.$row->points.'</td>';
                                }

                                echo '<td></td>';
                                echo '</tr>';
                                $count++;
                            }
                        }

                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5" class="score-feedback"><b>Max Score:</b> <?php echo $scorecard->max_score; ?></td>
                            <td class="text-right"><b>Sub Total:</b></td>
                            <td><div id="sub-total" class="text-center"></div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5">Leave arena in free walk. Exit at A.</td>
                            <td class="text-right"><b>Errors:</b></td>
                            <td class="text-center"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" id="ajax-feedback">
                                <?php
                                    echo '<div class="star-rating pull-left" style="margin-top: 5px;">';

                                    echo '</div>';
                                ?>
                            </td>
                            <td class="text-right"><b>Total:</b></td>
                            <td class="text-center"></td>
                            <td></td>
                        </tr>
                        </tfoot>

                    </table>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div id="menu-page" data-page="<?php echo 'grade'; ?>"></div>


    <div id="score-help" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-bullseye"></i> Scoring Instructions</h4>
                </div>
                <div class="modal-body">
                    <?php echo $scorecard->heading; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
