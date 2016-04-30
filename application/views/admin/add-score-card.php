<div class="well well-sm">
    <h4 class="border-bottom text-primary"><i class="fa fa-plus-circle"></i> Add Scorecard</h4>
    <p>Once you add a scorecard you will be able to build out the scoring side of it.</p>
    <?php echo form_open('admin/scorecards/save-scorecard', array('id'=>'add-card', 'data-redirect'=>base_url('admin/scorecards/build-scorecard'))); ?>

        <div class="row">
            <div class="col-sm-9">
                <fieldset class="form-group">
                    <span class="text-danger">*</span> Name
                    <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="This shows up on top of the scorecard as a heading"></i>
                    <input id="name" name="name" type="text" class="form-control input-md" maxlength="100" required>
                </fieldset>
            </div>
            <div class="col-sm-3">
                <fieldset class="form-group">
                    <span class="text-danger">*</span> Max Score
                    <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="The coach will be limited to submitting scorecards  under the number you enter here"></i>
                    <input id="max-score" name="max_score" type="number" class="form-control input-md" max="500" min="10" required>
                </fieldset>
            </div>
        </div>

        <fieldset class="form-group">
            <span class="text-danger">*</span> Scorecard Heading
            <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="This will be the section where you can explain what the scorecard is grading on. You can add html to this area to better format the look of it."></i>
            <span class="text-muted"> HTML Accepted</span>
            <textarea id="heading" name="heading" class="form-control input-md" required style="height:200"></textarea>
        </fieldset>

        <div class="row">
            <div class="col-sm-4">
                <fieldset class="form-group">
                    <span class="text-danger">*</span> Selection Name
                    <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="When a user selects the type of scorecard they want this will be the name of the selection"></i>
                    <input id="name" name="option_name" type="text" class="form-control input-md" maxlength="100" required>
                </fieldset>
            </div>
            <div class="col-xs-4">
                <fieldset class="form-group">
                    <span class="text-danger">*</span> Belongs To
                    <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="The coach will be limited to submitting scorecards  under the number you enter here"></i>
                    <select id="child_of" class="selector form-control input-lg" required name="child_of">
                        <option>Select..</option>
                        <?php
                            foreach($child_of as $option) {
                                echo '<option>'.$option.'</option>';
                            }
                        ?>
                    </select>
                </fieldset>
            </div>
            <div class="col-xs-4">
                <br>
                <button id="addGroup" class="btn btn-primary" data-toogle="modal" data-target="#add-group"><i class="fa fa-plus"></i> <span class="hidden-xs">Add</span></button>
            </div>
        </div>

        <br>

        <fieldset class="form-group">
            <input type="checkbox" id="active" name="active" class="input-md" value="y" checked>
            Active
            <i class="fa fa-question-circle text-info fa-2x pull-left" data-toggle="tooltip" data-placement="top" title="When checked  users can select this score card"></i>
        </fieldset>

        <br>

        <button type="submit" class="btn btn-success" id="submit">Add Card</button>

        <br>

    <?php echo form_close(); ?>
</div>

<div class="modal fade" id="add-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Group</h4>
            </div>
            <div class="modal-body">
                <label>Group Name:</label>
                <input type="text" id="group-name" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="addGroupName" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
