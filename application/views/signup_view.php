<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Up</title>
<?php echo link_tag('assets/css/signup.css');?>
</head>

<body>

    <!-- Begin Page Content -->
	<div id="outer">
    <div id="container">
        <?php echo form_open('User/create_user'); ?>
        
            <div id="muss">
                <input type="text" id="first" name="firstname" placeholder="First Name">
                <input type="text" id="last" name="lastname" placeholder="Last Name">
            </div>
            <input type="text" id="username" name="username" placeholder="Username" style="width:623px"> <br>
				<div id ="errormessage" ><?php echo form_error('username'); ?></div>
            <input type="text" id="email" name="email" placeholder="Email" style="width:623px"> <br>
				<div id ="errormessage" ><?php echo form_error('email'); ?></div>
            <input type="number" id="age" name="age" placeholder="Age" style="width:623px"> <br>
            	<div id ="errormessage" ><?php echo form_error('age'); ?></div>
            <input type="password" id="password" name="password" placeholder="Password" style="width:623px" > <br>
				<div id ="errormessage" ><?php echo form_error('password'); ?></div>
			<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" style="width:623px">
				<div id ="errormessage" ><?php echo form_error('confirmpassword'); ?></div>
            <div id="lower">
			   <input type="submit" value="Submit" id="submitbtn">
            </div><!--/ lower-->

    </div><!--/ container-->
	</div>
    <!-- End Page Content -->
</body>
</html>