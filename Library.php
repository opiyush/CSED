<?php session_start(); ?>
<style media="screen">
  h2{
    text-align: center;
  }
  .download_btn {
    color: #fff !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #014566;
    padding: 20px;
    border-radius: 50px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
  }
  .download_btn:hover {
    text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
    text-decoration: none;
    -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
    -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
    transition: all 0.4s ease 0s;
  }
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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br><br>
          <h2>Softwares</h2>
          <br>
          <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
            <tbody><tr>
              <td width="100" align="center">Freeware Softwares</td>
              <td width="100" align="center">Licensed Softwares</td>
              <td width="100" align="center">Open Source</td>
            </tr>
             <tr>
              <td width="100" align="center">
                <br>
               	<figure>
            		  <img src="image/freeware.jpeg" alt="Nature" class="center">
               	</figure>
                <br>
                <div class="download_freeware" align="center">
                  <a class="download_btn" href="Library_Freeware.php" rel="nofollow noopener">Download Freeware S/W</a>
                </div>
              </td>

              <td width="100" align="center">
                <br>
              	<figure>
              		<img src="image/licensed.jpeg" alt="Nature" class="left">
              	</figure>
                <br>
                <div class="download_licensed" align="center">
                  <a class="download_btn" href="Library_Licensed.php" rel="nofollow noopener">Download Licensed S/W</a>
                </div>
               </td>
              <td width="100" align="center">
                <br>
              	<figure>
              		<img src="image/opensource.jpeg" alt="Nature" class="right">
              	</figure>
                <br>
                <div class="download_opensource" align="center">
                  <a class="download_btn" href="Library_Opensource.php" rel="nofollow noopener">Download Open Source S/W</a>
                </div>
              </td>
            </tr>

          </tbody></table>
         </div>
        </div>
      </div>
    </div>
    <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
