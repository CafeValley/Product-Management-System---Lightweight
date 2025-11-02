<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active31 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<!-- =============================================== -->

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة التقارير</h1>
	  <p class="text-gray-600 text-lg"> تقرير ارباح المبيعات    </p>
    </header>

	  <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6 mb-8">
      <div class="mb-4">
        <!-- Empty box-header -->
      </div>

      <?php
      if (isset($_POST['Empty']))
        unset($_POST['proudctnameboxselect']);

      if (isset($_POST['proudctnameboxselect']) and $_POST['proudctnameboxselect'] != "") {
        $nameofcata = $_POST['proudctnameboxselect'];
        $cataid = catafromnametoid($nameofcata);
        $where = "where `cataid`= $cataid ";
      } else
        $where = " ";

   $day1 = isset($_POST['Day']) ? $_POST['Day'] : '1';
$month1 = isset($_POST['Month']) ? $_POST['Month'] : '1';
$year1 = isset($_POST['Year']) ? $_POST['Year'] : date('Y');

$day2 = isset($_POST['Day2nd']) ? $_POST['Day2nd'] : date('d');
$month2 = isset($_POST['Month2nd']) ? $_POST['Month2nd'] : date('m');
$year2 = isset($_POST['Year2nd']) ? $_POST['Year2nd'] : date('Y');

$before = changedateformate(Eatdayformat($day1, $month1, $year1));
$after = changedateformate(Eatdayformat($day2, $month2, $year2));

      if ($before == "Year-0-0Day" || $after == "Year-0-0Day" || $after == "-0-0" || $before == "-0-0") {
        $sqlordersql = "SELECT `orderid` FROM `orderdisanddate`  ";
      } else
        $sqlordersql = "SELECT `orderid` FROM `orderdisanddate` WHERE date(`orderdate`) between '$before' and '$after' ";

      $resultordersql = mysqli_query($link, $sqlordersql);
      $wheretest = "orderno in (";
      $coma = 0;
      while ($rowordersql = mysqli_fetch_array($resultordersql)) {
        if ($coma != 0) {
          $wheretest .= ", ";
        }
        $ordersetin = $rowordersql['orderid'];
        $wheretest .= "$ordersetin";
        $coma++;
      }
      $wheretest .= ") ";

      if ($before != "Year-0-0Day" && $after != "Year-0-0Day" && $after != "-0-0" && $before != "-0-0") {
        if ($where == " ")
          $where = "where $wheretest ";
        else
          $where = $where . " and $wheretest";
      }
      ?>
 
      <form method='POST' action="reportsoldprofits.php" class="space-y-4">
        <div class="flex flex-wrap items-center gap-4">
          <div class="flex flex-col w-full md:w-1/3">
            صف المنتج
            <input name="proudctnameboxselect" type="text" value="<?php if (isset($_POST['proudctnameboxselect'])) {
            echo $_POST['proudctnameboxselect'];
             } ?>" list="cars2" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="صف المنتج" />
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
              DisplayDate2nd("الي");
            ?>
          </div>

          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">بحث</button>
          <button type="submit" name="Empty" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded shadow">عرض الكل</button>
          <?php listofcatanamebox(); ?>
        </div>
      </form>

       <div id="printableArea"  class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
	  <div class="text-center py-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		 <p class="text-gray-800 font-bold text-black">تقرير ارباح المبيعات   </p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">
        <table class="min-w-full table-auto border-collapse border border-gray-300 text-right">
          <thead class="bg-gray-200">
            <tr>
              <th class="border border-gray-300 px-4 py-2">الرقم</th>
              <th class="border border-gray-300 px-4 py-2">اسم المنتج</th>
              <th class="border border-gray-300 px-4 py-2">صنف المنتج</th>
              <th class="border border-gray-300 px-4 py-2">كمية المنتج</th>
              <th class="border border-gray-300 px-4 py-2">ارباح الوحده</th>
              <th class="border border-gray-300 px-4 py-2">مجموعة الارباح</th>
              <th class="border border-gray-300 px-4 py-2">التاريخ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqltoshowreport = "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` $where ";
            $resultfromssqlreport = mysqli_query($link, $sqltoshowreport);
            $countx = 1;
            $total = 0;
            $total23 = 0;
            $total12 = 0;
            while ($rowfromsqlreport = mysqli_fetch_array($resultfromssqlreport)) {

              $idp = $rowfromsqlreport['idprod'];
              $pname = getproductnamefromid($idp);
              $cataid = $rowfromsqlreport['cataid'];
              $cataname = catafromidtoname($cataid);
              $pricesold = $rowfromsqlreport['pricesold'];
              $quntity = $rowfromsqlreport['quntity'];
              $orderno = $rowfromsqlreport['orderno'];
              $oldboughtprice = getboughtprice($pricesold, $idp, $cataid);
              $prfitorlost = $pricesold - $oldboughtprice;

              echo "<tr class='even:bg-gray-50 odd:bg-white'>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $countx . "</td>";
              $countx++;
              echo "<td class='border border-gray-300 px-4 py-2'>" . $pname . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $cataname . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $quntity . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $prfitorlost . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . number_format($prfitorlost * $quntity, 0) . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . getdatefromorderid($orderno) . "</td>";

              $total += $prfitorlost * $quntity;
            }

            $sqltogettheereportin = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` where  `accountroot` = 'profits'  order by accountname";
            $resultfromssqlreportin = mysqli_query($link, $sqltogettheereportin);
            while ($rowproduct = mysqli_fetch_array($resultfromssqlreportin)) {
              $idvar = $rowproduct['id'];
              $accountnamevar = $rowproduct['accountname'];
              $accountrootvar = $rowproduct['accountroot'];
              $methodvar = $rowproduct['method'];
              $accountdescvar = $rowproduct['accountdesc'];
              $accountamountvar = $rowproduct['accountamount'];
              $inoroutvar = $rowproduct['inorout'];
              $accountdatevar = $rowproduct['accountdate'];
              list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);

              echo "<tr class='even:bg-gray-50 odd:bg-white'>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $countx . "</td>";
              $countx++;
              echo "<td class='border border-gray-300 px-4 py-2'>" . $accountnamevar . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'></td>";
              echo "<td class='border border-gray-300 px-4 py-2'></td>";

              if ($inoroutvar == '23') {
                $total23 += $accountamountvar;
                echo "<td class='border border-gray-300 px-4 py-2'> - </td>";
              }

              if ($inoroutvar == '12' or $inoroutvar == '93') {
                $total12 += $accountamountvar;
                echo "<td class='border border-gray-300 px-4 py-2'> + </td>";
              }

              echo "<td class='border border-gray-300 px-4 py-2'>" . number_format($accountamountvar, 0) . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $accountdatevar . "</td>";
            }
            ?>
            <tr class="font-bold bg-gray-100">
              <td class="border border-gray-300 px-4 py-2">اجمالي</td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total, 0); ?></td>
              <td class="border border-gray-300 px-4 py-2"></td>
            </tr>
            <tr class="font-bold bg-gray-100">
              <td class="border border-gray-300 px-4 py-2">الاجمالي بعد</td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <?php $totalafterde = $total + $total12 - $total23; ?>
              <td class="border border-gray-300 px-4 py-2"><?php echo number_format($totalafterde, 0); ?></td>
              <td class="border border-gray-300 px-4 py-2"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mt-4">
       <button type="submit" onclick="printDiv('printableArea')"
      class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button> </div>

    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>
