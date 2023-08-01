<?php require_once("config.php"); ?>
<?php include("header.php"); ?>

<?php 
  if(isset($_SESSION["admin"])){
    if($_SESSION["admin"]){
 
?>

<?php 

?>
<head>
  <title>Fonimonosha BD | Add Product</title>
</head>
<body>
<div class="row">
    <table class="table table-striped">
          <thead>
            <tr>
             
              <th scope="col">Order Id</th>
              <th scope="col">email</th>
              <th scope="col">date</th>
              <th scope="col">Total Tk</th>
            </tr>
          </thead>
        <?php 
          $sql = "SELECT * FROM `orders`  ";
            $result=$con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
              
              //echo $row['d_id']. "<br>";
        ?>		
		    	 
            
            <tbody>
              <tr>
                
                <th scope="row"><?php echo $row['d_id']. "<br>";?></th >
                <td><?php echo $row['email']. "<br>";?></td>
                <td><?php echo $row['p_date']. "<br>";?></td>
                <td><?php echo $row['total']. "<br>";?></td>
              </tr>
            </tbody>
      
		    <?php
		        }
		     ?>
        </table>
	  	 </div>
  

</body>

<?php 
    }
  }
 ?>

