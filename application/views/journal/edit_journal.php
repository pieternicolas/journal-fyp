
<?php echo validation_errors(); ?>
<?php $hidden = array('journal_id' => $journal_item['V1JournalID'], 'date_created' => date('Y-m-d H:i:s')); ?>
<?php echo form_open('journal/edit','',$hidden); ?>

    <label for="title">Journal Title</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
		$data = array(
		'name' => 'title',
		'id' => 'title',
		'value' => $journal_item['V1Title'],
		'required' => 'required');
		
		echo form_input($data);
	?><br />

	<label for="content">Journal Content</label>
	<?php 
		$data = array(
    	'name' => 'content',
    	'id' => 'journalcontent',
      	'value' => $journal_item['V1Content'],
		'required' => 'required');
		
		echo form_textarea($data);
	?><br />
	<div id="lower">
        <input type="submit" value="Edit" id="submitbtn">
         </form>
          <?php echo form_open('home'); ?>
                    <input type="submit" value="Cancel" id="cancelbtn">
                </form>
         </div><!--/ lower-->