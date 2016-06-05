

</div>
<h5 class="page-title"><i class="fa fa-list"></i> Score Cards</h5>
<div class="container">
    <div class="well well-sm">

        <div class="table-responsive">
            <table class="table table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Level</td>
                        <td>Option</td>
                        <td>Max Score</td>
                        <td>View</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $count = 1;
                    foreach($scorecards as $row) {
                        echo '<tr>';
                            echo '<td>'.$count.'.</td>';
                            echo '<td>'.$row->name.'</td>';
                            echo '<td>'.$row->child_of.'</td>';
                            echo '<td>'.$row->option_name.'</td>';
                            echo '<td>'.$row->max_score.'</td>';
                            echo '<td><a href="'.base_url('user/scorecard/preview/'.$row->id).'" class="btn btn-primary">View</a></td>';
                        echo '</tr>';
                        $count++;
                    }

                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
