 <!DOCTYPE html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Change Password</title>
		<?php echo link_tag('/assets/css/Changepass.css');?>
        <style>
        /* Basics */
        html, body {
            width: 100%;
            height: 100%;
            font-family: "Helvetica Neue", Helvetica, sans-serif;
            color: #444;
            -webkit-font-smoothing: antialiased;
            background: #f0f0f0;
			background-image: url("../../assets/img/background.jpg");
			-webkit-background-size:cover;
			background-repeat: no-repeat;
			background-position: center;
        }
		</style>
		
		

        </head>

        <body>

            <!-- Begin Page Content -->
            <?php echo validation_errors(); ?>
            <div id="container">
            	
                <?php echo form_open('admin_user/change_password');?>
                    <label for="loginmsg" style="color:hsla(0,100%,50%,0.5); font-family:"Helvetica Neue",Helvetica,sans-serif;"> </label>   
					<div id="muss">
					<input type="password" id="current" name="current" placeholder="Current Password" style="width:623px"> <br>
                    <input type="password" id="password" name="password" placeholder="New Password" style="width:623px"> <br>
					<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" style="width:623px">
                
					<div id="lower">
					<input type="submit" value="Submit" id="submitbtn">
					</form>
					<?php echo form_open('admin_home'); ?>
						<input type="submit" value="Cancel" id="cancelbtn">
					</form>
						</div><!--/ lower-->
				
            </div><!--/ container-->
            <!-- End Page Content -->
        </body>
        </html>
