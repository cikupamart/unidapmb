<?php
/* @var $this PmbController */
/* @var $model Pmb */

$this->breadcrumbs=array(
	'Pmbs'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Create Pmb', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pmb-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pmbs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pmb-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'No',
			'value'	=> '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'nama_peserta',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'pilihan_pertama',
		'created',
		
		/*
		'pilihan_kedua',
		'pilihan_ketiga',
		'alamat_lengkap',
		'desa',
		'kecamatan',
		'kabupaten',
		'propinsi',
		'kodepos',
		'telp',
		'hp',
		'email',
		'pesantren',
		'nama_pesantren',
		'tahun_lulus',
		'lama_pendidikan',
		'takhassus',
		'sd',
		'smp',
		'sma',
		'nama_ayah',
		'pendidikan_ayah',
		'pekerjaan_ayah',
		'penghasilan_ayah',
		'nama_ibu',
		'pendidikan_ibu',
		'pekerjaan_ibu',
		'penghasilan_ibu',
		'pelatihan',
		'skill',
		'is_alumni',
		'kampus_tujuan',
		'rencana_studi',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
