<?php
$form = $this -> beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'group-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => TRUE,
	'htmlOptions' => array('class' => 'well'),
));
?>

<p class="note">
    Fields with <span class="required">*</span> are required.
</p>

<?php echo $form -> errorSummary($model); ?>

<?php echo $form -> textFieldRow($model, 'abbr', array(
		'size' => 16,
		'maxlength' => 16
	));
?>

<div class="form-actions">
    <?php $this -> beginWidget('bootstrap.widgets.TbButton', array(
		'label' => ($model -> isNewRecord) ? 'Create' : 'Save',
		'type' => 'primary',
		'buttonType' => 'submit',
	));
	$this -> endWidget();
?>
</div>

<?php $this -> endWidget();