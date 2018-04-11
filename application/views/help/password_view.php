<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FORGET PASSWORD</title>
<?php echo link_tag('assets/css/forget.css');?>
</head>
<body>
	 <!-- Begin Page Content -->
	<div id="outer">
    <div id="container">
		  
         <?php echo form_open('Help/reset_password'); ?>
           <input type="text" id="username" name="username" placeholder="Username">
          <input type="email" id="email" name="email" placeholder="Email">
          <div id="errormessage"><?php echo validation_errors(); ?></div>
          <div id="lower">
			  <div id="btn1">
                   <input type="submit" value="Submit" >
				   </div>
                </form>
				<div id="btn2">
                <?php echo form_open('home'); ?>
                    <input type="submit" value="Cancel" id="cancelbtn">
                </form>
				</div>
          </div><!--/ lower-->
          </form>
    </div><!--/ container-->
	</div><!--/ outer-->
    <!-- End Page Content -->
</body>
</html>