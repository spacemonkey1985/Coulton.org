<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>eMarketing.coulton.org</title>
<link href="stylesheets/common.css" rel="stylesheet" />
<script type="text/javascript">
	function clearForm(){
		document.getElementById('email').value = '';
	}
	function submitForm(){
		if(document.getElementById('email').value != ''){
			if(validate("optin", "email")){
				document.forms['optin'].submit();
			}
			else{
				window.alert('Please make sure you have entered a valid email address');
			}
		}
		else{
			window.alert('Please make sure you have entered your email address');
		}
	}
	function validate(form_id,email) {
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = document.forms[form_id].elements[email].value;
		if(reg.test(address) == false) {
			return false;
		}
		else{
			return true;
		}
	}
</script>
</head>
<body>
	<?php
        include('connect/db_connection.php');
	
		if(isset($_GET['id'])){	
			if(!$result = mysql_query("SELECT * FROM products WHERE id = " . $_GET['id'])){
				echo mysql_error;
			}
			else{
				while($row = mysql_fetch_array($result)){
					$title = $row['title'];
					$description = $row['description'];
					$headline = $row['headline'];
					$image = $row['image'];
					$button = $row['button'];
					$link = $row['link'];
					$id = $_GET['id'];
				}
			}
		}
		mysql_close($conn);
    ?>
	<center>
        <table cellpadding="0" cellspacing="0" width="980" height="750" style="background-color: #666666">
        	<tr>
            	<td height="35" colspan="3"></td>
            </tr>
            <tr>
            	<td width="15"></td>
                <!-- main -->
                <td height="670" style="background-color: #ffffff">
                	<table cellpadding="0" cellspacing="0" width="100%" height="100%">
                    	<tr>
                        	<td width="337">
                            	<table cellpadding="0" cellspacing="0" width="100%" height="100%">
                                	<tr>
                                    	<td height="235" style="background-color: #E6E6E6">
                                        	<a href="http://emarketing.coulton.org"><img src="images/logo.png" alt="emarketing.coulton.org" border="0" height="235" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td height="8"></td>
                                    </tr>
                                    <tr>
                                    	<td height="427" class="menu">
                                        	<ul>
                                            	<li><a href="http://emarketing.coulton.org" style="color: #BCE4A1;">home</a></li>
                                                <li><a href="products.php">products</a></li>
                                                <li><a href="http://www.twitter.com/sc_emarketing">blog</a></li>
                                                <li><a href="contacts.php">contact us</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="588" style="border-right: solid 1px #E6E6E6">
                            	<table cellpadding="0" cellspacing="0" width="100%" height="100%">
                                    <tr>
                                    	<td width="588" height="673" width="100%" style="padding-left: 5px; padding-right: 5px;">
                                        	<h1><?php echo($title); ?></h1>
                                            <table width="100%" style="padding-left: 15px; padding-right: 15px; text-align: center; vertical-align: middle;">
                                            	<tr>
                                                	<td class="contact" width="100%" style="text-align: center; vertical-align: middle;">
                                                    	<br />
                                                    	<b><?php echo($headline); ?></b>
                                                        <br />
                                                        <br />
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td height="15px"></td>
                                                </tr>
                                                <tr>
                                                	<td style="text-align: justify;">
                                                    	<p><?php echo($description); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td height="15px"></td>
                                                </tr>
                                                <tr>
                                                	<td style="text-align: center; vertical-align: middle;">
                                                    	<form id='optin' action="optin.php" method="post">
                                                        	Email:&nbsp;<input type="text" size="30" name="email" />
                                                            <input type="hidden" name="link" value="<?php echo($link); ?>" />
                                                            <input type="hidden" name="id" value="<?php echo($id); ?>" />
                                                            <br />
                                                            <br />
                                                            <table cellpadding="0" cellspacing="0">
                                                            	<tr>
                                                                	<td><img src="images/btn-left.png" alt="button" /></td>
                                                                	<td class="optin">
                                                                		<a href="JavaScript:submitForm();"><?php echo($button); ?></a>
                                               						</td>
                                                                    <td><img src="images/btn-right.png" alt="button" /></td>
                                                                </tr>
                                                            </table>                     
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td height="15px"></td>
                                                </tr>
                                                <tr>
                                                	<td width="100%" style="text-align: center; vertical-align: middle;">
                                                    	<img src="<?php echo($image); ?>" alt="image" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- end main -->
                <td width="15"></td>
            </tr>
            <tr>
            	<td height="45"></td>
            	<!-- footer -->
                <td>
                	<span style="font-size: 8pt; color: #ffffff;">&copy;2010 coulton.org</span>
                </td>
                <!-- end footer -->
                <td height="45"></td>
            </tr>
        </table>
    </center>
</body>
</html>