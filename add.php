<?php
if(!empty($_POST["add_record"])) {
	require_once("db.php");
	$sql = "INSERT INTO posts ( post_title, description, post_at ) VALUES ( :post_title, :description, :post_at )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':post_title'=>$_POST['post_title'], ':description'=>$_POST['description'], ':post_at'=>$_POST['post_at'] ) );
	if (!empty($result) ){
	  header('location:index.php');
	}
}
?>
<html>
<head>
	<link rel="stylesheet" href="./css/style.css">
<title>PHP PDO CRUD - Add New Record</title>
</head>
<body>

<div class="container">
	<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>
	<div class="frm-add">
	<h1 class="demo-form-heading">Add New Record</h1>
	<form name="frmAdd" action="" method="POST">
	  <div class="demo-form-row">
		  <label>Title: </label><br>
		  <input type="text" name="post_title" class="demo-form-field" required />
	  </div>
	  <div class="demo-form-row">
		  <label>Description: </label><br>
		  <textarea name="description" class="demo-form-field" rows="5" required ></textarea>
	  </div>
	  <div class="demo-form-row">
		  <label>Date: </label><br>
		  <input type="date" name="post_at" class="demo-form-field" required />
	  </div>
	  <div class="demo-form-row">
		  <input name="add_record" type="submit" value="Add" class="demo-form-submit">
	  </div>
	  </form>
	</div> 
</div>

</body>
</html>