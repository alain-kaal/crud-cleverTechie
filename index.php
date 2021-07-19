<?php
   require_once("helpers\debog.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php require "process.php"; ?>
  
  <?php  if (isset($_SESSION['message'])):  ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
    </div>
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
  <?php endif; ?>

  <?php
    $mysqli = new mysqli(
        'localhost',
        'root',
        '',
        'cleverTechie_crud'
    );
    $queryAll = 'SELECT * FROM data';
    $result = $mysqli->query($queryAll) or die($mysqli->error);

    //  vardump($result->fetch_all());
   ?>
   <div class="container">
   <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['location']; ?></td>
              <td>
                <a 
                href="index.php?edit=<?php echo $row['id']; ?>"
                class="btn btn-info">
                  Edit
                </a>
                <a 
                  href="process.php?delete=<?php echo $row['id'];?>"
                  class="btn btn-danger">
                  Delete
                </a>
                
              </td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
   </div>
  <div class="wrapper"> 
    <div class="container">
      <div class="row justify-content-center">
        <form action="process.php" method="post">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" 
                placeholder="Enter your name"
                value="<?php echo $name; ?>"
               class="form-control">    
          </div>
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="location"
            placeholder="Enter your location"
            value="<?php echo $location; ?>"
              class="form-control">
          </div>
          <div class="form-group">
          <?php if ($update == true): ?>
            <button type="submit" name="Update" 
              class="btn    btn-primary">
                Update
            </button>
            <?php else: ?>
              <button type="submit" name="save" 
                class="btn btn-primary">
                Save
              </button>
          <?php endif; ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/helpers.js"></script>
  <script src="js/main.js"></script>
</body>
</html>