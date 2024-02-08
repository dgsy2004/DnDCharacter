<?php
    //create record function

    function createRecord(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'dndcharacters';

        //creating connection to database

        $connection = mysqli_connect($servername, $username, $password, $databasename);

        //check if connection was successful or not

        if(!$connection){
            die ('Connection Unsuccessful :'.mysqli_connect_error());
        }

        //storing userinput into variables

        $id=$_POST['ID'];
        $characterStrength = $_POST['Strength'];
        $characterDexterity = $_POST['Dexterity'];
        $characterConstitution = $_POST['Constitution'];
        $characterIntelligence = $_POST['Intelligence'];
        $characterWisdom = $_POST['Wisdom'];
        $characterCharisma = $_POST['Charisma'];

        //insert data into database table

        $sql = "UPDATE dndcharacter_table SET Strength='$characterStrength', Dexterity='$characterDexterity', Constitution='$characterConstitution', Intelligence='$characterIntelligence', Wisdom='$characterWisdom', Charisma='$characterCharisma') WHERE ID="$id;

        //check if insert data was successful

        if(mysqli_query($connection, $sql)){
            echo "";
        }else{
            echo 'Error: '.$sql.mysqli_error($connection);
        }

        //close connection
        mysqli_close($connection);

        //redireecting user back to index.php
        header( 'location: stats.php');
    }
    if(isset($_POST['create-stat-button'])){
        createRecord();
    }
?>
