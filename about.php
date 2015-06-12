<?php
$pageID = "about";
include('config.php');
include('header.php');
include('credentials.php');
?>

<body>
<h1>Horses available</h1>
<?php 
echo makeLinks($menu,$pageID); 

$sql = "select * from horses";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error()));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
		echo "Breed: <b>" . $row['Breed'] . "</b><br />";
		echo "Name: <b>" . $row['Name'] . "</b><br />";
		echo "Age: <b>" . $row['Age'] . "</b><br />";
		echo "Price: <b>" . $row['Price'] . "</b><br />";


		


		
	   echo "</p>";
    }
}else{//no records
	echo '<div align="center">What! No customers?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
?>
<div class="maxWidth">
<div class="contentText">
  
</div></div>
</body>
<?php
include('footer.php');
?>