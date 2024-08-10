<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';

echo "<div class='container'> <pre> ";


$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$country   = $_POST['country'];

$address = $_POST['address'];
//  if(count($_POST['skills'])==0){$skills=[];}

$skills = $_POST['skills'];
$deparment = $_POST['deparment'];

echo "<h1 class='text-center'>All users</h1>";

    $errors = [];
    $old_data= [];


    if(empty($f_name)){
        $errors['f_name'] = "f_name is required";
    }else{
        $old_data['f_name'] = $f_name;
    }

    if(empty($l_name)){
        $errors['l_name'] = "l_name is required";
    }else{
        $old_data['l_name'] = $l_name;
    }

    if(empty($email)){
        $errors['email'] = "Email is required";
    }else{
        $old_data['email'] = $email;
    }

    if(empty($password)){
        $errors['password'] = "Password is required";
    }
///////////////////////////

    if(empty($address)){
        $errors['address'] = "address is required";
    }else{
        $old_data['address'] = $address;
    }

    if(empty($country)){
        $errors['country'] = "country is required";
    }else{
        $old_data['country'] = $country;
    }
    if(empty($gender)){
        $errors['gender'] = "gender is required";
    }else{
        $old_data['gender'] = $gender;
    }
    if(empty($skills)){
        $errors['skills'] = "skills is required";
    }else{
        $old_data['skills'] = $skills;
    }
   


    if($errors){
        $errors= json_encode($errors);
        if($old_data){
        $old_data = json_encode($old_data);
        }
        header("Location: register.php?errors={$errors}&old_data={$old_data}");

    }else {

        $old_id = file_get_contents('id.txt');
        $old_id = (int)$old_id;
        $id = $old_id + 1;
        file_put_contents('id.txt', $id);
       

        $data = "{$id}:{$f_name}:{$l_name}:{$gender}:{$address}:{$deparment}:{$email}:{$password}:";
        $data_skills=implode(':', $skills);
        // $all_data = $data . $data_skills ."\n"; 
        $filobj = fopen("student.txt", 'a');
        if (is_resource($filobj)) {
            fwrite($filobj, $data);
            fwrite($filobj,  $data_skills);

            fclose($filobj);
            header('Location: all_data.php');
        }

    }