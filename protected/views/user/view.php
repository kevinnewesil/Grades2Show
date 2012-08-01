<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userId,
);
?>

<h1>View User #<?php echo $model->userId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userId',
		'email',
		'firstName',
		'lastName',
		'isStudent',
		'isGuardian',
		'isTeacher',
		'isActive',
	),
)); ?>
