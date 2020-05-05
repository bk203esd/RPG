<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getClasName(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getDescription(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador HP</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getMultiplyHp(); ?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Ataque</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getMultiplyAttack();?>
				</div>
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Defensa</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getMultiplyDefense();?>
				</div>
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Multiplicador Precisión</div>
				<div class="w3-row-padding w3-margin w3-margin-top w3-xlarge">
					<?php echo $class->getMultiplyAccuracy();?>
				</div>
			</div>
		</div>
	</div>
</div>
