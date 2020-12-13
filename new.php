<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "game":
                        echo("<fieldset><legend>Добавить новую игру</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите Название: <input name='name'
                        type='text' maxlength='32' size='32' /> <br>");
                        
                        echo("Введите Жанр: <input name='genre'
                        type='text' maxlength='32' size='32' /> <br>");
                        
                        echo("Введите Разработчика: <input name='dev'
                        type='text' maxlength='32' size='32' /> <br>");
                        
                        echo("Введите Издателя: <input name='publisher'
                        type='text' maxlength='32' size='32'/> <br>");
                        
                        echo("Введите Объем продаж: <input name='volume'
                        type='number' min='1' max='999999999' value='1' /> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "digital":
                        echo("<fieldset><legend>Добавить новый цифровой магазин</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите название: <input name='name'
                        type='text' maxlength='32' size='32'/> <br>");
                        
                        echo("Введите url: <input name='url'
                        type='text' maxlength='128' size='128' /> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dkey":
                        $queryTab_0 = "game";
                        $queryTab_1 = "digital";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить новый цифровой ключ</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите дату приобретения: <input name='date_b'
                        type='date'/> <br>");
                        
                        echo("Введите дату окончания: <input name='date_e'
                        type='date'/> <br>");
                        
                        $id_0 = "game";
                        echo("<label for='$id_0'>Список игр: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Выберите игру--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "digital";
                        echo("<label for='$id_1'>Список цифровых магазинов: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Выберите цифровой магазин--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        
                        echo("Введите Стоимость: <input name='cost'
                        type='number' min='1' max='9999999' value='1' size='11' ><br>");
                        
                        echo("Введите Ключ: <input name='dkey'
                        type='text' maxlength='32' size='32'/> <br>");
                        
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