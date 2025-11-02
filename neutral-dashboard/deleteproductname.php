<?php
include 'config.php';
include 'header.php';
$main5 = "true";
$active22 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php";
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة المنتجات <small class="text-sm text-gray-500">تعديل</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
      <div class="bg-white shadow rounded-lg p-4">
        <form action="deleteproductname.php" method="POST">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-right text-sm">
              <thead class="bg-gray-100">
                <tr>
                  <th class="px-4 py-2 text-gray-700">الرقم</th>
                  <th class="px-4 py-2 text-gray-700">اسم المنتج</th>
                  <th class="px-4 py-2 text-gray-700">الإجراء</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <?php
                if (isset($_POST['E'])) {
                  $idproduct = $_POST['idproduct'];
                  $querytoupdaterelated1 = "DELETE FROM `productprice` WHERE `idprod`='$idproduct'";
                  mysqli_query($link, $querytoupdaterelated1);
                  $querytoupdaterelated2 = "DELETE FROM `productquantit` WHERE `idprod`='$idproduct'";
                  mysqli_query($link, $querytoupdaterelated2);
                  $querytoupdate = "DELETE FROM `productname` WHERE `id`='$idproduct'";
                  mysqli_query($link, $querytoupdate);
                  messagedisplaying('تم حذف البيانات بنجاح', 1);
                }

                $resultproudact = mysqli_query($link, "SELECT * FROM `productname` ORDER BY `pname`");
                $countx = 0;
                while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                  $countx += 1;
                  $idproduct = $rowproduct['id'];
                  $productnamevar = $rowproduct['pname'];
                ?>
                  <tr>
                    <form action="deleteproductname.php" method="POST">
                      <input type="hidden" name="idproduct" value="<?php echo $idproduct; ?>">
                      <td class="px-4 py-2 font-medium"><?php echo $countx; ?>.</td>
                      <td class="px-4 py-2"><?php echo htmlspecialchars($productnamevar); ?></td>
                      <td class="px-4 py-2">
                        <button name="E" type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">حذف</button>
                      </td>
                    </form>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </section>
  </div>