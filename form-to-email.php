<?php
$action=$_REQUEST['action'];
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
if ($action=="")    /* display the contact form */
    {
    ?>
    <form method="post" name="myemailform" action="form-to-email.php" enctype="multipart/form-data">
			<input type="hidden" name="action" value="submit">
			<input type="text" name="name" placeholder="YOUR NAME" required="">
			<input type="email" name="email" placeholder="YOUR EMAIL" required="">
			<textarea  name="message" placeholder="YOUR MESSAGE" required=""></textarea>
			<input type="submit" value="Submit">
		</form>
    <?php
    }
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
		echo "All fields are required, please fill <a href=\"contact.html\">the form</a> again.";
	    }
    else{
	    $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent from JohnsonTurbine.com";
		 mail("sales@johnsonturbine.com", $subject, $message, $from);
		echo "Email sent!";
	    }
    }
?>
