<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>asset/css/admin-style.css" rel="stylesheet" />
<title>Login to Administrator Page | Mirah Hotel Banyuwangi</title>
</head>

<body>
<form method="post" action="<?php echo base_url(); ?>panel/loginaction">
<div id="box-login">
<div id="box-login-logo"></div>
<div id="box-login-input">
  <table width="100%" border="0" cellpadding="2">
    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type="text" name="username_mirah" size="30" class="input-teks" autocomplete="off" value="Username" onblur="if(this.value=='') this.value='Username';" onfocus="if(this.value=='Username') this.value='';"  /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="pass_mirah" size="30" class="input-teks" autocomplete="off" value="Password" onblur="if(this.value=='') this.value='Password';" onfocus="if(this.value=='Password') this.value='';"   /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
      <td><?php echo $cap_img; ?></td>
    </tr>
    <tr>
      <td>Captcha Code</td>
      <td>:</td>
      <td><input type="text" name="captcha" size="30" class="input-teks"  autocomplete="off" value="Captcha Code" onblur="if(this.value=='') this.value='Captcha Code';" onfocus="if(this.value=='Captcha Code') this.value='';"   /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
      <td><input type="submit" class="input-button" value="Log In" /> <input type="reset" class="input-button" value="Reset" /></td>
    </tr>
  </table>
</div>
</div>
<div id="footer">
Gudang Download File Tutorial [www.gedelumbung.com] - 2012 || <a href="http://gedelumbung.com" target="_blank">Copyleft Ng'Blog Biar Gak GobloG - Blog'Nya Gede Lumbung</a>
</div>
</form>
</body>
</html>
