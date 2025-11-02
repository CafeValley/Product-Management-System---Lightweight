<?php 
require_once "config.php"; 
require_once "funcconstatic.php"; 
require_once "checkiffromup.php";
?>

<?php 

ShowHead("الدفعيات");


?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- here is the  -->
   <?php supersidebar('propay','Add');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        صفحة الدفعيات
        <small>اضافة</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

	
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
         

          
        </div>
        <div class="box-body">
          <form class="form-horizontal" action = "dbproductpayment2.php" method = "POST">
              <div class="box-body">
  
			  <?php
				if (isset($_GET['RID']))
				{
					messagedisplaying('تم ادخال البيانات بنجاج',4);;
				}

				?>
                
				<div class="form-group">
                <div class="col-sm-10">
                <input type="text" required name = "accountname" class="form-control" id="Id" placeholder="اسم العميل">
                  </div>
				     <label for="inputEmail3" class="col-sm-2 control-label">اسم العميل</label>
                </div>

				


                <div class="form-group">
			
              
                 <div class="col-sm-10">
<?php listofpaymenttypes();?>					</div>			
          <label for="inputEmail3" class="col-sm-2 control-label">مصدر الحساب</label> 
                </div>
            
                       
                <div class="form-group">
				 <div class="col-sm-10">
                    <input type="text" required name = "amountpayed" class="form-control" id="inputEmail3" placeholder="المقدار">
                  </div>
				   <label for="inputEmail3" class="col-sm-2 control-label">المقدار</label>
                </div>

                <div class="form-group">
      
                  <div class="col-sm-10">
                    <select name = "typepayment" id="typepayment" class = "form-control">
                  <option value="كاش">كاش</option>
                  <option value="شيك">شيك</option>
                                </select>
                    
                </div>
<label for="inputEmail3" class="col-sm-2 control-label">طريقة الدفع</label> 
                  </div>
                <div class="form-group">

                  <div class="col-sm-10">
                    <input type="text" name = "note" class="form-control" id="inputEmail3" placeholder="ملحوظة ">
                  </div>
				      <label for="inputEmail3" class="col-sm-2 control-label">ملحوظة </label>
                </div>
                <?php DisplayDate("التاريخ"); ?>
            </div>
              
              <div class="form-group">
             
             <div class="col-sm-10">
             <input type="radio" name="inotout" value="23"> سحب
                            
             <input type="radio" name="inotout" value="12"> ايداع
             </div>
         <label for="inputEmail3" class="col-sm-2 control-label">حركة المال</label>
           </div>
         

         
              
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">الغاء</button>
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