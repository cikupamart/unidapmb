<?php
/* @var $this FakultasController */
/* @var $model Fakultas */

$this->breadcrumbs=array(
	'Fakultases'=>array('index'),
	$model->id_fakultas=>array('view','id'=>$model->id_fakultas),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fakultas', 'url'=>array('index')),
	array('label'=>'Create Fakultas', 'url'=>array('create')),
	array('label'=>'View Fakultas', 'url'=>array('view', 'id'=>$model->id_fakultas)),
	array('label'=>'Manage Fakultas', 'url'=>array('admin')),
);
?>

<h1>Update Fakultas <?php echo $model->id_fakultas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>