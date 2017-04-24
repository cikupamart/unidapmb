<?php
/* @var $this PmbController */
/* @var $data Pmb */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pmb')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pmb), array('view', 'id'=>$data->id_pmb)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_peserta')); ?>:</b>
	<?php echo CHtml::encode($data->nama_peserta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pilihan_pertama')); ?>:</b>
	<?php echo CHtml::encode($data->pilihan_pertama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pilihan_kedua')); ?>:</b>
	<?php echo CHtml::encode($data->pilihan_kedua); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pilihan_ketiga')); ?>:</b>
	<?php echo CHtml::encode($data->pilihan_ketiga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_lengkap')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_lengkap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desa')); ?>:</b>
	<?php echo CHtml::encode($data->desa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kecamatan')); ?>:</b>
	<?php echo CHtml::encode($data->kecamatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kabupaten')); ?>:</b>
	<?php echo CHtml::encode($data->kabupaten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('propinsi')); ?>:</b>
	<?php echo CHtml::encode($data->propinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodepos')); ?>:</b>
	<?php echo CHtml::encode($data->kodepos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telp')); ?>:</b>
	<?php echo CHtml::encode($data->telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hp')); ?>:</b>
	<?php echo CHtml::encode($data->hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesantren')); ?>:</b>
	<?php echo CHtml::encode($data->pesantren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pesantren')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pesantren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_lulus')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_lulus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lama_pendidikan')); ?>:</b>
	<?php echo CHtml::encode($data->lama_pendidikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('takhassus')); ?>:</b>
	<?php echo CHtml::encode($data->takhassus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sd')); ?>:</b>
	<?php echo CHtml::encode($data->sd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smp')); ?>:</b>
	<?php echo CHtml::encode($data->smp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sma')); ?>:</b>
	<?php echo CHtml::encode($data->sma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pendidikan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pendidikan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pendidikan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pendidikan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelatihan')); ?>:</b>
	<?php echo CHtml::encode($data->pelatihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skill')); ?>:</b>
	<?php echo CHtml::encode($data->skill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_alumni')); ?>:</b>
	<?php echo CHtml::encode($data->is_alumni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kampus_tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->kampus_tujuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rencana_studi')); ?>:</b>
	<?php echo CHtml::encode($data->rencana_studi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>

</div>