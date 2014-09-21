<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gudang Download - Gede Lumbung [dot] com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content='Ini dia Gudang Download dari blog GedeLumbung.com, tempatnya source code dari berbagai file tutorial yang di blog GedeLumbung.com...!!!' name='description'/>
        <meta content='php, codeigniter, php framework, android, flash, animasi, animasi flash, design pattern, curhat, pemrograman, c#, algoritma, linux, desain web, open source' name='keywords'/>
        <link href="http://gedelumbung.com/wp-content/themes/lumbung/images/logo-icon.png" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" media="screen" />
		<script type="text/javascript">
				$(document).ready(function() {
					$("a[rel=example_group]").fancybox({
						'height'			: '650',
						'width'				: '100',
						'transitionIn'		: 'elastic',
						'transitionOut'		: 'elastic',
						'overlayColor'		: '#000',
						'overlayOpacity'	: 0.7,
						'showNavArrows'   : false
					});});
		</script>

    </head>
    <body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="navigasi"><strong><a href="<?php echo base_url(); ?>panel/top_downloader" rel="example_group" class="iframe">Lihat Tukang Download Terbanyak</a></strong> | <strong><a href="<?php echo base_url(); ?>panel/top_download_item" rel="example_group" class="iframe">Lihat Yang di Download Terbanyak</a></strong></div>
	<div id="head-panel">
		<div id="inner-head-panel">
			<div id="inner-head-panel-left">
				<a href="http://gedelumbung.com" target="_blank"><img src="<?php echo base_url(); ?>asset/images/logo.png" height="70" border="0"></a>
			</div>
			<div id="inner-head-panel-right">
				Selamat datang administrator, <strong><?php echo $nama; ?></strong> | 
				<strong><a href="<?php echo base_url(); ?>panel/">Dashboard</a></strong> | 
				<strong><a href="<?php echo base_url(); ?>panel/tambah" rel="example_group">Tambah Katalog Download</a></strong> | 
				<strong><a href="<?php echo base_url(); ?>panel/logout">Log Out</a></strong>
				<div style="width:100%; height:6px;"></div>
				<div class="fb-like" data-href="http://gedelumbung.com" data-send="true" data-width="500" data-show-faces="false" data-font="tahoma"></div>
			</div>
		</div>
	</div>
<div class="container">
<?php
	foreach($donlod->result_array() as $d)
	{
		?>
			<div id="sub-content">
				<h5>Diposting tanggal : <?php echo $d['tgl_posting']; ?></h5>
				<h1><a href="<?php echo $d['link_artikel']; ?>" title="Baca : <?php echo $d['judul_artikel']; ?>" target="_blank"><?php echo $d['judul_artikel']; ?></a></h1>
				<hr>
				<div id="sub-content-left">
					<strong><?php echo $d['hitung']; ?> kali download</strong><br>
					<a href="<?php echo base_url(); ?>panel/edit/<?php echo $d['id_download']; ?>" rel="example_group">Edit</a> | 
					<a href="<?php echo base_url(); ?>panel/hapus/<?php echo $d['id_download']; ?>" onclick="return confirm('Are you sure want to delete..???')">Hapus</a> | 
					<a href="<?php echo base_url(); ?>donlod/detail/<?php echo $d['id_download']; ?>" target="_blank">Link Download</a>
				</div>
				<div id="sub-content-right">
					<form method="post" action="<?php echo base_url(); ?>donlod/ambil/" target="_blank">
						<input type="image" src="<?php echo base_url(); ?>asset/images/btn_download.png">
						<input type="hidden" name="id" value="<?php echo $d['id_download']; ?>" />
					</form>
				</div>
			</div>
		<?php
	}
?>
<div style="clear:both; width:100%; height:10px;"></div>
<table align="center">
	<tr><td><?php echo $paginator; ?></td></tr>
</table>
</div>
</body>
</html>
