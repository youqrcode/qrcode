<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<htmlxmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta content="text/css" http-equiv="Content-Style-Type" />
<meta content="text/javascript" http-equiv="Content-Script-Type" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/common.css" />
<title>QRcode</title>
<link type="image/vnd.microsoft.icon" href="img/favorite.png"
	rel="shortcut icon" />
</head>

<body>
	<center>
		<div id="header">
			<link rel="stylesheet" href="css/header.css" type="text/css">


				<div id="headerContents">
					<div id="headerLogo" class="hideText">
						<p></p>

					</div>
					<ul id="headerListStyle">
						<li class="headerList"><a href="form.html">生成QR码</a></li>
						<li class="headerList"><a href="decode.html">解析QR码</a></li>
						<li class="headerList"><a href="encrypted_decode.html">解析加密QR码</a></li>
						<li class="headerList"><a href="index.html">关于我们</a></li>
						<li class="headerList"><a href="">常见问题解答</a></li>
					</ul>
				</div>

		</div>


		<div>
			<left>
			<p></p>
			<h3>&nbsp;</h3>
			<h3>&nbsp;</h3>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			</left>
		</div>

<?php
echo "this is a demo";
function gen_random($length = 32) {
	$final_rand = '';
	for($i = 0; $i < $length; $i ++) {
		$final_rand .= rand ( 0, 9 );
	}
	return $final_rand;
}

$prefix = 'encode_images/' . gen_random ( 8 );
$barcode_name = $prefix . '_bar.bmp';
$encrypted_barcode_name = $prefix . '_enc.bmp';

$content = htmlspecialchars ( $_POST ['unencrypted_code'] );
$cmd = 'C:\wamp\www\demo\bin\QRGenerator.exe "' . $content . '" ' . $barcode_name;
exec ( $cmd );
$cmd0 = 'C:\wamp\www\demo\bin\ScanConverter.exe -convert ' . $barcode_name . ' ' . $barcode_name;
exec ( $cmd0 );
?>


<?php
$cmd1 = 'C:\wamp\www\demo\bin\ScanConverter.exe map.m ' . $barcode_name . ' -silent -snapshot ' . $encrypted_barcode_name;
exec ( $cmd1 );
$cmd2 = 'C:\wamp\www\demo\bin\ScanConverter.exe map.m ' . $encrypted_barcode_name . ' -silent -snapshot ' . $encrypted_barcode_name;
exec ( $cmd2 );
?>
<p>
			<p></p>
			<p></p>
			<center>
				<table border="0">
					<tr>
						<td>
					<?php
					echo ('<img width=256 height=256 src=' . $barcode_name . '>')?></td>
						<td width="30"></td>
						<td>
			<?php
			echo ('<img width=256 height=256 src=' . $encrypted_barcode_name . '>')?>
			</td>
					</tr>
				</table>
			</center>