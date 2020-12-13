<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if((isset($_GET['id']))&&(isset($_GET['query']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                switch($index){
                    case "game":
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rows = array();
                        echo("<fieldset><legend>Изменить игру</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите Название: <input name='name'
                        type='text' maxlength='32' size='32' value='$rows[1]'/> <br>");
                        
                        echo("Введите Жанр: <input name='genre'
                        type='text' maxlength='32' size='32' value='$rows[2]'/> <br>");
                        
                        echo("Введите Разработчика: <input name='dev'
                        type='text' maxlength='32' size='32' value='$rows[3]'/> <br>");
                        
                        echo("Введите Издателя: <input name='publisher'
                        type='text' maxlength='32' size='32' value='$rows[4]'/> <br>");
                        
                        echo("Введите Объем продаж: <input name='volume'
                        type='number' min='1' max='999999999' value='$rows[5]' /> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "digital":
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rws = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<fieldset><legend>Изменить цифровой магазин</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите название: <input name='name'
                        type='text' maxlength='32' size='32' value='$rows[1]'/> <br>");
                        
                        echo("Введите url: <input name='url'
                        type='text' maxlength='128' size='128'  value='$rows[2]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dkey_info":
                        $index = "dkey";
                        $queryTab_0 = "game";
                        $queryTab_1 = "digital";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $query_2 = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        $result_2 = mysqli_query($link, $query_2) or die("Не могу выполнить запрос!");
                        $rows = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                    
                        $rws = array();
                        while ($row=mysqli_fetch_array($result_2)){
                            $rws = $row;
                        }
                        
                        echo("<fieldset><legend>Изменить цифровой ключ</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите дату приобретения: <input name='date_b'
                        type='date' value='$rws[1]'/> <br>");
                        
                        echo("Введите дату окончания: <input name='date_e'
                        type='date' value='$rws[2]'/> <br>");
                        
                        $id = "game";
                        echo("<label for='$id'>Список игр: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите игру--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            if($rws[3]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        echo("</select><br>");
                        
                        $id_1 = "digital";
                        echo("<label for='$id_1'>Список цифровых магазинов: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Выберите цифровой магазин--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            if($rws[4]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        echo("</select><br>");
                        
                        echo("Введите Стоимость: <input name='cost'
                        type='number' min='1' max='9999999' value='$rws[5]' size='11' ><br>");
                        
                        echo("Введите Ключ: <input name='dkey'
                        type='text' maxlength='32' size='32' value='$rws[6]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
		    }
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>