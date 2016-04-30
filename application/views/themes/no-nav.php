<html lang="en">

<?php $this->load->view('common/header'); ?>

<body>

<div id="main">
    <div class="container">
        <?php if($this->load->get_section('text_header') != '') { ?>
            <h3><?php echo $this->load->get_section('text_header');?></h3>
        <?php }?>

        <?php echo $output;?>
        


    </div>
</div> <!-- /container -->



<script src="<?php echo base_url('assets/themes/default/js/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/default/js/bootstrap.min.js'); ?>"></script>

<?php
foreach($js as $file){
    echo "\n\t\t";
    ?><script src="<?php echo $file; ?>"></script><?php
} echo "\n\t";
?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>