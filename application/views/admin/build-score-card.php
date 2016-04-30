<div id="ajax-page-load" data-alertsuccess="<?php echo $this->session->flashdata('alert-success'); ?>"></div>


<div class="well well-sm">
    <h4 class="border-bottom"><i class="fa fa-list-alt"></i> Build Scorecard</h4>
    <h5 class="alert alert-info"><?php echo $heading->name; ?></h5>
    <?php echo $heading->heading; ?>

    <?php echo form_open('admin/scorecards/save-built-card/'.$this->uri->segment(4), array('id'=>'builder-form', 'data-redirect' => base_url('admin/scorecards/view-scorecard'))); ?>

        <div id="scorecard-builder" class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Letters?</td>
                        <td>Test</td>
                        <td>Directive Idea</td>
                        <td>Points</td>
                        <td>Co-Efficient</td>
                        <td>Remove</td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                </thead>
                <tbody id="builder">
                    <tr>
                        <td class="increment text-center border-right">1 <input type="hidden" name="order[]" value="1"></td>
                        <td class="border-right"><input type="text" name="letters[]" class="form-control" required maxlength="10"><input type="hidden" name="divider[]" value="n"></td>
                        <td class="border-right" width="24%"><textarea type="text" name="test[]" class="form-control" required maxlength="255"></textarea></td>
                        <td class="border-right" width="24%"><textarea type="text" name="directive[]" class="form-control" required maxlength="255"></textarea></td>
                        <td class="border-right"><input type="text" name="points[]" class="form-control center" value="0" required maxlength="2"></td>
                        <td class="border-right"><input type="text" name="co_efficent[]" class="form-control center" value="0" required maxlength="2"></td>
                        <td class="text-center"><i class="fa fa-times-circle fa-fw text-default fa-3x disabled"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Save Card</button>
    <?php echo form_close(); ?>
</div>


<div id="addNewRow">
    <button id="builderDivider" class="btn btn-primary"><i class="fa fa-minus"></i> Add Divider</button>
    <button id="builderRow" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Row</button>
</div>