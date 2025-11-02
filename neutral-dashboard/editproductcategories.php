<?php
include 'config.php';
include 'header.php';
$main6 = "true";
$active24 = 'bg-blue-600 text-white';
include 'menu.php';
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">
        صفحة اصناف المبيعات <small class="text-sm text-gray-500">حذف</small>
      </h1>
    </header>

    <section class="bg-white shadow rounded-lg p-6">
      <?php
      if (isset($_POST['E'])) {
        $idvar = $_POST['idvar'];
        $productcata = $_POST['productcata'];

        $querytoupdate = "UPDATE `productcategory` SET `cname` ='$productcata' WHERE `id`='$idvar'";
        mysqli_query($link, $querytoupdate);

        messagedisplaying('تم حذف البيانات بنجاح', 3);
      }

      $resultproudact = mysqli_query($link, "SELECT * FROM `productcategory` ORDER BY `cname`");
      $countx = 0;
      ?>

      <div class="overflow-x-auto">
        <table class="min-w-full text-right border border-gray-200 divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 text-sm font-semibold text-gray-700">الرقم</th>
              <th class="px-4 py-2 text-sm font-semibold text-gray-700">صنف المنتج</th>
              <th class="px-4 py-2 text-sm"></th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($rowproduct = mysqli_fetch_array($resultproudact)) {
              $countx++;
              $idvar = $rowproduct['id'];
              $productcata = $rowproduct['cname'];
            ?>
              <tr>
                <form action="editproductcategories.php" method="POST" class="contents">
                  <input type="hidden" name="idvar" value="<?php echo $idvar; ?>">
                  <td class="px-4 py-2 text-sm text-gray-800"><?php echo $countx; ?>.</td>
                  <td class="px-4 py-2">
                    <input
                      type="text"
                      name="productcata"
                      value="<?php echo $productcata; ?>"
                      class="w-full px-3 py-1 border border-gray-300 rounded-md text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                  </td>
                  <td class="px-4 py-2">
                    <button
                      name="E"
                      type="submit"
                      class="inline-flex items-center px-4 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md transition"
                    >
                      تعديل
                    </button>
                  </td>
                </form>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
