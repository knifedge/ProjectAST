<?php require_once('../Includes/db.php');
require_once('../Includes/functions.php');
require_once('../Includes/get_id.php');
require_once('../Includes/session.php');
require_once('../Includes/layout/header.php');?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/offcanvas.css" rel="stylesheet">
<?php require_once('../Includes/layout/styleheader.php');
?>

 <div class="container">  
      <div class="row row-offcanvas row-offcanvas-right"> 
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Expand</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, Welcome!</h1>
            <p>This is a website that lets to mark attendance,based on the selected department,semester,subject . </p>
          </div>
          <div class="jumbotron">
                <?php include('viewstat.php');?>
          </div>
    
      </div><!--/row-->
      <hr><?php include('../Includes/layout/statusnav.php');?>
    </div><!--/.container-->
<?php include('../Includes/layout/footer.php');?>
<?php include('../Includes/processes/markattenbackend.php');?>
