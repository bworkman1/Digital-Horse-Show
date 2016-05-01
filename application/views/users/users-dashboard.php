<div class="row">

    <div class="col-md-6">

       <div class="panel panel-info">
            <div class="panel-heading">
                My Scores Chart
            </div>
            <div class="panel-body" id="graph-chart" data-graphurl="<?php echo base_url('user/dashboard/getScoresGraphValues'); ?>">
                <div id="noneFound"></div>
                <canvas id="linechart-canvas" height="300" width="550"></canvas>
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="panel panel-primary">
            <div class="panel-heading">
                Recent Scores
            </div>
            <div class="panel-body">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td class="text-center">Score</td>
                            <td class="text-right">View</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Video Name</td>
                            <td class="text-center">344</td>
                            <td class="text-right"><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Video Name</td>
                            <td class="text-center">344</td>
                            <td class="text-right"><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Video Name</td>
                            <td class="text-center">344</td>
                            <td class="text-right"><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Video Name</td>
                            <td class="text-center">344</td>
                            <td class="text-right"><a href="#" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                    </tbody>
                </table>
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