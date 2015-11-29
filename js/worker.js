$(document).ready(function(){
            var matriz = {x1:0,y1:0,z1:0,a1:0,x2:0,y2:0,z2:0,a2:0,x3:0,y3:0,z3:0,a3:0};
            
            $("button").click(function(){
                setMatriz();
                realizaProceso(matriz.x1,matriz.y1,matriz.z1,matriz.a1,matriz.x2,matriz.y2,matriz.z2,matriz.a2,matriz.x3,matriz.y3,matriz.z3,matriz.a3);
                var resulMatriz = MatrizRes(matriz.x1,matriz.y1,matriz.z1,matriz.x2,matriz.y2,matriz.z2,matriz.x3,matriz.y3,matriz.z3);
                $("#matriz").html( setTable("&#916;",matriz.x1,matriz.y1,matriz.z1,matriz.x2,matriz.y2,matriz.z2,matriz.x3,matriz.y3,matriz.z3,resulMatriz)).fadeIn("slow");  
                $("#detx").html( setTable("X",matriz.a1,matriz.y1,matriz.z1,matriz.a2,matriz.y2,matriz.z2,matriz.a3,matriz.y3,matriz.z3,resulMatriz)).fadeIn("slow");
                $("#dety").html( setTable("Y",matriz.x1,matriz.a1,matriz.z1,matriz.x2,matriz.a2,matriz.z2,matriz.x3,matriz.a3,matriz.z3,resulMatriz)).fadeIn("slow");
                $("#detz").html( setTable("Z",matriz.x1,matriz.y1,matriz.a1,matriz.x2,matriz.y2,matriz.a2,matriz.x3,matriz.y3,matriz.a3,resulMatriz)).fadeIn("slow");
            });
            
            
            function setMatriz() {
               for(var x in matriz){
                 matriz[x]= $("#"+x).val();
               }     
            }
            function MatrizRes(x1,y1,z1,x2,y2,z2,x3,y3,z3){
                var resultado =(x1*y2*z3)+(y1*z2*x3)+(z1*x2*y3)-(z1*y2*x3)-(y1*x2*z3)-(x1*z2*y3);
                return resultado
            }
            function setTable(determinante,x1,y1,z1,x2,y2,z2,x3,y3,z3,rMatr) {
              var resultado =(MatrizRes(x1,y1,z1,x2,y2,z2,x3,y3,z3))/rMatr;
              if(determinante==="&#916;"){
                  var ten = "<table class='table'><tbody><tr><td rowspan='6'>"+
                  determinante+" =</td><td rowspan='6'>|</td><td>"+
                  x1+"</td><td>"+
                  y1+"</td><td>"+
                  z1+"</td><td rowspan='6'>| = "+
                  rMatr+"</td></tr><tr><td>"+
                  x2+"</td><td>"+
                  y2+"</td><td>"+
                  z2+"</td></tr><tr><td>"+
                  x3+"</td><td>"+
                  y3+"</td><td>"+
                  z3+"</td></tr></tbody></table>";
              }else{
                  var ten = "<table class='table'><tbody><tr><td rowspan='6'>"+
                  determinante +"=</td><td rowspan='3'>|</td><td>"+
                  x1+"</td><td>"+
                  y1+"</td><td>"+
                  z1+"</td><td rowspan='3'>|</td><td rowspan='6'>= "+
                  resultado+"</td></tr><tr><td>"+
                  x2+"</td><td>"+
                  y2+"</td><td>"+
                  z2+"</td></tr><tr><td>"+
                  x3+"</td><td>"+
                  y3+"</td><td>"+
                  z3+"</td></tr><tr><td colspan='5'><hr>"+
                  rMatr+"</td></tr></tbody></table>";
              }
              return ten;
            }
            
});
function realizaProceso(x1,y1,z1,a1,x2,y2,z2,a2,x3,y3,z3,a3){
        var parametros = {
                "x1" : x1,"y1" : y1,"z1" : z1, "a1" : a1,
                "x2" : x2,"y2" : y2,"z2" : z2, "a2" : a2,
                "x3" : x3,"y3" : y3,"z3" : z3, "a3" : a3,
        };
        $.ajax({
                data:  parametros,
                url:   'ajax_proceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}