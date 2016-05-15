</div>

<div class="page-title-options">
    <div class="row">
        <div class="col-md-9">
            <h5><i class="fa fa-trophy"></i> My Scores</h5>
        </div>
        <div class="col-md-3">
            <form action="http://localhost/digitalhorseshow/user/my-uploads/sort" style="margin:0;" method="post" accept-charset="utf-8">
                <select class="form-control" name="sort_by" onchange="this.form.submit()"><option value="id">Newest</option><option value="star_rating">Rating</option><option value="size">Size</option><option value="client_name">Name</option><option value="oldest">Oldest</option></select></form>        </div>
    </div>
</div>
<div class="container">
    <div class="well well-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead style="font-weight: bold">
                <tr>
                    <td class="text-right">#</td class="text-right">
                    <td>Name</td>
                    <td>Score Type</td>
                    <td>Submitted</td>
                    <td>Coach</td>
                    <td class="text-center">Score</td>
                    <td class="text-center">Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $footer_totals = array(
                    'amount'    => 0,
                    'credits'   => 0,
                );
                $count = 0;
                foreach($videos as $scored) {
                    $count++;
                    echo '<tr>';
                    echo '<td class="text-right">'.$count.')</td>';
                    echo '<td>'.$scored->client_name.'</td>';
                    echo '<td>'.$scored->option_name.'</td>';
                    echo '<td>'.date('m-d-Y', strtotime($scored->uploaded)).'</td>';
                    echo '<td>'.$scored->first_name.' '.$scored->last_name.'</td>';
                    echo '<td class="text-center">'.$scored->score.'/'.$scored->max_score.'</td>';
                    echo '<td class="text-center">';
                    echo '<a href="'.base_url('user/my-uploads/view/'.$scored->video_id).'" data-toggle="tooltip" title="View Video" class="btn btn-sm btn-primary"><i class="fa fa-youtube-play"></i></a>';
                    echo '<a href="'.base_url('/user/scorecard/view/'.$scored->video_id).'" class="btn btn-sm btn-info" data-toggle="tooltip" title="View Scorecard" style="margin-left:4px;"><i class="fa fa-list-alt"></i></a>';
                    echo '</td>';
                    echo '</tr>';

                    $footer_totals['amount'] = $footer_totals['amount']+$payment->amount;
                    $footer_totals['credits'] = $footer_totals['credits']+$payment->credits;
                }
                ?>
                </tbody>
            </table>
        </div>
        <hr>
        <a href="<?php echo base_url('user/payment'); ?>" class="btn btn-primary">Purchase More</a>
    </div>




    <div id="menu-page" data-page="<?php echo $page_name; ?>"></div>