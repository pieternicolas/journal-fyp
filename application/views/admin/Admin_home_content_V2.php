<?php foreach ($journal as $journal_item): ?>

    <h3><?php echo $journal_item['V2Title']; ?></h3>
    Created by: <?php echo $journal_item['V2StudFirstName'] . " " . $journal_item['V2StudLastName'] ?><br>
    Student ID: <?php echo $journal_item['V2StudentID'] ?><br>
    Last modified: <?php echo $journal_item['V2LastChanged'] ?>
    <div class="main">
            <?php echo $journal_item['V2Content']; ?>
    </div>
    <p><a href="<?php echo site_url('journal/admin/'.$journal_item['V2JournalID']); ?>">View article</a></p>
	<hr>
<?php endforeach; ?>

<?php foreach ($paging as $page): ?>
<a href="<?php echo site_url('admin_home/' . $page); ?>"><?php echo $page . " "?></a>
<?php endforeach; ?>