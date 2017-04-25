<?php
/* @var $this PmbController */
/* @var $model Pmb */

$this->breadcrumbs=array(
	'Pmbs'=>array('index'),
	$model->id_pmb=>array('view','id'=>$model->id_pmb),
	'Update',
);

$this->menu=array(

	array('label'=>'Create Pmb', 'url'=>array('create')),
	array('label'=>'View Pmb', 'url'=>array('view', 'id'=>$model->id_pmb)),
	array('label'=>'Manage Pmb', 'url'=>array('admin')),
);
?>

<h1>Update Pmb <?php echo $model->id_pmb; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>