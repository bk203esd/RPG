<div class="w3-container">
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Nombre</div>
				<input type="text" value="<?php echo $quest->getQuestName(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Descripción</div>
				<input type="text" value="<?php echo $quest->getDescription(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Item</div>
				<input type="text" value="<?php echo $quest->getItemReward(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Monstruo</div>
				<input type="text" value="<?php echo $quest->getMonsterName(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Oro</div>
				<input type="text" value="<?php echo $quest->getGoldReward(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Experiencia</div>
				<input type="text" value="<?php echo $quest->getXpReward(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
	<div class="w3-row-padding w3-margin w3-margin-top">
		<div class="w3-half">
			<div class="w3-card w3-container w3-center">
				<div class="w3-xxlarge">Repetible</div>
				<input type="text" value="<?php echo $quest->getRepeatable(); ?>" class="w3-margin w3-xlarge w3-input">
			</div>
		</div>
	</div>
</div>
