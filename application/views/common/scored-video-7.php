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
            </div>
            <?php
                $profile['profile'] = $user_profile;
                $this->load->view('ui-elements/user-profile-card', $profile);
            ?>

        </div>
        <div class="col-lg-8">
            <div class="well well-sm">
                <h4 class="border-bottom"><?php echo htmlspecialchars($scorecard['name']); ?></h4>
                <p class="label label-info"><?php echo htmlspecialchars($scorecard['child_of']); ?></p>

                <?php if($scorecard['heading']) { ?>
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
                        foreach($scores as $row) {
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

                                echo '<td>'.$row->remarks.'</td>';
                                echo '</tr>';
                                $count++;
                            }
                        }

                        ?>
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5" class="score-feedback"><b>Max Score:</b> <?php echo $scorecard['max_score']; ?></td>
                            <td class="text-right"><b>Sub Total:</b></td>
                            <td><div id="sub-total" class="text-center"><?php echo $video->score-$video->score_errors; ?></div></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5">Leave arena in free walk. Exit at A.</td>
                            <td class="text-right"><b>Errors:</b></td>
                            <td class="text-center"><?php echo $video->score_errors; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" id="ajax-feedback">
                                <?php
                                    echo '<div class="star-rating pull-left" style="margin-top: 5px;">';
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($video->star_rating > $i) {
                                            echo '<i class="fa fa-fw fa-star text-info"></i>';
                                        } else {
                                            echo '<i class="fa fa-fw fa-star-o"></i>';
                                        }
                                    }
                                    echo '</div>';
                                ?>
                            </td>
                            <td class="text-right"><b>Total:</b></td>
                            <td class="text-center"><?php echo $video->score; ?></td>
                            <td></td>
                        </tr>
                        </tfoot>

                    </table>
                    <?php
                        if($video->user_id == $this->session->userdata('user_id')) {
                            echo '<a href="#" data-target="#survey" data-toggle="modal" class="btn btn-info">Take Survey</a>';
                        }
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <?php
        if($video->user_id == $this->session->userdata('user_id')) {
            $data['viewed'] = $video->user_viewed;
            $this->load->view('ui-elements/user-survey-modal', $data);
        }
    ?>

    <div id="score-help" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-bullseye"></i> Scoring Instructions</h4>
                </div>
                <div class="modal-body">
                    <?php echo $scorecard['heading']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
