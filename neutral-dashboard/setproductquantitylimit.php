<?php
include 'config.php';
include 'header.php';
$main4 = "true";
$active19 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة تغير الكميات        <small class="text-sm text-gray-500">تغير كمية منتج   </small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <form
        action="setproductquantitylimit.php"
        method="POST"
        onsubmit='return confirm("هل انت متاكد تريد ان تضع الحد الادنى؟")'
        class="space-y-6"
      >

        <div class="mb-4 text-right text-gray-700">
          <p>ملحوظه :-&gt;</p>
          <p><?php spacingformat(3); ?></p>
          <p>لالغاء الحد , الرجاء تغير الكميه الي -1</p>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-300 divide-y divide-gray-200 text-right">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border border-gray-300">الرقم</th>
                <th class="px-4 py-2 border border-gray-300">اسم المنتج</th>
                <th class="px-4 py-2 border border-gray-300">كمية المنتج</th>
                <th class="px-4 py-2 border border-gray-300">الحد</th>
                <th class="px-4 py-2 border border-gray-300">صنف المنتج</th>
                <th class="px-4 py-2 border border-gray-300">الإجراء</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php
              if (isset($_POST['E'])) {
                $proudactid = $_POST['proudactid'];
                $cataidvar = $_POST['cataid'];
                $numbervar = $_POST['limitset'];

                $limitquan = getlimmitquantit($proudactid, $cataidvar);
                if (isset($limitquan)) {
                  $Sqlquanchange = "UPDATE `productquantitlimit` SET `limitnumber`='$numbervar' WHERE `idprod`='$proudactid' and `cataid`='$cataidvar' ";
                } else {
                  $Sqlquanchange = "INSERT INTO `productquantitlimit`(`idprod`, `limitnumber`, `cataid`) VALUES ('$proudactid','$numbervar','$cataidvar')";
                }

                mysqli_query($link, $Sqlquanchange);

                messagedisplaying('تم وضع الحد الادنى بنجاح', 3);
              }

              $resultproudact = mysqli_query($link, "SELECT `id`, `idprod`, `numberin`, `cataid`, `user_namel`, `timedofa` FROM `productquantit` ");

              $countx = 1;
              while ($rowproudact = mysqli_fetch_array($resultproudact)) {
                $proudactid = $rowproudact['idprod'];

                $cataidvar = $rowproudact['cataid'];
                $numbervar = $rowproudact['numberin'];

                $categoryvar = catafromidtoname($cataidvar);
                $proudactName = getproductnamefromid($proudactid);

                $limitquan = getlimmitquantit($proudactid, $cataidvar);
              ?>
                <tr>
                  <form
                    action="setproductquantitylimit.php"
                    method="POST"
                    onsubmit='return confirm("هل انت متاكد تريد ان تضع الحد الادنى؟")'
                    class="w-full flex items-center"
                  >
                    <input name="cataid" type="hidden" value="<?php echo $cataidvar; ?>">
                    <input name="proudactid" type="hidden" value="<?php echo $proudactid; ?>">

                    <td class="px-4 py-2 border border-gray-300"><?php echo $countx; ?>.</td>
                    <td class="px-4 py-2 border border-gray-300"><?php echo $proudactName; ?></td>
                    <td class="px-4 py-2 border border-gray-300"><?php echo $numbervar; ?></td>
                    <td class="px-4 py-2 border border-gray-300">
                      <input
                        type="text"
                        name="limitset"
                        value="<?php echo $limitquan; ?>"
                        class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                      />
                    </td>
                    <td class="px-4 py-2 border border-gray-300"><?php echo $categoryvar; ?></td>
                    <td class="px-4 py-2 border border-gray-300">
                      <button
                        name="E"
                        type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-3 py-1 rounded-md transition"
                      >
                        وضع الحد
                      </button>
                    </td>
                  </form>
                </tr>
              <?php
                $countx++;
              }
              ?>
            </tbody>
          </table>
        </div>

      </form>

    </div>

  </section>
</div>
<!-- /.content-wrapper -->
