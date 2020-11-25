<?php
require 'pages/header.php';
if(empty($_SESSION['cLogindistribuidor'])) {
	?>
	<script type="text/javascript">window.location.href="login-distribuidor.php";</script>
	<?php
	exit;
}
?>