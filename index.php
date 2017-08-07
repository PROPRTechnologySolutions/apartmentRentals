<!DOCTYPE HTML>
<!--
	This is the Pragmadox Solutions website,
    designed and implemented by Jay Price
    Copyright June 2017.
-->
<html>
    
	<head>
		<title>Pragmadox Solutions</title>
          <meta charset="utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
          <link rel="stylesheet" href="assets/css/main.css" />
          <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
          <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body>
       <!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                   <div class="logo">
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Pragmadox Solutions</h1>
								<p>For creative solutions to your technological and business problems, including web and data management.
							</div>
						</div>
                <nav>
							<ul>
								<li><a href="#intro">Intro</a></li>
								<li><a href="#work">Work</a></li>
								<li><a href="#results">Result</a></li>
								<li><a href="#registration">Registration</a></li>
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
                </nav>
	   
    <script> 
    function validateForm() {
    // check to see if passwords match
        var password = document.getElementById("password").value;
        var password2 = document.getElementById("password2").value;
        if(password != password2) {
            alert("Passwords do not match. Please re-enter your password.");
            return false;
        }
    }
    </script>
       
</header>
       
    <div id="main">
       <article id="registration">
        <h2 class="major">Member Registration Form</h2>
        <form method="post" action="php/contact.php" onsubmit="return validateForm()">
           <div class="field half first">
              <label for="firstName">First Name</label>
              <input required type="text" name="firstName" id="firstName" />
           </div>
           <div class="field half">
              <label for="lastName">last Name</label>
              <input required type="text" name="lastName" id="lastName" />
           </div>
           <div class="field half first">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" placeholder="example@example.com" />
           </div>
           <div class="field half">
              <label for="username">Username</label>
              <input type="text" name="username" id="username"/>
           </div>
           <div class="field half first">
              <label for="password">Password</label>
              <input required type="text" name="password" id="password" />
           </div>
           <div class="field half">
              <label for="password2">Repeat Password</label>
              <input required type="text" name="password2" id="password2" />
           </div>
           <div class="field half first">
               <label for="requestType">Request Type</label>
               <select required name="requestType" id="requestType">
                    <option value="general">General</option>
                    <option value="consult">Business Consultation</option>
                    <option value="quote">Request A Quote</option>
                    <option value="feedback">Submit Feedback</option>
                    <option value="friend">Social Request</option>
                </select>
            </div>
            <div class="field half">
                <label for="subscription">Subscribe</label>
                <input type="button" name="subscription" id="subscription" value="true"/>
            </div>

           <div class="field">
              <label for="comments">Message</label>
              <textarea name="comments" id="comments" rows="4"></textarea>
           </div>
           <ul class="actions">
              <li><input type="submit" id="submit" value="Register"/></li>
              <li><input type="reset" value="Reset" /></li>
           </ul>
        </form>
           
        <ul class="icons">
           <li><a href="https://twitter.com/PragmaParadox" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
           <li><a href="https://www.facebook.com/pragmadox" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
           <li><a href="https://www.instagram.com/pragmadox/?hl=en" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
           <li><a href="https://github.com/pragmadox" class="icon fa-github"><span class="label">GitHub</span></a></li>
        </ul>

           
       </article>
        
       <article id="results">
        <?php 
        
            require_once("php/doc.php");
            //
            $query = "SELECT * FROM apartments, buildings 
            WHERE apartments.bldgID = buildings.IDbldg 
            AND buildings.hoodID AND 
            bdrms>=1 AND rent<=30000 AND isPets<2 
            ORDER BY rent DESC";
            $result = mysqli_query($conn, $query);
        ?>

        <table id="listings">
            <tr>
                <td colspan="14">
                    <h2>Lofty Heights Apartments</h2>
                </td>
            </tr>
            
            <tr>
                <th onclick="sortTable(0)">ID</th>
                <th onclick="sortTable(1)">Apt.</th>
                <th onclick="sortTable(2)">Bldg.</th>
                <th onclick="sortTable(3)">Bdrms</th>
                <th onclick="sortTable(4)">Baths</th>
                <th onclick="sortTable(5)">Rent</th>
                <th onclick="sortTable(6)">Floor</th>
                <th onclick="sortTable(7)">sqft.</th>
                <th onclick="sortTable(8)">Vacant</th>
                <th onclick="sortTable(9)">Doorman</th>
                <th onclick="sortTable(10)">Pets</th>
                <th onclick="sortTable(11)">Parking</th>
                <th onclick="sortTable(12)">Gym</th>
                <th onclick="sortTable(13)">Neighbordhood</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['IDapt']; ?></td>
                    <td><?php echo $row['apt']; ?></td>
                    <td><?php echo $row['bldgName']; ?></td>
                    <td><?php echo $row['bdrms']; ?></td>
                    <td><?php echo $row['baths']; ?></td>
                    <td><?php echo $row['rent']; ?></td>
                    <td><?php echo $row['floor']; ?></td>
                    <td><?php echo $row['sqft']; ?></td>
                    <td><?php echo $row['isAvail']; ?></td>
                    <td><?php echo $row['isDoorman']; ?></td>
                    <td><?php echo $row['isPets']; ?></td>
                    <td><?php echo $row['isParking']; ?></td>
                    <td><?php echo $row['isGym']; ?></td>
                    <td><?php echo $row['hoodID']; ?></td>
                </tr>
            <?php } ?>
           </table>
           
        <ul class="icons">
           <li><a href="https://twitter.com/PragmaParadox" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
           <li><a href="https://www.facebook.com/pragmadox" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
           <li><a href="https://www.instagram.com/pragmadox/?hl=en" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
           <li><a href="https://github.com/pragmadox" class="icon fa-github"><span class="label">GitHub</span></a></li>
        </ul>

           
       </article>
				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Pragmadox Solutions 2017.</p>
					</footer>


</div>
</div>
		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("listings");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("tr");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
	</body>
</html>
