<?php
include 'config.php';
include 'header.php';
$main9 = "true";
$active36 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <header class="mb-6">
      <h1 class="text-3xl font-bold text-gray-800">صفحة التقارير السنوية</h1>
      <p class="text-gray-600">تقرير المبيعات السنوي</p>
    </header>
     <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">
    <?php
    if (isset($_POST['Empty']))
      unset($_POST['proudctnameboxselect']);
    if (isset($_POST['proudctnameboxselect'])) {
      $nameofcata = $_POST['proudctnameboxselect'];
      $cataid = catafromnametoid($nameofcata);
      $where = "where `cataid`= $cataid";
    } else {
      $where = " ";
    }

    $before = date('Y-01-01');
    $after = date('Y-12-t');

    $sqlordersql = "SELECT `orderid` FROM `orderdisanddate` WHERE date(`orderdate`) between '$before' and '$after'";
    $resultordersql = mysqli_query($link, $sqlordersql);
    $wheretest = "orderno in (";
    $coma = 0;

    while ($rowordersql = mysqli_fetch_array($resultordersql)) {
      if ($coma != 0) $wheretest .= ", ";
      $ordersetin = $rowordersql['orderid'];
      $wheretest .= "$ordersetin";
      $coma++;
    }
    $wheretest .= ")";

    if (!in_array($before, ["Year-0-0Day", "-0-0"]) && !in_array($after, ["Year-0-0Day", "-0-0"])) {
      $where = ($where == " ") ? "where $wheretest" : "$where and $wheretest";
    }
    ?>

    <form method="POST" action="reportyearorderssold.php" class="space-y-4">
      <div class="flex flex-col md:flex-row items-center gap-4">
        <div class="flex-1">
          <input name="proudctnameboxselect" type="text"
            value="<?php if (isset($_POST['proudctnameboxselect'])) echo $_POST['proudctnameboxselect']; ?>"
            list="cars2"
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="اسم الصنف" />
          <?php listofcatanamebox(); ?>
        </div>
        <label class="text-gray-700 font-medium">صف المنتج</label>
        <button type="submit"
          class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">بحث</button>
      </div>
    </form>

  <div id="printableArea" class="bg-white shadow-md rounded-lg p-4 overflow-x-auto text-right font-[Droid Arabic Naskh]">
      <div class="text-center mb-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		 <p class="text-gray-800 font-bold text-black"> تقرير الاسعار    </p>
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
          <tbody>
            <?php
            $sqltoshowreport = "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` $where";
            $resultfromssqlreport = mysqli_query($link, $sqltoshowreport);
            $countx = 1;
            $total = 0;

            while ($row = mysqli_fetch_array($resultfromssqlreport)) {
              $idp = $row['idprod'];
              $pname = getproductnamefromid($idp);
              $cataname = catafromidtoname($row['cataid']);
              $pricesold = $row['pricesold'];
              $quntity = $row['quntity'];
              $orderno = $row['orderno'];
              $total += number_format(gettotaloforder($orderno), 0);
              ?>
              <tr class="bg-white border-b hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2"><?php echo $countx++; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $pname; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $cataname; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $quntity; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo number_format($pricesold, 0); ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= number_format(gettotaloforder($orderno), 0) ?></td>
                <td class="border border-gray-300 px-4 py-2">
                  <a href="productorder.php?ordernofromdb=<?php echo $orderno; ?>"
                    class="text-blue-600 hover:underline">
                    <?php echo arabic_w2e($orderno); ?>
                  </a>
                </td>
                <td class="border border-gray-300 px-4 py-2"><?php echo getdatefromorderid($orderno); ?></td>
              </tr>
              <?php
            }
            ?>
            <tr class="bg-gray-200 font-bold">
              <td class="border border-gray-300 px-4 py-2">اجمالي</td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"><?php echo number_format($total, 0); ?></td>
              <td class="border border-gray-300 px-4 py-2"></td>
              <td class="border border-gray-300 px-4 py-2"></td>
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
 </section>


