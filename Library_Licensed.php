<?php session_start(); ?>
<style media="screen">
  h2{
    text-align: center;
  }
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
</head>
<body>
    <?php include 'header.php';?>
    <?php include 'connection.php' ;?>
    <?php
       $stmt = sqlsrv_query( $conn,"select * from Licensed",array()); //making query and storing it in stmt variable
    // for displaying the top of the page
    //checking the result of fetching the contents
      if ($stmt !== NULL) {
        //echo "printing the table\n";
    ?>
    <div class="container">
    <div class="row">
      <div class="table_layout">
        <br><br>
        <h2>Licensed Softwares</h2>
        <br>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped" style="">
            <thead class="thead-dark">
              <th>Software Name</th>
              <th colspan="2">Activity</th>
            </thead>
            <tbody>
            <?php
            while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            ?>
              <tr>
              <td style="width: 10%"><?php echo substr($rows["Software_Name"],0,6).".."?></td>
              <!-- download -->
              <td style="width: 5%">
                <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download"]?>>Download S/W</a>

              </td>
              <td style="width: 5%">
              <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download_Manual"]?>>Download Manual</a>
            </td>
              </tr>
            <?php
            }
            }
            ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
