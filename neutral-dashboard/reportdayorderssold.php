<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active33 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">صفحة التقارير</h1>
      <p class="text-gray-500 text-sm mt-1">تقرير المبيعات اليومي</p>
    </header>

     <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

  <?php
  if (isset($_POST['Empty']))
    unset($_POST['proudctnameboxselect']);

  if (isset($_POST['proudctnameboxselect']) && $_POST['proudctnameboxselect'] != "") {
    $nameofcata = $_POST['proudctnameboxselect'];
    $cataid = catafromnametoid($nameofcata);
    $where = "where `cataid`= $cataid ";
  } else {
    $where = " ";
  }

  echo "<br>";
  $sqlordersql = "SELECT `orderid` FROM `orderdisanddate` WHERE date(`orderdate`) = '$today'  ";
  $resultordersql = mysqli_query($link, $sqlordersql);
  $wheretest = "orderno in (";
  $coma = 0;
  while ($rowordersql = mysqli_fetch_array($resultordersql)) {
    if ($coma != 0) {
      $wheretest .= " , ";
    }
    $ordersetin = $rowordersql['orderid'];
    $wheretest .= "$ordersetin";
    $coma++;
  }
  $wheretest .= ") ";

  if ($where == " ")
    $where = "where $wheretest ";
  else
    $where .= " and $wheretest";
  ?>

  <!-- Search Form -->
  <form method="POST" action="reportdayorderssold.php" class="space-y-4">
    <div class="flex flex-col sm:flex-row items-center gap-4">
      <input
        name="proudctnameboxselect"
        type="text"
        list="cars2"
        placeholder="صف المنتج"
        value="<?= isset($_POST['proudctnameboxselect']) ? htmlspecialchars($_POST['proudctnameboxselect']) : '' ?>"
        class="flex-grow border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
      >
        بحث
      </button>
      <?php listofcatanamebox(); ?>
    </div>
  </form>

  <!-- Report Table -->
  <div id="printableArea" class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
    <div class="text-center py-6">
      <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
    	 <p class="text-gray-800 font-bold text-black"> تقرير المبيعات اليومي   </p>
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
      <tbody>
        <?php
        $sqltoshowreport = "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` $where ";
        $resultfromssqlreport = mysqli_query($link, $sqltoshowreport);
        $countx = 1;
        $total = 0;
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
          ?>
          <tr class="<?= $countx % 2 == 0 ? 'bg-gray-50' : '' ?>">
            <td class="border border-gray-300 px-4 py-2"><?= $countx ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($pname) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($cataname) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= $quntity ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= number_format($pricesold, 2) ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= number_format($pricesold*$quntity , 2) ?></td>
            <td class="border border-gray-300 px-4 py-2">
              <a href="productorder.php?ordernofromdb=<?= $orderno ?>" class="text-blue-600 hover:underline">
                <?= arabic_w2e($orderno) ?>
              </a>
            </td>
            <td class="border border-gray-300 px-4 py-2"><?= getdatefromorderid($orderno) ?></td>
          </tr>
          <?php
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
          <td class="border border-gray-300 px-4 py-2" colspan="4"></td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format(array_sum($totaldis), 2);?></td>
          <td class="border border-gray-300 px-4 py-2" colspan="2"></td>
        </tr>
      </tbody>
    </table>
  </div>

 <div class="mt-6">
      <button
        type="button"
        onclick="printDiv('printableArea')"
       class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        طباعة
      </button>
  </div>
</div>
