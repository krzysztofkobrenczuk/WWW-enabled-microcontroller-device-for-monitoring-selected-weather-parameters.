<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""> 

        <title>Stacja Pogodowa</title>


        
        
<script src="zingchart/zingchart.min.js"></script>
<style title="zingchart"></style> 
   
   <script src="../js/wykres.js"></script> 
     

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="../css/pogoda.css" rel="stylesheet">



    </head>

    <body>  
        <?php
        include("polacz.php");
        $link = Conection();

$result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
  $result2=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
 $wynik=mysqli_query($link,"select * from temperatura order by id DESC LIMIT 1"); 
              $cos =  mysqli_fetch_array($wynik);
              $natezenie = $cos['natezenie'];
 $wilgotnosc=$cos['h'];

        $sredniatemp = mysqli_query($link, "SELECT AVG(temperatura) FROM (select newtemp from temperatura order by id DESC LIMIT 12)as x");
        ?>


        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="wlasne.html">Stacja Pogodowa</a>
                </div>


                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="index.php"><i class="fa fa-home fa-fw"></i>Strona Glówna</a>
                                <a href="test.php"><i class="fa fa-home fa-fw"></i>Testowa</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Przebiegi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Tygodniowe</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Miesieczne</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Stacja pogodowa<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Urzadzenie</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Schematy polaczen</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">

                        <h1 class="page-header">Testowe API</h1>

                    </div>
                    <div class="col-lg-6">
                        <h4 class="page-header">
                            Aktualna godzina 
                            <p id ="zegar"></p>
                            <script type="text/javascript">
                                var now = setInterval(myTimer, 1000);
                                function myTimer() {
                                    var d = new Date();
                                    document.getElementById("zegar").innerHTML = d.toLocaleTimeString();
                                    //document.getElementById("zegar").innerHTML = d.toDateString();
                                }

                            </script>
                        </h4>

                    </div>
                </div>
                <!-- /.row -->
                <div class="row">


                    Pierwszy wiersz
                    <br>
                    <?php
                    while ($srednia = mysqli_fetch_array($sredniatemp)) {
                        echo "Średnia tempertatura to: " . round($srednia['AVG(temperatura)']);
                    }
                    ?>
                    <br>
                </div>

                <div class="row">  
                 <?php
 
                 $url="http://api.openweathermap.org/data/2.5/weather?id=3099434&appid=8f33f63ed3cbd3bd478a62225b9293bf&units=metric&cnt=7&lang=pl";
                
                 $json=file_get_contents($url);
                 $data=json_decode($json,true);
 
   
                echo "Temp: ". $data['main']['temp']."C";
 echo "</br>";
                echo $data['weather'][0]['description']."";
 echo "</br>";
               // echo $data['weather'][0]['main']."";
                echo "</br>";
                echo "  Predkosc wiatru: " . $data['wind']['speed']." mph";
 echo "</br>";
                echo "  Wilgotnosc: " . $data['main']['humidity']." %";
echo "</br>";
                echo "  Cisnienie: " . $data['main']['pressure']."";
echo "</br>";

                $wschodslonca = $data['sys']["sunrise"]."";
                echo "  Wschod slonca: " . date("H:i:s", $wschodslonca);
echo "</br>";

                $zachodslonca = $data['sys']["sunset"]."";
                 echo "  Zachod slonca: " . date("H:i:s", $zachodslonca);

?>


                                        
                </div>
                    </div>














                </div>



            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script type="text/javascript" src="../js/mainWeather.js"></script>
    <script src="../js/jquery.js" type="text/javascript"></script>


</body>



</html>


		