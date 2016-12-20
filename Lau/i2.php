<?php

    require_once('parse-lib/PHPExcel.php');

    function connect_DB(){
        //Подключаемся к БД
        global $conn;
        $user = 'root';
        $password = 'testpass';
        $host = 'localhost';
        $DB = 'GU-test';
        $conn = mysql_connect($host, $user, $password);
        
        //Настраиваем кодировки в выбранной БД
        mysql_select_db($DB, $conn);
        mysql_query("SET NAMES utf8");
        mysql_query("SET character_set_client='UTF-8'");
        mysql_query("SET character_set_results='UTF-8'");
        mysql_query("SET collation_connection='UTF-8'");
        
        
    }

    // Открываем файл
    $xls = PHPExcel_IOFactory::load('АСП.xlsx');

    //Определяем количество листов в документе
    $sheetNumber = $xls->getSheetCount();

    connect_DB();

    //-----------------------------------------------------------------------------
    // ---Смена листов----
    for($k = 0; $k < $sheetNumber; $k++){

        // Устанавливаем индекс активного листа
        $xls->setActiveSheetIndex($k);

        // Получаем активный лист
        $sheet = $xls->getActiveSheet();
    
        // ----Парсинг ФИО (users)----

        //Строки
        for ($i = 6; $i <=$sheet->getHighestRow(); $i++) {  
                     
            $nColumn = PHPExcel_Cell::columnIndexFromString(
                $sheet->getHighestColumn());

            //Столбцы 
            for ($j = 1; $j < 2; $j++) {
                $value = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                if ($value == "") break; 
                // if (($value == "неоплата") || ($value == "ИТОГО")) continue;
                $nameOfUser = explode(" ", $value);
                if (count($nameOfUser) < 3) continue;

                $resUpd = mysql_query("SELECT * FROM users WHERE family = '$nameOfUser[0]' AND name = '$nameOfUser[1]' AND otch = '$nameOfUser[2]';");
                $resUpd = gettype(mysql_result($resUpd, 0));

                if ($resUpd == 'boolean') {

                    $i2 = mysql_query("INSERT INTO users (family, name, otch) VALUES('".$nameOfUser[0]."', '".$nameOfUser[1]."', '".$nameOfUser[2]."');");
                    
                }

                // echo "Фамилия - $nameOfUser[0], Имя - $nameOfUser[1], Отчество - $nameOfUser[2]<br/>";
                // echo "------------------------------------------------------------------------------<br/>";
            }
              
           
        }

        //----Парсинг цифр (payments)-----

        $nColumn = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
    
        $nRow = $sheet->getHighestRow();

        for ($j=6; $j <= $nRow; $j++) { 
            
            for ($i=1; $i <= $nColumn; $i++) { 

                $value = $sheet->getCellByColumnAndRow($i, $j)->getCalculatedValue();

                $numberMonth = $sheet->getCellByColumnAndRow($i, 3)->getCalculatedValue();

                if (($i == 1) && ($value == "")) break;
                // if (($i == 1) && (($value == "неоплата") || ($value == "ИТОГО"))) break;
                
                $nameOfUser = explode(" ", $value);
                if (($i == 1) && (count($nameOfUser) < 3)) break;

                if ($i == 1) {

                    $userFIO = explode(" ", $value);
                    $sqlResult = mysql_query("SELECT id FROM users WHERE family = '$userFIO[0]' AND name = '$userFIO[1]' AND otch = '$userFIO[2]';");
                    
                    while($dataArr = mysql_fetch_array($sqlResult, MYSQL_ASSOC))
                    {
                
                        $idStudent = $dataArr["id"];
                        
                    
                    }
                    // echo $idStudent."<br/>";
                    mysql_free_result($sqlResult);

                    

                }
                else{

                    if ((gettype($value) == 'double') || (gettype($value) == 'integer')){

                        //получаем комментарий и вычисляем даты
                        $columnStrIndex = PHPExcel_Cell::stringFromColumnIndex($i);
                        $comment = $sheet->getComment("$columnStrIndex".$j)->getText();
                        $dateOfComment = explode(" ", $comment);

                        //preg_match c рабочим шаблоном не работает....

                        foreach ($dateOfComment as $pseudoDate) {

                            if (count(explode(".", $pseudoDate)) == 3) {

                                $trueDate = explode(".", $pseudoDate);
                                $trueDate = "$trueDate[2].$trueDate[1].$trueDate[0]";
                            }

                        }



                        // echo "$trueDate<br/>";

                        $resUpdPayments = mysql_query("SELECT id FROM payments WHERE student='$idStudent' AND sumOfMoney='$value' AND number_month='$numberMonth' AND datefact='$trueDate';");
                        $resUpdPayments = gettype(mysql_result($resUpdPayments, 0));

                        if ($resUpdPayments == 'boolean') {

                            //записываем в payments
                            mysql_query("INSERT INTO payments (student, sumOfMoney, number_month, datefact, comment) VALUES('$idStudent', '$value', '$numberMonth', '$trueDate', '$comment');");                            


                        }

                        


                    } 
                }



            }
            
        }
            

    }

    //-----------------------------------------------------------------------------

    //Удаление документа из памяти и завершение соединения с базой
    $xls->disconnectWorksheets();
    unset($xls);
    mysql_close($conn);


?>
