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
   <?php supersidebar('UserMange','EditInfo');?>
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
          
              <div class="box-body">
  
			   <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>رقم</th>
                  <th>اسم المستخدم</th>
                  <th>كلمة المرور</th>
                  <th>نوع المستخدم</th>
                  <th>اخر ظهور</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
				
				<?php
				if (isset($_POST['E']))
				{
					$Memberid   = $_POST['memberid'];
					$MemberName = $_POST['MemberName'];
					$MemberPass = $_POST['MemberPass'];
					
					
					
					$queryUpdate = "UPDATE `members` SET `M_name`='$MemberName',`M_password`='$MemberPass' 
					WHERE `M_id`=$Memberid";
					mysqli_query ($link , $queryUpdate);
					messagedisplaying('تم تعديل البيانات',3);
				}
				 $resultLMember = mysqli_query($link, "SELECT `M_id`, CONCAT(UCASE(LEFT(`M_name`, 1)), SUBSTRING(`M_name`, 2)) as M_name, `M_password`, `M_type`, `M_last_login` 
                                                    FROM `members` order by `M_type` ");
													
                    $countx = 0;
                    while ($rowMember    = mysqli_fetch_array($resultLMember))
                    {
                        $countx += 1;
                        $Memberid = $rowMember['M_id'];
						$MemberName = $rowMember['M_name'];
						$MemberPass = $rowMember['M_password'];
						$MemberType = $rowMember['M_type'];
						$MemberLastLogin = $rowMember['M_last_login'];
						?>
						<form action = "SuAdminPUserMngdtfo.php" method = "POST">
                        <tr>
                            <input type = "hidden" name = "memberid" value = "<?php echo $Memberid;?>">
                            <td><?php echo $countx;?>.</td>
							<div class="col-xs-3">
								<td> <input type="text" name = "MemberName" value = "<?php echo $MemberName;?>" class="form-control"> </td>
                            </div>
							<div class="col-xs-3">
								<td> <input type="text" name = "MemberPass" value = "<?php echo $MemberPass;?>" class="form-control"> </td>
                            </div>
							
                            <td><?php echo $MemberType;?></td>
                            <td><?php echo $MemberLastLogin;?></td>
                            <td>
							<button name = "E" type = "submit" class = "btn btn-warning">تعديل</button>
							</form>
							<?php
							}
                            ?>
               </tbody>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              
              </div>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
            
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