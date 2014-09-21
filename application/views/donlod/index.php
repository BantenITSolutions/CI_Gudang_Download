
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gudang Download - Gede Lumbung [dot] com</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
		<meta name="author" content="Gede Lumbung" /> 
        <meta name='description' content='Ini dia Gudang Download dari blog GedeLumbung.com, tempatnya source code dari berbagai file tutorial yang di blog GedeLumbung.com...!!!'/>
        <meta name='keywords' content='php, codeigniter, php framework, android, flash, animasi, animasi flash, design pattern, curhat, pemrograman, c#, algoritma, linux, desain web, open source' />
        <link href="http://gedelumbung.com/wp-content/themes/lumbung/images/logo-icon.png" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/highslide.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/highslide-with-html.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#myform").validate({
				debug: false,
				rules: {
						email: {
							required: true,
							email: true
						}
				},
				messages: {
					email: ""
				},
				submitHandler: function(form) {
					$.post('<?php echo base_url(); ?>donlod/kirim', $("#myform").serialize(), function(data) {
						$('#hasil').html(data);
						
						document.myform.email.value="";
					});
				}
			});
			
			
			$("#myform2").validate({
				debug: false,
				rules: {
						email: {
							required: true,
							email: true
						}
				},
				messages: {
					email: ""
				},
				submitHandler: function(form) {
					$.post('<?php echo base_url(); ?>donlod/daftar', $("#myform2").serialize(), function(data) {
						$('#hasil').html(data);
						document.myform2.email.value="";
					});
				}
			});
		});

		</script>
		<script type="text/javascript">
		
		$(function() {
			$('#loading').ajaxStart(function(){
				$(this).fadeIn();
			}).ajaxStop(function(){
				$(this).fadeOut();
			});
		});
		</script>
        
		<script type="text/javascript">
		hs.graphicsDir = '<?php echo base_url(); ?>asset/images/';
		hs.outlineType = 'rounded-white';
		hs.wrapperClassName = 'draggable-header';
		hs.width = 600;
		hs.height = 400;
		hs.align = 'center';
		</script>
    </head>
    <body>
	<div id="navigasi">Gudang Download File Tutorial [www.gedelumbung.com] - <?php echo date('Y'); ?> || <a href="http://gedelumbung.com" target="_blank">Copyleft Ng'Blog Biar Gak GobloG - Blog'Nya Gede Lumbung</a></div>
<div class="container">
    <div class="logo_top_spacer"></div>
    <div class="logo_big"></div>
    <div class="home_login_container">
        <!-- Login Form container -->
        <form name="myform" id="myform" action="" method="POST">
            <div class="movable_container m_login_c">
                <div class="log_sub_link">
                   <a href="<?php echo base_url(); ?>donlod/form_daftar" onclick="return hs.htmlExpand(this,{ objectType: 'iframe' })"><span class="link"> Belum daftar yaw gan...??? Yaw daftar dulu dong gan....!!!</span></a>
                </div>
                <div class="fl">
                    <input type="text" name="email" class="input_big_login shadow email" placeholder="Masukkan alamat email ente untuk login gan..."/>    
                </div>
                <div class="fl">
                                        <input type="hidden" name="p" class="move_to" value=""/>
                    <input type="hidden" name="id" value="<?php echo $kode; ?>"/>
                    <input type="image" src="<?php echo base_url(); ?>asset/images/btn_login.png" />
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <div class="info_display_container">
        <div id="loading" style="display:none"><img src="<?php echo base_url(); ?>asset/images/loading.gif" /><br /><br /></div>
        <div id="hasil" style="display:block;">
		
		</div>
    </div>
</div>
</body>
</html>
