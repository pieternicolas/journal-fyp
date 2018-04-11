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
		
		<script>
function showStrength(str) {
if (str.length == 0) { 
document.getElementById("txtStren").innerHTML = "";
return;
} 
else {
	var pos = str.search("#");
	if (pos > -1){
		var str = str.replace("#", "!");
	}
	var pos = str.search(" ");
	if (pos > -1){
	var str = str.replace(" ", "@");
	}	
	var pos = str.search("&");
	if (pos > -1){
	var str = str.replace("&", "$");
	}	
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtStren").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "/assets/pswd/getstrength.php?q=" + str, true);
xmlhttp.send();
}
}
</script>

<script>
function showHint(str) {
	var pos = str.search("#");
	if (pos > -1){
		var str = str.replace("#", "!");
	}	
	var pos = str.search(" ");
	if (pos > -1){
	var str = str.replace(" ", "@");
	}	
	var pos = str.search("&");
	if (pos > -1){
	var str = str.replace("&", "$");
	}	
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "/assets/pswd/gethint.php?q=" + str, true);
xmlhttp.send();
}
</script>

        </head>
<body onload="showStrength(''), showHint('')">

    <!-- Begin Page Content -->
	<div id="outer">
    <div id="container">
        <?php echo form_open('user_loggedin/change_password'); ?>

            <input type="password" id="current" name="current" placeholder="Current Password" style="width:623px"> <br>
				<div id ="errormessage" ><?php echo form_error('email'); ?></div>
            <input type="password" id="newpass" name="password" placeholder="New Password" onkeyup="showStrength(this.value), showHint(this.value)" style="width:623px"> <br>
				<div id ="errormessage" ><?php echo form_error('age'); ?></div>
            <div id="strnbox">
							<textarea id="txtHint" disabled readonly placeholder="Password Hints"> </textarea>
				<textarea id="txtStren" disabled readonly placeholder="Password Strength"> </textarea> 
            </div>
			<input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" style="width:623px">
				<div id ="errormessage" ><?php echo form_error('confirmpassword'); ?></div>
            <div id="lower">
			   <input type="submit" value="Submit" id="submitbtn">
		</form>
		<?php echo form_open('home'); ?>
			<input type="submit" value="Cancel" id="cancelbtn">
		</form>
            </div><!--/ lower-->
		
    </div><!--/ container-->
	</div>
    <!-- End Page Content -->
</body>
        </html>