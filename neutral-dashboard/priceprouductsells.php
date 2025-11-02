<?php
include 'config.php';
include 'header.php';
$main1 = "true";
$active1 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto ">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800"> صفحة المبيعات <small class="text-sm text-gray-500">معرفة السعر
        </small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
      <div class="bg-white shadow rounded-lg p-6 mb-6">
        <?php
        if (isset($_POST['proudctnameboxselect'])) {
          $nameofpro = $_POST['proudctnameboxselect'];
          $idprod = namefromnametoid($nameofpro);
          $where = "where `idprod`= $idprod and `active` = 1 ";
        } else {
          $where = " ";
        }
        ?>
        <form method="POST" action="priceprouductsells.php" class="flex flex-col gap-4 md:flex-row md:items-center">
          <div class="flex-1">
            <input
              name="proudctnameboxselect"
              type="text"
              class="w-full border rounded p-2"
              value="<?php echo isset($_POST['proudctnameboxselect']) ? $_POST['proudctnameboxselect'] : ''; ?>"
              list="cars" />
            <?php listofpronamebox(); ?>
          </div>
          <div class="flex-shrink-0">
            <label class="block text-right mb-1 text-gray-700">اسم المنتج</label>
            <button type="submit" name="upone" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              بحث
            </button>
          </div>
        </form>
      </div>

      <?php if (isset($_POST['upone'])): ?>
        <div class="bg-white shadow rounded-lg p-6">
          <form action="priceprouductsells.php" method="POST">
            <div class="overflow-x-auto">
              <table class="min-w-full border border-gray-200 text-right">
                <thead>
                  <tr class="bg-gray-100 text-gray-700 text-sm font-bold">
                    <th class="p-2 border">الرقم</th>
                    <th class="p-2 border">اسم المنتج</th>
                    <th class="p-2 border">سعر الشراء</th>
                    <th class="p-2 border">سعر البيع</th>
                    <th class="p-2 border">صنف المنتج</th>
                  </tr>
                </thead>
                <tbody class="text-sm">
                  <?php
                  $sqlin = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`, `user_namel`, `timedofa` FROM `productprice` $where";
                  $resultproudact = mysqli_query($link, $sqlin);
                  $countx = 1;

                  while ($rowproudact = mysqli_fetch_array($resultproudact)) {
                    $priceid = $rowproudact['id'];
                    $proudactid = $rowproudact['idprod'];
                    $pricesoldvar = $rowproudact['pricetobesold'];
                    $priceinvar = $rowproudact['pricein'];
                    $cataid = $rowproudact['cataid'];

                    $categoryvar = catafromidtoname($cataid);
                    $proudactName = getproductnamefromid($proudactid);
                  ?>
                    <tr class="border-b">
                      <input type="hidden" name="cataid" value="<?php echo $cataid; ?>">
                      <input type="hidden" name="proudctnameboxselect" value="<?php echo $_POST['proudctnameboxselect']; ?>">
                      <td class="p-2 border"><?php echo $countx; ?></td>
                      <td class="p-2 border"><?php echo $proudactName; ?></td>
                      <td class="p-2 border">
                        <input
                          type="text"
                          name="pin<?php echo $proudactid; ?>"
                          value="<?php echo $priceinvar; ?>"
                          class="w-full border rounded p-1">
                      </td>
                      <td class="p-2 border">
                        <input
                          type="text"
                          name="psold<?php echo $proudactid; ?>"
                          value="<?php echo $pricesoldvar; ?>"
                          class="w-full border rounded p-1">
                      </td>
                      <td class="p-2 border"><?php echo $categoryvar; ?></td>
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
      <?php endif; ?>
    </section>
  </div>