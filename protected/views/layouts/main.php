<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="" />
    <meta name="author" content="Tessa Bakker" />

    <meta name="viewport" content="width=device-width; initial-scale=1.0" />

    <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="/favicon.ico" />
   	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    
	<style type="text/css">
        body {
            padding-top: 60px;
        }
	</style>
<?php
/*
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/main.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/form.css" />
 */
 ?>
	<title><?php echo CHtml::encode($this -> pageTitle); ?></title>
</head>
<body>
	<?php $this -> widget('bootstrap.widgets.BootNavbar', array(
		'fixed' => 'top',
		'brand' => CHtml::encode(Yii::app() -> name),
		'brandUrl' => '#',
		'collapse' => TRUE,
		'fluid' => TRUE,
		'items' => array(
			array(
				'class' => 'bootstrap.widgets.BootMenu',
				'items' => array(
					array(
						'label' => 'Home',
						'url' => array('/site/index')
					),
					array(
						'label' => 'About',
						'url' => array(
							'/site/page',
							'view' => 'about'
						),
					),
					array(
						'label' => 'Contact',
						'url' => array('/site/contact')
					),
					'---',
					array('label' => 'Grades'),
					array(
						'label' => 'Users',
						'url' => array('/user/admin')
					),
				),
			),
			array(
				'class' => 'bootstrap.widgets.BootMenu',
				'htmlOptions' => array('class' => 'pull-right'),
				'items' => array(
					array(
						'label' => 'Login',
						'url' => array('/site/login'),
						'visible' => Yii::app() -> user -> isGuest
					),
					array(
						'label' => (!Yii::app() -> user -> isGuest) ? 'Hi, ' . Yii::app() -> user -> _firstName : 'Hi',
						'visible' => !Yii::app() -> user -> isGuest,
						'items' => array(
							array(
								'label' => 'Account Settings',
								'url' => array('/user/edit')
							),
							array(
								'label' => 'Logout (' . Yii::app() -> user -> name . ')',
								'url' => array('/site/logout'),
							),
						),
					),
				),
			),
		),
	));
	?>

<div class="container-fluid">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this -> widget('bootstrap.widgets.BootBreadcrumbs', array('links' => $this -> breadcrumbs)); ?>
	<?php endif ?>
	<div class="row-fluid">


		<?php echo $content; ?>

	</div>

	<hr />

	<div>
		Copyright &copy; <?php echo date('Y'); ?> by Tessa Bakker. - All Rights Reserved. - <?php echo Yii::powered(); ?>
	</div>

</div>
</body>
</html>
