<!DOCTYPE html>
<html>

<head>
	<title>Member Registration</title>
        
        <?php 
            // Get the variables from index.html
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            //connect to MySQL and our Database
            $conn = mysqli_connect("localhost", "root", "mysql");
            mysqli_select_db($conn, "loftyhts");
        
            //
            $query = "INSERT INTO members(firstName, lastName, email, username, password) 
            VALUES('$firstName', '$lastName', '$email', '$username', '$password')";
            mysqli_query($conn, $query);
    
            $registered = mysqli_affected_rows($conn);
        ?>
</head>

<body>
    <tr>
        <td>
            <?php if($registered==1) {
                echo "Welcome, " . $firstName . " " . $lastName . "! Thanks for joining.";
        } 
            else 
        {
            echo "Sorry, " . $firstName . " " . $lastName . "! Sign up failed.";
        }
         ?>   
        </td>
    </tr>
	
</body>
    
</html>






