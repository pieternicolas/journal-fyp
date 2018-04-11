<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin List</title>

</head>

<body>
	<table border="1">
    	<tr>
        	<th>Admin ID</th>
            <th>Admin Full Name</th>
            <th>Admin Username</th>
            <th>Admin Status</th>
            <th>Toggle Enable/Disable</th>
        </tr>
		<?php foreach ($admin_list as $admin_item): ?>
        
        	<tr>
                <td><?php echo $admin_item['AdminID']; ?></td>
                <td><?php echo $admin_item['AdminFirstName'] . ' ' . $admin_item['AdminLastName']; ?></td>
                <td><?php echo $admin_item['AdminUsername']; ?></td>
                <td><?php if ($admin_item['AdminStatus'] == 1) {
                    echo 'Enabled'; } else {
                    echo 'Disabled'; }?></td>
                <td><?php 
                $id = $admin_item['AdminID'];
                $status = $admin_item['AdminStatus']; ?>
                <a href="<?php echo site_url('admin_user/toggle_status/'. $id . '/' . $status); ?>" onclick="return confirm('Do you want toggle this admin?')">Toggle admin</a></td>
            </tr>
        
        <?php endforeach; ?>
    </table>
</body>
</html>