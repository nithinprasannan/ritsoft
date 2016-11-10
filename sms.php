<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="boxHead" style="height:5%;">Send SMS For All student</div>
<table width="529">
<tr>
  <td height="27">&nbsp;</td></tr>
<tr>
<td width="282" height="29">&nbsp;</td>
<font color="#3333CC">
<td width="126"><a href='dashboard_hod.php?menu=class_sms'><font color="#3333CC">CLASS</font></a></td>
<td width="80"><a href='dashboard_hod.php?menu=stud_sms'>STUDENT</a></td>
<td></td>
</tr></table>
<form id="form1" name="form1" method="post" action="sending.php" enctype="multipart/form-data"  >
<table width="591"><tr>
  <td height="47">&nbsp;</td></tr>
<tr>
<td width="227">&nbsp;</td>
  <td width="100"><center>Message :&nbsp;</td><td width="248"><textarea name="msg"></textarea></td></tr>
  <tr>
  <td height="35">&nbsp;</td></tr></table>
<center><input type="submit" value="send"><input type="reset" name="" id="" value="Cancel"/></center></form>
</body>
</html>