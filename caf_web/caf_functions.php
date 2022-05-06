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
  <li><a class="active" href="caf_functions.php">CAF functions</a></li>
  <li><a href="survival_curve.php">Survival curve</a></li>
  <li><a href="cell_chat.php">Cell Chat</a></li>
  <li><a href="infercnv.php">inferCNV</a></li>
</ul>
</h1></div>


<div id="content" style="height:600px;width:18%;float:left;background-color:#E0E0E0;position:relative;z-index: 9998">
<h2 style="margin:3% 3% 0 0;">Paramaters</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
    <h1>Cancer type: <br></h1><select style="width:100%;" name="cancer" input type="text">
	<option value="Breast_cancer" <?php if (@$_POST['cancer']=="Breast_cancer"){echo "selected";}?>>Breast cancer</option>
	<option value="Cholangiocarcinoma" <?php if (@$_POST['cancer']=="Cholangiocarcinoma"){echo "selected";}?>>Cholangiocarcinoma</option>
	<option value="Colorectal_cancer" <?php if (@$_POST['cancer']=="Colorectal_cancer"){echo "selected";}?>>Colorectal cancer</option>
	<option value="Gastric_cancer" <?php if (@$_POST['cancer']=="Gastric_cancer"){echo "selected";}?>>Gastric cancer</option>
	<option value="Hepatocellular_carcinoma" <?php if (@$_POST['cancer']=="Hepatocellular_carcinoma"){echo "selected";}?>>Hepatocellular carcinoma</option>
	<option value="Lung_cancer" <?php if (@$_POST['cancer']=="Lung_cancer"){echo "selected";}?>>Lung cancer</option>
	<option value="Neuroendocrine_prostate_cancer" <?php if (@$_POST['cancer']=="Neuroendocrine_prostate_cancer"){echo "selected";}?>>Neuroendocrine prostate cancer</option>
	<option value="Pancreatic_ductal_adenocarcinoma" <?php if (@$_POST['cancer']=="Pancreatic_ductal_adenocarcinoma"){echo "selected";}?>>Pancreatic ductal adenocarcinoma</option>
	<option value="Prostate_cancer" <?php if (@$_POST['cancer']=="Prostate_cancer"){echo "selected";}?>>Prostate cancer</option>
	</select><br>

   <h1>CAF type: <br></h1><select id="caf" style="width:100%;" name="caftype" input type="text">
	<!--
	<option value="tSNE_overall" <?php if (@$_POST['caftype']=="tSNE_overall"){echo "selected";}?>>tSNE_overall</option>
	<option value="UMAP_overall" <?php if (@$_POST['caftype']=="UMAP_overall"){echo "selected";}?>>UMAP_overall</option>
	-->
	<option value="proCAF" <?php if (@$_POST['caftype']=="proCAF"){echo "selected";}?>>proCAF</option>
	<option value="matCAF" <?php if (@$_POST['caftype']=="matCAF"){echo "selected";}?>>matCAF</option>
	<option value="myCAF" <?php if (@$_POST['caftype']=="myCAF"){echo "selected";}?>>myCAF</option>
	<option value="iCAF" <?php if (@$_POST['caftype']=="iCAF"){echo "selected";}?>>iCAF</option>
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

<div id="pdf" style="overflow:hidden;height:600px;width:60%;float:right;background-color:#f1f1f1;">

<?php $filedir = $head . "data" . "/" . $cancer . "/" . $caftype . "/" . $samples .  "/" . "caf_functions.pdf";?>
<h4><?php if(!empty($_POST['caftype'])){if(file_exists($filedir)){echo "Analysis accomplished!";}else{echo "Sorry: unfinished project. Please try another.";};}?></h4>
<h2 style="margin:0;padding:0;"><a href="<?php echo $filedir;?>#page=1" width="90%" height="85%" target="pdf">
<button type="button">Click to Show PDF</button></a></h2>
<iframe width="90%" height="85%" name="pdf"></iframe><br>
<!-- <a href="<?php echo $filedir;?>">Download PDF</a> -->
</div>

</div>

</body>
</html>
