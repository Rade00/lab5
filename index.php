<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
        <?
            echo("<div>");
            $queryTab = "game";
            $headText = "Таблица Игры";
            $arrayTitle = array("№",  "Название", "Жанр", "Разработчик", "Издатель", "Объем продаж", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='new.php?Index="."game"."'> Добавить новую игру</a> </div>");
            echo("</div>");
            
            $queryTab = "digital";
            $headText = "Таблица Цифровые магазины";
            $arrayTitle = array("№", "Название", "url", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='new.php?Index="."digital"."'> Добавить новый цифровой магазин</a> </div>");
            echo("</div>");
            
            $queryTab = "dkey_info";
            $headText = "Таблица Цифровые ключи";
            $arrayTitle = array("№", "Дата приобретения",  "Дата окончания", "Игра", "Цифровой магазин", "Стоимость", "Ключ", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='new.php?Index="."dkey"."'> Добавить новый цифровой ключ</a> </div>");
            echo("</div>");
            echo("</div>");
           
            echo("<div>");
            echo("<div> <a href='gen_pdf.php'> Открыть PDF - файл </a> </div>");
            echo("<div> <a href='gen_xls.php'> Загрузить XLS - файл </a> </div>");
            echo("</div>");
            echo("</div>");
        ?>
    </body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>