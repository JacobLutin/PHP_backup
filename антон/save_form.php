<?
 
/* —оедин€емс€ с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "root"; // им€ пользовател€ (в Denwer`е по умолчанию "root")
$password = ""; // пароль пользовател€ (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "test_base"; // название базы данных
 
/* “аблица MySQL, в которой будут хранитьс€ данные */
$table = "test_table";
 
/* —оздаем соединение */
mysql_connect($hostname, $username, $password) or die ("Ќе могу создать соединение");
 
/* ¬ыбираем базу данных. ≈сли произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
 
/* ќпредел€ем текущую дату */
$cdate = date("Y-m-d");
 
/* —оставл€ем запрос дл€ вставки информации в таблицу
name...date - название конкретных полей в базе;
в $_POST["test_name"]... $_POST["test_mess"] - в этих переменных содержатс€ данные, полученные из формы */
$query = "INSERT INTO $table SET name='".$_POST['test_name']."', email='".$_POST["test_mail"]."',
theme='".$_POST["test_theme"]."', message='".$_POST["test_mess"]."', data='$cdate'";
 
/* ¬ыполн€ем запрос. ≈сли произойдет ошибка - вывести ее. */
mysql_query($query) or die(mysql_error());
 
/* «акрываем соединение */
mysql_close();
 
/* ¬ случае успешного сохранени€ выводим сообщение и ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">ƒанные успешно сохранены!</font>
 
<a href=\"index.html\">¬ернутьс€ назад</a></div>");
 
?>
