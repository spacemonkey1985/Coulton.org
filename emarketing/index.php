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
                                    	<td height="238"><img src="images/home.png" alt="e-marketing" border="0" height="238" /></td>
                                    </tr>
                                    <tr>
                                    	<td height="8"></td>
                                    </tr>
                                    <tr>
                                    	<td height="427" width="100%" style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>bio</h1>
                                            <p>my goal is to help new and existing businesses or individuals generate the most out of
                                            their e-marketing strategies. using the tools and advice on this site you can expect to
                                            see higher return from your advertising efforts on the world wide web.<br />
                                            <br />
                                            feel free to browse the products i have personally selected from the marketplace that are
                                            specifically aimed at increasing traffic through your website, hits from advertising campaigns
                                            and many more profitable schemes.<br />
                                            <br />
                                            don't forget to follow me on <a href="http://www.facebook.com/pages/emarketingcoultonorg/146025678748358" target="_blank">facebook</a> or <a href="http://www.twitter.com/sc_emarketing" target="_blank">twitter</a> to receive latest updates on products</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                            	<table cellpadding="0" cellspacing="0" width="275" height="100%">
                                	<tr>
                                    	<td height="498" style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>latest</h1>
                                            <table>
                                            	<?php
                                            		if(!$result = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 4")){
														echo mysql_error;
													}
													else{
														while($row = mysql_fetch_array($result)){
															echo "<tr>";
															echo "	<td><img src='" . $row['icon'] . "' alt='icon' border='0' /></td>";
															echo "	<td>";
															echo "		<div class='news-header'>" . $row['title'] . "</div>";
															echo "		<div class='news'>" . $row['description'] . "</div>";
															echo "	</td>";
															echo "</tr>";
															echo "<tr>";
															echo "	<td colspan='2'><hr /></td>";
															echo "</tr>";
														}
													}
													
													mysql_close($conn);
												?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td height="155" class="contact">
                                        	<h1>contact us</h1>
                                            <table>
                                            	<tr>
                                                	<td><a href="mailto:emarketing@coulton.org"><img src="images/email-icon-small.png" alt="email icon" border="0" /></a></td>
                                                    <td><a href="mailto:emarketing@coulton.org">emarketing@coulton.org</a></td>
                                                </tr>
                                                <tr>
                                                	<td><a href="http://www.twitter.com/sc_emarketing" target="_blank"><img src="images/twitter-icon-small.png" alt="twitter icon" border="0" /></a></td>
                                                    <td><a href="http://www.twitter.com/sc_emarketing" target="_blank">twitter</a></td>
                                                </tr>
                                                <tr>
                                                	<td><a href="http://www.facebook.com/pages/emarketingcoultonorg/146025678748358" target="_blank"><img src="images/facebook-icon-small.png" alt="facebook icon" border="0" /></a></td>
                                                    <td><a href="http://www.facebook.com/pages/emarketingcoultonorg/146025678748358" target="_blank">facebook</a></td>
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