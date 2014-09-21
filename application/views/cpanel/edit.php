<style>
.input-teks{
padding:7px;
border:1px dotted #999999;
}
.input-button{
border:1px dotted #666666;
background-color:#333333;
color:#FFFFFF;
padding:8px;
cursor:pointer;
}
h1{
font-size:16px;
color:#FF9900;
}
</style>
<h1>Edit Katalog Download</h1>
<?php
	foreach($detail->result_array() as $d)
	{
?>
<form method="post" action="<?php echo base_url(); ?>panel/simpan">
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="136" height="33" align="left" valign="middle">Judul Artikel </td>
    <td width="23" align="center" valign="middle">:</td>
    <td width="398" align="left" valign="middle">
        <input type="hidden" name="st" value="edit"/><input type="hidden" name="id" value="<?php echo $d['id_download']; ?>"/> <input type="text" name="judul" class="input-teks" size="80" value="<?php echo $d['judul_artikel']; ?>" />    </td>
  </tr>
  <tr>
    <td height="33" align="left" valign="middle">Link Artikel </td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
        <input type="text" name="link_ar" class="input-teks" size="80" value="<?php echo $d['link_artikel']; ?>" /></td>
  </tr>
  <tr>
    <td height="33" align="left" valign="middle">Link Download </td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
        <input type="text" name="link_dl" class="input-teks" size="80" value="<?php echo $d['link_download']; ?>" /></td>
  </tr>
  <tr>
    <td height="33" align="left" valign="middle">Counter Download</td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
        <input type="text" name="hitung" class="input-teks" size="80" value="<?php echo $d['hitung']; ?>" /></td>
  </tr>
  <tr>
    <td height="33" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="left" valign="middle">
      <input type="submit" value="Simpan Katalog" class="input-button" /><input type="reset" value="Hapus" class="input-button" /></td>
  </tr>
</table>
</form>
<?php
}
?>