<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin</title>
<?php echo link_tag('assets/css/adminjournal.css'); ?>

</head>

<body>

    <!-- Begin Page Content -->

    <div id="outer">
        <div id="header">
            <div id="Title"><!-- title -->
                <h1>
					<a id="home_link" href="<?php echo site_url('admin_home'); ?>">
						<img src="<?php echo base_url('/assets/img/home_logo_white.png') ?>" alt="home" width="80%" height="40%" border="0">
					</a>
				</h1>
                Welcome <?php echo $this->current_session['firstname'] . " " . $this->current_session['lastname']; ?>! <br>
                <?php $now = time(); echo unix_to_human($now) ?>
            </div><!--/ title -->
            
            <div id="Banner"><!-- banner -->
                <div id="bannerleft">
				<img src="<?php echo base_url('/assets/img/cyberjournal-external-web-banner.jpg') ?>" width="100%" height="100%" border="0">
                </div>
                <div id="bannerright">
                    <a id="bannerrightlink" href="<?php echo site_url('admin_home/logout');?>">Logout</a> <br> <br><!-- Logout -->
                    <a id="bannerrightlink" href="<?php echo site_url('admin_user/change_password'); ?>">Change password</a> <br><br><!-- Change password -->
                    <a id="bannerrightlink" href="<?php echo site_url('admin_user/create_user'); ?>"> Create admin</a> <br><br><!-- Create admin -->
                    <a id="bannerrightlink" href="<?php echo site_url('admin_user/view_admins'); ?>">View admins</a><!-- View list of admin -->
                </div>
                <div style="clear: both;"></div>
            </div><!--/ banner -->
            
            <div style="clear: both;"></div>
        </div>
        
        <div id="container"><!-- container -->
            <div id="side"><!-- side -->
                <?php echo form_open('admin_journal/search'); 
                echo form_input(array('name'=>'search', 'id'=>'search', 'placeholder'=>'Search')); ?>
                <select name='searchmonth' id="srcmonth">
                	<option value=" ">Filter by Month</option>
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>
                <select name="searchversion" id="srcversion">
                	<option value=" ">Filter by Version</option>
                    <option value="V1">V1</option>
                    <option value="V2">V2</option>
                    <option value="V3">V3</option>
                </select>
                <input type="submit" value="Search" name="searchbtn" id="searchbtn">
                </form> <!-- Search Text Field-->
                                
                <div id="calenderbox">
                    <div id="calender"><?php echo $this->calendar->generate(); ?></div>
                </div> 
    
            </div><!--/ side -->
        <div id="content"><!-- content -->