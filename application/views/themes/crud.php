<html lang="en">

<?php $this->load->view('common/header-crud'); ?>

<body>
<?php $this->load->view('common/admin-nav'); ?>
<div id="main">
        <?php echo $output;?>
       
</div> <!-- /container -->

<?php $this->load->view('common/footer'); ?>




<?php
foreach($js as $file){
    echo "\n\t\t";
    ?><script src="<?php echo $file; ?>"></script><?php
} echo "\n\t";
?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('assets/themes/default/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/default/plugins/wow/wow.min.js'); ?>"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>