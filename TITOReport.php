<?php
include "conn.php";
error_reporting(0);
session_start();
  if ($_SESSION['login_user']==''){
     header("location: login.php");
  }

$sql="SELECT * FROM tblUserAccess Where UserID='$_SESSION[UserID]'";
 
if ($result=mysqli_query($con,$sql))
{
// Fetch one and one row
  while ($row=mysqli_fetch_row($result))
  {
    $ACQUIRE=$row[1];
    $ENRICH=$row[2];
    $DELIVER=$row[3];
    $USER_MAINTENANCE=$row[4];
    $EDITOR_SETTINGS=$row[5];
    $ML_SETTINGS=$row[6];
    $TRANSFORMATION=$row[7];
    $TRANSMISSION=$row[8];
  }
} 



$search=$_GET['Search'];

if ($search==''){
  $search=$_POST['Search'];
}

if ($search==''){
  $search='STYLING';
}

$StateName=$_GET['State'];


if ($StateName==''){
  $StateName=$_POST['State'];
}
 

$dtFrom=$_GET['From'];

if ($dtFrom==''){
  $dtFrom=$_POST['From'];
}

if ($dtFrom==''){
  $dtFrom =date("m/d/Y");
}


$dtTo=$_GET['To'];

if ($dtTo==''){
  $dtTo=$_POST['To'];
}

if ($dtTo==''){
  $dtTo =date("m/d/Y");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>primo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="innodata.png">
  
  <script src="code/highcharts.js"></script>
<script src="code/modules/data.js"></script>
<script src="code/modules/drilldown.js"></script>
<script type="text/javascript" language="JavaScript">

        function SetTextBoxValue($prVal) {
    
            document.getElementById('BatchID').value = $prVal;

        }
     function SetTextBoxValue1($prVal) {
       
            document.getElementById('BatchID1').value = $prVal;

        }
      function SetTextBoxValue2($prVal) {
       
            document.getElementById('BatchID2').value = $prVal;

        }
    </script>
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
     <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><img src="innodata.png" class="img-circle"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><img src="innodata.png" class="img-circle" alt="User Image">&nbsp;<b>p</b>rimo</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['EName'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['EName'];?>
                  <small><?php echo $_SESSION['UserType'];?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
          Change Password
          </button>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
include ("sideBar.php");
?>
  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Task In Task Out Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Task In Task Out Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
   
        <div class="col-md-12">
          <div class="box box-primary">
     
            <div class="box-header with-border">
      <!-- <form method="post" action="">
               From:<input type="Month" Name="From" value="<?php echo $pFrom;?>"> To: <input type="Month" Name="To" value="<?php echo $pTo;?>"> <button type="submit" class="btn btn-primary small"><i class="fa  fa-search"></i> Search</button>
       </form> -->
          <form method="post" action="">
          Filter by: <input type="hidden" name="Search" value="STYLING">
          <input name="From" type="Date" value="<?=$dtFrom;?>"> <input name="To" type="Date" value="<?=$dtTo;?>">

          <?php
          $Login=$_GET['Login'];


          if ($Login==''){
            $Login=$_POST['Login'];
          }
          ?>
          <select name="Login">
          <?php
          if ($Login=='All'){
            ?>
            <option value="All" selected>All</option>
            <?php
          }
          else{
            ?>
            <option value="All">All</option>

        <?php
          }
        
        $strSQL="SELECT  * from NM_Users ORDER BY LoginName";
       
        $objExec= odbc_exec($conWMS,$strSQL);
    
        $prDateFrom = $dtFrom.' 11:59:59 PM';
        $prDateTO = $dtTo.' 12:00:00 AM';

        while ($row = odbc_fetch_array($objExec)) 
        {
             $LoginName=$row["LoginName"];
          ?>
             <option value="<?php echo  $LoginName;?>"><?php echo  $LoginName;?></option>
         
              <?php
              if ($Login==$LoginName){
                ?>
                <option value="<?php echo $LoginName;?>" selected><?php echo $LoginName;?></option>

                     
            <?php
                }
                }
                ?>

        </select> 
        <button type="submit" class="btn btn-primary small"><i class="fa  fa-search"></i> Search</button> 
            </div>
            </form>
            <!-- /.box-header -->
      <div class="box-body">
         
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Employee Name</th>
                  <th>Process</th>
                  <th>Job name</th>
                  <th>Batch Name</th>
                  <th>Date Stated</th>
                  <th>Date Ended</th>
                   
                  <th></th>
                </tr>
                </thead>
                <tbody>
        <?php
        // $prDateFrom = $dtFrom.' 12:00:00 AM';
        // $prDateTO = $dtTo.' 11:59:59 PM';
        
        $prDateFrom = $dtFrom;
        $prDateTO = $dtTo;

        if ($Login=='All'){
           $strSQL="SELECT * FROM  wms_view_TaskinOutDetails where  [Date]>='$prDateFrom' AND [Date]<='$prDateTO'";
        }
        else{
           $strSQL="SELECT * FROM  wms_view_TaskinOutDetails where  [Date]>='$prDateFrom' AND [Date]<='$prDateTO' AND LoginName='$Login'";
        }
       
      
        

      $_SESSION['strSQL']=$strSQL;

        $objExec= odbc_exec($conWMS,$strSQL);
    
         
        while ($row = odbc_fetch_array($objExec)) 
        {
      $status=$row["StatusString"];
        //$objResult=odbc_fetch_array($objExec,$i);   
      $BatchID=$row["BatchId"];    
?>
                <tr>
                  <td><?php echo $row["LoginName"];?></td>
                  <td><?php echo $row["EmployeeName"];?></td>
                  
                  <td><?php echo $row["ProcessName"];?></td>
                
                  <td><?php echo $row["JobName"];?></td>
                  <td><?php echo $row["BatchName"];?></td>
                  <td><?php echo $row["DateStarted"];?></td>
                  <td><?php echo $row["DateEnded"];?></td>
                  
                
                </tr>
          <?php
        }
         
       
      ?>    
                </tbody>
                
              </table>
     <button onclick="exportTableToCSV('TITO Report.csv')" class="btn btn-danger" id="export">Export</button>
            </div>
            
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Change Password</h4>
    </div>
    <form method="post" action="ChangePassword.php">
    <div class="box-body">
     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

      <div class="col-sm-10">
      <input type="password" class="form-control" id="password"  name="Password"  placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Confirm</label>

      <div class="col-sm-10">
      <input type="password" class="form-control" id="confirm_password" name="Confirm" placeholder="Confirm" onkeyup="check();">
      </div>
    </div>
    <span id='message'></span>
    
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-primary" id="Button" value="Change Password">
    <input type="hidden" class="btn btn-primary" name="UserName" value="<?php echo $_SESSION['login_user'];?>">
    <input type="hidden" class="btn btn-primary" name="RedirectPage" value="index.php">
    </div>
    </form>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  <form method="post" action="AllocateBatchToUser.php">
      <div class="modal modal-primary fade" id="modal-success">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Allocate Batch to User</h4>
          </div>
          <div class="modal-body">
           <input type="hidden" class="form-control" name="BatchID" id="BatchID" value="<?php echo "$BatchID";?>">
          <p>Are you sure you want to allocate this batch?</p>

          User Name:

            <select name="UserName" id="UserName" class="form-control select2" style="width: 100%;">
              <?php

            $strSQL="SELECT  * from tbluser where UserType='Operator'";
           if ($result=mysqli_query($con,$strSQL))
              {
              // Fetch one and one row
                while ($row=mysqli_fetch_array($result))
                {
                  $UserID=$row["id"];
                  $UserName=$row["UserName"];
                  echo "<option value=$UserID>$UserName</option>";
                   
                }
              }
              ?> 
            </select>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="button" onclick="AllocateBatchToUser()" class="btn btn-outline">Allocate</button>
          </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>

     <form method="post" action="UnholdJob.php">
      <div class="modal modal-primary fade" id="modal-Unhold">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">UnHold Batch</h4>
          </div>
          <div class="modal-body">
           <input type="hidden" class="form-control" name="BatchID" id="BatchID1" value="<?php echo "$BatchID";?>">
          <p>Are you sure you want to Unhold this batch?</p>

            User Name:

            <select name="UserName" id="UserName" class="form-control select2" style="width: 100%;">
              <?php

            $strSQL="SELECT  * from tbluser where UserType='Operator'";
           if ($result=mysqli_query($con,$strSQL))
              {
              // Fetch one and one row
                while ($row=mysqli_fetch_array($result))
                {
                  $UserID=$row["id"];
                  $UserName=$row["UserName"];
                  echo "<option value=$UserName>$UserName</option>";
                }
              }
              ?> 
            </select>

          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-outline">Unhold</button>
          </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
 
  <!-- /.content-wrapper -->
  <script>
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
  var rows = document.querySelectorAll("table tr");
  
    for (var i = 0; i < rows.length; i++) {
    var row = [], cols = rows[i].querySelectorAll("td, th");
    
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
    csv.push(row.join(","));    
  }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
<script>
      function AllocateBatchToUser(){
         
        var BatchID=document.getElementById("BatchID").value;
      
        var UserName=document.getElementById("UserName").value;
        var btnAllocate=document.getElementById("btnAllocate" + BatchID);
        var data = 'data='+BatchID +"@@@"+UserName;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //response.innerHTML=xmlhttp.responseText;
            btnAllocate.style.display = "none";
            document.getElementById("User" + BatchID).innerHTML = UserName;
            document.getElementById("Status" + BatchID).innerHTML = "Allocated";
            alert("File successfully allocated!");
        
          }
        }
        xmlhttp.open("POST","allocateToBUser.php",true);
              //Must add this request header to XMLHttpRequest request for POST
              xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

      }

</script>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
       
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
         

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
       
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
