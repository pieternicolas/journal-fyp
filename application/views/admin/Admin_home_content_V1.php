<?php foreach ($journal as $journal_item): ?>

    <h3><?php echo $journal_item['V1Title']; ?></h3>
    Created by: <?php echo $journal_item['V1StudFirstName'] . " " . $journal_item['V1StudLastName'] ?><br>
    Student ID: <?php echo $journal_item['V1StudentID'] ?><br>
    Last modified: <?php echo $journal_item['V1LastChanged'] ?>
    <div class="main">
            <?php echo $journal_item['V1Content']; ?>
    </div>
    <p><a href="<?php echo site_url('journal/admin/' . $version . "/" . $journal_item['V1JournalID']); ?>">View article</a></p>
	<hr>
<?php endforeach; ?>

<?php foreach ($paging as $page): ?>
<a href="<?php echo site_url('admin_home/' . $version . "/" . $page); ?>"><?php echo $page . " "?></a>
<?php endforeach; ?>