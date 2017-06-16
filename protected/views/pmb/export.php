
<div class="form">
<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'pmb-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
?>


<div class="row">
<strong>Dari tanggal : </strong>
<?php 
  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
          'model' => $model,
          'attribute' => 'TANGGAL_AWAL',
          'options'=>array(
              'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
              'showOtherMonths'=>true,// Show Other month in jquery
              'selectOtherMonths'=>true,// Select Other month in jquery
               'dateFormat'=>'yy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
          ),
          'htmlOptions'=>array(
              'style'=>''
          ),
      ));
?>

<strong>Hingga Tanggal : </strong>
<?php 
  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
          'model' => $model,
          'attribute' => 'TANGGAL_AKHIR',
          'options'=>array(
              'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
              'showOtherMonths'=>true,// Show Other month in jquery
              'selectOtherMonths'=>true,// Select Other month in jquery
               'dateFormat'=>'yy-mm-dd',
                'changeMonth' => true,
                'changeYear' => true,
          ),
          'htmlOptions'=>array(
              'style'=>''
          ),
      ));
?>

</div>



<div class="row buttons">
	<?php echo CHtml::submitButton('Export'); ?>
</div>

<?php $this->endWidget(); ?>

</div>

