<?php $this -> beginContent('//layouts/main'); ?>
<div class="span9">
    <?php echo $content; ?>
</div>
<div class="span3">
	<?php 
	$this -> widget('bootstrap.widgets.BootMenu', array(
		'type' => 'list', // '', 'tabs', 'pills' (or 'list')
		'stacked' => false, // whether this is a stacked menu
		'items' => $this -> menu,
		'htmlOptions' => array(
			'class' => 'well',
			'style' => 'padding-top: 8px; padding-bottom: 8px;',
		)
	));
	?>
</div>
<?php $this -> endContent(); ?>