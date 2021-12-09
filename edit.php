<?php
require_once("db.php");
if(!empty($_POST["save_record"])) {
	$pdo_statement=$pdo_conn->prepare("update posts set post_title='" . $_POST[ 'post_title' ] . "', description='" . $_POST[ 'description' ]. "', post_at='" . $_POST[ 'post_at' ]. "' where id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM posts where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<html>
<head>
<title>PHP PDO CRUD - Edit Record</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="container">
		<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>
		<div class="frm-add">
		<h1 class="demo-form-heading">Edit Record</h1>
		<form name="frmAdd" action="" method="POST">
		  <div class="demo-form-row">
			  <label>Title: </label><br>
			  <input type="text" name="post_title" class="demo-form-field" value="<?php echo $result[0]['post_title']; ?>" required  />
		  </div>
		  <div class="demo-form-row">
			  <label>Description: </label><br>
			  <textarea name="description" class="demo-form-field" rows="5" required ><?php echo $result[0]['description']; ?></textarea>
		  </div>
		  <div class="demo-form-row">
			  <label>Date: </label><br>
			  <input type="date" name="post_at" class="demo-form-field" value="<?php echo $result[0]['post_at']; ?>" required />
		  </div>
		  <div class="demo-form-row">
			  <input name="save_record" type="submit" value="Save" class="demo-form-submit">
		  </div>
		  </form>
		</div>
	</div>
</body>
</html>