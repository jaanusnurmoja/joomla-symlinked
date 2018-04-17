<html>
<head>
<title>First steps of symlinked Joomla installation</title>
<style>
table, tr, td {
	border: solid 1px;
}
</style>
</head>
<body>

<form method="POST" action="remotes.php">
<table style="width:576px;">
<caption>
<h2>Symlinked Joomla site - preparing for installation</h2>
<h3>Before you start installing new site you should prepare your environment creating access to the main Joomla source files. Be aware that your server supports symlinks!</h3>
</caption>
<tr><td colspan="2">
Submit full path to the target directory where your main Joomla site is installed.<br /> 
<strong>Don't forget to add / at the end!</strong><br />
If you are in a subdomain then your document root (that should be a default value in textbox) may contain also your subdomain's main folder after public_html (or whatever else). You may have to replace it with right folder path.</td></tr>
<tr><td colspan="2">
<input type="text" name="target" id="target" style="width:100%" value="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/" /></td>
</tr>
<tr>
<td colspan="2">
Now decide what do you want to do with image folder - to have just a symlink, only own folder or both.
</td>
</tr>
<tr>
<td>
I don't need own image folder, let's create just a symlink to the source 
</td>
<td>
<input type="radio" name="images" id="images" value="0" checked>
</td>
</tr>
<tr>
<td>
I need an own image folder, no symlink 
</td>
<td>
<input type="radio" name="images" id="images" value="1">
</td>
</tr>
<tr>
<td>
I need an image folder and a symlink inside it 
</td>
<td>
<input type="radio" name="images" id="images" value="2">
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="Submit"></a>
</td>
</tr>
</table>
<p>Symlinked Joomla installation can heavily save space in your file storage and prevent increasing your inode number which is very important i.e. when your payments for shared web hosting are depending on how much inodes you have in your account.</p>
Regards,<br />
Jaanus Nurmoja<br />
Rakvere, Estonia<br />
jaanus.nurmoja@gmail.com<br /><br />
</body>
</html>
