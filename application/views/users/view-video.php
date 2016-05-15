<?php
    $this->load->view('ui-elements/ui-feedback');
    if($video->flagged == 'y') {
        echo '<div class="alert alert-warning"><b><i class="fa fa-exclamation-triangle"></i> Warning:</b> This video has been reported to us and might be removed.</div>';
    }
?>

<div class="row">
    <div class="col-md-9">

        <div class="well well-sm wow fadeInUp">
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


        <div class="row">
            <div class="col-xs-6">
                <?php if($prev) { ?>
                <a href="<?php echo base_url('user/my-uploads/view/'.$prev->id); ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Previous</a>
                <?php } ?>
            </div>
            <div class="col-xs-6">
                <?php if($next) { ?>
                    <a href="<?php echo base_url('user/my-uploads/view/'.$next->id); ?>" class="pull-right btn btn-primary">Next <i class="fa fa-arrow-circle-right"></i></a>
                <?php } ?>
            </div>
        </div>

        <br>
    </div>

    <div class="col-md-3">
        <?php $this->load->view('ui-elements/video-details-card', $video); ?>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <?php
            $data['profile'] = $coach;
            $data['type'] = 'coach';
            $this->load->view('ui-elements/user-profile-card', $data);
        ?>
    </div>
    <div class="col-md-6">
        <?php
            $data['profile'] = $user;
            $data['type'] = 'user';
            $this->load->view('ui-elements/user-profile-card', $data);
        ?>
    </div>
</div>

<input type="hidden" id="name" value="<?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>">
<input type="hidden" id="url" value="<?php echo $this->session->userdata('profile_name'); ?>">


<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>