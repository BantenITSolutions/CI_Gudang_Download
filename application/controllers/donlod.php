<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donlod extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('donlod_model');
		session_start();
	}
	
	public function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."donlod/dashboard'>";
	}
	
	public function kirim()
	{
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session==""){
			$em = $this->input->post('email');
			$id = $this->input->post('id');
			$q = $this->donlod_model->cek($em);
			if(count($q->result()) > 0)
			{
				$useractive=$em;
				$_SESSION['useractive']= $useractive;
				echo "Selamat datang agan <b>".$this->input->post('email')."</b><br>Halaman akan diarahkan dalam waktu 3 detik....";
				if($id!="")
				{
					echo "<br><br>Tidak diarahkan otomatis....???? <a href='".base_url()."donlod/detail/".$id."'>Arahkan Manual</a>";
					echo "<meta http-equiv='refresh' content='3; url=".base_url()."donlod/detail/".$id."'>";
				}
				else
				{
					echo "<br><br>Tidak diarahkan otomatis....???? <a href='".base_url()."donlod/dashboard/'>Arahkan Manual</a>";
					echo "<meta http-equiv='refresh' content='3; url=".base_url()."donlod/dashboard/'>";
				}
			}
			else
			{
				echo 'Email ente gak ada di database ane gan.<br><b>Yaw daftar dulu dong gan....!!!</b>';
			}
		}
		else
		{
			echo "ente udah login gan...";
		}
	}
	
	public function dashboard()
	{
		$data['kode']='';		
		if ($this->uri->segment(3) === FALSE)
		{
			$data['kode']='';
		}
		else
		{
			$data['kode'] = $this->uri->segment(3);
		}
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session==""){
			$this->load->view('donlod/index',$data);
		}
		else
		{
			$page=$this->uri->segment(3);
			$limit=6;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
		
			$data['donlod'] = $this->donlod_model->ambil_limit($limit,$offset,"id_download DESC");
			$tot_hal = $this->db->get("tbl_download");
			$config['base_url'] = base_url() . 'donlod/dashboard/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Terakhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
			$data['em'] = $session;
			$this->load->view('donlod/dashboard',$data);
		}
	}
	
	public function detail()
	{
		$data['kode']='';		
		if ($this->uri->segment(3) === FALSE)
		{
			$data['kode']='';
		}
		else
		{
			$data['kode'] = $this->uri->segment(3);
		}
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session==""){
			$this->load->view('donlod/index',$data);
		}
		else
		{
			$data['detail'] = $this->donlod_model->ambil_detail($data['kode']);
			if(count($data['detail']->result())>0)
			{
				$data['em'] = $session;
				$this->load->view('donlod/detail',$data);
			}
			else
			{
				echo "Upzzzz, ente salah jurusan gan....";
			}
		}
	}
	
	public function ambil()
	{
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session==""){
			$this->dashboard();
		}
		else
		{
			$id = $this->input->post('id');
			if(empty($id))
			{
				echo "Upzzzz, ente salah jurusan gan....";
			}
			else
			{
				$this->db->query("update tbl_download set hitung=hitung+1 where id_download='$id'");
				$this->db->query("update tbl_pengguna set hit=hit+1 where email_pengguna='$session'");
				$detail = $this->donlod_model->ambil_detail($id);
				$link="";
				foreach($detail->result() as $d)
				{
					$link = $d->link_download;
				}
				echo "<meta http-equiv='refresh' content='0; url=".$link."'>";
			}
		}
	}
	
	public function daftar()
	{
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session!=""){
			echo "ente udah login gan";
		}
		else
		{
			$em = $this->input->post('email');
			$id = $this->input->post('id');
			$q = $this->donlod_model->cek($em);
			if(count($q->result()) > 0)
			{
				$useractive=$em;
				$_SESSION['useractive']= $useractive;
				echo "Selamat datang agan <b>".$this->input->post('email')."</b><br>Halaman akan diarahkan dalam waktu 3 detik....";
				if($id!="")
				{
					echo "<br><br>Tidak diarahkan otomatis....???? <a href='".base_url()."donlod/detail/".$id."'>Arahkan Manual</a>";
					echo "<meta http-equiv='refresh' content='3; url=".base_url()."donlod/detail/".$id."'>";
				}
				else
				{
					echo "<br><br>Tidak diarahkan otomatis....???? <a href='".base_url()."donlod/dashboard/'>Arahkan Manual</a>";
					echo "<meta http-equiv='refresh' content='3; url=".base_url()."donlod/dashboard/'>";
				}
			}
			else
			{
				$kode_aktivasi = md5($em."AkuSayangKamuSefty");
				$del = "delete from tbl_pengguna where email_pengguna='".$em."'";
				$this->db->query($del);
				$q = "insert into tbl_pengguna(email_pengguna,stts,kunci) values('".$em."','0','".$kode_aktivasi."')";
				$this->db->query($q);
				$this->email->from("gedesumawijaya@gmail.com", "Gudang Download - Blog'Nya Gede Lumbung");
				$this->email->to($em);
				$this->email->set_mailtype('html');
				$this->email->subject('Link Aktivasi');
				$this->email->message('Terima kasih telah mendaftar di Gudang Download - Blognya Gede Lumbung. Klik link berikut ini untuk mengaktifkan akun agan. 
				<br><a href="'.base_url().'donlod/aktivasi/'.$kode_aktivasi.'">Aktivasi Email</a>');	
				$this->email->send();
				echo "<h3>Silahkan cek email gan, ane udah kirim link aktivasinya...</h3>";
			}
		}
	}
	
	public function form_daftar()
	{
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session!=""){
			echo "ente udah login gan";
		}
		else
		{
			$this->load->view('donlod/form_daftar');
		}
	}
	
	public function aktivasi()
	{
		$data['kode']='';		
		if ($this->uri->segment(3) === FALSE)
		{
			$data['kode']='gagal';
		}
		else
		{
			$data['kode'] = $this->uri->segment(3);
		}
		$session=isset($_SESSION['useractive']) ? $_SESSION['useractive']:'';
		if($session!=""){
			echo "ente udah login gan";
		}
		else
		{
			$q = $this->donlod_model->aktivasi_member($data['kode']);
			if(count($q->result()) > 0)
			{
				$id = "";
				$em = "";
				foreach($q->result() as $u)
				{
					$id=$u->id_pengguna;
					$em=$u->email_pengguna;
				}
				$q = "update tbl_pengguna set kunci='', stts=1 where id_pengguna='".$id."'";
				$this->db->query($q);
				echo "Hore, email agan berhasil diaktifkan....";
				$useractive=$em;
				$_SESSION['useractive']= $useractive;
				echo "Selamat datang agan <b>".$this->input->post('email')."</b><br>Halaman akan diarahkan dalam waktu 3 detik....";
				echo "<br><br>Tidak diarahkan otomatis....???? <a href='".base_url()."donlod/dashboard/'>Arahkan Manual</a>";
				echo "<meta http-equiv='refresh' content='3; url=".base_url()."donlod/dashboard/'>";
			}
			else
			{
				echo "Kode Aktivasi ente salah gan...";
			}
		}
	}
	
	function logout()
	{
		session_destroy();
		?>
			<script languange="javascript">
			document.location = '<?php echo base_url(); ?>donlod';
			</script>
		<?php
	}
}