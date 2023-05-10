<?php
if($_POST and isset($_POST["catName"]) and isset($_POST["catTags"])) {

$name = $_POST["catName"];
$tags = $_POST["catTags"];

$stripeCLT = null;
require "stripeConnect.php";

$productN = 0;

$product = $stripeCLT->products->all();
foreach ($product->data as $product) {
	if ($product->metedata->category == $name) {
		$productN += 1;
	}
}

$mysql = null;
require "connect.php";
$mysql->query("INSERT INTO categories (ID, name, tags, count) VALUES (NULL, '" . $name . "', '" . $tags . "', '" . $productN . "')");

} else {
	die("You are not supposed to be here or here has been an error");
}
?>
<form id="redirect" action="index.php" method="post">
    <input type="text" name="success" value="1" />
</form>
<script type="text/javascript">
    document.getElementById('redirect').submit();
</script>
