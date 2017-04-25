<?php
/* @var $this InfoController */
/* @var $model Info */

$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->id_info=>array('view','id'=>$model->id_info),
	'Update',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'View Info', 'url'=>array('view', 'id'=>$model->id_info)),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Update Info <?php echo $model->id_info; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>