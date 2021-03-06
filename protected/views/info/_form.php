<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->baseUrl.'/ckeditor/ckeditor.js');
?>

  <script type="text/javascript">
  window.onload = function()
	{


		CKEDITOR.replace( 'Info_konten' ,{
			extraPlugins: 'font,colorbutton',
		} );
	};
	
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'konten'); ?>
		<?php echo $form->textArea($model,'konten',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'konten'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->