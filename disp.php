<html>
<head>
</head>
<body style="background-color:rgba(0,0,0,0.05);padding-left:20px;padding-top:25px;">

<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "nandan50");
    define("DB_DATABASE", "");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,"");

    if($db == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  
    mysqli_select_db($db,"products");
    $target_dir = "productpics/";
    $sql = "SELECT * FROM prodinfo WHERE cat='kid' AND subcat='toys' ORDER BY pNo ASC";

    $retval = mysqli_query($db, $sql);
    $count = 6;
    if ($retval) { 
    ?>
    <table><tr>
    <?php
    while($row = mysqli_fetch_array($retval)){
    $count++;
    if($count%6==0){
    ?>
    </tr><tr>
    <?php } ?>
    <td>
    <div style="border: 5px groove rgba(0,0,0,0.2);border-radius:5px; padding:5px; height:220px ; width:150px;margin-right:10px;margin-top:20px;background-color:rgba(0,0,0,0.02);">
	<form method="post" action="addorder.php">
	<div><img src="<?php echo $target_dir.$row['pImg']; ?>" style = "height:150px;width:125px; margin-left:10px;margin-top:2px; border:1px groove"></div>
	<div style = "text-align:center; font-size:20px; color:rgba(0,0,0,0.8);" name="Pname" value="<?php echo $row['pName']; ?>"><strong><?php echo $row['pName']; ?></strong></div>
	<div style = "text-align:center; font-size:14px;" name="Price" value="<?php echo "Rs. ".$row['pPrice']; ?>"><?php echo "Rs. ".$row['pPrice']; ?></div>
	<div style = "text-align:center;"><input type="text" name="quantity" value="1" size="2" style = "width:20px;" /><input type="submit" value="Add to cart" /></div>
	</form>
     </div>
    </td>
<?php }} ?>
</body>
</html>
