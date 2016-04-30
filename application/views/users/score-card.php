<h5 class="page-title"><i class="fa fa-list"></i> Score Card</h5>
<div class="row">
    <div class="col-md-6">

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

    </div>
    <div class="col-md-6">

        <div class="well well-sm">
            <div class="table-responsive">
                <table id="scoreCard" class="table table-bordered">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Test</td>
                            <td>Directive Ideas</td>
                            <td>Points</td>
                            <td>Coefficent</td>
                            <td>Total</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td valign="bottom"><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><b>1. A</b><br>Between <b>X & C</b></td>
                        <td>Enter working trot raising.<b>Medium walk</b></td>
                        <td>Straightness on centerline and in transition: clear trot and walk rhythm.</td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                        <td><input type="text" name="score_1" class="form-control"></td>
                    </tr>

                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>


