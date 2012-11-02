 <?php include_once "header.php" ?>
 <section id="login-container">
        <div id="login_header"></div>
		
		<form id="login_form" action="<?php echo base_url("user/login") ?>" method="post">
			<div id="login_wrapper">
				<div class="login_wrapper_container">
					<div class="float_center_box">
						
						<div class="one-half logo-box">
							<img src="<?php echo base_url('img/login-logo.png') ?>" alt="HIS管理系统">
						</div>
						
						<div class="clear"></div>
						<div class="box">
							<div class="inner">
							
								<div class="contents">
									<div class="one-half username-half">
										<label>用户名</label>
										<div class="field-box">
											<span class="icon awesome user for-input"></span>
											<input type="text" name="username" class="w-icon validate[required]"></div>
										<div class="clear"></div>
									</div>
									<div class="one-half password-half">
										<label>密码</label>
										<div class="field-box">
											<span class="icon awesome lock for-input">
											</span><input type="password" name="password" class="w-icon validate[required]"></div>
										<div class="clear"></div>
									</div>
									
									<div class="clear"></div>
									<div class="line-separator"></div>
									
									<div class="one-half">
										<a href="#">忘记密码</a>
									</div>
									<div class="one-half right">
										<input type="submit" value="登录" class="button blue tiny">
									</div>
									
									<div class="clear"></div>
									
								</div>
								<div class="clear"></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
        <div id="login_footer">
        	
        </div>
    </section>

<?php include_once "footer.php" ?>