<?php
  if(isset($_GET["errors"])){
      $errors = json_decode($_GET['errors'],true);
  }
  if(isset($_GET['old_data'])){
      $old_data = json_decode($_GET['old_data'],true);
  }

  print_r( $old_data['skills']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
   
</style>
<body>
    <h1 class="text-center">Register Form </h1>
    <div class="container">

        <form action="done.php" method="post">
            <div class="mb-3 d-flex justify-content-between ">
                <label for="f_name" class="form-label">FirstName</label>
                <input type="text" name="f_name"
                   value="<?php $val=isset($old_data['f_name'])?$old_data['f_name']:"";echo $val;?>"
                       class="form-control w-75"  aria-describedby="f_name">
                       <span class="text-danger">
                     <?php $errorfn=isset($errors['f_name'])? $errors['f_name']: ''; echo $errorfn; ?>
               </span>
            </div>
            <div class="mb-3 d-flex justify-content-between ">
                <label for="l_name" class="form-label">LastName</label>
                <input type="text" name="l_name"
                value="<?php $val=isset($old_data['l_name'])?$old_data['l_name']:"";echo $val;?>"

                       class="form-control w-75"  aria-describedby="l_name">
                       <span class="text-danger">
                  <?php $errorln=isset($errors['l_name'])? $errors['l_name']: ''; echo $errorln; ?>
               </span>
            </div>
            <div class="mb-3 d-flex justify-content-between ">
                <label for="address" class="form-label"> Address</label>
                <textarea type="textarea" name="address"

                       class="form-control w-75" id="address" aria-describedby="address"><?php $val=isset($old_data['address'])?$old_data['address']:"";echo $val;?></textarea>
                       

            </div>

            <div class="mb-3 d-flex justify-content-between ">

            <label for="country" class="form-label"> Country</label>
            <select class="form-select w-75" name="country" aria-label="Default select example">
              <option 
      value="<?php $val=isset($old_data['country'])?$old_data['country']:"";echo $val;?>"
  
              
              ><?php $val=isset($old_data['country'])?$old_data['country']:"";echo $val;?></option>
                <option  value= "egypt">egypt</option>
                <option value="qater">qater</option>
                <option value="tunis">tunis</option>
                <option value="libia">libia</option>
            </select>
        </div>
        <span class="text-danger ">
        <?php $cerror=isset($errors['country'])? $errors['country']: ''; echo $cerror; ?></span>
                    <div class="mb-3 d-flex justify-content-between ">

            <label for="gender" class="form-label"> Gender</label>
              <div class="check w-75 d-flex ">
              <div class="form-check w-50">
                <input class="form-check-input"  type="radio" name="gender" value="male" id="male"
                <?php
                        if($old_data['gender'] == "male"){
                            echo 'checked';
                        }
                            ?>
                        
                
                >
                <label class="form-check-label" for="male">
                    Male
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" id="female"
                <?php
                        if($old_data['gender'] == "female"){
                            echo 'checked';
                        }
                            ?>
                
                >
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div></div>
           </div>

           <div class="mb-3 d-flex justify-content-between ">
           <label for="skills" class="form-label"> Skills</label>

                    <div class="form-check" >
                        <input class="form-check-input"name="skills[]" type="checkbox" value="php" id="php"
                      
                        <?php
                            $val = isset($old_data['skills']) && in_array('php', $old_data['skills'])
                           ? 'checked' : '';
                            echo $val;
                            ?>
                        >
                        <label class="form-check-label" for="php">
                            PHP
                        </label>
                        
                  </div>
                  <div class="form-check" >
                        <input class="form-check-input" name="skills[]" 
                      <?php
                        $val = isset($old_data['skills']) && in_array('mysql', $old_data['skills'])
                           ? 'checked' : '';
                            echo $val;
                            ?>
                               type="checkbox" value="mysql" id="mysql">
                        <label class="form-check-label" for="mysql">
                            MySQL
                        </label>
                        
                  </div>
                  <div class="form-check" >
                        <input class="form-check-input" name="skills[]" 
                        
                        <?php
                        $val = isset($old_data['skills']) && in_array('js', $old_data['skills'])
                           ? 'checked' : '';
                            echo $val;
                            ?>
                        type="checkbox" value="js" id="js">
                        <label class="form-check-label" for="js">
                            JS
                        </label>
                        
                  </div>
                  <div class="form-check" >
                        <input class="form-check-input" name="skills[]" 
                        <?php
                        $val = isset($old_data['skills']) && in_array('css', $old_data['skills'])
                           ? 'checked' : '';
                            echo $val;
                            ?>
                        
                        type="checkbox" value="css" id="css">
                        <label class="form-check-label" for="css">
                            CSS
                        </label>
                        <span class="text-danger">
                        <?php $serror=isset($errors['skills'])? $errors['skills']: ''; echo $serror; ?>
                        
                  </div>
           </div>



           <div class="mb-3 d-flex justify-content-between ">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email"
                value="<?php $val=isset($old_data['email'])?$old_data['email']:"";echo $val;?>"

                       class="form-control w-75"  aria-describedby="email">
               <span class="text-danger">
                  <?php $errorm=isset($errors['email'])? $errors['email']: ''; echo $errorm; ?>
               </span>
            </div>

            <div class="mb-3 d-flex justify-content-between ">
            <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password"
                       class="form-control w-75" id="exampleInputPassword1">
                       <span class="text-danger">
                  <?php $perror=isset($errors['password'])? $errors['password']: ''; echo $perror; ?>
               </span>
            </div>
            <div class="mb-3 d-flex justify-content-between ">
            <input type="hidden" name="deparment" value="Open Source">
                <label for="deparment" class="form-label">Deparment</label>
                <input type="text"  name="deparment_dis" disabled value="Open Source" 
                       class="form-control w-75"  aria-describedby="deparment">
            </div>
               <p class="ms-5">GfdG652</p>
            <div class="mb-3 d-flex text-center m-outo ms-5">
                <input type="text"  name="code "
                       class="form-control w-50"  aria-describedby="code">
                       <label for="code" class="form-label w-50">please enter the code</label>

            </div>

            <div class="mb-3 d-flex justify-content-evenly ">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            </div>

        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>