<?php
if( !isset($_SESSION)) {
	session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biobazar";

$conn = null;

$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username , $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

$query = "select email,email_verified_at, created_at FROM email_subscriptions";
$stmt = $conn->query($query);
$emails = $stmt->fetchAll(PDO::FETCH_OBJ);
$emails = (array) $emails;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biobazar Admin</title>

    <link rel="shortcut icon" href="../assets/images/favicon.webp" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css"
    integrity="sha512-f73UKwzP1Oia45eqHpHwzJtFLpvULbhVpEJfaWczo/ZCV5NWSnK4vLDnjTaMps28ocZ05RbI83k2RlQH92zy7A==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/admin_styles.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js" type="text/javascript"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <div class="col-4">
                <img src="../assets/images/logo.png" class="img-fluid" id="icon" alt="User Icon"/>
            </div>
        </a>

        <ul class="nav navbar-nav navbar-right ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row justify-content-md-center">
        <!-- <div class="col col-lg-1">

        </div> -->
        <div class="col mt-5">
            <fieldset class="well">
                <div class="col-xs-12">
                    <div class="table-header btn-purple">
                        <h1>
                            Emails
                        </h1>
                    </div>
                    <div class="text-right">
                        <div class="pull-right tableTools-container2">
                            <div class="dt-buttons btn-overlap btn-group">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-responsive" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table3_info">
                            <thead>
                                <tr role="row">
                                    <th>Email</th>
                                    <th>Subscribed On</th>
                                    <th>Email Verification Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($emails as $email) { ?>
                                <tr>
                                    <td><?php echo $email->email ?></td>
                                    <td>
                                     <?php
                                     echo date('d/m/Y', strtotime($email->created_at));
                                     ?>
                                 </td>
                                 <td>
                                     <?php if($email->email_verified_at) {
                                      echo 'Verified';
                                  }
                                  else {
                                      echo 'Not Verified';
                                  } ?>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </fieldset>
  </div>
        <!-- <div class="col col-lg-1">

        </div> -->
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {

        var table = $('#datatable-responsive').DataTable({
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        });

        table.buttons().container().appendTo($('.tableTools-container2'));

    });
</script>
</html>
