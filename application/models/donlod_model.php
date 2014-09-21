<?php
Class donlod_model extends CI_Model
{
    function __constuct()
    {
        parent::__constuct(); 
        loader::database(); 
    }
	
    function cek($email)
	{
		$em = mysql_real_escape_string($email);
		$q = $this->db->query("SELECT * from tbl_pengguna WHERE email_pengguna='".$em."' AND stts='1'");
		return $q;
	}
	
    function ambil_limit($limit,$offset,$order)
	{
		$q = $this->db->query("SELECT * from tbl_download order by $order LIMIT $offset,$limit");
		return $q;
	}
	
    function ambil_detail($id)
	{
		$q = $this->db->query("SELECT * from tbl_download where id_download='$id'");
		return $q;
	}
	
    function aktivasi_member($kd)
	{
		$q = $this->db->query("SELECT * from tbl_pengguna where kunci='$kd'");
		return $q;
	}
}
  
?>
