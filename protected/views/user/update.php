<?php
$this -> breadcrumbs = array(
	'User' => array('index'),
	$user -> userId => array(
		'view',
		'id' => $user -> userId
	),
	'Edit',
);

$this -> menu = array(
	array(
		'label' => 'List User',
		'url' => array('index')
	),
	array(
		'label' => 'Create User',
		'url' => array('create')
	),
	array(
		'label' => 'View User',
		'url' => array(
			'view',
			'id' => $user -> userId
		)
	),
	array(
		'label' => 'Manage User',
		'url' => array('admin')
	),
);
?>

<h1>Update User <?php echo $user -> userId; ?></h1>

<?php echo $this -> renderPartial('_form', array(
		'user' => $user,
		'student' => $student,
		'group' => $group,
		'teacher' => $teacher,
		'guardian' => $guardian,
	));
?>