<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="resource-type" content="document" />
    <meta name="robots" content="all, index, follow"/>
    <meta name="googlebot" content="all, index, follow" />
    <meta name="author" content="Brian Workman">
    <?php

    if(!empty($meta))
        foreach($meta as $name=>$content){
            echo "\n\t\t";
            ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
        }
    echo "\n";

    if(!empty($canonical))
    {
        echo "\n\t\t";
        ?><link rel="canonical" href="<?php echo $canonical?>" /><?php

    }
    echo "\n\t";

    foreach($css as $file){
        echo "\n\t\t";
        ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
    } echo "\n\t";

    ?>
    <link href="<?php echo base_url('assets/themes/default/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/themes/default/css/general.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/themes/default/css/custom.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/themes/default/css/ie10-viewport-bug-workaround.css'); ?>" rel="stylesheet">

    <link rel="icon" href="assets/themes/default/images/favicon.ico">
    <link rel="shortcut icon" href="<?php echo base_url('assets/themes/default/images/favicon.png'); ?>" type="image/x-icon"/>
    <meta property="og:image" content="<?php echo base_url('assets/themes/default/images/facebook-thumb.png'); ?>"/>
    <link rel="image_src" href="<?php echo base_url('assets/themes/default/images/facebook-thumb.png'); ?>" />


</head>