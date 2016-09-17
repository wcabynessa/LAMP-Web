<script>
<?php
foreach($_GET as $key => $value) {
	echo "var " . strtoupper($key) . " = " . $value . ";\n";
}
?>
</script>
