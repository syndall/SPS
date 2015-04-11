<?php
session_start();

$subjectErr=$messageErr=$msgsent=$profmsg="";

 $pageFont = $_SESSION["pagefont"];
$pageStyle = $_SESSION["pagestyle"];
$textF="";
if($pageFont){
    if($pageFont=="font1"){$textF="Trebuchet MS";}
    if($pageFont=="font2"){$textF="Georgia";}
    if($pageFont=="font3"){$textF="Arial";}
    if($pageFont=="font4"){$textF="Courier";}
}else{
    $textF="Trebuchet MS";
}


      if(isset($_POST["profem"])){
	   $_SESSION["pemail"] = $_POST["pemail"];
        $_SESSION["uemail"] = $_POST["uemail"];
	    $_SESSION["ufull"] = $_POST["ufname"] . " ".$_POST["ulname"];
	    $_SESSION["pfull"]= $_POST["pfname"] . " ".$_POST["plname"];
	  
	     $profmsg = " Email will be sent to your Professor " . $_SESSION["pfull"] . " at ". $_SESSION["pemail"];
        
	   }
  if(isset($_POST["emailform"])){
       
        $emailto = $_SESSION["pemail"];
        $from = $_SESSION["uemail"];
	    $ufullname = $_SESSION["ufull"];
	    $ufullname = $_SESSION["pfull"];
        $subject = $_POST["subject"];
       $message = $_POST["message"]; 
	   
       $val = true;
  
       if(empty($_POST["message"])){
        $messageErr = "Please enter a Message";   
        $val = false; 
        
       }
       if(empty($_POST["subject"])){
        		$val = false;
        		$subjectErr = "Please enter a Subject";

        		}
            
       
       if($val){
           
     
   //Email information
 
  $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:' .$pfullname. '<' .$emailto. '>'. "\r\n";
$headers .= 'From:' .$ufullname. '<' .$from. '>'. "\r\n";

  //send email
  mail($emailto, $subject, $message,$headers);
  
 
           
    
             
           }
  }
  
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>SPS: Course Page</title>
    <link href="https://seproject-hrguyll.c9.io/menu1.css" rel="stylesheet" type="text/css" media="all"/>
<?php if ($pageStyle == "style1"){ ?>
    <link href='https://seproject-hrguyll.c9.io/styleC2.css' rel='stylesheet' type='text/css' media='all'/>
<?php } ?>

<?php if ($pageStyle == "style2"){ ?>
    <link href="https://seproject-hrguyll.c9.io/styleR2.css" rel="stylesheet" type="text/css" media="all"/>
<?php } ?>

<?php if ($pageStyle == "style3"){ ?>
    <link href="https://seproject-hrguyll.c9.io/styleY2.css" rel="stylesheet" type="text/css" media="all"/>
<?php } ?>

<?php if ($pageStyle == "style4"){ ?>
    <link href="https://seproject-hrguyll.c9.io/styleG2.css" rel="stylesheet" type="text/css" media="all"/>
<?php } ?>
</head>
    

<body style="font-family:<?php echo $textF ?>">
    <br/>
    <div id=head>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="https://seproject-hrguyll.c9.io/logo.png" alt="SPS" style="width: 68px; hight: 68px; vertical-align: middle;">
        <font face="Impact" size="5" style="width: 68px; hight: 68px; vertical-align: middle;">
            Student Planner SPS
        </font>
    </div>
    <br/>
    <br/>
    
<div id="main">
    
   <center>
    <div class="container">
    <nav>
        <ul style="list-style-type: none; border-width: 0px;">
            <li><a href="https://seproject-hrguyll.c9.io/userAccountHome.php">Home</a></li>
            <li><a href="https://seproject-hrguyll.c9.io/userAccountCalendar.php">Calendar</a></li>
            <li><a href="https://seproject-hrguyll.c9.io/userAccountCourses.php">Course</a></li>
            <li><a href="https://seproject-hrguyll.c9.io/userAccountContacts.php">Contact</a></li>
            <li><a href="https://seproject-hrguyll.c9.io/userAccountOptions.php">Options</a></li>
            <?php
            if ($_SESSION["admin"] == 1){
            echo "<li><a href='https://seproject-hrguyll.c9.io/userAccountAdmin.php'>Admin</a></li>"; 
            } ?>
            <li><a href="https://seproject-hrguyll.c9.io/userAccountLogout.php">Logout</a></li>
        </ul>
    </nav>
    </div>
    </center>
	
<center>	
<table width=70% cellpadding=5 border=1 bgcolor=#990000>
<tr><td align=center>
<font size=+5 style=times color=white>SPS Email System</font><br>
</td></tr></table>
</center>


<br>
<br>
<?php echo "<p align= center>". $profmsg . "</p>"?>
<br>
<br>
	

	
	
<center>	
<form name="contactform" method="post" action="send_email.php">
 
<table width="450px">
<tr><td valign="top"><label for="subject">Subject *</label></td>
 <td valign="top"><input  type="text" name="subject" maxlength="30" size="30">
 <p><span class="error"> </span></p>
<br>
<br>
 </td>

</tr>
<tr><td valign="top"><label for="message">Message *</label></td><td valign="top">
 <textarea  name="message" maxlength="1000" cols="36" rows="6"></textarea>
 <p><span class="error"> </span></p>
 </td>
 </tr>
<tr><td colspan="2" style="text-align:center"><input type="submit" name="emailform"value="Submit"> </a>
<p><span> </span></p>
</td>
 </tr>
 
</table>
 
</form>
</center>

<br/>
<br/>
</div>
<br/>
