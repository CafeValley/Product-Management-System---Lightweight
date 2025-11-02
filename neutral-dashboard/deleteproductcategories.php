<?php
include 'config.php';
include 'header.php';
$main6 = "true";
$active25 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 


?>



<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة اصناف المبيعات <small class="text-sm text-gray-500">حذف</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
    <div class="bg-white rounded shadow p-4">
      <form action="deleteproductcategories.php" method="POST" class="space-y-6">
        <div class="overflow-x-auto">
          <table class="w-full table-auto text-right text-sm border border-gray-300">
                <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 border"> الرقم </th>
                <th class="px-4 py-2 border"> صنف المنتج </th>
                <th class="px-4 py-2 border"> </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_POST['E'])) {
                $idprocat = $_POST['idprocat'];
                $querytodelete = "DELETE FROM `productcategory` WHERE `id`='$idprocat'";
                mysqli_query($link, $querytodelete);
                messagedisplaying('تم حذف البيانات بنجاح', 1);
              }

              $resultproudact = mysqli_query($link, "SELECT * FROM `productcategory` ORDER BY `cname`");
              $countx = 0;
              while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                $countx++;
                $idprocat = $rowproduct['id'];
                $productcata = $rowproduct['cname'];
              ?>
                <form action="deleteproductcategories.php" method="POST">
                  <tr class="hover:bg-red-50">
                    <input name="idprocat" type="hidden" value="<?php echo $idprocat; ?>">
                    <td class="px-4 py-2 border"> <?php echo $countx; ?>. </td>
                    <td class="px-4 py-2 border"> <?php echo $productcata; ?> </td>
                    <td class="px-4 py-2 border">
                      <button name="E" type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded"> حذف </button>
                    </td>
                  </tr>
                </form>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </section>
</div>

