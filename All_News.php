<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">

    <title>All News</title>
    <link rel="stylesheet" href="header.css">

  </head>
  <style media="screen">
    #news{
      margin-left: 12%;
      margin-right: 12%;
      padding-top: 5px;
      color: #007bff;
    }
    #news a:hover{
      color: #014566;
      text-decoration: none;
    }
    #news a:visited{
      color: #7600bf;
    }
    div.footer {
        padding: 1rem;
        border-top: 1px solid #2f3542;
        background-color: #2f3542;
        color: white;

    }
  </style>
  <body>

    <?php include 'header.php'?>
    <br>
    <?php
  	    include 'connection.php';

        $stmt = sqlsrv_query( $conn, "EXEC GetAllNotice_by_pub_date;",array());
        if ($stmt !== NULL) {
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
          {
            ?>
          <div id="news" class="container">
            <li>
              <a title="<?php echo $rows["Heading"] ?>" target="_blank" href=<?php echo "Added_Notices/" . $rows["Notice_Link"]?> >  <?php echo $rows["Heading"] ?> </a>
              <!--<span></span>-->
            </li>
          </div>
          <?php }
        }
        else{
          echo "something went wrong";
        }
       ?>
       <br><br>
     <div class="footer" >
          <div class="container">
            <p class="lead">Contact Us</p>
          </div>
     </div>
     <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
     <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
     <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
