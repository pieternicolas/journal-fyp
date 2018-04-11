<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
<?php echo link_tag('assets/css/login.css');?>
</head>
<body>
    <!-- Begin Page Content -->
	<div id="outer">
        <div id="container">
              
              <?php echo form_open('Login/credential_validation'); ?>
              <input type="text" id="username" name="username" placeholder="Username">
              <input type="password" id="password" name="password" placeholder="Password">
              <div id="errormessage"><?php echo validation_errors(); ?></div>
              <div id="lower">
                  <a href="<?php echo site_url('help/forget_username'); ?>">Forgot Username</a> <br>
                  <a href="<?php echo site_url('help/forget_password'); ?>">Forgot Password</a>
                  <input type="submit" value="Login" >
              </div><!--/ lower-->
              </form>
        </div><!--/ container-->
	</div><!--/ outer-->
    <!-- End Page Content -->
</body>
</html>