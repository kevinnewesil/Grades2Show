<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'studentId'); ?>
		<?php
			$models = Studenten::model()->findAll(array('order' => 'listCodeName'));
			$list = CHtml::listData($models, 'userId', 'listCodeName');
			echo $form->dropdownList($model,'studentId', $list, array('prompt'=>'--Select--'));
		?>
		<?php echo $form->error($model,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentCode'); ?>
		<?php echo $form->textField($model,'studentCode',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'studentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateOfBirth'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
  'model'=>$model,
  'attribute'=>'dateOfBirth',
  'value'=>$model->dateOfBirth,
  // additional javascript options for the date picker plugin
  'options'=>array(
    'showAnim'=>'fold',
    'showButtonPanel'=>true,
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'defaultDate'=>$model->dateOfBirth,
   ),
)); ?>
		<?php echo $form->error($model,'dateOfBirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isAccessible'); ?>
		<?php //echo $form->checkBox('Elder access', ) ?>
		<?php echo $form->textField($model,'isAccessible'); ?>
		<?php echo $form->error($model,'isAccessible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->