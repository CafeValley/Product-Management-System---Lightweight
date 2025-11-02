<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active32 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">

    <!-- Page Header -->
    <header>
      <h1 class="text-3xl font-bold text-gray-800">صفحة التقارير</h1>
      <p class="text-gray-500 text-sm mt-1">تقرير المبيعات</p>
    </header>

    <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

      <?php
      if (isset($_POST['Empty'])) unset($_POST['proudctnameboxselect']);
      if (isset($_POST['proudctnameboxselect'])) {
        $nameofcata = $_POST['proudctnameboxselect'];
        $cataid = catafromnametoid($nameofcata);
        $where = "where `cataid`= $cataid ";
      } else $where = " ";

      $_POST['Day'] = $_POST['Day'] ;
      $_POST['Month'] = $_POST['Month'];
      $_POST['Year'] = $_POST['Year'] ;
      $_POST['Day2nd'] = $_POST['Day2nd'] ;
      $_POST['Month2nd'] = $_POST['Month2nd'];
      $_POST['Year2nd'] = $_POST['Year2nd'];

      $before = changedateformate(Eatdayformat($_POST['Day'], $_POST['Month'], $_POST['Year']));
      $after = changedateformate(Eatdayformat($_POST['Day2nd'], $_POST['Month2nd'], $_POST['Year2nd']));

      if ($before === '-0-0' || $after === '-0-0') {
        $whereorder = "";
      } else {
        $whereorder = "WHERE date(`orderdate`) BETWEEN '$before' AND '$after'";
      }

      $sqlordersql = "SELECT `orderid` FROM `orderdisanddate` $whereorder";
      $resultordersql = mysqli_query($link, $sqlordersql);
      $wheretest = "orderno in (";
      $coma = 0;
      while ($rowordersql = mysqli_fetch_array($resultordersql)) {
        if ($coma != 0) $wheretest .= " , ";
        $ordersetin = $rowordersql['orderid'];
        $wheretest .= "$ordersetin";
        $coma++;
      }
      $wheretest .= ") ";

      if (!in_array($before, ["Year-0-0Day", "-0-0"]) && !in_array($after, ["Year-0-0Day", "-0-0"])) {
        if ($where == " ") $where = "where $wheretest";
        else $where .= " and $wheretest";
      }
      ?>

      <!-- Filter Form -->
      <form method="POST" action="reportorderssold.php" class="space-y-4">
        <div class="flex flex-col md:flex-row items-center gap-4">
          <input
            name="proudctnameboxselect"
            type="text"
            value="<?php echo $_POST['proudctnameboxselect']; ?>"
            list="cars2"
            class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-1/3 focus:ring-2 focus:ring-blue-500"
            placeholder="صنف المنتج..." />

          <?php
          list($beofreyear, $beofremonth, $beofreday) = explode("-", $before);
          isset($beofreyear) ? DisplaySelectedDate("من", $beofreday, $beofremonth, $beofreyear) : DisplayDate("من");
          list($afteryear, $aftermonth, $afterday) = explode("-", $after);
          isset($afteryear) ? DisplaySelectedDate2nd("الي", $afterday, $aftermonth, $afteryear) : DisplayDate2nd("الي");
          ?>

          <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">بحث</button>
            <button type="submit" name="Empty" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">عرض الكل</button>
          </div>
          <?php listofcatanamebox(); ?>
        </div>
      </form>

      <!-- Report Table -->
      <div id="printableArea"  class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
	  <div class="text-center py-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		 <p class="text-gray-800 font-bold text-black"> تقرير المبيعات    </p>
      </div>

	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">
		
        <table class="min-w-full border-collapse border border-gray-300 text-right">
        <thead class="bg-gray-100">
            <tr>
              <th class="border border-gray-300 px-4 py-2">الرقم</th>
              <th class="border border-gray-300 px-4 py-2">اسم المنتج</th>
              <th class="border border-gray-300 px-4 py-2">صنف المنتج</th>
              <th class="border border-gray-300 px-4 py-2">كمية المنتج</th>
              <th class="border border-gray-300 px-4 py-2">سعر البيع</th>
              <th class="border border-gray-300 px-4 py-2">الاجمالي</th>
              <th class="border border-gray-300 px-4 py-2">رقم الطلب</th>
              <th class="border border-gray-300 px-4 py-2">التاريخ</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <?php
            $sqltoshowreport = "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` $where ";
            $resultfromssqlreport = mysqli_query($link, $sqltoshowreport);
            $countx = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($resultfromssqlreport)) {
              $idp = $row['idprod'];
              $pname = getproductnamefromid($idp);
              $cataid = $row['cataid'];
              $cataname = catafromidtoname($cataid);
              $pricesold = $row['pricesold'];
              $quntity = $row['quntity'];
              $orderno = $row['orderno'];
			  
              echo "<tr class='hover:bg-gray-50'>";
              echo "<td class='px-4 py-2 border'>{$countx}</td>";
              echo "<td class='px-4 py-2 border'>{$pname}</td>";
              echo "<td class='px-4 py-2 border'>{$cataname}</td>";
              echo "<td class='px-4 py-2 border'>{$quntity}</td>";
              echo "<td class='px-4 py-2 border'>" . number_format($pricesold, 2) . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . number_format($pricesold*$quntity , 2). "</td>";
			  
              echo "<td class='px-4 py-2 border'><a href='productorder.php?ordernofromdb={$orderno}' class='text-blue-600 hover:underline'>" . arabic_w2e($orderno) . "</a></td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . getdatefromorderid($orderno) . "</td>";
              echo "</tr>";
              $countx++; 
              if (!isset($result[$orderno])) {
                          // If it's the first time we see this order number
                          $totaldis[$orderno] = gettotaloforder($orderno);;
                        } else {
                          // If order number already exists, add to total
                          $totaldis[$orderno] += gettotaloforder($orderno);;
                        }
            }
            ?>
            <tr class="bg-gray-200 font-semibold">
              <td class="border border-gray-300 px-4 py-2">اجمالي</td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"><?php echo number_format(array_sum($totaldis), 2);?></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Print Button -->
      <button
        type="button"
        onclick="printDiv('printableArea')"
       class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        طباعة
      </button>

    </section>
  </div>
</div>