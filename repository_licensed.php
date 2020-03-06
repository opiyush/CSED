<?php session_start(); ?>
<style media="screen">
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
</head>
<body>
  <?php include 'header.php';?>
  <?php include 'connection.php' ;?>
  <?php
  $stmt = sqlsrv_query( $conn,"select * from Software WHERE Type = 2",array()); //making query and storing it in stmt variable
  // for displaying the top of the page
  //checking the result of fetching the contents
  if ($stmt !== NULL) {
    //echo "printing the table\n";
    ?>
    <div class="container">
      <div class="">
        <div class="table_layout">
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
                    <td style="width: 40%"><?php echo substr($rows["Software_Name"],0,30)?></td>
                    <!-- download -->
                    <td style="width: 30%">
                      <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download"]?>>Download S/W</a>

                    </td>
                    <td style="width: 30%">
                      <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download_Manual"]?>>Download Manual</a>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
              <tr>
                <td>HP Laser Jet 1150 s/w</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>COMDEX- Computer Course Kit </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>PCS Sound Driver</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Network Driver</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Wipro Dot Matrix Printer Drivers</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Intel 815 DMA VGA Audio Driver</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Compaq Smart Start & Support Software</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Multimedia kit (ienetmeeting vedion conferencing sotware)</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>HP CD-Writer Plus Installation software Disc</td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Oracle 9i </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>IBM Drivers,HP Drivers, </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Ms-Office  </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Oracle 9i </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>WINDOW XP  </td>
                <td>Contact CC</td><td>Contact CC</td>
              </tr>
              <tr>

                <td>Microsoft Visiual Studio 6.0</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Micosoft Windows NT</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr><tr>

                <td>Micosoft Windows NT Server</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Microsoft Windows 98</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>MS Office 97</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Borland Turbo C++</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Visual Basic MSDN</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Lense Cleaner</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Red Hat Linux 6</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Oracle 8</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>HP Laser Jet 1100 s/w</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>HP MSDN Library</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>DPC Installer</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Win 2000 Pro 8</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>IBM Cognos BI & DB2</td>
                <td>Contact CC</td>
                <td>Contact CC</td>

              </tr>

              <tr>

                <td>Qualnet</td> 
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>
              <tr>

                <td>Edius-Pro</td>
                <td>Contact CC</td>
                <td>Contact CC</td>
              </tr>

            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>

  <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
