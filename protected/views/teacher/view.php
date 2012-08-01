<?php
if ($user -> isTeacher == 1 && $teacher === NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('user/update/' . $user -> userId . '#User_isActive'), array(
		'rel' => 'tooltip',
		'title' => Yii::t('app', 'Error: inconsistent data, please fix.')
	));
}
elseif ($teacher !== NULL)
{
	echo CHTML::link('<i class="icon-eye-open"></i>', array('teacher/view/' . $teacher -> teacherId), array(
		'data-title' => 'Info',
		'data-content' => $this -> widget('bootstrap.widgets.BootDetailView', array(
			'data' => $teacher,
			'attributes' => array(
				'abbr',
			),
		), true),
		'rel' => 'popover'
	));
}
