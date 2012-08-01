<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userId), array('view', 'id'=>$data->userId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstName')); ?>:</b>
	<?php echo CHtml::encode($data->firstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastName')); ?>:</b>
	<?php echo CHtml::encode($data->lastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isStudent')); ?>:</b>
	<?php echo CHtml::encode($data->isStudent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isGuardian')); ?>:</b>
	<?php echo CHtml::encode($data->isGuardian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isTeacher')); ?>:</b>
	<?php echo CHtml::encode($data->isTeacher); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isActive')); ?>:</b>
	<?php echo CHtml::encode($data->isActive); ?>
	<br />

</div>