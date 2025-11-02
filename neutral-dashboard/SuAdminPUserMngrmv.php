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
  
 <?php supersidebar('UserMange','Remove');?>
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
				if (isset($_POST['D']))
				{
					$Memberid   = $_POST['memberid'];
					
					$querydelete = "delete from `members` WHERE `M_id` = $Memberid";
					mysqli_query ($link , $querydelete);
					messagedisplaying('تم حذف المستخدم',1);
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
						<form action = "SuAdminPUserMngrmv.php" method = "POST">
                        <tr>
                            <input type = "hidden" name = "memberid" value = "<?php echo $Memberid;?>">
                            <td><?php echo $countx;?>.</td>
							<td><?php echo $MemberName;?></td>
                            <td><?php echo $MemberPass;?></td>
							<td><?php echo $MemberType;?></td>
                            <td><?php echo $MemberLastLogin;?></td>
                            <td>
							<button name = "D" type = "submit" class = "btn btn-danger">حذف</button>
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