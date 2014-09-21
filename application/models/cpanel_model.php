<?php
Class cpanel_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
	
	function data_login_admin($user,$pass)
	{
		$user_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($user,ENT_QUOTES))));
		$pass_bersih=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($pass,ENT_QUOTES))));
		$query=$this->db->query("select * from tbl_spr_admn where username_admn='$user_bersih' and pass_admn=md5('$pass_bersih') and stts=1");
		return $query;
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
 
}
 
?>
