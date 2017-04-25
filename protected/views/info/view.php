<?php
/* @var $this InfoController */
/* @var $model Info */

// $this->breadcrumbs=array(
// 	'Infos'=>array('index'),
// 	$model->id_info,
// );

$this->menu=array(
	// array('label'=>'List Info', 'url'=>array('index')),
	// array('label'=>'Create Info', 'url'=>array('create')),
	// array('label'=>'Update Info', 'url'=>array('update', 'id'=>$model->id_info)),
	// array('label'=>'Delete Info', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_info),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>View Info #<?php echo $model->id_info; ?></h1>

<?php 
echo $model->konten;
?>
