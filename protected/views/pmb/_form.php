<?php
/* @var $this PmbController */
/* @var $model Pmb */
/* @var $form CActiveForm */
?>

<style type="text/css">
	input,select{
		padding : 3px 5px;
		border-radius: 4px
	}
</style>
<?php if(Yii::app()->user->hasFlash('contact')){ ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php 
}
 ?>
<div class="form">


<?php 
$jobs = array(
	'SD','SLTP/Tsanawiyah','SMA/SMK/MA','D2/D3','S1','S2','S3','Tidak Sekolah'
);



$form=$this->beginWidget('CActiveForm', array(
	'id'=>'pmb-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
	// echo $form->errorSummary($model); 
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_peserta'); ?>
		<?php echo $form->textField($model,'nama_peserta',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_peserta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php 
		$jklist = array(
				'1' => 'Laki-laki',
				'2' => 'Perempuan'
			);
		echo $form->dropDownList($model,'jenis_kelamin',$jklist); 
		?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pilihan_pertama'); ?>
		<?php 
		
		$list = CHtml::listData(Prodi::model()->findAll(),'id_prodi','nama_prodi');
		echo $form->dropDownList($model,'pilihan_pertama',$list); 

		?>
		<?php echo $form->error($model,'pilihan_pertama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pilihan_kedua'); ?>
		<?php echo $form->dropDownList($model,'pilihan_kedua',$list); ?>
		<?php echo $form->error($model,'pilihan_kedua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pilihan_ketiga'); ?>
		<?php echo $form->dropDownList($model,'pilihan_ketiga',$list); ?>
		<?php echo $form->error($model,'pilihan_ketiga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_lengkap'); ?>
		<?php echo $form->textField($model,'alamat_lengkap',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alamat_lengkap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desa'); ?>
		<?php echo $form->textField($model,'desa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'desa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kecamatan'); ?>
		<?php echo $form->textField($model,'kecamatan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kecamatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kabupaten'); ?>
		<?php echo $form->textField($model,'kabupaten',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kabupaten'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'propinsi'); ?>
		<?php echo $form->textField($model,'propinsi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'propinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kodepos'); ?>
		<?php echo $form->textField($model,'kodepos',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'kodepos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telp'); ?>
		<?php echo $form->textField($model,'telp',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'telp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hp'); ?>
		<?php echo $form->textField($model,'hp',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'hp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pesantren'); ?>
		<?php 
		$issantren = array(
				'1' => 'Ya',
				'2' => 'Tidak'
			);
		echo $form->dropDownList($model,'pesantren',$issantren); 
		?>
		<?php echo $form->error($model,'pesantren'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_pesantren'); ?>
		<?php echo $form->textField($model,'nama_pesantren',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_pesantren'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_lulus'); ?>
		<?php echo $form->textField($model,'tahun_lulus',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tahun_lulus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lama_pendidikan'); ?>
		<?php echo $form->textField($model,'lama_pendidikan',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lama_pendidikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'takhassus'); ?>
		<?php echo $form->textField($model,'takhassus',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'takhassus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sd'); ?>
		<?php echo $form->textField($model,'sd',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'smp'); ?>
		<?php echo $form->textField($model,'smp',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'smp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sma'); ?>
		<?php echo $form->textField($model,'sma',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pendidikan_ayah'); ?>
		<?php 
		
		echo $form->dropDownList($model,'pendidikan_ayah',$jobs); 
		?>
		<?php echo $form->error($model,'pendidikan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pekerjaan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penghasilan_ayah'); ?>
		<?php echo $form->textField($model,'penghasilan_ayah',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'penghasilan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pendidikan_ibu'); ?>
		<?php echo $form->dropDownList($model,'pendidikan_ibu',$jobs); ?>
		<?php echo $form->error($model,'pendidikan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pekerjaan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penghasilan_ibu'); ?>
		<?php echo $form->textField($model,'penghasilan_ibu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'penghasilan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pelatihan'); ?>
		<?php echo $form->textArea($model,'pelatihan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pelatihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skill'); ?>
		<?php echo $form->textArea($model,'skill',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'skill'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_alumni'); ?>
		<?php 
		
		echo $form->dropDownList($model,'is_alumni',$issantren); 
		?>
		<?php echo $form->error($model,'is_alumni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kampus_tujuan'); ?>
		<?php 
		

		$list = CHtml::listData(Kampus::model()->findAll(),'id_kampus','nama_kampus');
		echo $form->dropDownList($model,'kampus_tujuan',$list); 
		?>
		<?php echo $form->error($model,'kampus_tujuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rencana_studi'); ?>
		<?php 
		
		$plans = array(
			'1 Tahun','4 Tahun (S1)'
		);
		echo $form->dropDownList($model,'rencana_studi',$plans); 
		?>
		<?php echo $form->error($model,'rencana_studi'); ?>
	</div>

<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->