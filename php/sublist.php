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
<section class="features section">
                <div class="container">
                    <div class="features-inner section-inner has-bottom-divider">
                        <div class="features-header text-center">
                            <div class="container-sm">
                                <h2 class="section-title mt-0">Menu</h2>
                                <p class="section-paragraph">Selecciona Una Materia</p>
                            </div>
                        </div>
                        <div class="features-wrap">
<?php
include("database.php");

      $sql = "SELECT * FROM mst_subject";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);

echo "<table align=center class='table'>";
while($row=mysqli_fetch_row($rs))
{
	echo "<tr class='success'><td align=center class='text-danger'><a  href=showtest.php?subid=$row[0]><font class='text-warning' size=6>$row[1]</font></a>";
}
echo "</table>";
?>
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