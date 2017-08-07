<!DOCTYPE html>
<html>

<head>
	<title>Lofty Heights Apartments</title>
 
</head>
<body>     
    
<div id="main">    
    <article id="results">
        <?php 
    
            //connect to MySQL and our Database
            $conn = mysqli_connect("localhost", "root", "mysql");
            mysqli_select_db($conn, "loftyHeights");
        
            //
            $query = "SELECT * FROM apartments";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
        ?>

        <table>
            <tr>
                <td colspan="9">
                    <h1>Lofty Heights Apartments</h1>
                </td>
            </tr>
            
            <tr>
                <th>ID</th>
                <th>Apartment</th>
                <th>Building</th>
                <th>Bedrooms</th>
                <th>Baths</th>
                <th>Rent</th>
                <th>Floor</th>
                <th>Square Footage</th>
                <th>Vacant</th>
                <th>ID</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['IDapt']; ?></td>
                    <td><?php echo $row['apt']; ?></td>
                    <td><?php echo $row['bldgID']; ?></td>
                    <td><?php echo $row['bdrms']; ?></td>
                    <td><?php echo $row['baths']; ?></td>
                    <td><?php echo $row['rent']; ?></td>
                    <td><?php echo $row['floor']; ?></td>
                    <td><?php echo $row['sqft']; ?></td>
                    <td><?php echo $row['isAvail']; ?></td>
                </tr>
            <?php } ?>
        </table>
           <ul class="actions">
              <li><input type="submit" id="submit" value="Register"/></li>
              <li><input type="reset" value="Reset" /></li>
           </ul>
           
        <ul class="icons">
           <li><a href="https://twitter.com/PragmaParadox" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
           <li><a href="https://www.facebook.com/pragmadox" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
           <li><a href="https://www.instagram.com/pragmadox/?hl=en" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
           <li><a href="https://github.com/pragmadox" class="icon fa-github"><span class="label">GitHub</span></a></li>
        </ul>

           
       </article>
</div>
</body>  
    
</html>






