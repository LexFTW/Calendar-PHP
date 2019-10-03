<?php
    // Genero un array que contenga los meses del año:
    $months = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    // Genero otro array para los días de la semana:
    $daysWeek = array(1 => "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom");

    // Usando la función date(), obtengo el mes actual, el año y el dia:
    $month = date("n");
    $year = date("Y");
    $currentDay = date("j");

    // Ahora obtengo el primer día del mes y el último:
    $initDay = date("w", mktime(0, 0, 0, $month, 1, $year)) + 7;
    $lastDay = date("d", (mktime(0, 0, 0, $month + 1, 1, $year)-1));

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/stylesheet.css">
        <title>Calendario en PHP</title>
    </head>
    <body>
        <div class="content">
            <h2 class="title"><?php echo $months[$month]." ".$year?></h2>
            <table id="calendar" class="table">
                <thead>
                    <tr>
                        <?php
                            // Recorro el array con los días que tiene una semana y los meto en el encabezado de la tabla
                            for ($i = 1; $i <= count($daysWeek); $i++) {
                              echo "<th scope='col'>" . $daysWeek[$i] . "</th>" ;
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $lastCell = $initDay + $lastDay;

                            // El bucle es hasta 42, que és el maximo de valores de 6x7
                            for ($i = 1; $i <= 42; $i++) {
                                if($i == $initDay){
                                    $day = 1;
                                }

                                if($i < $initDay || $i >= $lastCell){
                                    echo "<td style='background:#eee'>&nbsp;</td>";
                                }else{
                                    if($day == $currentDay){
                                        echo "<td class='currentDay'>" . $day . "</td>";
                                    }else{
                                        echo "<td>" . $day . "</td>";
                                    }

                                    $day++;
                                }

                                if($i % 7 == 0){
                                    echo "</tr><tr>\n";
                                }
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
