<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 

<title>HIS管理系统</title>

<link rel="stylesheet" href="<?php echo base_url('css/ui-lightness/jquery-ui-1.8.18.custom.css') ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('css/jquery.jgrowl.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('css/jquery.jqplot.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/icons.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/forms.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/tables.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/ui.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/responsiveness.css') ?>" type="text/css" />

<!-- jQuery -->
<script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('js/jquery-ui.min.js') ?>"></script>
<!-- jqPlot -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.jqplot.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.barRenderer.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.highlighter.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.cursor.min.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.pointLabels.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.pieRenderer.min.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('js/plugins/jqplot.donutRenderer.min.js') ?>"></script>
<!-- jgrowl -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.jgrowl.min.js') ?>"></script>
<!-- Knob -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.knob.js') ?>"></script>
<!-- WYSIHTML5 -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.wysihtml5.js') ?>"></script>
<!-- SparkLine -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.sparkline.js') ?>"></script>
<!-- dataTable -->
<!--<script type="text/javascript" src="<?php echo base_url('js/jquery.datatables.js') ?> "></script> -->
<!-- jeditable -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.jeditable.js') ?>"></script>

<!-- dot.js -->
<script type="text/javascript" src="<?php echo base_url('js/doT.min.js') ?>"></script>

<!-- underscore.js -->
<script type="text/javascript" src="<?php echo base_url('js/underscore.js') ?>"></script>

<!-- Masked inputs -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.masked-inputs.js') ?>"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		// jGrowl
		jQuery('#jgrowl').jGrowl('登录成功');
		jQuery('#jgrowl').jGrowl('欢迎回来<?php echo $session['auth']['username']?>');
	});
</script>

<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
<!--[if lte IE 7]> <script src="js/IE8.js" type="text/javascript"></script> <![endif]--> 
<!--[if lt IE 7]> <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/> <![endif]--> 

</head>

<body id="index" class="home">
    
    <div id="loading-block"></div> <!-- Loading block -->
    <!-- Container -->
	<div id="container">

		<!-- Header -->
	    <header id="header">
	        <figure id="logo"><a href="dashboard.html" class="logo"></a></figure>
	        <section id="general-options">
	        	<a href="#" class="settings tipsy-header" title="设置"></a>
	            <a href="#" class="users tipsy-header" title="用户"></a>
	            <a href="#" class="messages tipsy-header" title="信息"></a>
	        </section>
	        <section id="userinfo">
	        	<span class="welcome">欢迎回来 <strong><?php echo $session['auth']['username']?></strong> </span>
	            <span class="last-login">上一次登录时间是<?php echo date('Y-m-d', $session['last_activity'])?></span>
	            <div class="profile">
	            	<div class="links">
	                    <a href="#">个人首页</a>
	                    <a href="<?php echo base_url('/user/logout') ?>" class="logout">退出</a>
	                </div>
	            	<img src="http://tp3.sinaimg.cn/1842509582/50/40005793166/1" alt="billyct">
	            </div>
	        </section>
	       <!--  <section id="responsive-nav">
	            <select id="nav_select">
	            	<option value="">Navigate</option>
	            	<option value="dashboard.html">Dashboard</option>
	                <option value="form-elements.html">Form Elements</option>
	            </select>
	        </section> -->
	    </header> <!-- /Header -->
	    
	    <div class="clear"></div>		