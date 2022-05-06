<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>Analyze - CAF atlas</title>
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
  <li style="float:right;"><a href="about.php">About</a></li>
  <li style="float:right"><a href="download.php">Download</a></li>
  <li style="float:right"><a href="help.php">Help</a></li>
  <li style="float:right"><a href="information.php">Infomation</a></li>
  <li style="float:right"><a class="active" href="embedding.php">Analyze</a></li>
  <li style="float:right"><a href="index.html">Home</a></li>
  <li style="float:left"><img border="0" src="logo.png" alt="logo" width="240" height="42"></li>
</ul></div>



<div id="menu" style="height:600px;width:12%;float:left;background-color:#D0D0D0;">
<h2 style="margin:4% 0 0 0;">Exploration</h2>
<h1>
<ul>
  <li><a href="embedding.php">Embedding</a></li>
  <li><a href="distribution.php">Distribution</a></li>
  <li><a href="gene_expression.php">Expression</a></li>
  <li><a href="heatmap.php">Heatmap</a></li>
  <li><a href="caf_functions.php">CAF functions</a></li>
  <li><a class="active" href="survival_curve.php">Survival curve</a></li>
  <li><a href="cell_chat.php">Cell Chat</a></li>
  <li><a href="infercnv.php">inferCNV</a></li>
</ul>
</h1></div>


<div id="content" style="height:600px;width:18%;float:left;background-color:#E0E0E0;position:relative;z-index: 9998">
<h2 style="margin:3% 3% 0 0;">Paramaters</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
    <h1>Cancer type: <br></h1><select style="width:100%;" name="cancer" input type="text">
	<option value="Breast_cancer" <?php if (@$_POST['cancer']=="Breast_cancer"){echo "selected";}?>>Breast cancer</option>
	<option value="Colorectal_cancer" <?php if (@$_POST['cancer']=="Colorectal_cancer"){echo "selected";}?>>Colorectal cancer</option>
	<option value="Gastric_cancer" <?php if (@$_POST['cancer']=="Gastric_cancer"){echo "selected";}?>>Gastric cancer</option>
	<option value="Hepatocellular_carcinoma" <?php if (@$_POST['cancer']=="Hepatocellular_carcinoma"){echo "selected";}?>>Hepatocellular carcinoma</option>
	<option value="Lung_cancer" <?php if (@$_POST['cancer']=="Lung_cancer"){echo "selected";}?>>Lung cancer</option>
	<option value="Pancreatic_ductal_adenocarcinoma" <?php if (@$_POST['cancer']=="Pancreatic_ductal_adenocarcinoma"){echo "selected";}?>>Pancreatic ductal adenocarcinoma</option>
	</select><br>

   <h1>Gene: <br></h1><select id="caf" style="width:100%;" name="caftype" input type="text">
	<option value="ACTA2" <?php if (@$_POST['caftype']=="ACTA2"){echo "selected";}?>>ACTA2</option>
	<option value="C7" <?php if (@$_POST['caftype']=="C7"){echo "selected";}?>>C7</option>
	<option value="CCL2" <?php if (@$_POST['caftype']=="CCL2"){echo "selected";}?>>CCL2</option>
	<option value="COL10A1" <?php if (@$_POST['caftype']=="COL10A1"){echo "selected";}?>>COL10A1</option>
	<option value="CTHRC1" <?php if (@$_POST['caftype']=="CTHRC1"){echo "selected";}?>>CTHRC1</option>
	<option value="CXCL2" <?php if (@$_POST['caftype']=="CXCL2"){echo "selected";}?>>CXCL2</option>
	<option value="CXCL12" <?php if (@$_POST['caftype']=="CXCL12"){echo "selected";}?>>CXCL12</option>
	<option value="CXCL14" <?php if (@$_POST['caftype']=="CXCL14"){echo "selected";}?>>CXCL14</option>
	<option value="IGF1" <?php if (@$_POST['caftype']=="IGF1"){echo "selected";}?>>IGF1</option>
	<option value="MYH11" <?php if (@$_POST['caftype']=="MYH11"){echo "selected";}?>>MYH11</option>
	<option value="OGN" <?php if (@$_POST['caftype']=="OGN"){echo "selected";}?>>OGN</option>
	<option value="POSTN" <?php if (@$_POST['caftype']=="POSTN"){echo "selected";}?>>POSTN</option>
	<option value="RGS5" <?php if (@$_POST['caftype']=="RGS5"){echo "selected";}?>>RGS5</option>
	</select><br>

    <h1>Samples:<br></h1><select style="width:100%;" name="samples" input type="text">
	<option value="all">ALL</option>
	</select> <br>
<!--
    <h1>Markers: <br></h1><select id="marker" style="width:100%;" name="markers" input type="text">
	<option value="all">ALL</option>
	</select>   
-->
   <br><br><input type="submit" style="width:80%;" name="submit" value="Submit" > <br>
</form>
</div>

<div id="showpdf" style="overflow:hidden;height:600px;width:60%;float:right;background-color:#f1f1f1;">

<?php $filedir = $head . "data" . "/" . $cancer. "/" . $caftype . "/" . $samples .  "/" . "survival_curve2.pdf";?>
<h4><?php if(!empty($_POST['caftype'])){if(file_exists($filedir)){echo "Analysis accomplished!";}else{echo "Sorry: unfinished project. Please try another.";};}?></h4>

<h2 style="margin:0;padding:0;"><a href="<?php echo $filedir;?>#page=1" width="90%" height="85%" target="pdf">
<button type="button">Click to Show PDF</button></a></h2>
<iframe width="90%" height="85%" name="pdf"></iframe><br>
<!-- <a href="<?php echo $filedir;?>">Download PDF</a> -->
</div>

</div>

</body>
</html>
