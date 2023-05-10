<!DOCTYPE html>
<html>
	<head>
		<title>DELTA Entreprise - catégories</title>
	</head>
	<body>
	<?php
		$mysql = null;
		//connect to database
		require "connect.php";
		require "admin.php";
		//getting categories datas from table
		$catN = $mysql->query("SELECT COUNT(*) FROM category")->fetch_row()[0];
		$cats = $mysql->query("SELECT name, tags, count FROM category");
	?>
	<!-- put the header here -->
	<p>
		<?php echo "il y a " . $catN . " catégories"; ?>
	</p>
	<br />
	<hr>
	<br />
	<?php while($row = $cats->fetch_assoc()) { ?>
		<!-- put categories definitions here -->
		<h2><?php echo $row["name"]; ?></h2><br />
		<p> <?php echo "tags : " . $row["tags"]; ?></p><br />
		<p> <?php echo "il y a " . $row["count"] . " produits dans cette catégorie."; ?></p><br />
<?php if(isAdmin()) { ?>
	<form method="post">
		<input type="hidden" name="category" value=<?php echo '"' . $row["name"] . '"'; ?>><br /><br />
		<input type="submit" value="Supprimer" formaction="delCat.php">
		
	</form>
<?php } ?>
		<hr>
		<br />
	<?php } ?>
	<?php 
		if(isAdmin()) {
	?>
	<form action="addCat.php" method="post">
		<label for="catName">Nom de la catégorie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="catName" placeholder="Nouvelle catégorie" require><br /><br />
		<label for="catTags">Tags de la catégorie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="catTags" placeholder="all" require><br /><br />
		<label>veuillez séparer tout les tags par une virgule</label><br /><br />
		<input type="submit" value="créer une catégorie">
	</form>
	<?php } ?>
	<!-- put the footer here -->
	</body>
</html>
