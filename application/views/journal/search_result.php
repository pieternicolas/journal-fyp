
<title>Search : <?php echo $searched_term; ?></title>

	<?php foreach ($results as $journal_item) :?>
    <div id="journalcontent">
    <h3><?php echo $journal_item['V1Title']; ?></h3>
        <div class="main">
        	<?php echo $journal_item['V1LastChanged']; ?><br>
            <?php echo $journal_item['V1Content']; ?>
        </div>
        <br><a href="<?php echo site_url('journal/'.$journal_item['V1JournalID']); ?>">View article</a>
        <hr>
    </div>
    <?php endforeach; ?>
