<?php
include 'config.php';
include 'header.php';
$main1 = "true";
$active3 = 'bg-blue-600 text-white';
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
    <form action="productorder.php" method="POST" class="space-y-6">
      <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-2 md:space-y-0">
        <div class="flex-1">
          <input
            type="text"
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
            name="orderno"
            id="orderno"
            placeholder="رقم الطلب"
            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500"
          >
        </div>
        <label for="orderno" class="w-full md:w-auto text-right font-medium">رقم الطلب</label>
      </div>

      <div id="printableArea" class="text-right font-[Droid Arabic Naskh] space-y-4">
        <?php
        if (isset($_GET['RID'])) {
          messagedisplaying('تم ادخال البيانات بنجاج', 4);
        }

        if (isset($_POST['getwhatsin'])) {
          $SqlforName = "SELECT `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` WHERE `orderno` =  '$orderfromform'";
          $resultTName = mysqli_query($link, $SqlforName);
          $row_cnt = mysqli_num_rows($resultTName);
        ?>
        <div class="text-center text-2xl font-bold text-black"><?php echo $company_name; ?></div>
		 <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">


        <table class="w-full table-auto border border-gray-300 text-sm rtl text-right">
          <thead class="bg-gray-100">
            <tr>
              <?php if ($row_cnt == 0) { ?>
                <th class="border px-2 py-1">رقم الطلب</th>
                <th class="border px-2 py-1">تاريخ</th>
                <th class="border px-2 py-1">التخفيض</th>
                <th class="border px-2 py-1">اسم العميل</th>
              <?php }

              if ($row_cnt != 0) {
              echo "<tr><td colspan='5' class='text-center font-bold pt-4'>";
              echo "رقم الطلب <strong>" . arabic_w2e($orderfromform) . "</strong> ";
              echo "فاتوره ل/ <strong>" . getcutomerfromorderid($orderfromform) . "</strong> ";
              echo "بتاربخ / <strong>" . getdatefromorderid($orderfromform) . "</strong>";
              echo "</td></tr>";
            }			  
			   
			  else { ?>
                <th class="border px-2 py-1">اسم المنتج</th>
                <th class="border px-2 py-1">صنف المنتج</th>
                <th class="border px-2 py-1">السعر</th>
                <th class="border px-2 py-1">الكمية</th>
                <th class="border px-2 py-1">الاجمالي</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($rowName = mysqli_fetch_assoc($resultTName)) {
              $productid = $rowName['idprod'];
              $cataid = $rowName['cataid'];
              $pricesold = $rowName['pricesold'];
              $quantity = $rowName['quntity'];

              echo "<tr>";
              echo "<td class='border px-2 py-1'>" . getproductnamefromid($productid) . "</td>";
              echo "<td class='border px-2 py-1'>" . catafromidtoname($cataid) . "</td>";
              echo "<td class='border px-2 py-1'>" . $pricesold . "</td>";
              echo "<td class='border px-2 py-1'>" . $quantity . "</td>";
              echo "<td class='border px-2 py-1'>" . arabic_w2e($quantity * $pricesold) . "</td>";
              echo "</tr>";
            }

           

            if ($row_cnt == 0) {
              echo "<tr><td colspan='5' class='text-center text-sm'>جاري عرض جميع الطلبات مع التاريخ</td></tr>";

              $Sqlforallorders = "SELECT `orderno` FROM `productsells` group by `orderno`";
              $resultforallorders = mysqli_query($link, $Sqlforallorders);
              while ($rowforallorders = mysqli_fetch_assoc($resultforallorders)) {
                $ordernofromdb = $rowforallorders['orderno'];
                echo "<tr>";
                echo "<td class='border px-2 py-1'><a class='text-blue-600 underline' href='productorder.php?ordernofromdb=$ordernofromdb'>" . arabic_w2e($ordernofromdb) . "</a></td>";
                echo "<td class='border px-2 py-1'>" . getdatefromorderid($ordernofromdb) . "</td>";
                echo "<td class='border px-2 py-1'>" . getdiscountfromorderid($ordernofromdb) . "%</td>";
                echo "<td class='border px-2 py-1'>" . getcutomerfromorderid($ordernofromdb) . "</td>";
                echo "</tr>";
              }
            }

            if ($row_cnt != 0) {
              echo "<tr><td class='border px-2 py-1 font-bold'>اجمالي</td><td></td><td class='border px-2 py-1'>" . gettotaloforderwithoutdiscount($orderfromform) . "</td><td></td><td class='border px-2 py-1'>" . arabic_w2e(gettotaloforderwithoutdiscount($orderfromform)) . "</td></tr>";
              echo "<tr><td class='border px-2 py-1 font-bold'>تخفيض</td><td></td><td class='border px-2 py-1'>" . getdiscountfromorderid($orderfromform) . "%</td><td></td><td class='border px-2 py-1'>" . arabic_w2e(getdiscountfromorderid($orderfromform)) . "%</td></tr>";
              echo "<tr><td class='border px-2 py-1 font-bold'>اجمالي الفاتوره</td><td></td><td class='border px-2 py-1'>" . gettotaloforder($orderfromform) . "</td><td></td><td class='border px-2 py-1'>" . arabic_w2e(gettotaloforder($orderfromform)) . "</td></tr>";
            }
            ?>
          </tbody>
        </table>
        <?php } ?>
      </div>

      <div class="flex flex-col md:flex-row justify-between items-center mt-6 space-y-2 md:space-y-0">
        <button 
	type="button" 
	onclick="printDiv('printableArea')"
    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
	
        <button
          name="getwhatsin"
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
          استرجاع بيانات الطلب
        </button>
      </div>
    </form>
  </section>
</div>


