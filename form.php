<?php
//Assumptions made:
    //Connection to the database is stable and saved in the variable $connection
    //Table name is "users"

function insertData($connection, $names, $birthday, $email){
    //3. Insert data into database
    try {
    //sql commands     
    $sql = "INSERT INTO users (names, birthday, email)
            VALUES (:names, :birthday, :email)";

    //prepare statement
    $stmt = $connection->prepare($sql);

    //Execute statement
    $stmt->execute([':names'=> $names, ':birthday'=>$birthday, ':email'=>$email]);

    echo "Data inserted Correctly";
    } catch (Exception $e) {
        echo "Exception Message:" . $e->getMessage();
    }
    
}

// grab data from post request
$names = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];

//call insertData function if the server request is a POST request
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    insertData($connection, $names, $birthday, $email);
}
?>