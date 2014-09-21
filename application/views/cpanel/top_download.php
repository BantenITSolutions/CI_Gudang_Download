<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style>
body{
font-size:12px;
font-family:Arial;
margin:10px;
}
h1{
font-size:16px;
color:#FF9900;
}
/*paging*/
.pagingpage-nomor{
	background-color: #fff;
	text-align:center;
	width:20px;
	padding: 5px;
	border: 1px dotted #CCCCCC;
	float:left;
	margin:1px;
}
.pagingpage{
	background-color: #fff;
	padding: 5px;
	border: 1px dotted #CCCCCC;
	float:left;
	margin:1px;
}
a{
text-decoration:none;
color:#FF9900;
}
</style>
<h1>Top Download</h1>
<table width="100%;" cellpadding="5" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>Nomor</td><td>Judul Artikel</td><td>Counter</td></tr>
<?php
	$no=$nm+1;
	foreach($td->result_array() as $d)
	{
?>
<tr><td><?php echo $no; ?></td><td><?php echo $d['judul_artikel']; ?></td><td><?php echo $d['hitung']; ?></td></tr>
<?php
$no++;
}
?>
</table>
<?php

echo $paginator;
?>