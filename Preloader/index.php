<?php
$fileURL = $_GET['FileURL'];
$file = $_GET['FileName'];
$RedirectURL=$_GET['RedirectURL'];
$MLName = $_GET['MLName'];
$APIURL = $_GET['APIURL'];
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title></title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class='loader'>
  <div class='loader_overlay'></div>
  <div class='loader_cogs'>
    <div class='loader_cogs__top'>
      <div class='top_part'></div>
      <div class='top_part'></div>
      <div class='top_part'></div>
      <div class='top_hole'></div>
    </div>
    <div class='loader_cogs__left'>
      <div class='left_part'></div>
      <div class='left_part'></div>
      <div class='left_part'></div>
      <div class='left_hole'></div>
    </div>
    <div class='loader_cogs__bottom'>
      <div class='bottom_part'></div>
      <div class='bottom_part'></div>
      <div class='bottom_part'></div>
      <div class='bottom_hole'><!-- lol --></div>
    </div>
    <p>Processing file <?php echo $file;?>. Please wait...</p>
  </div>
  <h1><?php echo $MLName;?></h1>
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <script  src="js/index.js"></script>


</body>

</html>

 <script language="javascript">
	window.location = "<?php echo $APIURL.'?FileURL='.$fileURL.'&FileName='.$file.'&MLName='.$MLName.'&RedirectURL='.$RedirectURL;?>";
</script>
 