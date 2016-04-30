
<h5 style="color: #ffffff">Recent Uploads</h5>

<div id="video-carousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="#" data-toggle="modal" data-target="#videoBox" data-title="afdadfs" data-video="">
                <img src="<?php echo base_url('uploads/bworkman/2016/03/thumbs/6b5e9b85e3347cd7dfa1ead1d94a7c39.jpg'); ?>" alt="Chania">
                <div class="carousel-caption">
                    <h5>Chania</h5>
                </div>
            </a>
        </div>

        <div class="item">
            <a href="#" data-toggle="modal" data-target="#videoBox" data-title="afdadfs" data-video="">
                <img src="<?php echo base_url('uploads/bworkman/2016/03/thumbs/6b5e9b85e3347cd7dfa1ead1d94a7c39.jpg'); ?>" alt="Chania">
                <div class="carousel-caption">
                    <h5>Chania</h5>
                </div>
            </a>
        </div>

        <div class="item">
            <a href="#" data-toggle="modal" data-target="#videoBox" data-title="afdadfs" data-video="">
                <img src="<?php echo base_url('uploads/bworkman/2016/03/thumbs/6b5e9b85e3347cd7dfa1ead1d94a7c39.jpg'); ?>" alt="Flower">
                <div class="carousel-caption">
                    <h5>Chania</h5>
                </div>
            </a>
        </div>

        <div class="item">
            <a href="#" data-toggle="modal" data-target="#videoBox" data-title="afdadfs" data-video="">
                <img src="<?php echo base_url('uploads/bworkman/2016/03/thumbs/6b5e9b85e3347cd7dfa1ead1d94a7c39.jpg'); ?>" alt="Flower">
                <div class="carousel-caption">
                    <h5>Chania</h5>
                </div>
            </a>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#video-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#video-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>




<div class="modal fade" id="videoBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Video Title Here</h4>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>