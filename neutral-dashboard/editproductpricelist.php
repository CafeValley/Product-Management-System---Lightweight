<?php
include 'config.php';
include 'header.php';
$main3 = "true";
$active11 = 'bg-blue-600 text-white';
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

      <div class="mb-6">
        <?php
        if (isset($_POST['proudctnameboxselect'])) {
          $nameofcata = $_POST['proudctnameboxselect'];
          $cataid = catafromnametoid($nameofcata);
          $where = "where `cataid`= $cataid  and `active` = 1 ";
        } else {
          $where = " ";
        }
        ?>

        <form method='POST' action="editproductpricelist.php" class="flex flex-wrap items-center gap-4 mb-4">
          <label for="proudctnameboxselect" class="block w-full md:w-auto text-right font-semibold">صف المنتج</label>
          <input
            id="proudctnameboxselect"
            name="proudctnameboxselect"
            type="text"
            list="cars2"
            class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            value="<?php if (isset($_POST['proudctnameboxselect'])) { echo htmlspecialchars($_POST['proudctnameboxselect']); } ?>"
          />
          <button
            name="upone"
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition"
          >
            بحث
          </button>

          <?php listofcatanamebox(); ?>
        </form>
      </div>

      <?php
      if (isset($_POST['bigE'])) {

        $pid         = array();
        $priceinarr   = array();
        $pricesoldarr = array();
        $p     = 0;
        $psold = 0;
        foreach ($_POST as $key => $value) {

          $key1 = preg_replace('/[0-9]+/', '', $key);
          $key2 = preg_replace("/[^0-9]/", "", $key);

          if ($key1 == "pin") {
            if ($value != "")
              $priceinarr[$p] = $value;
            else
              $priceinarr[$p] = 0;
            $p++;
          }
          if ($key1 == "psold") {
            if ($value != "") {
              $pid[$psold] = $key2;
              $pricesoldarr[$psold] = $value;
            } else
              $pricesoldarr[$psold] = 0;
            $psold++;
          }
        }

        $max = sizeof($priceinarr);

        for ($z = 0; $z <= ($max - 1); $z++) {
          $proudactid   = $pid[$z];
          $priceinvar   = $priceinarr[$z];
          $pricesoldvar = $pricesoldarr[$z];
          $cataid       = $_POST['cataid'];

          $sqlcheck = "SELECT `pricein`, `pricetobesold` FROM `productprice` where `cataid`= $cataid and `idprod` = '$proudactid'  and `active` = 1  ";
          $resultcheck  = mysqli_query($link, $sqlcheck);
          $rowcheck     = mysqli_fetch_array($resultcheck);
          $pinfromdb   = $rowcheck['pricein'];
          $pfromdb     = $rowcheck['pricetobesold'];

          if (($pfromdb != $pricesoldvar) or ($pinfromdb != $priceinvar)) {
            $querytochangeactive = "UPDATE `productprice` SET `active` = '0' WHERE `idprod` = '$proudactid'";
            mysqli_query($link, $querytochangeactive);
            $querytogetitin = "INSERT INTO `productprice`(`idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) 
                                VALUES ('$proudactid','$priceinvar','$pricesoldvar','1','$cataid','$suser_name',now())";
            mysqli_query($link, $querytogetitin);
            messagedisplaying('تم تعديل البيانات بنجاح', 3);
          }
        }
      }

      if (isset($_POST['upone'])) {
      ?>

        <form action="editproductpricelist.php" method="POST" class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">الرقم</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">اسم المنتج</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">سعر الشراء</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">سعر البيع</th>
                <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700 border-b border-gray-300">صنف المنتج</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

              <?php
              $sqlin = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`, `user_namel`, `timedofa` FROM `productprice` $where  ";
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

                <tr>
                  <input name="cataid" type="hidden" value="<?php echo $cataid; ?>" />
                  <input name="proudctnameboxselect" type="hidden" value="<?php echo htmlspecialchars($_POST['proudctnameboxselect']); ?>" />

                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $countx; ?>.</td>
                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $proudactName; ?></td>

                  <td class="px-4 py-2 border-b border-gray-300">
                    <input
                      type="text"
                      name="pin<?php echo $proudactid; ?>"
                      value="<?php echo $priceinvar; ?>"
                      class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                  </td>
                  <td class="px-4 py-2 border-b border-gray-300">
                    <input
                      type="text"
                      name="psold<?php echo $proudactid; ?>"
                      value="<?php echo $pricesoldvar; ?>"
                      class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                  </td>

                  <td class="px-4 py-2 text-right text-sm border-b border-gray-300"><?php echo $categoryvar; ?></td>

                </tr>

              <?php
                $countx += 1;
              }
              ?>

              <tr>
                <td colspan="4"></td>
                <td class="px-4 py-3 text-right">
                  <button
                    name="bigE"
                    type="submit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-md px-4 py-2 transition"
                  >
                    تعديل
                  </button>
                </td>
              </tr>

            </tbody>
          </table>
        </form>

      <?php
      }
      ?>

    </div>
  </section>
</div>
