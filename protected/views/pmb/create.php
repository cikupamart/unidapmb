<?php
/* @var $this PmbController */
/* @var $model Pmb */

// $this->breadcrumbs=array(
// 	'Pmbs'=>array('index'),
// 	'Create',
// );

// $this->menu=array(
// 	array('label'=>'List Pmb', 'url'=>array('index')),
// 	array('label'=>'Manage Pmb', 'url'=>array('admin')),
// );
?>

<h1>Form Pendaftaran</h1>

<?php 

$this->renderPartial('_form', array('model'=>$model)); 

?>