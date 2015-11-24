<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Calculate function with matriz</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
    td {
      text-align: center;
    }
    #matriz,#detx,#dety,#detz{
      display:none;
    }
    </style>
    <script>
        $(document).ready(function(){
            var matriz = {
              <?php
              $valor = array("x1","y1","z1","a1","x2","y2","z2","a2","x3","y3","z3","a3"); 
              foreach ($valor as $value) {
                echo "$value:0,";
              }
              ?>
            }; 
            // var matriz = {x1:0,y1:0,z1:0,a1:0,x2:0,y2:0,z2:0,a2:0,x3:0,y3:0,z3:0,a3:0};
            //var base = ["x1","y1","z1","a1","x2","y2","z2","a2","x3","y3","z3","a3"];
            $("button").click(function(){
              setMatriz();
              var real=true;
              if(real){
                $("#matriz").append( setTable("&#916;",matriz.x1,matriz.y1,matriz.z1,matriz.x2,matriz.y2,matriz.z2,matriz.x3,matriz.y3,matriz.z3)).fadeIn("slow");  
                $("#detx").append( setTable("X",matriz.a1,matriz.y1,matriz.z1,matriz.a2,matriz.y2,matriz.z2,matriz.a3,matriz.y3,matriz.z3)).fadeIn("slow");
                $("#dety").append( setTable("Y",matriz.x1,matriz.a1,matriz.z1,matriz.x2,matriz.a2,matriz.z2,matriz.x3,matriz.a3,matriz.z3)).fadeIn("slow");
                $("#detz").append( setTable("Z",matriz.x1,matriz.y1,matriz.a1,matriz.x2,matriz.y2,matriz.a2,matriz.x3,matriz.y3,matriz.a3)).fadeIn("slow");
              } else if (real==false){
                alert("ya se calculó este problema");
              }
              real=false;
              $("#demo").append(real.toString());
            });
            function setMatriz() {
               for(var x in matriz){
                 matriz[x]= $("#"+x).val();
               }     
            }
            function setTable(determinante,x1,y1,z1,x2,y2,z2,x3,y3,z3) {
              var resultado =(x1*y2*z3)+(y1*z2*x3)+(z1*x2*y3)-(z1*y2*x3)-(y1*x2*z3)-(x1*z2*y3);
              var ten = "<table class='table'><tbody><tr><td rowspan='6'>"+determinante+" =</td><td rowspan='6'>|</td><td>"+x1+"</td><td>"+y1+"</td><td>"+z1+"</td><td rowspan='6'>| = "+resultado+"</td></tr><tr><td>"+x2+"</td><td>"+y2+"</td><td>"+z2+"</td></tr><tr><td>"+x3+"</td><td>"+y3+"</td><td>"+z3+"</td></tr></tbody></table>";
              return ten;
            }
        });
        
        </script>
  </head>
  <body>
    <div class="container">
      <h1>Resolver por la regla de Cramer:  <button type="button" class="btn btn-info">Calcula</button></h1>
        <div class="row">
            <div class="col-sm-4">
                <table class="table">
                    <tbody>
                      <tr>
                        <td><input type="text" class="form-control" value="0" size="2" id="x1"></td>
                        <td>x</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="y1"></td>
                        <td>y</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="z1"></td>
                        <td>z</td>
                        <td>=</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="a1"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" value="0" size="2" id="x2"></td>
                        <td>x</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="y2"></td>
                        <td>y</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="z2"></td>
                        <td>z</td>
                        <td>=</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="a2"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" value="0" size="2" id="x3"></td>
                        <td>x</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="y3"></td>
                        <td>y</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="z3"></td>
                        <td>z</td>
                        <td>=</td>
                        <td><input type="text" class="form-control" value="0" size="2" id="a3"></td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4" id="matriz"></div>
        </div>
        <div class="row">
          <div class="col-sm-4" id="detx"></div>
          <div class="col-sm-4" id="dety"></div>
          <div class="col-sm-4" id="detz"></div>
        </div>
    </div>
    <p id="demo"></p>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>