<?php 
$info = Info::model()->findByAttributes(array('kode_info'=> 'INFO'));
$konten = !empty($info) ? $info->konten : '';
echo $konten;
?>