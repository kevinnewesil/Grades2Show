<?php
if ($user -> isStudent == 1 && $student === NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('user/update/' . $user -> userId . '#User_isActive'), array(
		'rel' => 'tooltip',
		'title' => Yii::t('app', 'Error: inconsistent data, please fix.')
	));
}
elseif ($student !== NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('student/view/' . $student -> studentId), array(
		'data-title' => 'Info',
		'data-content' => $this -> widget('bootstrap.widgets.BootDetailView', array(
			'data' => $student,
			'attributes' => array(
				'studentCode',
				'dateOfBirth',
				'isAccessible',
				'groupId',
				'tempGroupId',
			),
		), true),
		'rel' => 'popover'
	));
}
