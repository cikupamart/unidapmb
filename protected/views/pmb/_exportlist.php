<?php



header("Content-type: application/excel");
header("Content-Disposition: attachment; filename=datapmb.xls");
header('Cache-Control: max-age=0');

?>


<table border="1px">
<tr>
<th>No</th>
<th>Nama Peserta</th>
<th>TTL</th>
<th>Jenis Kelamin</th>
<th>Pilihan Pertama</th>
<th>Pilihan Kedua</th>
<th>Pilihan Ketiga</th>
<th>Alamat</th>
<th>Desa</th>
<th>Kecamatan</th>
<th>Kabupaten</th>
<th>Propinsi</th>
<th>Kodepos</th>
<th>Telp</th>
<th>Hp</th>
<th>Email</th>
<th>Pesantren</th>
<th>Nama Pesantren</th>
<th>Tahun Lulus</th>
<th>Lama Pendidikan</th>
<th>Takhassus</th>
<th>SD</th>
<th>SMP</th>
<th>SMA</th>
<th>Nama Ayah</th>
<th>Pendidikan Ayah</th>
<th>Pekerjaan Ayah</th>
<th>Penghasilan Ayah</th>
<th>Nama Ibu</th>
<th>Pendidikan Ibu</th>
<th>Pekerjaan Ibu</th>
<th>Penghasilan Ibu</th>
<th>Pelatihan</th>
<th>Ketrampilan</th>
<th>Alumni</th>
<th>Kampus Tujuan</th>
<th>Rencana Studi</th>
</tr>
<?php

$i=0;
foreach($model->searchPmb() as $m)
{
$i++;
?>
  
<tr>
<td><?php echo $i;?></td>
<td><?php echo $m->nama_peserta;?></td>
<td><?php echo $m->tempat_lahir.', '.$m->tanggal_lahir;?></td>
<td><?php echo $m->jenis_kelamin;?></td>
<td><?php echo $m->pilihan_pertama;?></td>
<td><?php echo $m->pilihan_kedua;?></td>
<td><?php echo $m->pilihan_ketiga;?></td>
<td><?php echo $m->alamat_lengkap;?></td>
<td><?php echo $m->desa;?></td>
<td><?php echo $m->kecamatan;?></td>
<td><?php echo $m->kabupaten;?></td>
<td><?php echo $m->propinsi;?></td>
<td><?php echo $m->kodepos;?></td>
<td><?php echo $m->telp;?></td>
<td><?php echo $m->hp;?></td>
<td><?php echo $m->email;?></td>
<td><?php echo $m->pesantren;?></td>
<td><?php echo $m->nama_pesantren;?></td>
<td><?php echo $m->tahun_lulus;?></td>
<td><?php echo $m->lama_pendidikan;?></td>
<td><?php echo $m->takhassus;?></td>
<td><?php echo $m->sd;?></td>
<td><?php echo $m->smp;?></td>
<td><?php echo $m->sma;?></td>
<td><?php echo $m->nama_ayah;?></td>
<td><?php echo $m->pendidikan_ayah;?></td>
<td><?php echo $m->pekerjaan_ayah;?></td>
<td><?php echo $m->penghasilan_ayah;?></td>
<td><?php echo $m->nama_ibu;?></td>
<td><?php echo $m->pendidikan_ibu;?></td>
<td><?php echo $m->pekerjaan_ibu;?></td>
<td><?php echo $m->penghasilan_ibu;?></td>
<td><?php echo $m->pelatihan;?></td>
<td><?php echo $m->skill;?></td>
<td><?php echo $m->is_alumni;?></td>
<td><?php echo $m->kampus_tujuan;?></td>
<td><?php echo $m->rencana_studi;?></td>
</tr>

<?php 
}
?>

</table>