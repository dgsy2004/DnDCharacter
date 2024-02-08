<!DOCTYPE html>
<html>
    <head>
        <title>Character Stat</title>
        <style>
            #create-stat-form, #update-stat-form, #delete-stat-form {
                display: none;
            }

            .main-div {
                width: 80vw;
                margin: 0 auto;
            }
            
            h2, h3 {
                text-align: center;
            }

            table{
                margin: 15px auto;
                width: 50vw;
                text-align: center;
            }

            table tr td {
                padding:12px;

            }

            .content-wrapper {
                width:100%;
                margin: 0 auto;
                text-align: center
            }
            #create-stat-button, #update-stat-button, #delete-stat-button {
                width: 140px;
                height:37.5px;
                background-color: skyblue;
                color: #ffffff;
                border-radius: 4px;
                border: 1.5px solid darkblue;
                cursor: pointer;
            }

            .small-button{
                width: 76px;
                height: 30px;
                background-color: skyblue;
                color: #ffffff;
                border-radius: 2px;
                border: none;
                cursor: pointer;
            }

            input[type="text"] {
                margin: 6px;
                width: 260px;
                height: 32px
            }
        </style>
    </head>
    <body>
        <div class="main-div">
            <?php require_once 'createStats.php';?> 
                <div>
                    <h2>Character Stats</h2>
                    <?php 
                        $servername = 'localhost';
                        $username = 'root';
                        $password = '';
                        $databasename = 'dndcharacters';
                
                        //creating connection to database
                
                        $connection = mysqli_connect($servername, $username, $password, $databasename);
                        //chech if connection was successful
                        if(!$connection){
                            die('connection failed: '.mysqli_connect_error());
                        }


                    //query the table for the records
                    $sql = "SELECT * FROM character_stat"; //set up our query
                    $result = mysqli_query($connection, $sql); //store result of query into $result
                    $rowCount = mysqli_num_rows($result);

                        if($rowCount > 0) {
                            echo "
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Strength</th>
                                                <th>Dexterity</th>
                                                <th>Constitution</th>
                                                <th>Intelligence</th>
                                                <th>Wisdom</th>
                                                <th>Charisma</th>
                                            </tr>
                                        </thead>  
                                    </table>
                                ";
                        }
                    ?>
                    <?php 
                    //fetches us associated information from database
                        while ($row = $result -> fetch_assoc()): ?> 
                            <tr>
                                <td><?php echo $row['ID']?></td>
                                <td><?php echo $row['Strength']?></td>
                                <td><?php echo $row['Dexterity']?></td>
                                <td><?php echo $row['Constitution']?></td>
                                <td><?php echo $row['Intelligence']?></td>
                                <td><?php echo $row['Wisdom']?></td>
                                <td><?php echo $row['Charisma']?></td>
                            </tr>                    
                        <?php endwhile;?>
                </div>
                <div class="content-wrapper">
                    <button id="create-stat-button">Create Stat</button>
                    <button id="update-stat-button">Update Stat</button>
                    <button id="delete-stat-button">Delete Stat</button>

                    <form action="create_stat.php" method="POST" id="create-stat-form">
                        <h3>Create Stat</h3>
                        <input type="text" placeholder="Enter ID" name="create-stat-ID"/><br>
                        <input type="int" placeholder="Strength" name="create-strength"><br>
                        <input type="int" placeholder="Dexterity" name="create-dexterity"><br>
                        <input type="int" placeholder="Constitution" name="create-constitution"><br>
                        <input type="int" placeholder="Intelligence" name="create-intelligence"><br>
                        <input type="int" placeholder="Wisdom" name="create-wisdom"><br>
                        <input type="int" placeholder="Charisma" name="create-charisma"><br>
                        <input type="submit" value="Save" name="create-stat-button" class="small-button">
                    </form>
                    <form action="update_stat.php" method="POST" id="update-stat-form">
                        <h3>Update Stat</h3>
                        <input type="text" placeholder="Enter ID" name="update-stat-ID"/><br>
                        <input type="int" placeholder="Strength" name="update-strength"><br>
                        <input type="int" placeholder="Dexterity" name="update-dexterity"><br>
                        <input type="int" placeholder="Constitution" name="update-constitution"><br>
                        <input type="int" placeholder="Intelligence" name="update-intelligence"><br>
                        <input type="int" placeholder="Wisdom" name="update-wisdom"><br>
                        <input type="int" placeholder="Charisma" name="update-charisma"><br>
                        <input type="submit" value="Save" name="update-stat-button" class="small-button">
                    </form>
                    <form action="delete_stat.php" method="POST" id="delete-stat-form">
                        <h3>Delete Stat</h3>
                        <input type="text" placeholder="Enter ID" name="delete-stat-ID"/><br>
                        <input type="submit" value="Save" name="submit-delete" class="small-button"/>
                    </form>
                </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>

