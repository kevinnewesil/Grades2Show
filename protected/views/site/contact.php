<?php
$this -> pageTitle = Yii::app() -> name . ' - Contact Us';
$this -> breadcrumbs = array('Contact', );
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')):
?>

<div class="flash-success">
    <?php echo Yii::app() -> user -> getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<?php $form = $this -> beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id' => 'contact-form',
		'type' => 'horizontal',
		'enableClientValidation' => true,
		'htmlOptions' => array('class' => 'well'),
		'clientOptions' => array('validateOnSubmit' => true),
	));
?>

<p class="note">
    Fields with <span class="required">*</span> are required.
</p>

<?php echo $form -> errorSummary($model); ?>

<?php echo $form -> textFieldRow($model, 'name'); ?>
<?php echo $form -> textFieldRow($model, 'email'); ?>
<?php echo $form -> textFieldRow($model, 'subject', array(
		'size' => 60,
		'maxlength' => 128
	));
?>
<?php echo $form -> textAreaRow($model, 'body', array(
		'rows' => 6,
		'cols' => 50
	));
?>

<?php if(CCaptcha::checkRequirements()): ?>
<div class="control-group ">
    <?php echo $form -> labelEx($model, 'verifyCode'); ?>
    <div class="controls">
        <?php $this -> widget('CCaptcha'); ?>
        <br />
        <?php echo $form -> textField($model, 'verifyCode', array('hint' => 'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.')); ?>
        <?php echo $form -> error($model, 'verifyCode'); ?>
    </div>
</div>

<?php endif; ?>

<div class="form-actions">
<?php $this -> widget('bootstrap.widgets.BootButton', array(
		'buttonType' => 'submit',
		'icon' => 'ok white',
		'type' => 'primary',
		'label' => Yii::t('app', 'Submit'),
	));
?>
</div>
<?php $this -> endWidget(); ?>
<?php endif; ?>