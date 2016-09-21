<script>
<?php
echo "var URL_PARAMS = {";
foreach($_GET as $key => $value) {
	echo "	'". $key . "': '" . $value. "',";
}
echo "};";
?>
</script>
