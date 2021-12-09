<?php
require_once("db.php");
?>
<html>
<head>
<title>PHP PDO CRUD</title>
<link rel="stylesheet" href="./css/style.css">
<body>
	<div class="container">
		<?php	
			$pdo_statement = $pdo_conn->prepare("SELECT * FROM posts ORDER BY id DESC");
			$pdo_statement->execute();
			$result = $pdo_statement->fetchAll();
		?>
		<div style="text-align:right;margin:20px 0px;"><a href="add.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Create</a></div>
		<table class="tbl-qa">
		  <thead>
			<tr>
			  <th class="table-header" width="20%">Title</th>
			  <th class="table-header" width="40%">Description</th>
			  <th class="table-header" width="20%">Date</th>
			  <th class="table-header" width="5%">Actions</th>
			</tr>
		  </thead>
		  <tbody id="table-body">
			<?php
			if(!empty($result)) { 
				foreach($result as $row) {
			?>
			  <tr class="table-row">
				<td><?php echo $row["post_title"]; ?></td>
				<td><?php echo $row["description"]; ?></td>
				<td><?php echo $row["post_at"]; ?></td>
				<td><a class="ajax-action-links" href='edit.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/edit.png" title="Edit" /></a> <a class="ajax-action-links" href='delete.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/delete.png" title="Delete" /></a></td>
			  </tr>
			<?php
				}
			}
			?>
		  </tbody>
		</table>
	</div>
</body>
</html>