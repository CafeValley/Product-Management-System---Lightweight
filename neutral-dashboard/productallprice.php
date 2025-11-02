<?php
include 'config.php';
include 'header.php';
$main3 = "true";
$active15 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة تغير الاسعار      <small class="text-sm text-gray-500">تغير سعر كل المنتجات</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <form class="max-w-md mx-auto" action="dbproductallprice.php" method="POST">

        <div class="mb-6">
          <?php
          if (isset($_GET['RID'])) {
            messagedisplaying('تم التغير بنجاح', 4);
          }
          ?>
        </div>

        <div class="mb-6 flex flex-col md:flex-row md:items-center">
          <label for="newboughtprice" class="md:w-1/3 text-right font-semibold mb-2 md:mb-0">نسية الزيادة</label>
          <div class="md:flex-1">
            <input
              type="text"
              name="newboughtprice"
              required
              id="newboughtprice"
              placeholder="نسية الزيادة"
              class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
          </div>
        </div>

        <?php
        if (isset($_GET['RID'])) {

          echo '<div class="overflow-x-auto mb-6">';
          echo '<table class="min-w-full border border-gray-300 rounded-md divide-y divide-gray-200 text-right">';
          echo '<thead class="bg-gray-100">';
          echo '<tr>';
          echo '<th class="px-4 py-2 border-b border-gray-300">اسم المنتج</th>';
          echo '<th class="px-4 py-2 border-b border-gray-300">سعر الشراء</th>';
          echo '<th class="px-4 py-2 border-b border-gray-300">سعر البيع</th>';
          echo '</tr>';
          echo '</thead><tbody>';

          $sqlprince = "SELECT `idprod`, `pricein`, `pricetobesold` FROM `productprice` WHERE active = 1";
          $resultprice = mysqli_query($link, $sqlprince);
          while ($rowprice = mysqli_fetch_array($resultprice)) {
            $priceproid = $rowprice['idprod'];
            $pricesold = $rowprice['pricetobesold'];
            $pricebought = $rowprice['pricein'];

            echo '<tr class="bg-white hover:bg-gray-50">';
            echo '<td class="px-4 py-2 border-b border-gray-300">' . htmlspecialchars(productidtoname($priceproid)) . '</td>';
            echo '<td class="px-4 py-2 border-b border-gray-300">' . htmlspecialchars($pricebought) . '</td>';
            echo '<td class="px-4 py-2 border-b border-gray-300">' . htmlspecialchars($pricesold) . '</td>';
            echo '</tr>';
          }
          echo '</tbody></table></div>';
        }
        ?>

        <div class="flex justify-between">
          <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition"
          >
            تغير
          </button>
          <button
            type="reset"
            class="bg-red-300 hover:bg-red-400 text-red-800 font-semibold rounded-md px-4 py-2 transition"
          >
            الغاء
          </button>
        </div>

      </form>

    </div>

  </section>
</div>
