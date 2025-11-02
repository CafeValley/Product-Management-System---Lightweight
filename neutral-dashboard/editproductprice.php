<?php
include 'config.php';
include 'header.php';
$main3 = "true";
$active12 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة تغير الاسعار        <small class="text-sm text-gray-500">تغير سعر كل المنتجات   </small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <form class="w-full" action="editproductprice.php" method="POST">

        <div class="overflow-x-auto">

          <table class="min-w-full border border-gray-300 rounded-md divide-y divide-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">الرقم</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">اسم المنتج</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">سعر الشراء</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">سعر البيع</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">صنف المنتج</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">إجراءات</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

              <?php
              if (isset($_POST['E'])) {
                $proudactid   = $_POST['proudactid'];
                $priceinvar   = $_POST['priceinvar'];
                $pricesoldvar = $_POST['pricesoldvar'];
                $cataid       = $_POST['cataid'];

                $querytochangeactive = "UPDATE `productprice` SET `active` = '0' WHERE `idprod` = '$proudactid'";
                mysqli_query($link, $querytochangeactive);

                $querytogetitin = "INSERT INTO `productprice`(`idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) 
                                   VALUES ('$proudactid','$priceinvar','$pricesoldvar','1','$cataid','$suser_name',now())";

                mysqli_query($link, $querytogetitin);

                messagedisplaying('تم تعديل البيانات بنجاح', 3);
              }

              $resultproudact = mysqli_query($link, "SELECT `id`, CONCAT(UCASE(LEFT(`pname`, 1)), SUBSTRING(`pname`, 2)) as pname FROM `productname` ORDER BY `pname`");

              $countx = 1;
              while ($rowproudact = mysqli_fetch_array($resultproudact)) {
                $proudactid = $rowproudact['id'];

                $pricequery = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid` FROM `productprice` WHERE `idprod` = $proudactid AND `active` = 1";
                $resultprice = mysqli_query($link, $pricequery);
                $rowprice = mysqli_fetch_array($resultprice);

                $pricesoldvar = $rowprice['pricetobesold'];
                $priceinvar = $rowprice['pricein'];
                $cataid = $rowprice['cataid'];

                $categoryvar = catafromidtoname($cataid);
                $proudactName = $rowproudact['pname'];
              ?>

                <form action = "editproductprice.php" method = "POST">
                        <tr>
                  <input name="cataid" type="hidden" value="<?php echo $cataid; ?>">
                  <input name="proudactid" type="hidden" value="<?php echo $proudactid; ?>">

                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $countx; ?>.</td>
                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $proudactName; ?></td>

                  <td class="px-4 py-2 border-b border-gray-300">
                    <input
                      type="text"
                      name="priceinvar"
                      value="<?php echo htmlspecialchars($priceinvar); ?>"
                      class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                  </td>

                  <td class="px-4 py-2 border-b border-gray-300">
                    <input
                      type="text"
                      name="pricesoldvar"
                      value="<?php echo htmlspecialchars($pricesoldvar); ?>"
                      class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                  </td>

                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $categoryvar; ?></td>

                  <td class="px-4 py-2 text-right border-b border-gray-300">
                    <button
                      name="E"
                      type="submit"
                      class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md px-4 py-2 transition"
                    >
                      تعديل
                    </button>
                  </td>
                </tr>
              </form>
              <?php
                $countx += 1;
              }
              ?>

            </tbody>
          </table>

        </div>
      </form>

    </div>

  </section>
</div>
