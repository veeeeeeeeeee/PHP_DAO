<?php

function display_prop_thumb($property) {
	// get property details

	$prop_title = $property->get_street() . ", "
				. $property->get_suburb (). ", "
				. $property->get_state() . " "
				. $property->get_postcode();

?>
		<div class="prop-thumb">
			<div class="float-box">
				<a class="prop-thumb-title" href=""><?php echo $prop_title; ?></a>
				<p class="prop-thumb-type">Type: <?php echo $property->get_type(); ?></p>
				<p class="prop-thumb-price">Price: <?php echo $property->get_price(); ?></p>
				<p>Features:</p>
				<div>
<?php
	foreach ($property->get_features() as $key => $val) {
		echo '<p style="display: inline-block; margin-left: 5px; margin-right: 5px;">' . $val . "</p>";
	}
?>
				</div>
				<p class="prop-thumb-desc"><?php echo strlen($property->get_desc()) > 55? substr($property->get_desc(), 0, 55) . "..." : $property->get_desc(); ?></p>
			</div>
		</div>
<?php
}

function debug_array($a) {
	echo "<pre>";
		print_r($a);
	echo "</pre>";
}

?>
