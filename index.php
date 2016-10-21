<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/script.js"></script>
</head>
<body>

<?php

include 'includes.php';
require_once 'property_dao.php';

// search criteria
$search = array(
	"street" => "",
	"suburb" => "",
	"postcode" => "",
	"state" => "",
	"price_low" => 0,
	"price_high" => 999999999,
	"type" => 0,
	"features" => array()
);

$pd = new Property_dao();

$pd->query_types();
$types = $pd->get_types();

$pd->query_feats();
$feats = $pd->get_feats();

?>

<div class="header">
</div>

<div class="content">
<?php
if (!isset($_GET["action"])) {
	$_GET["action"] = "view";
}
if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
	case "view":
?>
		<div class="search">
			<form action="index.php" method="post">
			<!-- search fields for $search_items -->
			<div class="parent filter">
				<div class="child-left">
					<div>
						<label>Street</label><br />
						<input type="text" name="street" />
					</div>
					<div>
						<label>Suburb</label><br />
						<input type="text" name="suburb" /><br />
					</div>
				</div>
				<div class="child-right">
					<div class="parent">
						<div class="child-left">
							<label>State</label><br />
							<input type="text" name="state" /><br />
						</div>
						<div class="child-right">
							<label>Postcode</label><br />
							<input type="text" name="postcode" /><br />
						</div>
					</div>
					<div class="parent">
						<div class="child-left">
							<label>Price Low</label><br />
							<input type="number" name="price_low" /><br />
						</div>
						<div class="child-right">
							<label>Price High</label><br />
							<input type="number" name="price_high" /><br />
						</div>
					</div>
				</div>
				<div style="padding: 5px;">
					<label>Type:</label><br />
					<select name="type" id="type">
<?php
					foreach ($types as $type_id => $type_name) {
?>
						<option value="<?php echo $type_id; ?>"><?php echo $type_name; ?></option>
<?php
					}
?>
					<option value="0" selected="selected">All</option>
<?php
?>
					</select>
				</div>
				<div class="full-width">
					<label>Features: </label>
<?php
					foreach ($feats as $feat_id => $feat_name) {
?>
						<input style="margin-left: 10px;" type="checkbox" name="<?php echo $feat_name; ?>" value="<?php echo $feat_id; ?>"><?php echo $feat_name; ?></input>
<?php
					}
?>
				</div>
				<input class="search-submit" type="submit" value="Search" />
			</form>
			</div>
		</div>
<?php
		//debug_array($_POST);

		if (isset($_POST["street"]))
			$search["street"] = $_POST["street"];
		if (isset($_POST["suburb"]))
			$search["suburb"] = $_POST["suburb"];
		if (isset($_POST["state"]))
			$search["state"] = $_POST["state"];
		if (isset($_POST["postcode"]))
			$search["postcode"] = $_POST["postcode"];
		if (isset($_POST["type"]))
			$search["type"] = $_POST["type"];
		if (isset($_POST["price_low"]) && $_POST["price_low"] != "")
			$search["price_low"] = $_POST["price_low"];
		else $search["price_low"] = 0;
		if (isset($_POST["price_high"]) && $_POST["price_high"] != "")
			$search["price_high"] = $_POST["price_high"];
		else $search["price_high"] = 999999999;

		// get features
		foreach ($feats as $feat_id => $feat_name) {
			if (isset($_POST[$feat_name])) {
				$search["features"][$feat_name] = $feat_id;
			}
		}

		//debug_array($search);

		// test property_dao
		$pd->retrieve($search);
?>
	<div class="prop-display">
<?php
		$properties = $pd->get_properties();
		foreach ($properties as $i => $property) {
			display_prop_thumb($property);
		}
?>
	</div>
<?php
		break;
	}
}
?>
</div>
</body>
</html>
