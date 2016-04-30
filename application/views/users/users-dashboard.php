<div class="row">

    <div class="col-md-6">

        <div class="alert alert-info">
            <p>This page will be used for quick info and links to get around the app. Once we get the awards and shopping cart
                added we can add things here automatically to the users page. Also this page will be dynamic according to the user type. Reg. users
                see this page, coaches will see different things, and admins will see another.</p>
        </div>

       <div class="panel panel-info">
            <div class="panel-heading">
                <h5 style="color: #ffffff;">My Scores Chart</h5>
            </div>
            <div class="panel-body">
                <canvas id="linechart-canvas" height="300" width="550"></canvas>
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="row">
            <div class="col-md-6">

                <div class="well well-sm well-colored">
                    <h4>4 Credits Left</h4>
                    <p>Will display how many credits/scored uploads the user has once logic is complete</p>
                </div>

            </div>

            <div class="col-md-6">

                <div class="well well-sm well-colored">
                    <h4>5 Scored</h4>
                    <p>Show how many scored uploads the user has and maybe the 5 most recent scores.</p>
                </div>

            </div>
        </div>

        <div class="alert alert-warning">
            <h4><i class="fa fa-warning"></i> Low On Credits</h4>
            <p>You are getting low on credits.</p>
            <p><a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase More</a></p>
        </div>



    </div>
</div>

<div id="menu-page" data-page="<?php echo $page_name; ?>"></div>