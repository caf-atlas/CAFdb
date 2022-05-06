<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>About - CAF atlas</title>
<link rel="stylesheet" type="text/css" href="style_project.css">
<style>
body{background-color: #f1f1f1;}
</style>
</head>
<body> 

<?php
$cancerErr = $caftypeErr = $samplesErr = $markersErr = "";
$cancer = $caftype = $samples = $markers = $filedir= "";
$head = "./";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $cancer = test_input($_POST["cancer"]);
    $caftype = test_input($_POST["caftype"]);
    $samples = test_input($_POST["samples"]);
    //$markers = test_input($_POST["markers"]);
    // $gender = test_input($_POST["gender"]);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div id="fullpage" style="height:658px;min-width:1500px;overflow=hidden;margin:0;padding:0;">

<div id="header" style="width:92%;hight:auto;top:0;float:left;font-size:18px;#background-color: red;padding:0.5% 0% 1% 1%;">
<ul>
  <li style="float:right;"><a class="active" href="about.php">About</a></li>
  <li style="float:right"><a href="download.php">Download</a></li>
  <li style="float:right"><a href="help.php">Help</a></li>
  <li style="float:right"><a href="information.php">Infomation</a></li>
  <li style="float:right"><a href="embedding.php">Analyze</a></li>
  <li style="float:right"><a href="index.html">Home</a></li>
  <li style="float:left"><img border="0" src="logo.png" alt="logo" width="240" height="42"></li>
</ul></div>
<div id="menu" style="height:600px;width:30%;float:left;margin:0 0 0 5%">
<h2 style="padding:3% 0 0 0;">Contact Us</h2>
<h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspxiefuda@163.com</h1>
</div>
</body>
</html>
