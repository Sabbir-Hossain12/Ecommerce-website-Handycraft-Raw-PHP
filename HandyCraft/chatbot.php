<?php require_once("config.php"); ?>

<?php

/* Establishes a connection with the database. The first argument is the server name, the second is the username for the database, the third is the password (blank for me) and the final is the database name 
*/

// If the connection is established successfully
if($con)
{
     // Get the user's message from the request object and escape characters
    $user_messages = mysqli_real_escape_string($con, $_POST['messageValue']);

    // create SQL query for retrieving the corresponding reply
    $query = "SELECT * FROM chat WHERE input LIKE '%$user_messages%'";

     // Execute query on the connected database using the SQL query
     $makeQuery = mysqli_query($con, $query);


    if(mysqli_num_rows($makeQuery) > 0) 
    {

        // Get the result
        $result = mysqli_fetch_assoc($makeQuery);

        // Echo only the response column
        sleep(3);
        echo $result['output'];
    }else{

        // Otherwise, echo this message
        sleep(3);
        echo "Sorry, I can't understand you.";
    }
}else {

    // If the connection fails to establish, echo an error message
    echo "Connection failed" . mysqli_connect_errno();
}
?>