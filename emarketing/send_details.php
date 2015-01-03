<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>eMarketing.coulton.org</title>
<link href="stylesheets/common.css" rel="stylesheet" />
</head>
<body>
	<?php
        include('connect/db_connection.php');
		
		mysql_query("INSERT INTO subscribers (contact, email)
		VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "')");
		
		mysql_close($conn);
		
 		$to = "emarketing@coulton.org";
 		$subject = "Re: New Subscriber " . $_POST['name'];
 		$body = $_POST['name'] . " has just subscribed for product updates,\n\nThey also submitted the following comment/query\n\n" . $_POST['message'];
 		mail($to, $subject, $body);
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
                            <td width="313" style="border-right: solid 1px #E6E6E6">
                            	<table cellpadding="0" cellspacing="0" width="100%" height="100%">
                                    <tr>
                                    	<td width="313" height="499" width="100%" style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>thank you</h1>
                                            <p>thank you <?php echo($_POST['name']); ?> for signing up to our update service. you will now receive email updates on
                                            new and existing products listed on this site</p>
                                            <h1>contact us</h1>
                                            <p>have further questions? feel free to email us at <a href="mailto:emarketing@coulton.org">emarketing@coulton.org</a> 
                                            with any queries you may have.
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td height="166"><img src="images/contacts.png" alt="contact us" border="0" /></td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                            	<table cellpadding="0" cellspacing="0" width="275" height="100%">
                                	<tr>
                                    	<td style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>useful links</h1>
                                            <table>
                                            	<tr>
                                                	<td>
                                                    	<div class="news-header"><a href="http://dotcommogul.net/advertising/how-to-advertise-your-business-on-facebook-for-free-2/">Advertise on Facebook for Free</a></div>
                                                        <div class="news">With more than 64 million active users and around 250,000 new users joining every day, 
                                                        you can tap into the social networking revolution with a free page on Facebook for your blog or business... 
                                                        yes, I said free</div>
                                                        <div style="text-align: right"><a href="http://dotcommogul.net/advertising/how-to-advertise-your-business-on-facebook-for-free-2/">read more</a></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td><hr /></td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                    	<div class="news-header"><a href="http://www.articlealley.com/article_976414_81.html">How To Get 10,000 Twitter Followers Fast</a></div>
                                                        <div class="news">This is the simple process I used to get 10,000 followers within a month!<br /><br />Twitter is an incredible way to get traffic to your site(s), network, stay in contact with your friends and family and even make new friends.</div>
                                                        <div style="text-align: right"><a href="http://www.articlealley.com/article_976414_81.html/">read more</a></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td><hr /></td>
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