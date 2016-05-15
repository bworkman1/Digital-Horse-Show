<?php $this->load->view('ui-elements/ui-feedback'); ?>
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
                <i class="fa fa-bar-chart"></i> Recent Scores
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
                    <?php
                        if($recent_scores) {
                            $count = 0;
                            foreach ($recent_scores as $row) {
                                $count++;
                                echo '<tr>';
                                echo '<td>' . $count . '.</td>';
                                echo '<td>' . $row->client_name . '</td>';
                                echo '<td class="text-center">' . $row->score . '</td>';
                                echo '<td class="text-right"><a href="' . base_url('user/scorecard/view/' . $row->video_id) . '" class="btn btn-primary btn-sm">View</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">No scored videos yet!</td></tr>';
                        }
                    ?>

                    </tbody>
                </table>
                <?php
                    if($recent_scores) {
                        echo '<a href="'.base_url('user/my-scores').'" class="btn btn-primary">View All</a>';
                    }
                ?>
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