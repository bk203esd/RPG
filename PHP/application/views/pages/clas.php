<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<input type="text" value="<?php echo $class->getClasName(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<input type="text" value="<?php echo $class->getDescription(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador HP</div>
				<input type="text" value="<?php echo $class->getMultiplyHp(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Ataque</div>
				<input type="text" value="<?php echo $class->getMultiplyAttack();?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Defensa</div>
				<input type="text" value="<?php echo $class->getMultiplyDefense();?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Precisión</div>
				<input type="text" value="<?php echo $class->getMultiplyAccuracy();?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
</div>
