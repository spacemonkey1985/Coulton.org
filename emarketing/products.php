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
                                    	<td width="313" height="673" width="100%" style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>products</h1>
                                            <table width="313">
                                            	<?php
                                            		if(!$result = mysql_query("SELECT * FROM products ORDER BY id ASC")){
														echo mysql_error;
													}
													else{
														while($row = mysql_fetch_array($result)){
															echo "<tr>";
															echo "	<td><img src='" . $row['icon'] . "' alt='icon' border='0' /></td>";
															echo "	<td>";
															echo "		<div class='news-header'>" . $row['title'] . "</div>";
															echo "		<div class='news'>" . $row['description'] . "<br /><div style='text-align: right;'><a href='product.php?id=" . $row['id'] . "'>read more</a></div></div>";
															echo "	</td>";
															echo "</tr>";
															echo "<tr>";
															echo "	<td colspan='2'><hr /></td>";
															echo "</tr>";
														}
													}
												?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                            	<table cellpadding="0" cellspacing="0" width="275" height="100%">
                                	<tr>
                                    	<td><br /><img src="images/tips.png" alt="tips" border="0" /></td>
                                    </tr>
                                    <tr>
                                    	<td style="padding-left: 5px; padding-right: 5px;">
                                        	<h1>tips</h1>
                                            <ol>
                                            	<?php
                                            		if(!$result = mysql_query("SELECT * FROM tips ORDER BY id ASC")){
														echo mysql_error;
													}
													else{
														while($row = mysql_fetch_array($result)){
															echo "<li><p>" . $row['tip'] . "</p></li>";
														}
													}
													
													mysql_close($conn);
												?>
                                            </ol>
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