<?php include_once __DIR__."/../dashboard/header.php" ?>




	
    
    <!-- Sidebar -->
    <nav id="sidebar">
    	<div class="sidebar-top"></div>
        
        <h3>菜单</h3>
        
        <!-- Nav menu -->
        <ul class="nav" id="main_nav">
            <li class="active"><a href="javascript:void(0);" class="page_link" dataid="page_home">首页</a></li>
            <li ><a href="<?php echo base_url('admin/users') ?>" class="page_link" dataid="page_users">用户管理</a></li>
            <li ><a href="<?php echo base_url('admin/depart') ?>" class="page_link" dataid="page_departs">科室管理</a></li>
            <li ><a href="<?php echo base_url('admin/drugs') ?>" class="page_link" dataid="page_drugs">药库管理</a></li>
        </ul> <!-- /Nav menu -->
        
        <div class="blocks-separator"></div>
        
    </nav> <!-- Sidebar -->
    
    <div id="jgrowl" class="bottom-right"></div>
    
    <!-- Playground -->
    <section id="playground">
    	
        <!-- Breadcrumb -->
        <div class="three-fourths breadcrumb">
        	<span><a href="#" class="icon entypo home"></a></span>
            <span class="middle"></span>
            <span><a href="#">管理员管理</a></span>
            <span class="middle"></span>
            <span><a href="#" id="current_link_title">首页</a></span>
            <span class="end"></span>
        </div> <!-- /Breadcrumb -->
        
        <!-- Search box -->
        <div class="one-fourth searchbar">
        	<div class="box no-bg">
            	<div class="search-box closed"><input type="text" /><span class="icon awesome search"></span></div>
            </div>
        </div> <!-- /Search box-->
        
        <div class="clear"></div>
        <div id="page_main" class="page_home">
            <div id="page_home">
                <section class="full-width">
                    <div class="box no-bg">
                        <h1>欢迎</h1>
                        <p>这是一个管理员界面</p>
                    </div>
                </section>
            </div>  
        </div>
        
        <div class="clear"></div>
		<!-- Copyright / Footer -->
        <div class="full-width right">
			<div class="box no-bg">
				<div class="line-separator"></div>
				<span class="copyright">by <a href="http://www.billyct.com/" class="creepy-logo fright"></a></span>
            </div>
        </div><!-- /Copyright / Footer -->
        
    </section> <!-- /Playground -->


<script type="text/javascript" src="<?php echo base_url('js/functions/admin-functions.js') ?>"></script> 
<?php include_once __DIR__."/../dashboard/footer.php" ?>