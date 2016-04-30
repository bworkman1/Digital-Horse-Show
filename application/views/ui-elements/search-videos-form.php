<?php echo form_open('user/search/', array('id'=>'search-form')); ?>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="q">
        <div class="input-group-btn">
            <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
<?php echo form_close(); ?>