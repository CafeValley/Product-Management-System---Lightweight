<?php
include 'config.php';
include 'header.php';
$active02 = "block text-sm text-blue-600 bg-blue-50 px-3 py-2 rounded-md transition";
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الاستعلمات     <small class="text-sm text-gray-500">الاستعلمات</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
    <div class="bg-white shadow rounded-lg p-6">
      <h3 class="text-xl font-semibold mb-4 text-right">الحد الادني للمنتج</h3>

      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 text-right">
          <thead>
            <tr class="bg-gray-100 text-sm font-bold text-gray-700">
              <th class="p-2 border">الرقم</th>
              <th class="p-2 border">اسم المنتج</th>
              <th class="p-2 border">صنف المنتج</th>
              <th class="p-2 border">الكميه الحاليه</th>
              <th class="p-2 border">الحدد الادنى</th>
              <th class="p-2 border">الحاله</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqltoshowquanilimit = "SELECT `id`, `idprod`, `limitnumber`, `cataid`, `timedofa` FROM `productquantitlimit` ";
            $resultfromsquanilimit = mysqli_query($link, $sqltoshowquanilimit);
            $countx = 1;

            while ($rowquanilimit = mysqli_fetch_array($resultfromsquanilimit)) {
              $idprod = $rowquanilimit['idprod'];
              $idcata = $rowquanilimit['cataid'];
              $idlimitnumber = $rowquanilimit['limitnumber'];

              $sqlstorequn = "SELECT `numberin` FROM `productquantit` WHERE `idprod` = '$idprod' AND `cataid` = '$idcata'";
              $resuttorequn = mysqli_query($link, $sqlstorequn);
              $rowstorequan = mysqli_fetch_array($resuttorequn);
              $whatsinthestore = $rowstorequan['numberin'];

              if ($idlimitnumber != -1 && $idlimitnumber >= $whatsinthestore) {
                echo "<tr class='border-b text-sm'>";
                echo "<td class='p-2 border'>" . $countx . "</td>";
                $countx++;
                echo "<td class='p-2 border'>" . getproductnamefromid($idprod) . "</td>";
                echo "<td class='p-2 border'>" . catafromidtoname($idcata) . "</td>";
                echo "<td class='p-2 border'>" . $whatsinthestore . "</td>";
                echo "<td class='p-2 border'>" . $idlimitnumber . "</td>";
                echo "<td class='p-2 border'><span class='inline-block bg-red-600 text-white text-xs font-medium px-2 py-1 rounded'>الحد</span></td>";
                echo "</tr>";
              }
            }

            if ($countx == 1) {
              echo "<tr><td colspan='6' class='text-center p-4 text-gray-500'>لا يوجد اليوم</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>


