<?php 
require_once "config.php"; 
require_once "funcconstatic.php"; 
require_once "checkiffromup.php";
?>

<?php 

ShowHead();

?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- here is the  -->
   <?php supersidebar('UserMange','Add');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">

	
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         

          
        </div>
        <div class="box-body">
          <form class="form-horizontal" action = "SuAdminPUserMngddDB.php" method = "POST">
              <div class="box-body">
  
			  <?php
				if (isset($_GET['RID']))
				{
					messagedisplaying('تم اضافة المستخدم',4);
				}
				?>
                <div class="form-group">
                  

                  <div class="col-sm-10">
                    <input type="text" required name = "MemberName" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
              <label for="inputEmail3" class="col-sm-2 control-label">اسم المستخدم</label>
                </div>
                <div class="form-group">
                  

                  <div class="col-sm-10">
                    <input type="password" required name = "MemberPassword" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
              <label for="inputPassword3" class="col-sm-2 control-label">كلمة المرور</label>
                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">اعادة الكتابه</button>
                <button type="submit" class="btn btn-info pull-right">اضافة</button>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  ShowFoot();
  ?>