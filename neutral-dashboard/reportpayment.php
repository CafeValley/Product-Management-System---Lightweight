<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active29 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة التقارير</h1>
	   <p class="text-gray-600 text-lg">تقرير الدفعيات </p>
    </header>

       <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

      <!-- Default box -->
      <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-4 border-b border-gray-200">
          <div class="p-0">
            <form class="space-y-4" action="reportpayment.php" method="POST">
             
                <div class="space-y-4">

                  <?php
                  $where = " ";
                  if (isset($_POST['sourceofcash'])) {
                    $sourceofcash = $_POST['sourceofcash'];
                    if ($sourceofcash == "كل")
                      $where = " ";
                    else
                      $where = "where `accountroot` ='$sourceofcash'";
                  }
                  ?>

               

                      <div class="space-y-4">
					    <label for="Statetypo" class="block text-gray-700 font-medium">مصدر الحساب</label>
                        <select name="sourceofcash" id="Statetypo" class="w-full border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
						
                          <?php
                          print_r($_POST);
                          if (isset($_POST['sourceofcash'])) {
                            $sourceofcash = $_POST['sourceofcash'];
                            if ($sourceofcash == "كل") {
                              $where = " ";
                          ?>
                              <option selected value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            } else
                              $where = "where `accountroot` ='$sourceofcash'";
                            if ($sourceofcash == "خزنه") {
                              //
                              $where = "where `accountroot` ='خزنه' or `accountroot` ='سلفية' or `accountroot` ='رواتب' or `accountroot` ='مبيعات' or `accountroot` ='منصرفات'  or `accountroot` ='محطة الوقود' or `accountroot` ='العربات' or  `accountroot` = 'profits' or `accountroot` = 'externalloan' ";
                            }

                            if ($sourceofcash == "زبون") {
                            ?>
                              <option value="كل">كل</option>
                              <option selected value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "profits") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option selected value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "externalloan") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option selected value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "مبيعات") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option selected value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }

                            if ($sourceofcash == "منصرفات") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option selected value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "سلفية") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option selected value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "العربات") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option selected value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "محطة الوقود") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option selected value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "خزنه") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option selected value="خزنه">خزنه</option>
                            <?php
                            }
                            if ($sourceofcash == "رواتب") {
                            ?>
                              <option value="كل">كل</option>
                              <option value="زبون">زبون</option>
                              <option selected value="رواتب">رواتب</option>
                              <option value="منصرفات">منصرفات</option>
                              <option value="profits">ارباح</option>
                              <option value="سلفية">سلفية</option>
                              <option value="externalloan">سلفيات خارجية</option>
                              <option value="مبيعات">مبيعات</option>
                              <option value="العربات">العربات</option>
                              <option value="محطة الوقود">محطة الوقود</option>
                              <option value="خزنه">خزنه</option>
                            <?php
                            }
                          } else {
                            ?>
                            <option value="كل">كل</option>
                            <option value="زبون">زبون</option>
                            <option value="رواتب">رواتب</option>
                            <option value="منصرفات">منصرفات</option>
                            <option value="profits">ارباح</option>
                            <option value="سلفية">سلفية</option>
                            <option value="externalloan">سلفيات خارجية</option>
                            <option value="مبيعات">مبيعات</option>
                            <option value="العربات">العربات</option>
                            <option value="محطة الوقود">محطة الوقود</option>
                            <option value="خزنه">خزنه</option>
                          <?php
                          }

                          ?>
                        </select>

                        <?php
                        if (isset($sourceofcash)) {
                          if ($sourceofcash == "زبون" || $sourceofcash == "العربات" || $sourceofcash == "رواتب" || $sourceofcash == "منصرفات" || $sourceofcash == "سلفية" || $sourceofcash == "محطة الوقود" || $sourceofcash == "profits" || $sourceofcash == "externalloan") {
                            if ($sourceofcash == "زبون")
                              datalistforpaymentcus();
                            if ($sourceofcash == "العربات")
                              datalistforpaymentCars();
                            if ($sourceofcash == "رواتب")
                              datalistforpaymentSalarys();
                            if ($sourceofcash == "منصرفات")
                              datalistforpaymentExpences();
                            if ($sourceofcash == "سلفية")
                              datalistforpaymentLoens();
                            if ($sourceofcash == "محطة الوقود")
                              datalistforpaymentGasStation();
                            if ($sourceofcash == "profits")
                              datalistforpaymentprofit();
                            if ($sourceofcash == "externalloan")
                              datalistforpaymentexloans();
                        ?>
                            <div class="mb-4">
                              <div class="w-full">
                                <input name="nameofcusin" type="text" value="<?php if (isset($_POST['nameofcusin'])) {
                                                                                echo $_POST['nameofcusin'];
                                                                              } ?>" list="accountname" class="block w-full rounded-md border border-gray-300 p-2" />
                              </div>

                              <?php
                              if ($sourceofcash == "زبون")
                                echo "تخصيص الزبون";
                              if ($sourceofcash == "العربات")
                                echo "تخصيص العربات";
                              if ($sourceofcash == "رواتب")
                                echo "تخصيص رواتب";
                              if ($sourceofcash == "منصرفات")
                                echo "تخصيص منصرفات";
                              if ($sourceofcash == "سلفية")
                                echo "تخصيص سلفية";
                              if ($sourceofcash == "محطة الوقود")
                                echo "تخصيص محطة الوقود";
                              if ($sourceofcash == "حصادة")
                                echo "تخصيص حصادة";
                              if ($sourceofcash == "profits")
                                echo "تخصيص الارباح";
                              if ($sourceofcash == "externalloan")
                                echo "تخصيص السلفيات الخارجيه";
                              ?>
                            </div>
                        <?php

                          }
                        }


                        $_POST['Day']  = isset($_POST['Day']) ? $_POST['Day'] : '';
                        $_POST['Month'] = isset($_POST['Month']) ? $_POST['Month'] : '';
                        $_POST['Year']  = isset($_POST['Year']) ? $_POST['Year'] : '';

                        $_POST['Day2nd']  = isset($_POST['Day2nd']) ? $_POST['Day2nd'] : '';
                        $_POST['Month2nd'] = isset($_POST['Month2nd']) ? $_POST['Month2nd'] : '';
                        $_POST['Year2nd']  = isset($_POST['Year2nd']) ? $_POST['Year2nd'] : '';

                        $before   = changedateformate(Eatdayformat($_POST['Day'], $_POST['Month'], $_POST['Year']));
                        $after    = changedateformate(Eatdayformat($_POST['Day2nd'], $_POST['Month2nd'], $_POST['Year2nd']));
                        //
                        if ($before == "Year-0-0Day" || $after == "Year-0-0Day" || $after == "-0-0" || $before == "-0-0" || $before == "Year-0-Day" || $after == "Year-0-Day") {
                          echo "";
                          $wherecus = " ";
                          $whereman = " ";
                        } else {
                          if ($where == " ")
                            $where = "where date(accountdate) between  '$before' and '$after' ";
                          else {
                            $where = $where . "and date(accountdate) between  '$before' and '$after' ";
                            if ($sourceofcash == "خزنه") {
                              $wherecus = "and date(accountdate) between  '$before' and '$after' ";
                              $whereman = "and date(manfdate) between  '$before' and '$after' ";
                            }
                          }
                          //if ($where == )
                        }

                        ?>
                      </div>
                    
                    </div>

                  <?php

                  list($beofreyear, $beofremonth, $beofreday) = explode("-", $before);
                  if (isset($beofreyear))
                    DisplaySelectedDate("من", $beofreday, $beofremonth, $beofreyear);
                  else
                    DisplayDate("من");

                  list($afteryear, $aftermonth, $afterday) = explode("-", $after);
                  if (isset($afteryear))
                    DisplaySelectedDate2nd("الي", $afterday, $aftermonth, $afteryear);
                  else
                    DisplayDate2nd("الي"); ?>
                </div>
                <input type="submit" name="dateprested" class="bg-blue-600 text-white px-4 py-2 rounded" value="بحث" />

            </form>
			 <div id="printableArea" class="space-y-4" style="font-family:'Droid Arabic Naskh', serif;">
            <!-- /.box-header -->
            <div class="p-4">
              <table id="example2" class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <div class="text-center my-4">
                  <div class="text-3xl font-bold text-black"><?php echo $company_name; ?></div>
                <p class="text-gray-800 font-bold text-black"> تقرير الدفعيات    </p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="px-4 py-2 border text-right">الرقم</th>
                    <th class="px-4 py-2 border text-right">اسم العميل</th>
                    <th class="px-4 py-2 border text-right">مصدر الحساب</th>
                    <th class="px-4 py-2 border text-right">طريقة الدفع</th>
                    <th class="px-4 py-2 border text-right">المقدار</th>
                    <th class="px-4 py-2 border text-right">حركة المال</th>
                    <th class="px-4 py-2 border text-right">التاريخ</th>
                    <th class="px-4 py-2 border text-right">ملحوظه</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  <?php

                  //print_r($_POST);
                  if (isset($_POST['nameofcusin'])) {
                    if ($_POST['nameofcusin'] != '') {
                      $namepfcus = $_POST['nameofcusin'];
                      $where = $where . " and `accountname` = '$namepfcus'";
                    }
                  }

                  $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` $where order by accountname";
                  $resultproudact = mysqli_query($link, $sqltogettheereport);
                  $countx = 1;
                  $total23 = 0;
                  $total12 = 0;
                  while ($rowproduct   = mysqli_fetch_array($resultproudact)) {
                    $idvar            = $rowproduct['id'];
                    $accountnamevar   = $rowproduct['accountname'];
                    $accountrootvar   = $rowproduct['accountroot'];
                    $methodvar        = $rowproduct['method'];
                    $accountdescvar   = $rowproduct['accountdesc'];
                    $accountamountvar = $rowproduct['accountamount'];
                    $inoroutvar       = $rowproduct['inorout'];
                    $accountdatevar   = $rowproduct['accountdate'];
                    list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);

                    if ($inoroutvar == '23') {
                      $total23 += $accountamountvar;
                    }
                    if ($inoroutvar == '12') {
                      $total12 += $accountamountvar;
                    }
                  ?>
                    <tr>
                      <td class="px-4 py-2 border text-right"><?php echo $countx; ?>.</td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountnamevar; ?></td>
                      <?php
                      if ($accountrootvar == 'profits')
                        $accountrootvar = 'ارباح';

                      if ($accountrootvar == 'externalloan')
                        $accountrootvar = 'سلفيات خارجية';

                      ?>
                      <td class="px-4 py-2 border text-right"><?php echo $accountrootvar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $methodvar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo number_format($accountamountvar, 0); ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo naminginorout($inoroutvar); ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdatevar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdescvar; ?></td>
                      <?php
                      $countx += 1;
                    }
                    if (!isset($_POST['sourceofcash'])) {
                      $sourceofcash = "";
                    }
                    if ($sourceofcash == "خزنه") {
                      $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` where `accountroot` ='زبون' and `inorout` = '12' $wherecus  order by accountname";
                      $resultproudact = mysqli_query($link, $sqltogettheereport);


                      while ($rowproduct   = mysqli_fetch_array($resultproudact)) {
                        $idvar            = $rowproduct['id'];
                        $accountnamevar   = $rowproduct['accountname'];
                        $accountrootvar   = $rowproduct['accountroot'];
                        $methodvar        = $rowproduct['method'];
                        $accountdescvar   = $rowproduct['accountdesc'];
                        $accountamountvar = $rowproduct['accountamount'];
                        $inoroutvar       = $rowproduct['inorout'];
                        $accountdatevar   = $rowproduct['accountdate'];
                        list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);

                        if ($inoroutvar == '23') {
                          $total23 += $accountamountvar;
                        }
                        if ($inoroutvar == '12') {
                          $total12 += $accountamountvar;
                        }
                      ?>
                    <tr>
                      <td class="px-4 py-2 border text-right"><?php echo $countx; ?>.</td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountnamevar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountrootvar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $methodvar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo number_format($accountamountvar, 0); ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo naminginorout($inoroutvar); ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdatevar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdescvar; ?></td>
                    <?php
                        $countx += 1;
                      }

                      $sqltogettheereportinman = "SELECT `id`, `manfname`, `manfamount`, `inorout`, date(`manfdate`) as manfdate, date(`manfdate2nd`) as manfdate2nd, `note` FROM `manfacdelaypayment` where inorout = '12' $whereman order by manfdate";
                      $resultproudactinman = mysqli_query($link, $sqltogettheereportinman);

                      while ($rowproductinman   = mysqli_fetch_array($resultproudactinman)) {
                        $idvar            = $rowproductinman['id'];
                        $accountnamevar   = $rowproductinman['manfname'];

                        $accountdescvar   = $rowproductinman['note'];
                        $accountamountvar = $rowproductinman['manfamount'];
                        $inoroutvar       = $rowproductinman['inorout'];
                        $accountdatevar   = $rowproductinman['manfdate'];
                        if ($inoroutvar == '12') {
                          $total23 += $accountamountvar;
                        }
                        if ($inoroutvar == '23') {
                          $total12 += $accountamountvar;
                        }
                    ?>
                    <tr>
                      <td class="px-4 py-2 border text-right"><?php echo $countx; ?>.</td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountnamevar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo "سداد لمورد"; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo "-"; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountamountvar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo naminginoroutman($inoroutvar); ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdatevar; ?></td>
                      <td class="px-4 py-2 border text-right"><?php echo $accountdescvar; ?></td>
                    </tr>
                <?php
                        $countx++;
                      }
                    }
                ?>
                </tbody> 
              </table>

              <table class="min-w-full border border-gray-300 mt-4">
                  <tr class="bg-gray-200 font-semibold">
				  <td class="border border-gray-300 px-4 py-2">اجمالي الايداع</td>
                  <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total12, 0); ?></td>
                  <td class="border border-gray-300 px-4 py-2">اجمالي السحب</td>
                  <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total23, 0); ?></td>
                  <td class="border border-gray-300 px-4 py-2">اجمالي الخزنه</td>
                  <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total12 - $total23, 0); ?></td>
                </tr>
              </table>
             
        </div>
        </div>

     <div class="p-4">
     <button 
	type="button" 
	onclick="printDiv('printableArea')"
    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
    </div>
    </section>
	 
 