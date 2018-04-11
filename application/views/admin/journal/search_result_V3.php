<?php foreach ($results_V3 as $journal_item) :?>
<div id="journalcontent">
<h3><?php echo $journal_item['V3Title']; ?></h3>
	<div class="main">
		Created by: <?php echo $journal_item['V3StudFirstName'] . " " . $journal_item['V3StudLastName'] ?><br>
		Student ID: <?php echo $journal_item['V3StudentID'] ?><br>
		Last modified: <?php echo $journal_item['V3LastChanged'] ?><br>
		<div class="main">
            <?php echo $journal_item['V3Content']; ?>
    	</div>
	</div>
	<p><a href="<?php echo site_url('journal/admin/V3/' . $journal_item['V3JournalID']); ?>">View article</a></p>
	<hr>
</div>
<?php endforeach; ?>
