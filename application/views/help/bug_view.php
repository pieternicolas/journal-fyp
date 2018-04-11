<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Report Bug</title>
<?php echo link_tag('assets/css/reportbug.css'); ?>

</head>

<body>

    <!-- Begin Page Content -->
	<div id="outer">
        <div id="container">
            <?php echo form_open('user_loggedin/mail_bugreport'); ?>       
                <input type="text" id="Title" name="title" placeholder="Title" style="width:623px"> <br>
                    <div id ="errormessage" ><?php echo form_error('Title'); ?></div>
                    <br>
                <B id="content">Content</B>
                <textarea rows="15" cols="100" id="Content" name="content">  </textarea><br>
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