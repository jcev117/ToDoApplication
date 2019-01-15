
<?php

/*Joy Evans
ToDo Application
January 14, 2019*/

$mysqli = new mysqli("localhost","root","","todo");
$name=$_POST['tname'];
$query = "INSERT INTO MyTasks (id, name) VALUES (DEFAULT, '$name')";//insert query to add tasks and autoincrement
$homesite="index.php";


if(!empty($name))//if form submission is not empy perform insert query 
{
    mysqli_query($mysqli, $query);

    echo "1 task has been added.";//print prompt to user
}
else if (empty($name))//if form submission is empty, show empty prompt
{
    echo "No task added.";
}

echo"<br>";
echo"<a href='".$homesite."'>Index</a>";//access index.php
$mysqli->close();
?>


