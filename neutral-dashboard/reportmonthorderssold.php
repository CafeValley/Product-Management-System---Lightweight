<?php
include 'config.php';
include 'header.php';
$main8 = "true";
$active34 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة التقارير الشهرية</h1>
	    <p class="text-gray-600 text-lg"> تقرير المبيعات الشهري</p>
    </header>

     <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

  <?php
  if (isset($_POST['Empty'])) unset($_POST['proudctnameboxselect']);

  if (isset($_POST['proudctnameboxselect'])) {
    $nameofcata = $_POST['proudctnameboxselect'];
    $cataid = catafromnametoid($nameofcata);
    $where = "where `cataid`= $cataid";
  } else {
    $where = " ";
  }

  $before = date('Y-m-01');
  $after = date('Y-m-t');

  $sqlordersql = "SELECT `orderid` FROM `orderdisanddate` WHERE date(orderdate) BETWEEN '$before' AND '$after'";
  $resultordersql = mysqli_query($link, $sqlordersql);

  $wheretest = "orderno in (";
  $coma = 0;
  while ($rowordersql = mysqli_fetch_array($resultordersql)) {
    if ($coma != 0) $wheretest .= " , ";
    $ordersetin = $rowordersql['orderid'];
    $wheretest .= "$ordersetin";
    $coma++;
  }
  $wheretest .= ")";

  if (!in_array($before, ["Year-0-0Day", "-0-0"]) && !in_array($after, ["Year-0-0Day", "-0-0"])) {
    $where = $where == " " ? "where $wheretest" : "$where and $wheretest";
  }
  ?>

  <form method="POST" action="reportmonthorderssold.php" class="space-y-4">
    <div class="flex-grow">
      <input name="proudctnameboxselect" type="text"
             value="<?php if (isset($_POST['proudctnameboxselect'])) echo $_POST['proudctnameboxselect']; ?>"
             list="cars2"
             class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
             placeholder="اسم الصنف" />
      <?php listofcatanamebox(); ?>
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">بحث</button>
  </form>

  <div id="printableArea" class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
    <div class="text-center py-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		 <p class="text-gray-800 font-bold text-black">  تقرير المبيعات الشهري</p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">
		
    <div class="overflow-x-auto">
      <table class="min-w-full border-collapse border border-gray-300 text-right">
      <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2">الرقم</th>
            <th class="border px-4 py-2">اسم المنتج</th>
            <th class="border px-4 py-2">صنف المنتج</th>
            <th class="border px-4 py-2">كمية المنتج</th>
            <th class="border px-4 py-2">سعر البيع</th>
            <th class="border px-4 py-2">الاجمالي</th>
            <th class="border px-4 py-2">رقم الطلب</th>
            <th class="border px-4 py-2">التاريخ</th>
          </tr>
        </thead>
        <tbody class="bg-white text-gray-800">
          <?php
          $sqltoshowreport = "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` $where";
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
            $oldboughtprice = getboughtprice($pricesold, $idp, $cataid);
            $total += number_format(gettotaloforder($orderno), 0);
            echo "<tr class='hover:bg-gray-100'>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $countx++ . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $pname . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $cataname . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . $quntity . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . number_format($pricesold, 0) . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . number_format(gettotaloforder($orderno), 0)  . "</td>";
            echo "<td class='border border-gray-300 px-4 py-2 text-blue-700 underline'>";
            echo "<a href='productorder.php?ordernofromdb={$orderno}'>" . arabic_w2e($orderno) . "</a></td>";
            echo "<td class='border border-gray-300 px-4 py-2'>" . getdatefromorderid($orderno) . "</td>";
            echo "</tr>";
          }
          ?>
          <tr class="bg-gray-100 font-bold">
            <td class="border border-gray-300 px-4 py-2">اجمالي</td>
            <td class="border border-gray-300 px-4 py-2" colspan="4"></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total, 0); ?></td>
            <td class="border border-gray-300 px-4 py-2" colspan="2"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> 

  <div class="mt-6">
    <button type="button" onclick="printDiv('printableArea')"
 class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
    </button>
  </div>
</div>


