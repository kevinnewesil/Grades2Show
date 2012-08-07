<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjectId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subjectId),array('view','id'=>$data->subjectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abbr')); ?>:</b>
	<?php echo CHtml::encode($data->abbr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>