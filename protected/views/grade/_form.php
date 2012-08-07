<div class="form">

    <?php $form = $this -> beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'client-account-create-form',
		'type' => 'horizontal',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('class' => 'well'),
	));
 ?>

    <p class="note">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form -> errorSummary($model); ?>

    <?php echo $form -> textFieldRow($model, 'periodId'); ?>

    <?php echo $form -> textFieldRow($model, 'studentId'); ?>
    
    <?php echo $form -> textFieldRow($model, 'teacherId'); ?>
   
    <?php echo $form -> textFieldRow($model, 'gradeBehaviour'); ?>

    <?php echo $form -> textFieldRow($model, 'lastEdit'); ?>


    <div class="form-actions">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this -> endWidget(); ?>

</div><!-- form -->
