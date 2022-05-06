<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>Analyze - CAF atlas</title>
<style>body{background-color: #f1f1f1;}</style>
<link rel="stylesheet" type="text/css" href="style_project.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="./loading.js"></script>
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
    $markers = test_input($_POST["markers"]);
    $gender = test_input($_POST["gender"]);
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
  <li><a class="active" href="heatmap.php">Heatmap</a></li>
  <li><a href="caf_functions.php">CAF functions</a></li>
  <li><a href="survival_curve.php">Survival curve</a></li>
  <li><a href="cell_chat.php">Cell Chat</a></li>
  <li><a href="infercnv.php">inferCNV</a></li>
</ul>
</h1></div>


<div id="content" style="height:600px;width:18%;float:left;background-color:#E0E0E0;position:relative;z-index: 998">
<h2 style="margin:3% 3% 0 0;">Paramaters</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
    <h1>Cancer type: <br></h1><select style="width:100%;" name="cancer" input type="text">
	<option value="CHOL" <?php if (@$_POST['cancer']=="CHOL"){echo "selected";}?>>Cholangiocarcinoma</option>
	<option value="CC" <?php if (@$_POST['cancer']=="CC"){echo "selected";}?>>Colorectal cancer</option>
	<option value="GC" <?php if (@$_POST['cancer']=="GC"){echo "selected";}?>>Gastric cancer</option>
	<option value="HC" <?php if (@$_POST['cancer']=="HC"){echo "selected";}?>>Hepatocellular carcinoma</option>
	<option value="LC" <?php if (@$_POST['cancer']=="LC"){echo "selected";}?>>Lung cancer</option>
	<option value="NPC" <?php if (@$_POST['cancer']=="NPC"){echo "selected";}?>>Neuroendocrine prostate cancer</option>
	<option value="PC" <?php if (@$_POST['cancer']=="PC"){echo "selected";}?>>Prostate cancer</option>
	</select><br>

   <h1>Favored gene: <br></h1>
	<input type="text" style="width:100%;" placeholder="eg: YAP1,NFKB1,..." name="caftype" value="<?php echo $_POST['caftype']; ?>"><br>

    <h1>Samples:<br></h1><select style="width:100%;" name="samples" input type="text">
	<option value="all">ALL</option>
	</select><br>  
   <br><br><input id="IDsubmit" type="submit" style="width:80%;display:block;" name="submit" value="Submit" > <br>
</form>
</div>

<div id="showpdf" style="overflow:hidden;height:600px;width:60%;float:right;background-color:#f1f1f1;">
<?php $caftype = "\"" . $caftype . "\"";?>
<h4><?php if(!empty($_POST['caftype'])){system("sudo ./rscp/sheat.sh $cancer $caftype");}?></h4>

<?php $filedir = $head . "data" . "/" . $cancer. "/" . $caftype . "/" . $samples . "/" . $markers . "/" . "embedding.pdf";?>

<h2 style="margin:0;padding:0;"><a href="./rscp/heat.pdf#page=1" width="90%" height="85%" target="pdf">
<button type="button">Click to Show PDF</button></a>&nbsp&nbsp<i id="icon"></i></h2>
<iframe width="90%" height="85%" name="pdf"></iframe><br>
<!-- <a href="<?php echo $filedir;?>">Download PDF</a> -->
</div>

</div>

</body>
</html>
