</div>
<h5 class="page-title"><i class="fa fa-list"></i> Score Card</h5>
<div class="container-fluid">
<div class="row scrollContain">
    <div class="col-lg-4">

        <div class="well well-sm videoSide">
            <div class="embed-responsive embed-responsive-16by9">
                <video id="userVideo" controls="controls" poster="<?php echo base_url($video->thumb); ?>" width="640" height="360">
                    <source src="<?php echo base_url($video->path); ?>" type="<?php echo $video->file_type; ?>" />
                    <object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
                        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
                        <param name="allowFullScreen" value="true" />
                        <param name="wmode" value="transparent" />
                        <param name="flashVars" value="config={'playlist':['<?php echo base_url($video->thumb); ?>',{'url':'<?php echo base_url($video->path); ?>','autoPlay':false}]}" />
                        <img alt="<?php echo $video->orig_name; ?>" src="<?php echo base_url($video->thumb); ?>" width="640" height="360" title="No video playback capabilities, please download the video below" />
                    </object>
                </video>
            </div>
            <br>
            <?php $this->load->view('ui-elements/user-profile-card'); ?>
        </div>

    </div>
    <div class="col-lg-8">
        <?php echo form_open('coach/scorecard/add-grade/'.$this->uri->segment(4), array('id'=>'scoreCard')); ?>
            <div class="well well-sm">
                <h4 class="border-bottom"><?php echo htmlspecialchars($scorecard['scorecard']->name); ?></h4>
                <p class="label label-info"><?php echo htmlspecialchars($scorecard['scorecard']->child_of); ?></p>

                <?php if($scorecard['scorecard']->heading) { ?>
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
                            foreach($scorecard['sections'] as $row) {
                                if($row->divider == 'y') {
                                    echo '<tr class="highlight-columns">';
                                        echo '<input type="hidden" value="'.$row->id.'" name="id[]">';
                                        echo '<input type="hidden" value="y" name="divider[]">';
                                        echo '<input type="hidden" value="0" name="points[]">';
                                        echo '<input type="hidden" value="0" name="co_effecient[]">';
                                        echo '<input type="hidden" value="" name="remarks[]">';
                                        echo '<input type="hidden" value="0" name="row_total[]">';
                                        echo '<td colspan="8" style="text-align: left !important">'.$row->test.'</td>';
                                    echo '</tr>';
                                } else {
                                    echo '<tr>';
                                        echo '<td>';
                                            echo '<b>'.$count.'</b>';
                                            echo '<input type="hidden" value="'.$row->id.'" name="id[]">';
                                            echo '<input type="hidden" value="n" name="divider[]">';
                                        echo '</td>';
                                        echo '<td>'.$row->letters.'</td>';
                                        echo '<td>'.$row->test.'</td>';
                                        echo '<td>'.$row->directive.'</td>';
                                        echo '<td><input type="number" class="form-control nums-only score-box" name="points[]" maxlength="2" min="0" value="'.$row->points.'"></td>';
                                        echo '<td><input type="number" class="form-control nums-only score-box co-effecient" name="co_effecient[]" maxlength="2" min="0" value="'.$row->co_effecient.'"></td>';
                                        echo '<td><input type="number" class="form-control total" name="row_total[]" disabled min="0"></td>';
                                        echo '<td><textarea name="remarks[]" maxlength="1000"></textarea></td>';
                                    echo '</tr>';
                                    $count++;
                                }
                            }

                        ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5" class="score-feedback"></td>
                                <td class="text-right"><b>Sub Total:</b></td>
                                <td><div id="sub-total" class="text-center">0</div></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5">Leave arena in free walk. Exit at A.</td>
                                <td class="text-right"><b>Errors:</b></td>
                                <td><input type="text" name="errors" class="form-control scoreError nums-only" value="0" tabindex="52"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" id="ajax-feedback"></td>
                                <td class="text-right"><b>Total:</b></td>
                                <td><input type="text" class="form-control grandTotal" readonly></td>
                                <td></td>
                            </tr>
                        </tfoot>

                    </table>
            </div>
                <div id="max-score" data-max="<?php echo $scorecard['scorecard']->max_score; ?>"></div>
                <input type="hidden" id="totalScore" name="total" maxlength="3" required>
                <button type="submit" id="scoreSubmit" class="btn btn-primary pull-right" tabindex="53">Submit Score</button>
                <div class="clearfix"></div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>



<div id="score-help" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-bullseye"></i> Scoring Instructions</h4>
            </div>
            <div class="modal-body">
                <?php echo $scorecard['scorecard']->heading; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>