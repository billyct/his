<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 

<title>HIS管理系统</title>

<link rel="stylesheet" href="<?php echo base_url('css/ui-lightness/jquery-ui-1.8.18.custom.css') ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('css/validationEngine.jquery.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('css/icons.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/forms.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/tables.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/ui.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/responsiveness.css') ?>" type="text/css" />

<!-- jQuery -->
<script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js') ?>"></script>
<!-- Validation engine -->
<script type="text/javascript" src="<?php echo base_url('js/languages/jquery.validationEngine-en.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validationEngine.js') ?>"></script>
<!-- Knob -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.knob.js') ?>"></script>

<!-- Caffeine custom JS -->
<script type="text/javascript" src="<?php echo base_url('js/custom.js') ?>"></script>

<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
<!--[if lte IE 7]> <script src="<?php echo base_url('js/IE8.js') ?>" type="text/javascript"></script> <![endif]--> 
<!--[if lt IE 7]> <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('css/ie6.css') ?>"/> <![endif]--> 

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#login_form").validationEngine();
	});
</script>

</head>
<body id="index" class="home">
    <div id="loading-block"></div> <!-- Loading block -->