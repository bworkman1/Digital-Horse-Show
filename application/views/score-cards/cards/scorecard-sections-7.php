    <div id="ajax-page-load" data-alertsuccess="<?php echo $this->session->flashdata('alert-success'); ?>"></div>
    <?php
        if($video->thumb == '') {
            $video->thumb = 'assets/themes/default/images/video-default.jpg';
        }
    ?>
</div>

<h5 class="page-title"><i class="fa fa-list"></i> Score Card Example</h5>

<div class="container-fluid">
    <div class="row scrollContain">
        <div class="col-lg-4">
            <div class="well well-sm hidden-xs hidden-sm videoSide">
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
            </div>

        </div>
        <div class="col-lg-8">

            <div class="well well-sm">

                <h4 class="border-bottom text-primary"><?php echo $heading->name; ?></h4>
                <div class="row">
                    <div class="col-md-6">
                        <h5><i class="fa fa-bullseye"></i> Rider Scoring</h5>
                    </div>
                    <div class="col-md-6">
                        <button id="scoringHelp" class="btn btn-success pull-right" data-target="#score-help" data-toggle="modal">Scoring Instructions</button>
                    </div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table id="scoreCard" class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Letters</td>
                            <td>Test</td>
                            <td>Directive</td>
                            <td class="text-center">Points</td>
                            <td class="text-center">Coefficent</td>
                            <td class="text-center">Total</td>
                            <td>Remarks</td>
                        </tr>
                        </thead>

                        <tbody id="sortable" data-ajax="<?php echo base_url('admin/scorecards/reorder-card/'); ?>">
                        <?php

                        $count = 1;
                        foreach($rows as $r) {
                            if($r->divider == 'y') {
                                echo '<tr class="highlight-columns" data-rowid="'.$r->id.'" data-order="'.$r->order.'" draggable="true">';
                                echo '<td colspan="8" style="text-align: left !important;">'.$r->directive.'</td>';
                                $count--;
                            } else {
                                echo '<tr data-rowid="'.$r->id.'" data-order="'.$r->order.'" draggable="true">';
                                echo '<td>' . $count . '</td>';
                                echo '<td>' . $r->letters . '</td>';
                                echo '<td>' . $r->test . '</td>';
                                echo '<td>' . $r->directive . '</td>';
                                echo '<td>' . $r->points . '</td>';
                                echo '<td>' . $r->co_efficient . '</td>';
                                echo '<td>0</td>';
                                echo '<td><span class="text-muted">Coach Remarks</span></td>';
                            }
                            echo '</tr>';
                            $count++;
                        }
                        ?>

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5"><h6><b>Leave arena in free walk. Exit at A.</b></h6></td>
                            <td class="text-right"><b>Errors:</b></td>
                            <td class="text-center"><?php echo $scores->errors; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" id="ajax-feedback"></td>
                            <td class="text-right"><b>Total:</b></td>
                            <td class="text-center"><?php echo $scores->total; ?></td>
                            <td></td>
                        </tr>
                        </tfoot>

                    </table>
                    <div class="text-danger">*Note: You can reorder the questions by dragging and dropping them to a new spot.</div>
                </div>
                <div class="clearfix"></div>
            </div>
            <a href="<?php echo base_url('admin/scorecards/edit-scorecard-sections/'.$heading->id); ?>" class="btn btn-primary" style="margin-bottom: 15px">Edit Scorecard</a>
            <br>
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
                    <?php echo $heading->heading; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>