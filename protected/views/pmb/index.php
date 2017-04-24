<?php
/* @var $this PmbController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pmbs',
);

$this->menu=array(
	array('label'=>'Create Pmb', 'url'=>array('create')),
	array('label'=>'Manage Pmb', 'url'=>array('admin')),
);
?>

<h1>Pmbs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
