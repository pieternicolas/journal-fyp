<div id="journalcontent">
    <h3><?php echo $journal_item['V1Title']; ?></h3>
    <div id="journaltext" class="main">
        <?php echo $journal_item['V1LastChanged']; ?><br>
        <?php echo $journal_item['V1Content']; ?>
    </div>
    <br>
    <a href="<?php echo site_url('journal/fetch/'.$journal_item['V1JournalID']); ?>">Edit journal</a>
	<?=anchor("journal/delete/".$journal_item['V1JournalID'],"Delete journal",array('onclick' => "return confirm('Do you want delete this journal?')"))?>
    <hr>
</div>