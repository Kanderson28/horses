<?php
$pageID = "questionnaire";
include('config.php');
include('header.php');

//form1.php
DEFINE('THIS_PAGE',basename($_SERVER['PHP_SELF']));
if(isset($_POST['MyName'])) 
{

if(isset($_POST['comment'])) { $comments = $_POST['comment']; } else { $comments = 'None'; }
$to=$_POST['MyEmail'];
$message='You have a new form submission:<br><br>';
$message.='<b>Name: </b>' . $_POST['MyName'] . '<br>';
$message.='<b>Email:</b> ' . $_POST['MyEmail'] . '<br>';
$message.='<b>Comments:</b> ' . $comments . '<br><br>';
$message.='<b>Gender:</b> ' . $_POST['gender'] . '<br>';
$message.='<b>Food they eat:</b> ' . $_POST['fruit'] . ', ' . $_POST['veggies'] . ', ' . $_POST['breads'] . ', ' . $_POST['meats'] .'<br>';
$timeDay = date("h:i");
$subject='Form Submission at ' . $timeDay . ' from order.php';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: kander50@seattlecentral.edu ' . PHP_EOL . 
'Reply-To: kander50@seattlecentral.edu' . PHP_EOL . 'X-Mailer:PHP/' . phpversion();

$mail = mail($to,$subject,$message,$headers);
	if ($mail != FALSE) {
		header("Location: /kanderson28/final/order2.php");
	} else {
		echo 'Email failed.';
	}

}
?>
<h1>Inquire here about your needs for our barn</h1>
<? echo makeLinks($menu,$pageID); ?>
<br>
<form action="<? echo THIS_PAGE; ?>"method="post">
  My Name:
  <input type="text" name="MyName"  required/>
  <br/>
  My Email:
  <input type="email" name="MyEmail" required />
  <br/>
  Comments:
  <textarea name="comment" rows="5" cols="40"></textarea>
  <br/>
  <p>
    
<input type="radio" name="gender" value="female" required>Female<br>
<input type="radio" name="gender" value="male" required>Male<br>

  </p>
  <fieldset>
  <legend>What are you looking to do?(Check all that apply)</legend>
  
  <label for="Buy"><input type="checkbox" name="buy" value="buy" tabindex="40"/>Buy</label>
  <br/>
  
  <label for="Lease"><input type="checkbox" name="Lease" value="Lease" tabindex="40"/>Lease</label>
  <br/>
  
  <label for="Stud Service"><input type="checkbox" name="Stud Service" value="Stud Service" tabindex="40"/>Stud Service</label>
  <br/>
  
  </fieldset>
  <input type="submit"/>
</form>
