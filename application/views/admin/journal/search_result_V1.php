<?php foreach ($results_V1 as $journal_item) :?>
<div id="journalcontent">
<h3><?php echo $journal_item['V1Title']; ?></h3>
	<div class="main">
		Created by: <?php echo $journal_item['V1StudFirstName'] . " " . $journal_item['V1StudLastName'] ?><br>
		Student ID: <?php echo $journal_item['V1StudentID'] ?><br>
		Last modified: <?php echo $journal_item['V1LastChanged'] ?><br>
		<div class="main">
            <?php echo $journal_item['V1Content']; ?>
    	</div>
	</div>
	<p><a href="<?php echo site_url('journal/admin/V1/' . $journal_item['V1JournalID']); ?>">View article</a></p>
	<hr>
</div>
<?php endforeach; ?>
