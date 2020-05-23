<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<title>Resume</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
  
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="https://www.sfdcpoint.com/wp-content/uploads/2019/01/Salesforce-Admin-Interview-questions.png" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2>Neha Kolambe</h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Student</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Mumbai, India</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>neha.kolambe@spit.ac.in</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
          <hr>
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b>
            <a href="add.php"><i class="fa fa-plus fa-fw w3-right w3-large w3-text-teal"></i></a></p>
          <?php 
          $sql= "SELECT * FROM skills";
          $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["skillname"]. " " . $row["skilllevel"]. "<br>";
            ?>
          <p><?php echo $row["skillname"]; ?>
          <a href="edit.php?edit=<?php echo $row["id"]; ?>">
            <i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i>
          </a>
          <a href="index.php?del=<?php echo $row["id"]; ?>">
            <i class="fa fa-remove fa-fw w3-right w3-large w3-text-teal"></i>
          </a>
        </p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $row["skilllevel"]; ?>%"><?php echo $row["skilllevel"]; ?>%</div>
          </div>

            <?php } 

            if(isset($_GET['del'])){
              $del_id = $_GET['del'];
              $sql = "DELETE FROM skills WHERE id=$del_id";
              if(mysqli_query($conn,$sql)){
                echo "<script>window.location='index.php';</script>";
         } 
            }


            ?>
          <!-- <p>Photography</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p>Illustrator</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
          </div>
          <p>Media</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
          </div> -->
          <br>
          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b>
          <a href="add_lang.php"><i class="fa fa-plus fa-fw w3-right w3-large w3-text-teal"></i></a></p></p>
          <?php 
          $sql = "SELECT * From languages";
          $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["langname"]. " " . $row["langlevel"]. "<br>";
            ?>
            <p><?php echo $row["langname"]; ?>
            <a href="edit_lang.php?edit=<?php echo $row["id"]; ?>">
            <i class="fa fa-edit fa-fw w3-right w3-large w3-text-teal"></i>
          </a>
          <a href="index.php?del=<?php echo $row["id"]; ?>">
            <i class="fa fa-remove fa-fw w3-right w3-large w3-text-teal"></i>
          </a>
            </p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:<?php echo $row["langlevel"]; ?>%"></div>
          </div>
            <?php }

            if(isset($_GET['del'])){
              $del_id = $_GET['del'];
              $sql = "DELETE FROM languages WHERE id=$del_id";
              if(mysqli_query($conn,$sql)){
                echo "<script>window.location='index.php';</script>";
         } 
            }

           ?>
          <!-- <p>Spanish</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          <p>German</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div> -->
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <?php  
      if(isset($_POST['addedu'])){
         $name = $_POST['ename'];
         $stdate = $_POST['sdate'];
         $enddate = $_POST['edate'];
         $edetail = $_POST['detail'];

         $sql = "INSERT INTO education VALUES (NULL,'$name', '$stdate','enddate','$edetail')";
         if(mysqli_query($conn,$sql)){
          echo "<script>window.location='index.php';</script>";
         }
      }
      // print_r($_POST);

      ?>
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Add Education</h2>
        <form class="w3-container w3-card-4" action="" method="Post">
          <h2 class="w3-text-blue">Input Form</h2>
          <p>      
          <label class="w3-text-blue"><b>Education Name</b></label>
          <input class="w3-input w3-border" name="ename" type="text"></p>
          <p>
          <p>      
          <label class="w3-text-blue"><b>Start Date</b></label>
          <input class="w3-input w3-border" name="sdate" type="text"></p>
          <p>
          <p>      
          <label class="w3-text-blue"><b>End Date</b></label>
          <input class="w3-input w3-border" name="edate" type="text"></p>
          <p>
          <p>      
          <label class="w3-text-blue"><b>Detail</b></label>
          <input class="w3-input w3-border" name="detail" type="text"></p>
          <p>      
          <button class="w3-btn w3-blue" name="addedu">Add</button></p>
        </form>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i><p>
</footer>

</body>
</html>
