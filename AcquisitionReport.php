<?php
include "conn.php";
error_reporting(0);
session_start();
  if ($_SESSION['login_user']==''){
     header("location: login.php");
  }

 
$sql="SELECT * FROM tblmlconfig";
$From=$_POST['From'];
$To=$_POST['To'];
$pFrom=$From;
$pTo=$To;
if ($From==''){
    $From =date("m/d/Y");
     $pFrom="2021-01";
}
 
if ($To==''){
  $To =date("m/d/Y");
  $pTo="2021-02";
}
$myDate = new DateTime($From);
$From = $myDate->format('m/d/Y');

 

 
$myDate = new DateTime( $To);
$To = $myDate->format('m/d/Y');
$date1 = date('Y-m-d', strtotime($To. ' + 1 month'));
$myDate = new DateTime( $date1);
$To = $myDate->format('m/d/Y');
 
 
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tpccr</title>
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
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
     <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><img src="innodata.png" class="img-circle"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><img src="innodata.png" class="img-circle" alt="User Image">&nbsp;<b>T</b>pccr</span>
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
       Collection Summary
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Collection Summary</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
   <?php


$sql="SELECT * FROM tblmlconfig";

?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
               
              <form method="post" action="">
                       From:<input type="Month" Name="From" value="<?= $pFrom;?>"> To: <input type="Month" Name="To" value="<?php echo $pTo;?>"> <button type="submit" class="btn btn-primary small"><i class="fa  fa-search"></i> Search</button>
              </form>
             
            <div class="box-body">
                <div class="row">
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php
        
        $strSQL="SELECT        dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL, COUNT(dbo.PRIMO_Integration.RefId) AS DownloadedCount FROM            dbo.SN_Executions LEFT OUTER JOIN dbo.PRIMO_Integration ON dbo.SN_Executions.ExecutionId = dbo.PRIMO_Integration.ExecutionId WHERE EndDate>='$From' AND EndDate<'$To' GROUP BY dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL";
        $objExec= odbc_exec($conWMS,$strSQL);
         
        $r = odbc_num_rows($objExec);
          ?>
    <script type="text/javascript">
    

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Collection Report'
    },
    subtitle: {
        text: 'Click the columns to view the monthly frequency.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total file downloaded.'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
    },

    "series": [
        {
            "name": "Summary",
            "colorByPoint": true,
            "data": [
      <?php
        while ($row = odbc_fetch_array($objExec)) 
        {
          $i ++;
          
          if ($i==$r){
            
      ?>
                {
                    "name": "<?php echo $row['ConfigName'];?>",
                    "y": <?php echo $row['DownloadedCount'];?>,
                    "drilldown": "<?php echo $row['ConfigName'];?>"
                }
      <?php
          }
          else
          {
            ?>
        {
                    "name": "<?php echo $row['ConfigName'];?>",
                    "y": <?php echo $row['DownloadedCount'];?>,
                    "drilldown": "<?php echo $row['ConfigName'];?>"
                },
            <?php
          }
        }
      ?>
                
               
            ]
        }
    ],
    "drilldown": {
        "series": [
    <?php
      $objExec= odbc_exec($conWMS,$strSQL);
        $r = odbc_num_rows($objExec);
      while ($row = odbc_fetch_array($objExec)) 
        {
          $i ++;
          
          if ($i!=$r){
    ?>
    
            {
                "name": "<?php echo $row['ConfigName'];?>",
                "id": "<?php echo $row['ConfigName'];?>",
                "data": [
        
        <?php
        $strSQL1="SELECT        dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL, COUNT(dbo.PRIMO_Integration.RefId) AS DownloadedCount,DATENAME(month,EndDate ) AS MonthVal,Month(EndDate) FROM            dbo.SN_Executions LEFT OUTER JOIN dbo.PRIMO_Integration ON dbo.SN_Executions.ExecutionId = dbo.PRIMO_Integration.ExecutionId WHERE EndDate>='$From' AND EndDate<'$To' AND dbo.SN_Executions.ConfigName='". $row['ConfigName']."'  GROUP BY dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL,DATENAME(month,EndDate ),Month(EndDate) ORDER BY Month(EndDate) ASC";


        $objExec1= odbc_exec($conWMS,$strSQL1);
         
        $r1 = odbc_num_rows($objExec1);
        while ($row1 = odbc_fetch_array($objExec1)) 
        {
          $j ++;
          
          if ($j!=$r1){
        ?>
        
                    [
                        "<?php echo $row1['MonthVal'];?>",
                        <?php echo $row1['DownloadedCount'];?>
                    ],
          <?php
          }
          else{
            
          ?>
                    [
                       "<?php echo $row1['MonthVal'];?>",
                        <?php echo $row1['DownloadedCount'];?>
                    ]
      <?php
          }
        }
      ?>          
                ]
            },
      <?php
        }
        else
        {
          ?>
            {
                "name": "<?php echo $row['ConfigName'];?>",
                "id": "<?php echo $row['ConfigName'];?>",
                "data": [
                    <?php
        $strSQL1="SELECT        dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL, COUNT(dbo.PRIMO_Integration.RefId) AS DownloadedCount,DATENAME(month,EndDate ) AS MonthVal,Month(EndDate) FROM            dbo.SN_Executions LEFT OUTER JOIN dbo.PRIMO_Integration ON dbo.SN_Executions.ExecutionId = dbo.PRIMO_Integration.ExecutionId WHERE EndDate>='$From' AND EndDate<'$To' AND dbo.SN_Executions.ConfigName='". $row['ConfigName']."'  GROUP BY dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL,DATENAME(month,EndDate ),Month(EndDate) ORDER BY Month(EndDate) ASC";
        $objExec1= odbc_exec($conWMS,$strSQL1);
         
        $r1 = odbc_num_rows($objExec1);
        while ($row1 = odbc_fetch_array($objExec1)) 
        {
          $j ++;
          
          if ($j!=$r1){
        ?>
        
                    [
                        "<?php echo $row1['MonthVal'];?>",
                        <?php echo $row1['DownloadedCount'];?>
                    ],
          <?php
          }
          else{
            
          ?>
                    [
                       "<?php echo $row1['MonthVal'];?>",
                        <?php echo $row1['DownloadedCount'];?>
                    ]
      <?php
          }
      ?>          
                ]
            }
      <?php
        }
      }
        }
      ?>
            
        ]
    }
});
    </script>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ConfigName</th>
                  <th>Main URL</th>
                  <th>Total Files Downloaded</th>
                </tr>
                </thead>
                <tbody>
        <?php
        
        $strSQL="SELECT dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL, COUNT(PRIMO_Integration.RefId) AS DownloadedCount FROM dbo.SN_Executions LEFT OUTER JOIN  dbo.PRIMO_Integration ON dbo.SN_Executions.ExecutionId = PRIMO_Integration.ExecutionId WHERE EndDate>='$From' AND EndDate<='$To' GROUP BY dbo.SN_Executions.ConfigName, dbo.SN_Executions.MainURL";
        $objExec= odbc_exec($conWMS,$strSQL);
    
         
        while ($row = odbc_fetch_array($objExec)) 
        {
          $url_info = parse_url($row["MainURL"]);
        //$objResult=odbc_fetch_array($objExec,$i);   
?>
                <tr>
                  <td><a href="Collections.php?Configuration=<?php echo $row["ConfigName"];?>" target='_blank'><?php echo $row["ConfigName"];?></a></td>
                  <td><?php echo $url_info['host'];?></td>
                   <td><?php echo $row["DownloadedCount"];?></td>
                </tr>
          <?php
        }
         
       
      ?>    
                </tbody>
                <tfoot>
                <tr>
                  <th>Court Name</th>
                  <th>Main URL</th>
                  <th>Total Files Downloaded</th>
                </tr>
                </tfoot>
              </table>
          </div>
            </div>
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
  <!-- /.content-wrapper -->
  

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
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  function FileRegistration(Filename){
    var response=document.getElementById(Filename);
       
      var jTextArea = "";
      response.innerHTML="";
      var data = 'Filename='+encodeURIComponent(Filename);
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){

          response.innerHTML="Registered";
        }
      }
      xmlhttp.open("POST","FileRegistration.php",true);
            //Must add this request header to XMLHttpRequest request for POST
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      
      xmlhttp.send(data);
  }
</script>
</body>
</html>
