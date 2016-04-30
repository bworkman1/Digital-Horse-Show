<h5 class="page-title"><i class="fa fa-list"></i> Score Card</h5>
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

        <div class="well well-sm">
            <legend><i class="fa fa-user"></i> Rider Details</legend>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <fieldset class="form-group">
                        <b>Name of Competition</b>
                        <h6><?php echo $video->comp_name; ?></h6>
                    </fieldset>
                </div>
                <div class="col-lg-4 col-md-6">
                    <fieldset class="form-group">
                        <b>Class</b>
                        <h6><?php echo $video->comp_class; ?></h6>
                    </fieldset>
                </div>
                <div class="col-lg-4 col-md-6">
                    <fieldset class="form-group">
                        <b>Date</b>
                        <h6><?php echo date('d-m-Y', strtotime($video->date)); ?></h6>
                    </fieldset>
                </div>

                <div class="col-lg-4 col-md-6">
                    <fieldset class="form-group">
                        <b>Number and Name of Horse</b>
                        <h6><?php echo $video->horse_name; ?></h6>
                    </fieldset>
                </div>
                <div class="col-lg-4 col-md-6">
                    <fieldset class="form-group">
                        <b>Name of Rider</b>
                        <h6><?php echo $video->first_name.' '.$video->last_name; ?></h6>
                    </fieldset>
                </div>


            </div>
            <hr>

            <button id="scoringHelp" class="btn btn-success pull-right" data-target="#score-help" data-toggle="modal">Scoring Instructions</button>
            <legend><i class="fa fa-bullseye"></i> Rider Scoring</legend>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <table id="scoreCard" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Test</td>
                        <td>Directive Ideas</td>
                        <td class="text-center">Points</td>
                        <td class="text-center">Coefficent</td>
                        <td class="text-center">Total</td>
                        <td>Remarks</td>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Track right. <br>Working trot rising.</td>
                        <td>Balance and bend in turn. Quality of transition.</td>
                        <td class="text-center">
                            <?php echo $scores->score_1_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_1_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_1_points+$scores->score_1_co; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_1; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>2. C M</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td class="text-center">
                            <?php echo $scores->score_2_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_2_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_2_co+$scores->score_2_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_2; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>3. A</b></td>
                        <td>Circle right 20 meters, working trot rising.</td>
                        <td>Roundness and size of circle; clear trot rhythm and bend.</td>
                        <td class="text-center">
                            <?php echo $scores->score_3_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_3_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_3_points+$scores->score_3_co; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_3; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>4. K-X-M</b></td>
                        <td>Change rein.</td>
                        <td>Clear trot rhythm and straightness on diagonal; bend through corners.</td>
                        <td class="text-center">
                            <?php echo $scores->score_4_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_4_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_4_points+$scores->score_4_co; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_4; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>5. C</b></td>
                        <td>Circle left 20 meters, working trot rising.</td>
                        <td>Roundness and size of circle clear trot rhythm and bend.</td>
                        <td class="text-center">
                            <?php echo $scores->score_5_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_5_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_5_co+$scores->score_5_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_5; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>6. Between C & H</b></td>
                        <td>Medium walk.</td>
                        <td>Willing and balanced transition; clear walk rhythm.</td>
                        <td class="text-center">
                            <?php echo $scores->score_6_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_6_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_6_co+$scores->score_6_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_6; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>7. H-X-F</b></td>
                        <td>Free walk.</td>
                        <td>Complete freedom to stretch neck forward and downward; clear walk rhythm, straightness on the diagonal; ground cover.</td>
                        <td class="text-center">
                            <?php echo $scores->score_7_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_7_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_7_co+$scores->score_7_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_7; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>8. F-A <br>A</b></td>
                        <td>Medium walk.<br>Down centerline</td>
                        <td>Willing and balanced transition; clear walk rhythm, bending in corner and turn.<br>
                            Straightness on centerline.</td>
                        <td class="text-center">
                            <?php echo $scores->score_8_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_8_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_8_co+$scores->score_8_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_8; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>9. X</b></td>
                        <td>Halt and salute.</td>
                        <td>Straightness; willing, balanced transition at halt.</td>
                        <td class="text-center">
                            <?php echo $scores->score_9_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_9_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_9_co+$scores->score_9_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_9; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7"><h6><b>Collective Marks</b></h6></td>
                    </tr>

                    <tr>
                        <td colspan="3">Gaits (freedom and regularity).</td>
                        <td class="text-center">
                            <?php echo $scores->score_10_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_10_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_10_co+$scores->score_10_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_10; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Impulsion (desire to move forward with suppleness of the back and steady tempo).</td>
                        <td class="text-center">
                            <?php echo $scores->score_11_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_11_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_11_co+$scores->score_11_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_11; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Submission (acceptance of steady contact, attention, and confidence).</td>
                        <td class="text-center">
                            <?php echo $scores->score_12_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_12_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_12_co+$scores->score_12_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_12; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Rider’s position (keeping in balance with horse).</td>
                        <td class="text-center">
                            <?php echo $scores->score_13_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_13_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_13_co+$scores->score_13_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_13; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Rider’s effectiveness of aids (correct bend and preparation of transitions).</td>
                        <td class="text-center">
                            <?php echo $scores->score_14_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_14_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_14_co+$scores->score_14_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_14; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">Geometry and accuracy (correct size and shape of circles and turns).</td>
                        <td class="text-center">
                            <?php echo $scores->score_15_points; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_15_co; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $scores->score_15_co+$scores->score_15_points; ?>
                        </td>
                        <td>
                            <?php echo $scores->remarks_15; ?>
                        </td>
                    </tr>

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="4"><h6><b>Leave arena in free walk. Exit at A.</b></h6></td>
                        <td class="text-right"><b>Errors:</b></td>
                        <td class="text-center"><?php echo $scores->errors; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="ajax-feedback"></td>
                        <td class="text-right"><b>Total:</b></td>
                        <td class="text-center"><?php echo $scores->total; ?></td>
                        <td></td>
                    </tr>
                    </tfoot>

                </table>
            </div>
            <div class="clearfix"></div>
        </div>

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
                <p>This unique series of tests provides an opportunity for the horse and/or rider new to dressage to demonstrate elementary skills.
                    The tests have been designed to encourage correct performance and to prepare the horse for the transition to the USEF tests.</p>
                <div class="row">
                    <div class="col-md-6">
                        <h5>INSTRUCTION:</h5>
                        <p>All trot work to be ridden rising. Transitions from walk to trot and trot to walk may be
                            performed through sitting trot with the objective of performing a smooth transition.</p>
                        <p>Turns from center line to long side and long side to
                            center line should be ridden as a half circle, touching
                            the track at a point midway between the center line
                            and the corner, and vice versa.</p>
                    </div>
                    <div class="col-md-6">
                        <h5>COMMENT:</h5>
                        <p>Horses should be ridden on a light but steady contact,
                            with the exception of the free walk in which the horse is
                            allowed complete freedom to stretch neck forward and
                            downward.</p>
                    </div>
                </div>
                <hr>
                <img src="<?php echo base_url('assets/themes/default/images/scoring-image.png'); ?>" class="img-responsive img-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>