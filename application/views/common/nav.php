<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="<?php echo base_url('assets/themes/default/images/logo.jpg'); ?>" class="logo" width="75px" height="50px">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li id="nav-dashboard"><a href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a></li>
                <li class="dropdown">
                    <a href="<?php echo base_url('user/my-uploads/uploads'); ?>" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Uploads</a>
                    <ul class="dropdown-menu">
                        <li id="nav-my-uploads""><a href="<?php echo base_url('user/my-uploads'); ?>"><i class="fa fa-video-camera fa-fw"></i> My Uploads</a></li>
                        <li id="nav-add-upload"><a href="<?php echo base_url('user/upload-video'); ?>"><i class="fa fa-upload fa-fw"></i> Add Upload</a></li>
                    </ul>
                </li>
                <li id="nav-my-scores"><a href="<?php echo base_url('user/my-scores'); ?>">My Scores</a></li>
                <li id="nav-coaches"><a href="<?php echo base_url('user/coaches'); ?>">Coaches</a></li>

                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('user/my-profile'); ?>">My Profile</a></li>
                        <li><a href="<?php echo base_url('user/my-profile/edit'); ?>">Edit Profile</a></li>
                        <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                    </ul>
                </li>

                <li id="nav-packages"><a href="<?php echo base_url('user/packages'); ?>">Packages</a></li>
                <li id="nav-rules"><a href="<?php echo base_url('user/rules-and-patterns'); ?>">Rules &amp; Patterns</a></li>


            </ul>

            <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                <li class="dropdown">
                    <a href="<?php echo base_url('user/my-profile'); ?>" class="dropdown-toggle profile disabled" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img id="user-thumb" src="<?php echo base_url($this->session->userdata('user_image')); ?>" class="img-circle" width="50" height="50">
                    </a>
                    <ul class="dropdown-menu">
                        <li id="nav-my-profile"><a href="<?php echo base_url('user/my-profile'); ?>"><i class="fa fa-user"></i> My Profile</a></li>
                        <li id="nav-edit-profile"><a href="<?php echo base_url('user/my-profile/edit'); ?>"><i class="fa fa-pencil"></i> Edit Profile</a></li>
                        <li id="nav-payments"><a href="<?php echo base_url('user/payment/all'); ?>"><i class="fa fa-money"></i> Payments</a></li>
                        <li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>