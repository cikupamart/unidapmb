<?php
/* @var $this InfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Infos',
);

$this->menu=array(
	// array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Info</h1>

<?php 
echo $model->konten;
?>
