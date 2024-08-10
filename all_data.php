<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';

echo "<div class='container'> <pre> ";


$users = file('student.txt');
echo "<h1 class='text-center'>All users</h1>";
if ($users){

    echo "<table class='table'> 
    <tr>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>gender</th>
        <th>Address</th>
        <th>Department</th>
        <th>E-mail</th>
        <th>Password</th>
        <th >skills</th>
     </tr>
";
    foreach ($users as $user){
        $user = trim($user);
        $user_info = explode(":", $user);
        echo "<tr>";
        foreach ($user_info as $info) {
            echo "<td> {$info} </td>";

        }

        echo "<tr>";


    }
}










?>
