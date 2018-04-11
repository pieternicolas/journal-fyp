<?php foreach ($journal as $journal_item): ?>
<div id="journalcontent">
    <h3><?php echo $journal_item['V1Title']; ?></h3>
    <div class="main">
        Last modified: <?php echo $journal_item['V1LastChanged']; ?><br>
        <?php echo $journal_item['V1Content']; ?>
    </div>
    <br><a href="<?php echo site_url('journal/'.$journal_item['V1JournalID']); ?>">View article</a>
    <hr>
</div>
<?php endforeach; ?>
<?php foreach ($paging as $page): ?>
<a href="<?php echo site_url('home/' . $page); ?>"><?php echo $page . " "?></a>
<?php endforeach; ?>