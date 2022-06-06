<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H E - creador</title>
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

<?php
session_start();
require("database.php");
include("header.php");
error_reporting(1);
?>
<?php
extract($_POST);

echo "<BR><h3 class=head1>Agregar pregunta </h3>";
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 ){

extract($_POST);
$query3="insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')";

$rs3=mysqli_query($con,$query3)or die("no se registro error");
echo "<p align=center>Pregunta agregada con éxito.</p>";

unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Por favor ingrese la pregunta");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Por favor ingrese respuesta 1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Por favor ingrese respuesta 2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Por favor ingrese respuesta 3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Por favor ingrese respuesta 4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Por favor ingrese la respuesta verdadera");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="1" align="center">
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Seleccionar nombre de prueba </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="testid" id="testid">
<?php
$query2="SELECT * FROM mst_test order by test_name";
$rs2=mysqli_query($con,$query2)or die("Could Not Perform the Query");

    while($row=mysqlI_fetch_array($rs2))



{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Entrar pregunta </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" cols="60" rows="2" id="addque"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Opción 1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Opción 2 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Opción 3</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Opción 4</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Cual Opción es la Correcta?</strong></td>
      <td>&nbsp;</td>
      <td><input type="number" name="anstrue" id="anstrue" min="1" max="4"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Agregar" > <button onClick="window.location.href='crear.php';">Regresar</button> </td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>

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