
        <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
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
        
<br><br><br><br><br><br>Masukkan Alamat Email Ente Gan...<br><br>
	<div class="home_login_container">
	<form name="myform2" id="myform2" action="" method="POST">
            <div class="movable_container">
                <div class="fl">
                    <input type="text" name="email" class="input_big_subscribe shadow subr_email" placeholder="Masukkan alamat email ente untuk daftar gan..."/>    
                </div>
                <div class="fl">                     
                    <input type="hidden" name="id" value=""/>
                    <input type="image" src="<?php echo base_url(); ?>asset/images/btn_daftar.png" />
                </div>                
                <div class="clear"></div>
            </div>
        </form>
		<div class="clear"></div>
    </div>
    <div class="info_display_container">
        <div id="loading" style="display:none"><img src="<?php echo base_url(); ?>asset/images/loading.gif" /><br /><br /></div>
        <div id="hasil" style="display:block;">
		
		</div>
    </div>
</div>

