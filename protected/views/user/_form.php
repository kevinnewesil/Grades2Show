<?php
$form = $this -> beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'user-form',
	'type' => 'horizontal',
	'htmlOptions' => array('class' => 'well'),
	'enableAjaxValidation' => TRUE,
));
?>

<p class="note"> Fields with <span class="required">*</span> are required. </p>

<?php
foreach (Yii::app()->user->getFlashes() as $key => $message)
{
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php echo $form -> errorSummary(array(
		$user,
		$student,
		$teacher,
		$guardian
	), Yii::t('app', '<strong>Please fix the following errors:</strong>'));
 ?>
<fieldset>
	<legend><?php echo Yii::t('app', 'Basic Information'); ?></legend>
<?php
	if ($user -> isAdministrator == '1')
	{
		echo $form -> uneditableRow($user, 'email', array(
			'size' => 60,
			'maxlength' => 255,
			'hint' => Yii::t('app', 'E-mail address is not editable, because of Administrator status.<br />Please contact your Support Desk or Database Administrator to change this manual.<br />This also applies for other fields, except the ones that are visible.')
		));
	}
	else
	{
		echo $form -> textFieldRow($user, 'email', array(
			'size' => 60,
			'maxlength' => 255,
			'prepend' => '@',
		));
	}
	echo $form -> passwordFieldRow($user, 'passwordNew', array(
		'size' => 20,
		'prepend' => '#',
	));
    echo $form -> passwordFieldRow($user, 'passwordCheck', array(
		'size' => 20,
		'prepend' => '#',
	));
    echo $form -> textFieldRow($user, 'firstName', array(
		'size' => 60,
		'maxlength' => 64
	));
    echo $form -> textFieldRow($user, 'lastName', array(
		'size' => 60,
		'maxlength' => 64
	));

/**
 * START ADMIN PART
 */
if(!$user->isAdministrator == '1'): //start of nonAdministrator part

	echo $form -> radioButtonListInlineRow($user, 'isActive', array(
		'0' => 'no',
		'1' => 'yes',
	));
	?>
</fieldset>
<fieldset>
	<legend><?php echo Yii::t('app', 'Student Information'); ?></legend>
	<div> <?php echo $form -> checkboxRow($user, 'isStudent'); ?> </div>
	<div> <?php echo $form -> textFieldRow($student, 'studentCode', array(
			'size' => 16,
			'maxlength' => 16,
		));
	?>
    <div class="control-group">
    	<?php echo $form -> labelEx($student, 'dateOfBirth', array('class' => 'control-label')); ?>
    	<div class="controls">
    		<?php $this -> widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'Student[dateOfBirth]',
				'attribute' => 'dateOfBirth',
				'options' => array(
					'changeMonth' => TRUE,
					'changeYear' => TRUE,
				),
				'model' => $student,
				'language' => 'nl',
				'value' => $student -> dateOfBirth, //date('Y-m-d'),
				'htmlOptions' => array('style' => 'height: 20px;'),
			));
 ?>
        	<?php echo $form -> error($student, 'dateOfBirth'); ?>
        </div>
    </div>
    <?php
	/*
	 * if($student->dateOfBirth <
	 * date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')-18))) {
	 * echo $student->dateOfBirth . ' < ' .
	 * date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')-18));
	 */
	 
	echo $form -> checkBoxRow($student, 'isAccessible', array('hint' => Yii::t('app', 'Only changeable if student is 18 years or older.')));
	//{
	$list = CHtml::listData($group, 'groupId', 'abbr');
	echo $form -> dropdownListRow($student, 'groupId', $list, array('prompt' => '--Select--'));
 ?> <?php echo $form -> dropdownListRow($student, 'tempGroupId', $list, array('prompt' => '--Select--')); ?> </div>
</fieldset>
<fieldset>
	<legend><?php echo Yii::t('app', 'Guardian Information'); ?></legend>
	<div> 
		<?php echo $form -> checkboxRow($user, 'isGuardian'); ?>
	</div>
	<div>
		<div class="control-group">Students
			<div class="controls">
				<p>DataGrid with students</p>
			</div>
		</div>
	</div>
</fieldset>
<fieldset>
	<legend><?php echo Yii::t('app', 'Teacher Information'); ?></legend>
	<div><?php echo $form -> checkboxRow($user, 'isTeacher'); ?> </div>
	<div><?php echo $form -> textFieldRow($teacher, 'abbr', array(
			'size' => 10,
			'maxlength' => 8,
		));
	 ?> </div>
</fieldset>
<?php

	// jQuery effects for user types
	// @formatter: off
	Yii::app() -> clientScript -> registerScript('userSlide', '
		function collapse(el) {
			if($(el).is(":checked"))
				$(el).parent().parent().parent().parent().next().slideDown();
			else
				$(el).parent().parent().parent().parent().next().slideUp();
		}
	
		$("#User_isStudent,#User_isGuardian,#User_isTeacher,#User_isAdministrator").change(function()
			{collapse($(this));
		});
	
	 $("#User_isStudent,#User_isGuardian,#User_isTeacher,#User_isAdministrator").not(":checked").parent().parent().parent().parent().next().hide();
	');
	// @formatter: on


/**
 * END ADMIN PART
 */
endif;

?>
<div class="form-actions">
	<?php $this -> widget('bootstrap.widgets.TbButton', array(
		'buttonType' => 'submit',
		'icon' => 'ok white',
		'type' => 'primary',
		'label' => $user -> isNewRecord ? 'Create' : 'Save'
	));
	?>
</div>
<?php $this -> endWidget(); ?>

