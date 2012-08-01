<?php
$this -> pageTitle = Yii::app() -> name . ' - Login';
$this -> breadcrumbs = array('Login', );
?>

<p>
    Please fill out the following form with your login credentials:
</p>
<?php
$form = $this -> beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id' => 'loginForm',
	'type' => 'horizontal',
	'htmlOptions' => array('class' => 'well'),
	'enableClientValidation' => TRUE,
	'clientOptions' => array('validateOnSubmit' => true, ),
));
?>

<p class="note">
    Fields with <span class="required">*</span> are required.
</p>
    <?php echo $form -> textFieldRow($model, 'username', array('prepend' => '@')); ?>
    <?php echo $form -> passwordFieldRow($model, 'password', array(
			'prepend' => '#',
			'hint' => 'Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.'
		));
    ?>
    <?php $this -> widget('bootstrap.widgets.BootButton', array(
			'buttonType' => 'submit',
			'icon' => 'ok white',
			'type' => 'primary',
			'label' => Yii::t('app','Login'),
		));
	?>
<?php $this -> endWidget(); ?>
