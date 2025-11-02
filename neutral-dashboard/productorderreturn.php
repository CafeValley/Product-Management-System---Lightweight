<?php
include 'config.php';
include 'header.php';
$main1 = "true";
$active4 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">
        صفحه طلبات   <small class="text-sm text-gray-500">بيانات</small>
      </h1>
    </header>

    <section class="bg-white shadow rounded-lg p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
      <form class="space-y-6" action="productorderreturn.php" method="POST">
        <div id="printableArea" class="space-y-4 font-[Droid Arabic Naskh]">

          <?php if (isset($_GET['RID'])) messagedisplaying('تم ادخال البيانات بنجاج', 4); ?>

          <div class="flex flex-col md:flex-row items-center gap-4">
            <div class="flex-1">
              <input 
                type="text" 
                name="orderno" 
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300" 
                placeholder="رقم الطلب"
                value="<?php
                  if (isset($_GET['ordernofromdb'])) {
                    $_POST['orderno'] = $_GET['ordernofromdb'];
                    $_POST['getwhatsin'] = 'tree';
                  }
                  if (isset($_POST['orderno'])) {
                    $orderfromform = $_POST['orderno'];
                    echo $orderfromform;
                  }
                ?>"
              >
            </div>
            <label for="orderno" class="text-gray-700 font-medium w-full md:w-auto">رقم الطلب</label>
          </div>

          <?php
          if (isset($_POST['gotback'])) {
            $resutlfromtemptoper = mysqli_query($link, "SELECT `id`, `idprod`, `cataid`, `pricesold`, `quntity` FROM `productsells` where `orderno` = '$orderfromform' ");
            while ($rowfromtemptoper = mysqli_fetch_array($resutlfromtemptoper)) {
              updatequantityfromids($rowfromtemptoper['idprod'], $rowfromtemptoper['cataid'], "+", $rowfromtemptoper['quntity']);
            }

            mysqli_query($link, "DELETE FROM `accountp` WHERE `orderno` = '$orderfromform'");
            mysqli_query($link, "DELETE FROM `orderdisanddate` WHERE `orderid` = '$orderfromform'");
            mysqli_query($link, "DELETE FROM `productsells` WHERE `orderno` = '$orderfromform'");
           
            ordersubing();
          }

          if (isset($_POST['getwhatsin'])) {
            $SqlforName = "SELECT `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` WHERE `orderno` = '$orderfromform'";
            $resultTName = mysqli_query($link, $SqlforName);
            $row_cnt = mysqli_num_rows($resultTName);
          ?>

          <div class="text-center text-xl font-bold text-black mb-4">
            <span class="text-4xl"><?php echo $company_name; ?></span>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-right table-auto border border-gray-200 rounded shadow-sm">
              <thead class="bg-gray-100 text-gray-700">
                <tr>
                  <?php if ($row_cnt == 0): ?>
                    <th class="px-4 py-2 border">رقم الطلب</th>
                    <th class="px-4 py-2 border">تاريخ</th>
                  <?php else: ?>
                    <th class="px-4 py-2 border">اسم العميل</th>
                    <th class="px-4 py-2 border">اسم المنتج</th>
                    <th class="px-4 py-2 border">صنف المنتج</th>
                    <th class="px-4 py-2 border">السعر</th>
                    <th class="px-4 py-2 border">الكمية</th>
                    <th class="px-4 py-2 border">الاجمالي</th>
                    <th class="px-4 py-2 border">التاريخ</th>
                    <th class="px-4 py-2 border">تخفيض</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody class="text-sm">
                <?php
                while ($rowName = mysqli_fetch_assoc($resultTName)) {
                  echo "<tr class='border-t'>";
                  echo "<td class='px-4 py-2 border'>" . getcutomerfromorderid($orderfromform) . "</td>";
                  echo "<td class='px-4 py-2 border'>" . getproductnamefromid($rowName['idprod']) . "</td>";
                  echo "<td class='px-4 py-2 border'>" . catafromidtoname($rowName['cataid']) . "</td>";
                  echo "<td class='px-4 py-2 border'>" . $rowName['pricesold'] . "</td>";
                  echo "<td class='px-4 py-2 border'>" . $rowName['quntity'] . "</td>";
                  echo "<td class='px-4 py-2 border'>" . ($rowName['quntity'] * $rowName['pricesold']) . "</td>";
                  echo "<td class='px-4 py-2 border'>" . getdatefromorderid($orderfromform) . "</td>";
                  echo "<td class='px-4 py-2 border'>" . getdiscountfromorderid($orderfromform) . " %</td>";
                  echo "</tr>";
                }

                if ($row_cnt == 0) {
                  echo "<tr><td colspan='2' class='text-center py-4'>جاري عرض جميع الطلبات مع التاريخ</td></tr>";
                  $Sqlforallorders = "SELECT `orderno` FROM `productsells` group by `orderno`";
                  $resultforallorders = mysqli_query($link, $Sqlforallorders);
                  while ($rowforallorders = mysqli_fetch_assoc($resultforallorders)) {
                    $ordernofromdb = $rowforallorders['orderno'];
                    echo "<tr class='border-t'>";
                    echo "<td class='px-4 py-2 border'>";
                    echo "<a href='productorderreturn.php?ordernofromdb=$ordernofromdb' class='text-blue-600 hover:underline'>$ordernofromdb</a>";
                    echo "</td>";
                    echo "<td class='px-4 py-2 border'>" . getdatefromorderid($ordernofromdb) . "</td>";
                    echo "</tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>

          <?php } ?>

        </div>

        <div class="flex justify-between items-center mt-6">
		<button name="getwhatsin" type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            استرجاع بيانات الطلب
          </button>
          <button name="gotback" type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            مردود
          </button>
          
        </div>

        <?php
        if (isset($row_cnt) && $row_cnt != 0) {
          echo "<div class='mt-4 text-right text-gray-700'>";
          echo "فاتوره ل <strong>" . getcutomerfromorderid($orderfromform) . "</strong> ";
          echo "بتخفيض <strong>" . getdiscountfromorderid($orderfromform) . "%</strong> ";
          echo "بتاريخ " . getdatefromorderid($orderfromform) . " ";
          echo "باجمالي <strong>" . gettotaloforder($orderfromform) . "</strong>";
          echo "</div>";
        }
        ?>
      </form>
    </div>
  </section>
</div>

