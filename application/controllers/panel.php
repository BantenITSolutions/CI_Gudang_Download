<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('cpanel_model');
		session_start();
	}
	
	function index()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$identitas = explode("|",$session);
			$data['nama'] = $identitas[1];
			$data['kode']='';		
			if ($this->uri->segment(3) === FALSE)
			{
				$data['kode']='';
			}
			else
			{
				$data['kode'] = $this->uri->segment(3);
			}
			
			$page=$this->uri->segment(3);
			$limit=6;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
		
			$data['donlod'] = $this->cpanel_model->ambil_limit($limit,$offset,"id_download DESC");
			$tot_hal = $this->db->get("tbl_download");
			$config['base_url'] = base_url() . 'panel/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Terakhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
			$this->load->view('cpanel/dashboard',$data);
		}
		else{
			$this->loginpage();
		}
	}
	
	function hapus()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$identitas = explode("|",$session);
			$data['nama'] = $identitas[1];
			$data['kode']='';		
			if ($this->uri->segment(3) === FALSE)
			{
				$data['kode']='';
			}
			else
			{
				$data['kode'] = $this->uri->segment(3);
			}
			
			$q = "delete from tbl_download where id_download='".$data['kode']."'";
			$this->db->query($q);
					?>
						<script>
						javascript:history.go(-1);
						</script>
					<?php
		}
		else{
			$this->loginpage();
		}
	}
	
	function tambah()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$this->load->view('cpanel/tambah');
		}
		else{
			$this->loginpage();
		}
	}
	
	function top_download_item()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$data['kode']='';		
			if ($this->uri->segment(3) === FALSE)
			{
				$data['kode']='';
			}
			else
			{
				$data['kode'] = $this->uri->segment(3);
			}
			
			$page=$this->uri->segment(3);
			$limit=15;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
			
			$data['nm'] = $offset;
			$q = 'select * from tbl_download order by hitung DESC LIMIT '.$offset.','.$limit.'';
			$tot_hal = $this->db->get("tbl_download");
			$config['base_url'] = base_url() . 'panel/top_download_item/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Terakhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			$data['td'] = $this->db->query($q);
			$this->load->view('cpanel/top_download',$data);
		}
		else{
			$this->loginpage();
		}
	}
	
	function top_downloader()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$data['kode']='';		
			if ($this->uri->segment(3) === FALSE)
			{
				$data['kode']='';
			}
			else
			{
				$data['kode'] = $this->uri->segment(3);
			}
			
			$page=$this->uri->segment(3);
			$limit=15;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
			
			$data['nm'] = $offset;
		
			$q = 'select * from tbl_pengguna order by hit DESC LIMIT '.$offset.','.$limit.'';
			$tot_hal = $this->db->get("tbl_pengguna");
			$config['base_url'] = base_url() . 'panel/top_downloader/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Terakhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
			$data['td'] = $this->db->query($q);
			$this->load->view('cpanel/top_downloader',$data);
		}
		else{
			$this->loginpage();
		}
	}
	
	function edit()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$data['kode']='';		
			if ($this->uri->segment(3) === FALSE)
			{
				$data['kode']='';
			}
			else
			{
				$data['kode'] = $this->uri->segment(3);
			}
			$data['detail'] = $this->cpanel_model->ambil_detail($data['kode']);
			$this->load->view('cpanel/edit',$data);
		}
		else{
			$this->loginpage();
		}
	}
	
	function simpan()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$st = $this->input->post('st');
			if($st=="tambah")
			{
				$dt['judul_artikel'] = $this->input->post('judul');
				$dt['link_artikel'] = $this->input->post('link_ar');
				$dt['link_download'] = $this->input->post('link_dl');
				$dt['tgl_posting'] = date('d-M-Y');
				$dt['hitung'] = 0;
				$this->db->insert('tbl_download',$dt);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel'>";
			}
			else if($st=="edit")
			{
				$dt['judul_artikel'] = $this->input->post('judul');
				$dt['link_artikel'] = $this->input->post('link_ar');
				$dt['link_download'] = $this->input->post('link_dl');
				$dt['hitung'] = $this->input->post('hitung');
				$id = $this->input->post('id');
				$this->db->where('id_download', $id);
				$this->db->update('tbl_download', $dt);
					?>
						<script>
						javascript:history.go(-1);
						</script>
					<?php
			}
		}
		else{
			$this->loginpage();
		}
	}
	
	public function loginpage()
	{
		$session=isset($_SESSION['admin_dlmbg']) ? $_SESSION['admin_dlmbg']:'';
		if($session!=""){
			$this->index();
		}
		else{
			$captcha_result = '';
			$data["cap_img"] = $this -> _make_captcha();
			if ( $this -> input -> post( 'submit' ) ) 
			{
				if ( $this -> _check_capthca() ) 
				{
					$captcha_result = 'GOOD';
				}else 
				{
					$captcha_result = 'BAD';
				}
			}
			$data["cap_msg"] = $captcha_result;
			$this->load->view('cpanel/login',$data);
		}
	}





		//==============================================================Fungsi Captcha====================================================
  	function _make_captcha()
  	{
		 $this -> load -> library( 'captcha' );
		 $vals = array(
     	 	 'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
   	 	 'img_url' => base_url().'captcha/', // URL for captcha img
    		 'img_width' => 200, // width
   	   	 'img_height' => 50, // height
		 'font_path'	 => './system/fonts/tes.ttf',
        	 'expiration' => 300 ,
  		 );
    		// Create captcha
			 $cap = $this->captcha->create_captcha( $vals );
			// Write to DB
			if ( $cap ) {
		 	 $data = array(
				'captcha_id' => '',
				'captcha_time' => $cap['time'],
				'ip_address' => $this -> input -> ip_address(),
				'word' => $cap['word'] ,
				);
		 	 $query = $this -> db -> insert_string( 'captcha', $data );
		 	 $this -> db -> query( $query );
			}else {
			  return "Umm captcha not work" ;
			}
			return $cap['image'] ;
  	}

  	function _check_capthca()
  	{
    	// Delete old data ( 2hours)
    	$expiration = time()-10 ;
    	$sql = " DELETE FROM captcha WHERE captcha_time < ? ";
    	$binds = array($expiration);
    	$query = $this->db->query($sql, $binds);

    	//checking input
    	$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
    	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    	$query = $this->db->query($sql, $binds);
    	$row = $query->row();

  		if ( $row -> count > 0 )
    	{
      		return true;
    	}
    	return false;

  	}
//==============================================================Selesai Fungsi Captcha====================================================

//==================Login============================//


	function loginaction()
	{
		$username_mirah = mysql_real_escape_string($this->input->post('username_mirah'));
		$pwd = mysql_real_escape_string($this->input->post('pass_mirah'));
		$hasil = $this->cpanel_model->data_login_admin($username_mirah,$pwd);
		
		$expiration = time()-9000;
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		if ($row->count == 0)
		{
			?>
			<script type="text/javascript">
			alert("Captcha salah. Ulangi lagi...!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel/loginpage'>";
		}
		else
		{
			if (!ctype_alnum($username_mirah) OR !ctype_alnum($pwd)){
				?>
				<script type="text/javascript">
				alert("Protected....!!!");			
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel/loginpage'>";
			}
			else{
				if (count($hasil->result_array())>0){
					$sql_hapus  = "delete FROM captcha";
					$query = $this->db->query($sql_hapus);
					foreach($hasil->result() as $items){
						$session=$items->username_admn."|".$items->nama_admn."|".$items->kode_spr_admn."|".$items->lvl;
					}
					$_SESSION['admin_dlmbg']=$session;
			
					$c = "delete from tbl_pengguna where stts=0";
					$this->db->query($c);
					
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel'>";
				}
				else{
					?>
					<script type="text/javascript">
					alert("Username atau Password Yang Anda Masukkan Salah ..!!!");			
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel/loginpage'>";
				}
			}
		}
	}
	
	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."panel/loginpage'>";
	}
}