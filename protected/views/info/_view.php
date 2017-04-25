<?php
/* @var $this InfoController */
/* @var $data Info */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_info')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_info), array('view', 'id'=>$data->id_info)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('konten')); ?>:</b>
	<?php echo CHtml::encode($data->konten); ?>
	<br />


</div>