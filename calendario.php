<!DOCTYPE html>
<!--
Hecho por Fernando Mangas
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="libreriasjs/eventos.js"></script>
    </head>
    <body>
        <!-- HTML -->
        <table id="calendar">
	<caption></caption>
	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
        <?php
        //datos de conexion a la base de datos
        define("sql" , "SELECT * FROM eventos where date_format(fecha_ini,'%m')=date_format(now(),'%m') order by 3");
        define("servidor_ip" , "db750156060.db.1and1.com");
        define("usuario", "dbo750156060");
        define("password" , "@Fer607372785");
        define("nombrebase", "db750156060");
        define("dimensionDias",31);
        
        //agragamos la libreria con funciones para la conexión a la base de datos
        include("librerias/funciones.php");
 
        $html = "";
          
        //diccionario con colores
         $colores = array("red","blue","yellow","orange","green","pink");
        
        //fecha actual
        $mes=date("m");
        $anio=date("Y");
        $diaActual=date("j");
        
        //posicion de la celda en la que empieza y final
        $diaSemana=date("w",mktime(0,0,0,$mes,1,$anio));
        $ultimoDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$anio)-1));
        $last_cell=$diaSemana+$ultimoDiaMes;

        //conexión y extracción de datos en un array asociativo
        $conexion = conexionMysql(servidor_ip,usuario,password,nombrebase);       
        
        $day = 1;
        $m = 0;
        $posicion = null;
        $indiceColor = 0;
        $z = 0;
        
        //indice de los colores
        $c = 0;
        
        //incializamos html eventos
        $htmleventos = "";
        
        //controla el cambio de color
        $cambiar = false;
        
        //importante para ver si es el mismo evento
        $ant = "";
        
        //indice de los eventos a presentar en html
        $k = 0;
        
        //extraemos datos y lo almacenamos 
        $fechas = consulta($conexion,sql,$diaSemana);
        //print_r($fechas);
        
        //$i es la posicion que empieza en el calendario (casilla)
        for($i=1;$i<=42;$i++){
            
            
            //almacenamos 0 si no hay eventos
            $diaini[$i-1] = 0;
            $diafin[$i-1] = 0;
                
            if($i>=$diaSemana && $i<$last_cell){
                        
                //calculamos la posicion actual en la que empieza el evento
                $posicionActual = ($diaSemana+($i-1)-2);
                
                //almacenamos eventos si estamos en el mismo mes
                if(isset($fechas[$m]["nombre"]) && ($day>=intval(date_format(
                        new DateTime($fechas[$m]["fecha_ini"]),'d'))
                        &&
                        ($day<=intval(date_format(
                        new DateTime($fechas[$m]["fecha_fin"]),'d')
                        )))){
                    
                    
                    //almacenamos el dia inicial y final de los eventos a añadir
                    $diaini[$i-1] = intval(date_format(new DateTime($fechas[$m]["fecha_ini"]),'d'));
                    $diafin[$i-1] = intval(date_format(new DateTime($fechas[$m]["fecha_fin"]),'d'));
                    
                    //almaceno la posicion final del evento
                    $ultimoDia = ($posicionActual+($diafin[$i-1]-$diaini[$i-1]));
                
                    //para que no se vaya de rango contamos elementos del array
                    if($m<count($fechas)-1){
                        $m++;
                    }
                }
                
                
                
                //si esta en un rango de dias lo señalo en color en el calendario
                if(isset($fechas[$i-1]["nombre"])){
       

                    $html.="<td id='$day' style='background:".$colores[$c]."'>$day</td>";

                    //incrustamos un div donde va la información del evento
                    $htmleventos .= "<div class='fixed' style='display:none;' id='evento$day'>"
                    . "<div style='text-align:right;cursor:pointer;cursor:hand;' id='cerrar$day'>X</div>"
                    . "<h7>Nombre del evento: ".$fechas[$i-1]["nombre"]."</h7></br>"
                    . "<h9>Comienza: </h9>".$fechas[$i-1]["fecha_ini"]."</br>"
                    . "<h9>Termina: </h9>".$fechas[$i-1]["fecha_fin"]."</br>"
                    . "<h9>Descripción: </h9>".$fechas[$i-1]["descripcion"]."</br>"
                    . "</div>";
                  
                    if(!($fechas[$i-1]["fecha_ini"]>=$i && $fechas[$i-1]["fecha_fin"]<=$i)){
                      $c++;
                    }
        
                }
                else{
                    $html.="<td id='$day'>$day</td>";

                }
                
                $day++;
            }
            else{
                $html.="<td></td>";
            }
            
            
            
            if($i%7==0){
                $html.="<tr></tr>";
            }
          
            //incrustamos la tabla
            if($i==42)
                $html .= "</table>";
  
 
        }
   
        //asignamos el html del evento a todo el codigo html
        $html.=$htmleventos;
        
        //pintamos la web
        echo $html;
        
        ?>
    </body>
</html>
