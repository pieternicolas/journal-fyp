<?php foreach ($results_V2 as $journal_item) :?>
<div id="journalcontent">
<h3><?php echo $journal_item['V2Title']; ?></h3>
	<div class="main">
		Created by: <?php echo $journal_item['V2StudFirstName'] . " " . $journal_item['V2StudLastName'] ?><br>
		Student ID: <?php echo $journal_item['V2StudentID'] ?><br>
		Last modified: <?php echo $journal_item['V2LastChanged'] ?><br>
		<div class="main">
            <?php echo $journal_item['V2Content']; ?>
    	</div>
	</div>
	<p><a href="<?php echo site_url('journal/admin/V2/' . $journal_item['V2JournalID']); ?>">View article</a></p>
	<hr>
</div>
<?php endforeach; ?>
