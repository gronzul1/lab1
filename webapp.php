<?php include "../inc/dbinfo.inc"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/slate/bootstrap.min.css" integrity="sha384-8iuq0iaMHpnH2vSyvZMSIqQuUnQA7QM+f6srIdlgBrTSEyd//AWNMyEaSF2yPzNQ" crossorigin="anonymous">
    <style>
      hr {  
        border-top: 2px solid var(--green);    
      }
    </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h2>Lab page insert data</h2> 
        </div>
      </div>      
    </div>

    <?php
    /* Connect to MySQL and select the database. */
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  
    if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
    $database = mysqli_select_db($connection, DB_DATABASE);
  
    /* Ensure that the EMPLOYEES table exists. */
    VerifyEmployeesTable($connection, DB_DATABASE);
  
    /* If input fields are populated, add a row to the EMPLOYEES table. */
    $employee_name = htmlentities($_POST['NAME']);
    $employee_age = htmlentities($_POST['AGE']);
    $employee_email = htmlentities($_POST['EMAIL']);
    $employee_address = htmlentities($_POST['ADDRESS']);
  
    if (strlen($employee_name) || strlen($employee_email) || strlen($employee_age) || strlen($employee_address)) {
      AddEmployee($connection, $employee_name, $employee_age, $employee_email, $employee_address);
    }
    ?>
    <div class="row">
      <div class="col-md-6">
        <div class="card text-white bg-primary p-3" >        
          <div>                  
          <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
          <fieldset>
          <legend>Form employee data</legend>        
          <div class="form-group">
            <label for="NAME"  class="form-label mt-4">NAME</label>
            <input type="text" class="form-control" id="NAME"  name="NAME" placeholder="Enter name">  
          </div>
          <div class="form-group">
            <label for="AGE" class="form-label ">AGE</label>
            <input type="number" class="form-control" id="AGE"  name="AGE" placeholder="Enter AGE">
          </div>
          <div class="form-group">
            <label for="EMAIL" class="form-label ">EMAIL address</label>
            <input type="email" class="form-control" id="EMAIL" name="EMAIL" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="ADDRESS" class="form-label ">ADDRESS</label>
            <input type="text" class="form-control" id="ADDRESS" name="ADDRESS" placeholder="Enter ADDRESS">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Add Data</button>
          </div>
          </fieldset>
          </form>
          </div>
        </div>
      </div>
    </div>    
    
    <div class="row">
      <div class="col-md-12 mt-5">
        <hr>
        <div>
          <h3>Table data:</h3>                
      <table class= "table table-sm table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
          </tr>
        </thead>
      
        <?php
        $result = mysqli_query($connection, "SELECT * FROM EMPLOYEES");
        while($query_data = mysqli_fetch_row($result)) {
          echo "<tr>";
          echo "<td>",$query_data[0], "</td>",
              "<td><b>",$query_data[1], "</b></td>",
              "<td>",$query_data[2], "</td>",
              "<td>",$query_data[3], "</td>",       
              "<td>",$query_data[4], "</td>";       
          echo "</tr>";
        }
        ?>
      </table>
      </div>

      </div>

    </div>

    <div class="row">
      <div class="col-md-12 mt-5">
        <hr>
        <div class="card-body">      
          <h4> 
            Web Server: 
            <?php
            echo gethostname();
            ?>
            </h4>
        
          <p class="card-text">
              DB User:
              <b>
              <?php
              echo DB_USERNAME;
              ?></b>
                connected to DB Server: <b>

                
              <?php
              echo DB_SERVER
              ?></b>
          </p>
        
        </div>

      </div>
    </div>
 

<!-- Clean up. -->
<?php
  mysqli_free_result($result);
  mysqli_close($connection);
?>
</div>
</body>
</html>

<?php
/* Add an employee to the table. */
function AddEmployee($connection, $name, $age,$email ,$address) {
   $n = mysqli_real_escape_string($connection, $name);
   $e = mysqli_real_escape_string($connection, $age);
   $m = mysqli_real_escape_string($connection, $email);
   $a = mysqli_real_escape_string($connection, $address);

   $query = "INSERT INTO EMPLOYEES (NAME, AGE, EMAIL, ADDRESS) VALUES ('$n', '$e', '$m', '$a');";
   if(!mysqli_query($connection, $query)) echo("<p>Error adding employee data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyEmployeesTable($connection, $dbName) {
  
  if(!TableExists("EMPLOYEES", $connection, $dbName))
  {
     $query = "CREATE TABLE EMPLOYEES (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         NAME VARCHAR(45),
         AGE VARCHAR(5),
         EMAIL VARCHAR(20),
         ADDRESS VARCHAR(50)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);
  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");
  if(mysqli_num_rows($checktable) > 0) return true;
  return false;
}
?>