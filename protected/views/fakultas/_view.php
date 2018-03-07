<?php
/* @var $this FakultasController */
/* @var $data Fakultas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_fakultas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fakultas), array('view', 'id'=>$data->id_fakultas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_fakultas')); ?>:</b>
	<?php echo CHtml::encode($data->kode_fakultas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_fakultas')); ?>:</b>
	<?php echo CHtml::encode($data->nama_fakultas); ?>
	<br />


</div>