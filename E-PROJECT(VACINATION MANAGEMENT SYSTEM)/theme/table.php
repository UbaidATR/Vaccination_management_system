<?php
include("connection.php");
$query = "SELECT * FROM hospital";
$result = mysqli_query($connection,$query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
   
    <table class="table table-bordered w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>IMAGE</th>
                <th>CHANGES</th>
                <th>DELETE</th>
              
            </tr>
        </thead>
        <tbody>
           <?php
              while($data = mysqli_fetch_assoc($result)){

            $id = $data['id'];
            $user_name = $data['user_name'];
            $user_email = $data['user_email'];
            $user_password = $data['user_password'];
            $user_image = $data['user_image'];
            echo '
         <tr>
            <td>'.$id.'</td>
            <td>'.$user_name.'</td>
            <td>'.$user_email.'</td>
            <td>'.$user_password.'</td>
            <td>'.$user_image.'</td>
            <td><a href="update.php?id='.$id.'">Edit</a></td>
            <td><a href="?id='.$id.'" class="delete" id="'.$id.'" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a></td>
         </tr>'
         ?>
        
        <?php
              }
           ?>    
        </tbody>
    </table>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE YOUR DATA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a type="button" id="delete" class="btn btn-danger" href="delete.php">Yes</a>
      </div>
    </div>
  </div>
</div>
<script>
    $('.delete').click(function(){
       $('#delete').attr('href','delete.php?id='+this.id) 
    })
</script>
</body>
</html>