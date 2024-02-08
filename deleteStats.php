<?php
//make connection to database
function deleteRecord () {

    $servername='localhost';
    $username='root';
    $password='';
    $databasename='dndcharacters';

    $connection = mysqli_connect($servername, $username, $password, $databasename);


    //create an id variable to store ID in

    $id = $_POST['delete-stat-ID'];

    //definte SQL Query

    $sql = "DELETE FROM character_stat WHERE ID = '$id'";

    //execute SQL query

    $deleteQuery = mysqli_query($connection, $sql);

    if(!$deletequery){
        echo 'Error: '.$sql.mysqli_error($connection);
    }

    //close database connection
    mysqli_close($connection);

    //redirect to index

    header('location: stats.php');

}



?>
