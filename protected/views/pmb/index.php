<?php 
$info = Info::model()->findByAttributes(array('kode_info'=> 'INFO'));

if(!empty($info))
{
	echo $info->konten;
}

?>