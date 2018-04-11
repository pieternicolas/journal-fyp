<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Login</title>
<?php echo link_tag('assets/css/adminlogin.css');?>
</head>
<body>
    <!-- Begin Page Content -->
	<div id="outer">
    <div id="container">
		  
          <?php echo form_open('admin_login/credential_validation'); ?>
          <input type="text" id="username" name="username" placeholder="Username">
          <input type="password" id="password" name="password" placeholder="Password">
          <div id="errormessage"><?php echo validation_errors(); ?></div>
          <div id="lower">
              
              <input type="submit" value="Login" >
          </div><!--/ lower-->
          </form>
    </div><!--/ container-->
	</div><!--/ outer-->
    <!-- End Page Content -->
</body>
</html>


