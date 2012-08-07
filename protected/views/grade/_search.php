<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
	)); ?>

	<div class="row">
		<?php echo $form->label($model,'periodId'); ?>
		<?php echo $form->textField($model,'periodId'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'studentId'); ?>
		<?php echo $form->textField($model,'studentId'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'teacherId'); ?>
		<?php echo $form->textField($model,'teacherId'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'gradeBehaviour'); ?>
		<?php echo $form->textField($model,'gradeBehaviour'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'lastEdit'); ?>
		<?php echo $form->textField($model,'lastEdit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
