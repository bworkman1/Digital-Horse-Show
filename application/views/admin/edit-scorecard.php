<div id="ajax-page-load" data-alertsuccess="<?php echo $this->session->flashdata('alert-success'); ?>"></div>
</div>
<h5 class="page-title"><i class="fa fa-list-alt"></i> Edit Scorecard</h5>

<div class="container-fluid">
    <div class="well well-sm">
        <h4 class="border-bottom text-primary"><?php echo $heading->name; ?></h4>
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fa fa-bullseye"></i> Rider Scoring</h5>
            </div>
            <div class="col-md-6">
                <button id="score-help" class="btn btn-success pull-right" data-target="#scoreHelp" data-toggle="modal">Scoring Instructions</button>
            </div>
        </div>
        <br>
        <?php echo form_open('admin/scorecards/save-scorecard-edits/'.$this->uri->segment(4), array('id'=>'builder-form', 'data-redirect' => current_url())); ?>

        <div id="scorecard-builder" class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Letters?</td>
                        <td>Test</td>
                        <td>Directive Idea</td>
                        <td>Default Points</td>
                        <td>Default Co-Efficient</td>
                        <td>Remove</td>
                    </tr>

                </thead>
                <tbody id="builder">
                    <?php
                        $count = 1;
                        foreach($rows as $r) {
                            if($r->divider == 'y') {
                                echo '<tr data-rowid="'.$r->id.'" data-order="'.$r->order.'" draggable="true">';
                                echo '<td class="increment text-center border-right">'.$count.' </td>';
                                echo '<td colspan="5" style="text-align: left !important;">';
                                    echo '<input type="text" name="test[]" value="'.$r->test.'" class="form-control" required maxlength="100">';
                                    echo '<input type="hidden" name="order[]" value="'.$r->order.'">';
                                    echo '<input type="hidden" name="letters[]" value="'.$r->order.'">';
                                    echo '<input type="hidden" name="divider[]" value="y">';
                                    echo '<input type="hidden" name="directive[]" value="">';
                                    echo '<input type="hidden" name="points[]" value="">';
                                    echo '<input type="hidden" name="co_efficent[]" value="">';
                                echo '</td>';
                                echo '<td class="text-center"><i class="fa fa-times-circle fa-fw text-danger removeRow fa-3x"></i></td>';
                            } else {
                                echo '<tr data-rowid="'.$r->id.'" data-order="'.$r->order.'" draggable="true">';
                                    echo '<td class="increment text-center border-right">'.$count.' <input type="hidden" name="order[]" value="'.$r->order.'"></td>';
                                    echo '<td class="border-right"><input type="text" name="letters[]" value="'.$r->letters.'" class="form-control" required maxlength="10"></td>';
                                    echo '<td class="border-right" width="24%"><textarea type="text" name="test[]" class="form-control" required maxlength="255">'.$r->test.'</textarea></td>';
                                    echo '<td class="border-right" width="24%"><textarea type="text" name="directive[]" class="form-control" required maxlength="255">'.$r->directive.'</textarea></td>';
                                    echo '<td class="border-right"><input type="text" name="points[]" value="'.$r->points.'" class="form-control center" value="0" required maxlength="2"></td>';
                                    echo '<td class="border-right"><input type="text" name="co_efficent[]"  value="'.$r->co_effecient.'" class="form-control center" value="0" required maxlength="2"></td>';
                                    echo '<td class="text-center"><i class="fa fa-times-circle fa-fw removeRow text-danger fa-3x"></i></td>';
                                    echo '<input type="hidden" name="divider[]" value="n">';
                            }
                            echo '</tr>';
                            $count++;
                        }
                    ?>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"><h6><b>Leave arena in free walk. Exit at A.</b> <span class="text-danger">Max Score: <?php echo $heading->max_score; ?></span></h6></td>
                    <td class="text-right"><b>Errors:</b></td>
                    <td class="text-center"><?php echo $scores->errors; ?></td>
                    <td></td>

                </tr>
                <tr>
                    <td colspan="4" id="ajax-feedback"></td>
                    <td class="text-right"><b>Total:</b></td>
                    <td class="text-center"><?php echo $scores->total; ?></td>
                    <td></td>

                </tr>
                </tfoot>
            </table>
        </div>
        <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>" required>
        <button type="submit" class="btn btn-primary">Save Card</button>
        <?php echo form_close(); ?>

    </div>

    <div id="addNewRow">
        <button id="builderDivider" class="btn btn-primary"><i class="fa fa-minus"></i> Add Divider</button>
        <button id="builderRow" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Row</button>
    </div>


    <div id="scoreHelp" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
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