{"filter":false,"title":"coursepage.php","tooltip":"/uploads/coursepage.php","undoManager":{"mark":0,"position":0,"stack":[[{"group":"doc","deltas":[{"start":{"row":0,"column":0},"end":{"row":163,"column":2},"action":"insert","lines":["<?php","","    $servername = getenv('IP');","    $username = getenv('C9_USER');","    $password = \"\";","    $database = \"c9\";","    $dbport = 3306;","    $db = new mysqli($servername, $username, $password, $database, $dbport);","   $cdb = mysqli_select_db($db,$database);","   session_start();","   $cname=\"\";","   $pemail=$pfname=$plname=$fname=$lname=$email=\"\";","    if(isset($_GET[\"key\"])){","        ","       $_SESSION[\"cid\"] = $_GET[\"key\"]; ","    }","   ","   ","    if(isset($_SESSION[\"username\"]) && isset($_SESSION[\"password\"])){","","     $user = $_SESSION[\"username\"];","    $pass = $_SESSION[\"password\"];","    ","  $getstudentid = mysqli_query($db,\"Select * from student where username = '$user' and password = '$pass' \");","                    ","                            if(mysqli_num_rows($getstudentid) > 0){","                              while($row = mysqli_fetch_assoc($getstudentid)){","                                 $sid = $row[\"ID\"];","                                 $fname =$row[\"firstname\"];","                                 $lname =$row[\"lastname\"];","                                 $email = $row[\"email\"];","                              }","                            }","           ","     ","     $cid = $_SESSION[\"cid\"];","     ","     $mycourse = mysqli_query($db,\"SELECT * FROM course WHERE cid=$cid\") or $test7 = \"courses FAIL\";","     ","     if(mysqli_num_rows($mycourse) > 0){","            while($row = mysqli_fetch_assoc($mycourse)){","             $cname = $row[\"cname\"]; ","            }","            ","     }","     ","     ","      $myprof = mysqli_query($db,\"SELECT * FROM course, professor WHERE professor.id = course.pid","      AND course.cid = $cid\") or $test10 = \"PROF FAIL\";","    ","            if(mysqli_num_rows($myprof) > 0){","                    while($row = mysqli_fetch_assoc($myprof)){","                         $pfname = $row[\"firstname\"];","                          $plname = $row[\"lastname\"];","                           $pemail = $row[\"email\"];","                        ","                    }","            }","     ","     ","     ","     ",""," }"," ","?>","","","<!DOCTYPE html>","<html>","<body>","<div id=main>","   <p><center><font size=2><a href=\"https://seproject-hrguyll.c9.io/userAccountHome.php\">Home</a> &nbsp;&nbsp;&nbsp;","                            <a href=\"https://seproject-hrguyll.c9.io/userAccountCalendar.php\">Calendar</a> &nbsp;&nbsp;&nbsp;  ","                            <a href=\"https://seproject-hrguyll.c9.io/userAccountCourses.php\">Courses</a> &nbsp;&nbsp;&nbsp;  ","                            <a href=\"https://seproject-hrguyll.c9.io/userAccountContacts.php\">Contacts</a> &nbsp;&nbsp;&nbsp; ","                            <a href=\"https://seproject-hrguyll.c9.io/userAccountOptions.php\">Options</a> &nbsp;&nbsp;&nbsp;","                            <?php","                            if ($_SESSION[\"admin\"] == 1){","                            ?>","                            <a href=\"userAccountAdmin.php\">Admin</a> &nbsp;&nbsp;&nbsp;","                            <?php","                                       }","                                       ?>","                            <a href=\"https://seproject-hrguyll.c9.io/userAccountLogout.php\">Logout</a>","    </font></center></p>  ","   </div> ","    ","    ","    ","    ","    ","<center>","<table width=70% cellpadding=5 border=1 bgcolor=#990000>","<tr><td align=center>","<font size=+5 style=times color=white><?php echo $cname?></font><br>","</td></tr></table>","</center>","","<?php","echo\"","    <p><center>","        <form action='http://csce.uark.edu/~sem010/send_email.php' method='post'>","         <input type='submit' name='profem' value ='Email Professor'> ","         <input type='hidden' name='pemail' value=' $pemail'>","         <input type='hidden' name='uemail' value='$email'>","         <input type='hidden' name='pfname' value='$pfname'>","         <input type='hidden' name='plname' value='$plname'>","         <input type='hidden' name='ufname' value=' $fname'>","         <input type='hidden' name='ulname' value='$lname'>","        </form>","    </font></center></p>\"","","?>  "," ","<form action =\"https://seproject-hrguyll.c9.io/upload.php\" method=\"post\" enctype=\"multipart/form-data\" border =1 align ='left'>","<p>Upload Notes</p>    ","<input type=\"file\" name=notes><br>","<input type=\"submit\" value =\"Upload\">","</form>","","","","","","","<form action=\"https://seproject-hrguyll.c9.io/homework.php\" method=\"post\" align ='center'>","<p>Homwork reminders</p>","What date is your Homwork due? <input type=\"date\" name=\"hwdate\"><br>","What time is your Homework due? <input type=\"time\" name=\"hwtime\"><br>","<p>Please give a brief description of your assignment<br>","<textarea rows=\"4\" cols=\"35\" name=\"desc\"></textarea></p>","<input type=\"submit\" name=\"hw\" value=\"Submit\">","</form>","","</html>","","<?php","","","$allhw = mysqli_query($db,\"SELECT * FROM homework WHERE sid = $sid ","       AND cid = $cid\") or $test7 = \"courses FAIL\";","       ","      if(mysqli_num_rows($allhw) > 0){","       echo \"<h3> My Homework Assignments </h3>\";","       ","       echo \"<table border =1>\";","               echo \"<tr>\";","               echo \"<th>Description</th>\";","               echo \"<th>Due Date</th>\";","               echo \" </tr>\";","       ","           while($row = mysqli_fetch_assoc($allhw)){","               echo \"<tr>\";","               echo \"<td>\". $row[\"hwdesc\"] . \"</td>\";","               echo \"<td>\". $row[\"date\"] . \"</td>\";","               echo \" </tr>\";","           }","     }","     echo \"</table>\";","     ","      ","     ","?>"]}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":163,"column":2},"end":{"row":163,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1427520935865,"hash":"c41fc8743402d11d6552d0cb19611c8f34a609c1"}