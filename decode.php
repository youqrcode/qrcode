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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<?php
$allowedExts = array (
		"gif",
		"jpeg",
		"jpg",
		"png",
		"bmp"
);
$temp = explode ( ".", $_FILES ["file"] ["name"] );
$extension = end ( $temp );
if ((($_FILES ["file"] ["type"] == "image/gif")
		|| ($_FILES ["file"] ["type"] == "image/jpeg")
		|| ($_FILES ["file"] ["type"] == "image/jpg")
		|| ($_FILES ["file"] ["type"] == "image/pjpeg")
		|| ($_FILES ["file"] ["type"] == "image/x-png")
		|| ($_FILES ["file"] ["type"] == "image/png")
		|| ($_FILES ["file"] ["type"] == "image/bmp"))
		&& ($_FILES ["file"] ["size"] < 8000000)
		&& in_array ( $extension, $allowedExts ))
{
	if ($_FILES ["file"] ["error"] > 0)
	 {
		echo "Return Code: " . $_FILES ["file"] ["error"] . "<br>";
	}
	 else
{
		/*
		 * echo "Upload: " . $_FILES["file"]["name"] . "<br>"; echo "Type: " . $_FILES["file"]["type"] . "<br>"; echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>"; echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		 */
		if (file_exists ( "upload/" . $_FILES ["file"] ["name"] )) {
			// echo $_FILES ["file"] ["name"] . " already exists. ";
		} else {
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "upload/" . $_FILES ["file"] ["name"] );
			// echo "Stored in: " . "upload/" . $_FILES ["file"] ["name"];
		}
	}

	$cmd = 'C:\wamp\www\demo\bin\zbarimg.exe -q ' . 'upload/' . $_FILES ["file"] ["name"];
	echo ('<CENTER><h2>Decoding Results</h2></CENTER>');
	echo ('<p><p><p><center><h3>' . exec ( $cmd ) . '</h3></center>');
} else

{
	echo "Invalid file";
}

?>