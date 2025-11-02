<?php
include 'config.php';
include 'header.php';
$main4 = "true";
$active17 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة تغير الكميات        <small class="text-sm text-gray-500"> تقرير الارباح</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <?php
      if (isset($_POST['E'])) {
        $proudactid = $_POST['proudactid'];
        $cataidvar = $_POST['cataidvar'] ?? null;
        $numbervar = $_POST['numbervar'];

        $Sqlquanchange = "UPDATE `productquantit` SET `numberin`='$numbervar' WHERE `idprod` = '$proudactid' ";
        mysqli_query($link, $Sqlquanchange);
        messagedisplaying('تم تعديل البيانات بنجاح', 3);
      }
      ?>

      <table class="min-w-full divide-y divide-gray-200 text-right">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 border border-gray-300">الرقم</th>
            <th class="px-4 py-2 border border-gray-300">اسم المنتج</th>
            <th class="px-4 py-2 border border-gray-300">كمية المنتج</th>
            <th class="px-4 py-2 border border-gray-300">صنف المنتج</th>
            <th class="px-4 py-2 border border-gray-300">اجراء</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php
          $resultproudact = mysqli_query($link, "SELECT `id`, CONCAT(UCASE(LEFT(`pname`, 1)), SUBSTRING(`pname`, 2)) as pname FROM `productname` ORDER BY `pname`");
          $countx = 1;
          while ($rowproudact = mysqli_fetch_array($resultproudact)) {
            $proudactid = $rowproudact['id'];
            $quantityquery = "SELECT `id`, `idprod`, `numberin`,`cataid` FROM `productquantit` WHERE `idprod` = '$proudactid'";
            $resultquantity = mysqli_query($link, $quantityquery);
            $rowquantity = mysqli_fetch_array($resultquantity);

            $cataidvar = $rowquantity['cataid'] ?? '';
            $numbervar = $rowquantity['numberin'] ?? '';
            $categoryvar = catafromidtoname($cataidvar);
            $proudactName = $rowproudact['pname'];
          ?>
            <tr>
              <form action="editproductquantity.php" method="POST" class="w-full flex items-center space-x-2 justify-between">
                <input name="cataidvar" type="hidden" value="<?php echo htmlspecialchars($cataidvar); ?>">
                <input name="proudactid" type="hidden" value="<?php echo htmlspecialchars($proudactid); ?>">
                <td class="px-4 py-2 border border-gray-300"><?php echo $countx; ?>.</td>
                <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($proudactName); ?></td>
                <td class="px-4 py-2 border border-gray-300">
                  <input
                    type="text"
                    name="numbervar"
                    value="<?php echo htmlspecialchars($numbervar); ?>"
                    class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  />
                </td>
                <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($categoryvar); ?></td>
                <td class="px-4 py-2 border border-gray-300">
                  <button
                    type="submit"
                    name="E"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold rounded-md px-4 py-1 transition"
                  >
                    تعديل
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

  </section>
</div>
