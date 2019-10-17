<?php include 'header.php';?>
<script>
$(document).ready(function(){
  $("#mytable #checkall").click(function () {
    if ($("#mytable #checkall").is(":checked")) {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", true);
      });

    } else {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", false);
      });
    }
  });

  $("[data-toggle=tooltip]").tooltip();
});
</script>
<?php
$server = "DESKTOP-HAF4GQB";
$conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );

$stmt = sqlsrv_query( $conn, "select Heading, Published_date, Due_date, Semester from Assignment",array()); //making query and storing it in stmt variable
//echo starts for displaying the top of the page
?>
  <div id="fir" class="container">
    <div class="row mt-5">
      <div class="col-md-3  mb-5">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 1</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="1">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB11</option>
                  <option value="2">SUB12</option>
                  <option value="3">SUB13</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3  mb-5">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 2</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="2">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB21</option>
                  <option value="2">SUB22</option>
                  <option value="3">SUB23</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3  mb-5">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 3</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="3">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB31</option>
                  <option value="2">SUB32</option>
                  <option value="3">SUB33</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3  mb-5">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 4</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="4">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB41</option>
                  <option value="2">SUB42</option>
                  <option value="3">SUB43</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class=" col-md-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 5</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="5">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB51</option>
                  <option value="2">SUB52</option>
                  <option value="3">SUB53</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 6</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="6">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB61</option>
                  <option value="2">SUB62</option>
                  <option value="3">SUB63</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 7</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="7">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB71</option>
                  <option value="2">SUB72</option>
                  <option value="3">SUB73</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER 8</h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <input type="hidden" name="semester" value="8">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <option value="1">SUB81</option>
                  <option value="2">SUB82</option>
                  <option value="3">SUB83</option>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>


<?php sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
</body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>
