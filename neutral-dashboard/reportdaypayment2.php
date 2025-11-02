<?php
require_once "config.php";
require_once "funcconstatic.php";
require_once "checkiffromup.php"; 
?>

<?php

ShowHead("تقرير الدفعيات اليومي");

?>
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <!-- here is the  -->
   <?php supersidebar('Proreport','paymentday2');?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        صفحة التقارير
        <small>تقرير الدفعيات اليومي</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <div class="box-body">
           <form class="form-horizontal" action = "reportdaypayment2.php" method = "POST">
		   <div id="printableArea" class="box-body" style="font-family:'Droid Arabic Naskh', serif;">
              <div class="box-body">

                <?php
              $where = "where date(accountdate) = '$today'";
                if (isset($_POST['sourceofcash']))
                {
                $sourceofcash = $_POST['sourceofcash'];
                if ($sourceofcash == "كل")
                  $where = $where." ";
                else
                  $where = $where." and `accountroot` ='$sourceofcash'";
                }
                ?>

			   <div class="box">
			        <div class="form-group">

                 <div class="col-sm-10">
                <select name = "sourceofcash" id="Statetypo" class = "form-control">

                  <?php
                  if (isset($_POST['sourceofcash']))
                {
                $sourceofcash = $_POST['sourceofcash'];
                if ($sourceofcash == "كل")
                {
                  $where = $where."";
                ?>
                  <option selected value="كل">كل</option>
                  <option value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
								  <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
                  <?php
                }
                  else
                  $where =  $where." and `accountroot` ='$sourceofcash'";
                if ($sourceofcash == "خزنه")
                {
                  //
                  $where = "where (`accountroot` ='خزنه' or `accountroot` ='سلفية' or `accountroot` ='رواتب' or `accountroot` ='مبيعات' or `accountroot` ='منصرفات' or  `accountroot` = 'profits' or `accountroot` = 'externalloan')  ";
                }

                    if ($sourceofcash == "زبون")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option selected value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                  <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
                  <?php
                }
                if ($sourceofcash == "profits")
            {
                  ?>
              <option  value="كل">كل</option>
              <option  value="زبون">زبون</option>
              <option value="رواتب">رواتب</option>
              <option value="منصرفات">منصرفات</option>
              <option selected value="profits">ارباح</option>
              <option value="سلفية">سلفية</option>
              <option value="externalloan">سلفيات خارجية</option>
              <option value="مبيعات">مبيعات</option>
              <option value="خزنه">خزنه</option>
              <?php
            }
            if ($sourceofcash == "externalloan")
        {
              ?>
          <option  value="كل">كل</option>
          <option  value="زبون">زبون</option>
          <option value="رواتب">رواتب</option>
          <option value="منصرفات">منصرفات</option>
          <option value="profits">ارباح</option>
          <option value="سلفية">سلفية</option>
          <option selected value="externalloan">سلفيات خارجية</option>
          <option value="مبيعات">مبيعات</option>
          <option value="خزنه">خزنه</option>
          <?php
        }
                    if ($sourceofcash == "مبيعات")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option  value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                  <option selected value="مبيعات">مبيعات</option>
				 <option value="خزنه">خزنه</option>
                  <?php
                }

                    if ($sourceofcash == "منصرفات")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option  value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option selected value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                    <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
                  <?php
                }
                     if ($sourceofcash == "سلفية")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option  value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option  value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option selected value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                  <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
                  <?php
                }
              
                   
                    if ($sourceofcash == "خزنه")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option  value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                    <option value="مبيعات">مبيعات</option>
								  <option selected value="خزنه">خزنه</option>
                  <?php
                }
                    if ($sourceofcash == "رواتب")
                {
                      ?>
                  <option  value="كل">كل</option>
                  <option  value="زبون">زبون</option>
                  <option selected value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                    <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
                  <?php
                }


                  }
                  else
                  {
                  ?>
                  <option value="كل">كل</option>
                  <option value="زبون">زبون</option>
                  <option value="رواتب">رواتب</option>
                  <option value="منصرفات">منصرفات</option>
                  <option value="profits">ارباح</option>
                  <option value="سلفية">سلفية</option>
                  <option value="externalloan">سلفيات خارجية</option>
                  <option value="مبيعات">مبيعات</option>
								  <option value="خزنه">خزنه</option>
               <?php
                  }

                  ?>
                   </select>

                   <?php
                if ($sourceofcash == "زبون"|| $sourceofcash == "رواتب" || $sourceofcash == "منصرفات" || $sourceofcash == "سلفية" || $sourceofcash == "profits" || $sourceofcash == "externalloan" )
                {
                     if ($sourceofcash == "زبون")
                       datalistforpaymentcus();
                     if ($sourceofcash == "رواتب")
                       datalistforpaymentSalarys();
                     if ($sourceofcash == "منصرفات")
                       datalistforpaymentExpences();
                     if ($sourceofcash == "سلفية")
                       datalistforpaymentLoens();
                     if ($sourceofcash == "profits")
                       datalistforpaymentprofit();
                     if ($sourceofcash == "externalloan")
                       datalistforpaymentexloans();

                   ?>
                   <div class="form-group">

                 <div class="col-sm-10">

                   <input name="nameofcusin" type="text" value = "<?php if (isset($_POST['nameofcusin']))
{
  echo $_POST['nameofcusin'];
} ?>" list="accountname" class="form-control"/>


                     </div>

                    <?php
                     if($sourceofcash == "زبون")
                       echo "تخصيص الزبون";
                     if($sourceofcash == "رواتب")
                       echo "تخصيص رواتب";
                     if($sourceofcash == "منصرفات")
                       echo "تخصيص منصرفات";
                     if($sourceofcash == "سلفية")
                       echo "تخصيص سلفية";
                     if($sourceofcash == "profits")
                       echo "تخصيص الارباح";
                     if($sourceofcash == "externalloan")
                       echo "تخصيص السلفيات الخارجيه";
                     ?>
                   </div>
                   <?php

                   }


                  //


                   if ($where == " ")
                     $where = "where date(accountdate) ='$today'";
                   else
                   {
                     $where = $where."and date(accountdate) ='$today'";
                     if ($sourceofcash == "خزنه")
                     {
                     $wherecus = "and date(accountdate) ='$today'";
                     $whereman = "and date(manfdate) ='$today'";
                     }
                     }
                     //if ($where == )


                   ?>
					</div>
               <label for="inputEmail3" class="col-sm-2 control-label">مصدر الحساب</label>
                </div>

        </div>



            </div>

 <input type="submit" name="dateprested" class="btn btn-primary"  value="بحث"/>

			</form>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

                  <center>
                <font size="7"  color="black"> <?php echo $company_name; ?> </font>
                 </center>
                <thead>
                <tr>
                  <th>الرقم</th>
                  <th>اسم العميل</th>
                  <th>مصدر الحساب</th>
                  <th>طريقة الدفع</th>
                  <th>المقدار</th>
                  <th>حركة المال</th>
                  <th>التاريخ</th>
                  <th>ملحوظه</th>
                </tr>
                </thead>
                <tbody>

				<?php
            //print_r($_POST);
                  if(isset($_POST['nameofcusin']))

                    {
                      if ($_POST['nameofcusin'] != '')
                      {
                    $namepfcus = $_POST['nameofcusin'];
                    $where = $where." and `accountname` = '$namepfcus'";
                  }
                  }

                   $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` $where order by accountname";
                  $resultproudact = mysqli_query($link, $sqltogettheereport);
                  $countx = 1;
                  $total23 = 0;
                  $total12 = 0;
                  while ($rowproduct   = mysqli_fetch_array($resultproudact))
                    {
                      $idvar            = $rowproduct['id'];
                      $accountnamevar   = $rowproduct['accountname'];
                      $accountrootvar   = $rowproduct['accountroot'];
                      $methodvar        = $rowproduct['method'];
                      $accountdescvar   = $rowproduct['accountdesc'];
                      $accountamountvar = $rowproduct['accountamount'];
                      $inoroutvar       = $rowproduct['inorout'];
                      $accountdatevar   = $rowproduct['accountdate'];
                      list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);

                    if ($inoroutvar == '23')
                    {
                      $total23 += $accountamountvar;
                    }
                    if ($inoroutvar == '12')
                    {
                      $total12 += $accountamountvar;
                    }
                  ?>
                  <tr>
                    <td><?php echo $countx;?>.</td>
                    <td><?php echo $accountnamevar;?></td>
                    <?php
                    if ($accountrootvar == 'profits')
                      $accountrootvar = 'ارباح';

                    if ($accountrootvar == 'externalloan')
                      $accountrootvar = 'سلفيات خارجية';

                     ?>
                    <td><?php echo $accountrootvar;?></td>
                    <td><?php echo $methodvar;?></td>
                    <td><?php echo number_format($accountamountvar,0);?></td>
                    <td><?php echo naminginorout($inoroutvar);?></td>
                    <td><?php echo $accountdatevar;?></td>
                    <td><?php echo $accountdescvar;?></td>
                    <?php
                      $countx += 1;
                    }
                  if ($sourceofcash == "خزنه")
                {
                    $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` where `accountroot` ='زبون' and `inorout` = '12' $wherecus  order by accountname";
                  $resultproudact = mysqli_query($link, $sqltogettheereport);


                  while ($rowproduct   = mysqli_fetch_array($resultproudact))
                    {
                      $idvar            = $rowproduct['id'];
                      $accountnamevar   = $rowproduct['accountname'];
                      $accountrootvar   = $rowproduct['accountroot'];
                      $methodvar        = $rowproduct['method'];
                      $accountdescvar   = $rowproduct['accountdesc'];
                      $accountamountvar = $rowproduct['accountamount'];
                      $inoroutvar       = $rowproduct['inorout'];
                      $accountdatevar   = $rowproduct['accountdate'];
                      list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);

                    if ($inoroutvar == '23')
                    {
                      $total23 += $accountamountvar;
                    }
                    if ($inoroutvar == '12')
                    {
                      $total12 += $accountamountvar;
                    }
                  ?>
                  <tr>
                    <td><?php echo $countx;?>.</td>
                    <td><?php echo $accountnamevar;?></td>
                    <td><?php echo $accountrootvar;?></td>
                    <td><?php echo $methodvar;?></td>
                    <td><?php echo number_format($accountamountvar,0);?></td>
                    <td><?php echo naminginorout($inoroutvar);?></td>
                    <td><?php echo $accountdatevar;?></td>
                    <td><?php echo $accountdescvar;?></td>
                    <?php
                      $countx += 1;
                    }
                    //or `accountroot` ='زبون'


                  $sqltogettheereportinman = "SELECT `id`, `manfname`, `manfamount`, `inorout`, date(`manfdate`) as manfdate, date(`manfdate2nd`) as manfdate2nd, `note` FROM `manfacdelaypayment` where inorout = '12' $whereman order by manfdate";
                  $resultproudactinman = mysqli_query($link, $sqltogettheereportinman);

                  while ($rowproductinman   = mysqli_fetch_array($resultproudactinman))
                  {
                    $idvar            = $rowproductinman['id'];
                    $accountnamevar   = $rowproductinman['manfname'];
                    $accountrootvar   = $rowproductinman['accountroot'];
                    $methodvar        = $rowproductinman['method'];
                    $accountdescvar   = $rowproductinman['note'];
                    $accountamountvar = $rowproductinman['manfamount'];
                    $inoroutvar       = $rowproductinman['inorout'];
                    $accountdatevar   = $rowproductinman['manfdate'];
                    if ($inoroutvar == '12')
                    {
                      $total23 += $accountamountvar;
                    }
                    if ($inoroutvar == '23')
                    {
                      $total12 += $accountamountvar;
                    }
                  ?>
                  <tr>
                    <td><?php echo $countx;?>.</td>
                    <td><?php echo $accountnamevar;?></td>
                    <td><?php echo "سداد لمورد";?></td>
                    <td><?php echo "-";?></td>
                    <td><?php echo $accountamountvar;?></td>
                    <td><?php echo naminginoroutman($inoroutvar);?></td>
                    <td><?php echo $accountdatevar;?></td>
                    <td><?php echo $accountdescvar;?></td>
                  </tr>
                  <?php
                    $countx++;
                  }

                  }
                    ?>
                </tbody>
              </table>
              <table class="table table-bordered table-hover">
                <tr>
                  <td>اجمالي السحب</td>
                  <td><?php echo number_format($total23, 0); ?></td>
                  <td>اجمالي الايداع</td>
                  <td><?php echo number_format($total12, 0); ?></td>
                  <td>اجمالي الخزنه</td>
                  <td><?php echo number_format($total12-$total23, 0); ?></td>

                  </tr>
                </table>
              <div class="box-footer">

              </div>
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
         <button type="submit" onclick="printDiv('printableArea')" class="btn btn-default">طباعة</button>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  ShowFoot();
  ?>
