<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H E - Examenes</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="../Style/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    
</head>

<body class="is-boxed has-animations">
<!-- Inicio de Tiulo y Logo afcs-->
<section class="hero">

<header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="brand header-brand">
                    <h1 class="m-0">
                        <a href="#">
                            <img class="header-logo-image asset-light" src="../utilidades/LightLogo.png" alt="LightLogo">
                            <img class="header-logo-image asset-dark" src="../utilidades/DarkLogo.png" alt="DarkLogo">
                        </a>
                    </h1>
                </div>
            </div>
        </div>
</header>
</section>
<!-- Fin de Tiulo y Logo afcs-->

<!-- Iicio de Función de Crear Examenes-->

<script>
    function Copy() {
  var Url = document.getElementById("url");
  Url.innerHTML = window.location.href;
  console.log(Url.innerHTML)
  Url.select();
  document.execCommand("copy");
}
</script>
<section class="features section">
                <div class="container">
                    <div class="features-inner section-inner has-bottom-divider">
                        <div class="features-wrap">

                        <?php
include("header.php");


$query="select * from mst_question";

$rs=mysqli_query($con,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysqli_query($con,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h1 class=head1> Resultado</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td> total Preguntas<td> $_SESSION[qn]";
				echo "<tr class=tans><td>Respuestas correctas<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Respuesta incorrecta<td> ". $w;
                echo "<br><br>";             
				echo "</table>";
				mysqli_query($con,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysqli_error());
				echo "<h1 align=center><a href=review.php>Pregunta de repaso</a> </h1>";
            
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysqli_query($con,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Algún error ocurrió</h1>";
session_destroy();
echo "Por Favor, Vamos al <a href=crear.php> Menú</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td><span class=style2>Pregunta Numero ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";
?>


<div>
  <input type="button" value="Copy Url" onclick="Copy();" />
  <br /> URL Para Enviar el Examen!: <textarea id="url" rows="1" cols="30"></textarea>
</div>


          </div>
       </div>
    </div>
</section>
<!-- Fin de Función de Crear Examenes-->


<!-- Footer -->
<footer class="site-footer has-top-divider">
    <div class="container">
</br>
    <div class="lights-toggle">
        <input id="lights-toggle" type="checkbox" name="lights-toggle" class="switch" checked="checked">
        <label for="lights-toggle" class="text-xs"><span>Modo <span class="label-text">dark</span></span></label>
    </div>
        <div class="site-footer-inner">
            <div class="brand footer-brand">
                <a href="#">
                    <img class="asset-light" alt="HERRAMIENTA PARA EXAMENES">
                    <img class="asset-dark" alt="HERRAMIENTA PARA EXAMENES">
                    </a>
            </div>
                <ul class="footer-social-links list-reset">
                    <li>
                       <a href="https://www.linkedin.com/in/alan-cifuentes-siliezar-71818aa5">
                            <span class="screen-reader-text">LinedIn</span>
                                <!--<svg width="20" height="20" >-->
                                <svg width="26" height="26" preserveAspectRatio="x100Y100 meet" viewBox="0 0 450 450" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z" fill = "#fff"/>
                                     <!-- </svg>-->
                                <!--[if lt IE 9]><em>LinkedIn</em><![endif]-->
                                </svg>
                            </a>
                        </li>

                    </ul>
                    <div class="footer-copyright">By, Alan Cifuentes Siliezar</div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>

    <script src="../Scripts/main.min.js"></script>

</body>

</html>