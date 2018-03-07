<?php
/* @var $this FakultasController */
/* @var $model Fakultas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fakultas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_fakultas'); ?>
		<?php echo $form->textField($model,'kode_fakultas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'kode_fakultas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_fakultas'); ?>
		<?php echo $form->textField($model,'nama_fakultas',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_fakultas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->