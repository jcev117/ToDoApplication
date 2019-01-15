


<?php

/*Joy Evans
ToDo Application
January 14, 2019*/

$mysqli = new mysqli("localhost","root","","todo");
$viewquery="SELECT id, name FROM MyTasks";//query to pull data
$homesite="index.php";
$deletesite="delete.php";

$result=mysqli_query($mysqli,$viewquery);//perofrms select query


if(!empty($result))//if query result is not empty perform delete task
{
    
    echo "Which task would you like to delete?<br>";
    echo "<form action='' method='post'>";//checkbox form
    while($row=mysqli_fetch_assoc($result))//while there are still task avaiable, print a check box and format task
{
    
    $id=$row['id'];
    $name=$row['name'];
    echo "<input type='checkbox' name='taskcheck[]' value='$id'>$id $name";
    echo "<br>";
    
    

}

echo "<input type='submit' name='delete' value='Delete'/>";
echo"</form>";

if(isset($_POST['delete']))//checks if delete button is click
{
    $checked=$_POST['taskcheck'];//stores checked box name into variable
    $count=count($checked);//counts checked boxes
    
    for($i=0;$i<$count;$i++)
    {
        
            $id=$checked[$i];//store checked box id
            mysqli_query($mysqli,"DELETE FROM MyTasks WHERE id = '$id'");//delete query where check id is found
        
    }
    echo "Task {$name} deleted";//prints which task(s) were deleted
    echo"<br>";
    echo"<a href='".$deletesite."'>Refresh Delete List</a>";
}
}
else//display is task table is empty
{
    echo "No tasks to delete";
}

echo"<br>";
echo"<a href='".$homesite."'>Index</a>";//access to home site



?>