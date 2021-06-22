<?php
session_start();
include '../include/config.php';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] != "admin"){
        header('Location: ../admin/home.php');
    }
}
else{
    header('Location: ../index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--using FontAwesome--------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/all.min.css"> <!-- //offline icons  -->

   	<title>Rose Garden | Online Shop</title>
  <!-- slick slider -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
     <link rel="stylesheet" type="text/css" href="../css/admin.css"><!-- //main styles-->
  <!-- //dataTable styles-->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
	<!--js-link--------------------->
  <script src="../js/Jquery.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataTableID').DataTable();
        });
    </script>
  </head>

    <body>
    <?php include('../include/nav-ad.php'); ?>

    <div class="links">
      <a href="home.php">
        <i class="fas fa-home"></i>
        <span>Home</span></a>>

      <a href="manage-reviews.php">
      <span>Manage Reviews</span></a>>
    </div>


        <div class="info">
            <p>MANAGE REVIEWS</p> 
            <hr>
        </div>
    <div class="content">
    <table id="dataTableID" class="table table-striped" >	
				<thead>
				<tr class="table-primary">
				<th>Email</th>
				<th>Content</th>
        <th>Rating</th>
        <th>Date posted</th>
			
       
				</tr>
				</thead>

				<tbody>
				<?php
					$sql=mysqli_query($conn,"SELECT * from reviews ");
					while($row=mysqli_fetch_array($sql)) {
				?>
				
				<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['content'];?></td>
				<td><?php echo $row['rating'];?><i class="fas fa-star"></i></td>
				<td><?php echo $row['submit_date'];?></td>
				
        
        </tr>	
				<?php } ?>
				</tbody>
        
		</table>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<?php include '../include/footer.html' ; ?>
<?php include '../include/delete.php' ; ?>

  </body>
</html>