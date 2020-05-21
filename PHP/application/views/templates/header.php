<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url('/assets/css/w3.css'); ?>">
	<script src="<?php echo base_url('assets/libs/ckeditor/ckeditor.js') ?>"></script>
</head>

<body class="w3-light-gray">
<header class="w3-container w3-blue-gray">
	<div class="w3-left w3-xxlarge w3-margin">Desarrollo de Aplicaciones Web 2</div>
	<div class="w3-dropdown-hover w3-right w3-xxlarge">
		<button class="w3-button"><?php if (isset($uname)) echo lcfirst($uname); ?></button>
		<div class="w3-dropdown-content w3-bar-block w3-border">
			<a class="w3-bar-item w3-button" href="<?php echo base_url('logout'); ?>">Log out</a>
		</div>
	</div>
</header>
