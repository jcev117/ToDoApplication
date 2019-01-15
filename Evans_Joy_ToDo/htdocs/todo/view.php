<?php

/*Joy Evans
ToDo Application
January 14, 2019*/

$mysqli = new mysqli("localhost","root","","todo");//connect to database

$view="SELECT id, name FROM MyTasks";
$result=$mysqli->query($view);
$addsite="addForm.html";
$homesite="index.php";

if(empty($result)) //if query is empty/table is not found, print prompt and create table
{
   echo '<p>Task table does not exist.</p>';
   
   //creates table
   $createquery= "CREATE TABLE MyTasks (
       id int(25) NOT NULL AUTO_INCREMENT,
       name varchar (200) NOT NULL,
       PRIMARY KEY(ID)
       )";
   
   if(mysqli_query($mysqli,$createquery))//performs table creation
   {
         echo'<p>Table created.</p>';
   }
 echo"<a href='".$addsite."'>Add Tasks Here</a>";
}

else if($result->num_rows>0)//if data is in the table, print in HTML format
{
    echo"<table>";
    echo"<thead>";
    echo"<th>Task #</th>";
    echo"<th>Name</th>";
    echo"</thead>";
        while($row=$result->fetch_assoc())
        {
           
            
            echo"<tr>";
            echo"<td>".$row['id']."</td>";
            echo"<td>".$row['name']."</td>";
            echo"</tr>";
          
            
        }
        echo"</table>";
        
}
else//if there are no tasks found, prompt user to add tasks
{
   echo"There are no existing tasks. <br><br>";
   echo"<a href='".$site."'>Add Tasks Here</a>";
    
}

echo"<br>";
echo"<a href='".$homesite."'>Index</a>";//access index.php

$mysqli->close();
?>