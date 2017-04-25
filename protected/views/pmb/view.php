<?php
/* @var $this PmbController */
/* @var $model Pmb */

// $this->breadcrumbs=array(
// 	'Pmbs'=>array('index'),
// 	$model->id_pmb,
// );

// $this->menu=array(
	
// 	array('label'=>'Create Pmb', 'url'=>array('create')),
// 	array('label'=>'Update Pmb', 'url'=>array('update', 'id'=>$model->id_pmb)),
// 	array('label'=>'Delete Pmb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pmb),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Pmb', 'url'=>array('admin')),
// );
?>

<h1>
<?php if(Yii::app()->user->hasFlash('contact')){ ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php 
}
 ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'nama_peserta',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'pilihan_pertama',
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
		'created',
	),
)); ?>
