<!DOCTYPE html>
<html>
    <head>
     <meta http-equiv="content-type" content="text/html; charset="utf-8">
 
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
    
    <!-- Ikonki pogody -->
    
     <link href="../css/weather-icons.min.css" rel="stylesheet">
    
    
     <!-- <link href="css/style1.css" type="text/css" rel="stylesheet" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script>
    </head>
    
    <body>
          <!-- polaczenie z baza danych -->
          <?php
           include("polacz.php");
              $link=Conection();
              $result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
              $result2=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
              $result3=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
              $resu=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
              
              $sredniatemp = mysqli_query($link, "SELECT AVG(temperatura) FROM (select temperatura from temperatura order by id DESC LIMIT 12)as x");
              
              $wynik=mysqli_query($link,"select * from temperatura order by id DESC LIMIT 1"); 
              $cos =  mysqli_fetch_array($wynik);
              $celsjusz=$cos['temperatura'];
              $wilgotnosc=$cos['h'];
              $cisnienie=$cos['cisnienie'];
              $natez=$cos['natezenie'];
              
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
                <a class="navbar-brand" href="index.php">Stacja Pogodowa</a>
            </div>
           
           
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i>Strona Glówna</a>
                            <a href="test.php"><i class="fa fa-info fa-fw"></i>Informacje</a>
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
                         
                        <h1 class="page-header">Aktualne pomiary</h1>
                    
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
    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-3 col-md-4">

<br><br><br><br><br>

                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="wi wi-thermometer"></i>
                                    
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">
                                        
                                        <?php     
                                             printf("%.2f", $celsjusz);
                                         ?>
                                        
                                        
                                        
                                    </div>
                                    <div>Temperatura [&#8451;]</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>    <!--Temperatura-->
                
                 <div class="table-responsive col-md-8">
                 
                      <script>
                            var myData=[<?php 
                            while($info=mysqli_fetch_array($result))
                              echo $info['temperatura'].','; 
                                 ?>];
                                         
                                         
                                         
                             <?php                             
                             $result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
                                 ?>
                                 var myLabels=[<?php 
                                 while($info=mysqli_fetch_array($result))
                                echo '"'.$info['datetime'].'",'; 
                                   ?>];
                       </script>
                    
                     <div id='myChart'></div>


                </div>
                
                </div>



<div class="row">
                
                
                
                <div class="col-lg-3 col-md-4">

<br><br><br><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    
                                    <i class="wi wi-humidity"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">
                                        <?php     
                                             printf("%d", $wilgotnosc);
                                         ?>
                                        
                                    </div>
                                    <div>Wilgotno&#347;&#263; [%]</div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>      <!--Wilgotnosc-->
                
                   <div class="table-responsive col-md-8">
                 
                      <script>
                            var data=[<?php 
                            while($binfo=mysqli_fetch_array($result2))
                              echo $binfo['h'].','; 
                                 ?>];
                                         
                                         
                                         
                             <?php                             
                             $result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
                                 ?>
                                 var wartosci=[<?php 
                                 while($info=mysqli_fetch_array($result))
                                echo '"'.$info['datetime'].'",'; 
                                   ?>];
                       </script>
                    
                     <div id='wilgo'></div>


                </div>
                
                </div>
                
                   <div class="row">
                
                
                
                <div class="col-lg-3 col-md-4">

<br><br><br><br><br>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="wi wi-barometer"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">
                                        <?php     
                                             printf("%d", $cisnienie);
                                         ?>
                                        
                                        
                                    </div>
                                    <div>Ci&#347;nienie [hPa]</div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>      <!--cisnienie-->
                
                   <div class="table-responsive col-md-8">
                 
                      <script>
                            var d=[<?php 
                            while($cinfo=mysqli_fetch_array($result3))
                              echo $cinfo['cisnienie'].','; 
                                 ?>];
                                         
                                         
                                         
                             <?php                             
                             $result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
                                 ?>
                                 var w=[<?php 
                                 while($info=mysqli_fetch_array($result))
                                echo '"'.$info['datetime'].'",'; 
                                   ?>];
                       </script>
                    
                     <div id='cis'></div>


                </div>
                    
             
</div>
                
          
    <div class="row">
                <div class="col-lg-3 col-md-4">

<br><br><br><br><br>

                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="wi wi-day-sunny"></i>
                                    
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">
                                        
                                        <?php     
                                             printf("%.2f", $natez);
                                         ?>
                                        
                                        
                                        
                                    </div>
                                    <div>Nat&#281;&#380;enie [%]</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>    <!--Temperatura-->
                
                 <div class="table-responsive col-md-8">
                 
                      <script>
                            var siema=[<?php 
                            while($dinfo=mysqli_fetch_array($resu))
                              echo $dinfo['natezenie'].','; 
                                 ?>];
                                         
                                         
                                         
                             <?php                             
                             $result=mysqli_query($link,"select*from( select * from temperatura order by id DESC LIMIT 96) sub order by id ASC");
                                 ?>
                                 var i=[<?php 
                                 while($info=mysqli_fetch_array($result))
                                echo '"'.$info['datetime'].'",'; 
                                   ?>];
                       </script>
                    
                     <div id='naslonecznienie'></div>


                </div>
                
                </div>
<div class="row">
</div>

    
                <div class="row">
                    <br>
                    <br>
                    <br>
                    <?php
                    while($srednia = mysqli_fetch_array($sredniatemp)){
                        echo "&#346;rednia tempertatura to: ".round($srednia['AVG(temperatura)']);
                        
                    }
                            
                            ?>
                    <br>
                    <br>
                    <br>
                                                             
                </div>
                   
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
          
    
            
        <!-- /#wrapper -->
  
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    
   
            
    </body>



</html>


		