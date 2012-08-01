<?php $this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading'=>'FastGrade',
)); ?>
 
    <p>Fast delivery of your grades!</p>
    <p><?php $this->widget('bootstrap.widgets.BootButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Read all about our fast grade system',
    )); ?></p>
 
<?php $this->endWidget(); ?>