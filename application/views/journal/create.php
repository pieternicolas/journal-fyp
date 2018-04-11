
<?php echo validation_errors(); ?>
<?php $hidden = array('date_created' => date('Y-m-d H:i:s')); ?>
<?php echo form_open('journal/create','',$hidden); ?>

    <label for="title">Journal Title</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
		$data = array(
		'name' => 'title',
		'id' => 'title',
		'value' => '',
		'required' => 'required');
		
		echo form_input($data);
	?><br />

    <label for="Content">Journal Content</label>
    <?php 
		$data = array(
    	'name' => 'content',
    	'id' => 'journalcontent',
      	'value' => '',
		'required' => 'required');
		
		echo form_textarea($data);
	?><br />
		<div id="lower">
                   <input type="submit" value="Submit" id="submitbtn">
                </form>
                <?php echo form_open('home'); ?>
                    <input type="submit" value="Cancel" id="cancelbtn">
                </form>
         </div><!--/ lower-->
