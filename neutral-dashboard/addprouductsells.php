<?php
include 'config.php';
include 'header.php';
$main1 = "true";
$active2 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 

if (isset($_GET['producttempno'])) {
  $_POST['InaddBut'] = "value";
  $idtodele = $_GET['producttempno'];

  $resutlfromtemptoper = mysqli_query($link, "SELECT `idprod`, `cataid`, `pricesold`, `datesold`, `quntity`, `customername` ,`customernamerecept` FROM `productsellstemp` WHERE `id` = '$idtodele' ");
  while ($rowfromtemptoper = mysqli_fetch_array($resutlfromtemptoper)) {
    $productid = $rowfromtemptoper['idprod'];
    $cataid    = $rowfromtemptoper['cataid'];
    $quantity  = $rowfromtemptoper['quntity'];
    updatequantityfromids($productid, $cataid, "+", $quantity);
  }

  mysqli_query($link, "DELETE FROM `productsellstemp` WHERE `id` = '$idtodele' ");
}
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الاستعلمات <small class="text-sm text-gray-500">الاستعلمات</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
      <div class="bg-white shadow rounded-lg p-6">
        <form action="addprouductsells.php" method="POST" class="space-y-6">

          <?php
          if (isset($_POST['relocatebut'])) {
            $w        = 0;
            $orderno  = getlastorder();
            $discount = $_POST['discountsold'];

            $resutlfromtemptoper = mysqli_query($link, "SELECT `idprod`, `cataid`, `pricesold`, `datesold`, `quntity`, `customername`,`customernamerecept` FROM `productsellstemp` where `whodidthis` = '$suser_name' ");
            while ($rowfromtemptoper = mysqli_fetch_array($resutlfromtemptoper)) {
              $productid    = $rowfromtemptoper['idprod'];
              $cataid       = $rowfromtemptoper['cataid'];
              $pricesold    = $rowfromtemptoper['pricesold'];
              $quantity     = $rowfromtemptoper['quntity'];

              if ($w == 0) {
                $customername  = $rowfromtemptoper['customername'];
                $customernamerecept  = $rowfromtemptoper['customernamerecept'];
                $datesold      = $rowfromtemptoper['datesold'];
                $sqltoaddorder = "INSERT INTO `orderdisanddate`(`orderid`, `orderdate`, `orderdiscount`, `ordercutomername`, `ordercutomernamerecept`, `user_namel`, `timedofa`) 
                VALUES ('$orderno','$datesold','$discount','$customername','$customernamerecept','$suser_name',now())";
                $w++;
              }

              $Sqlfromtemptoper = "INSERT INTO `productsells`(`idprod`, `cataid`, `pricesold`, `quntity`, `orderno`,`whodidthis`)
              VALUES ('$productid','$cataid','$pricesold','$quantity','$orderno','$suser_name')";
              mysqli_query($link, $Sqlfromtemptoper);
            }

            if ($_POST['nowordelay'] == 'now') {
              mysqli_query($link, $sqltoaddorder);
              $customername       = getcutomerfromorderid($orderno);
              $customernamerecept = customernamereceptrid($orderno);
              $dateoforder        = getdatefromorderid($orderno);
              $totaloforder       = gettotaloforder($orderno);

              echo "تم بيع المنتجات";
              $Sqltoaddtopayment = "INSERT INTO `accountp`(`orderno`,`accountname`,`accountnamerecept`,`accountroot`,`method`,`accountdesc`,`accountamount`,`inorout`,`accountdate`,`user_namel`,`timedofa`) 
              VALUES ('$orderno','$customername','$customernamerecept','مبيعات','كاش',' ',$totaloforder,'12','$dateoforder','$suser_name',now())";
              mysqli_query($link, $Sqltoaddtopayment);
            }

            mysqli_query($link, "DELETE FROM `productsellstemp` where `whodidthis` = '$suser_name'");
            orderadding();
            header('Location:productorder.php?ordernofromdb=' . $orderno);
            die();
          }

          if (isset($_POST['killtempbut'])) {
            $resutlfromtemptoper = mysqli_query($link, "SELECT `idprod`, `cataid`, `pricesold`, `datesold`, `quntity`, `customername`,`customernamerecept` FROM `productsellstemp` where `whodidthis` = '$suser_name'");
            while ($rowfromtemptoper = mysqli_fetch_array($resutlfromtemptoper)) {
              updatequantityfromids($rowfromtemptoper['idprod'], $rowfromtemptoper['cataid'], "+", $rowfromtemptoper['quntity']);
            }
            mysqli_query($link, "DELETE FROM `productsellstemp` where `whodidthis` = '$suser_name'");
          }

          if (isset($_GET['RID'])) {
            messagedisplaying('تم ادخال المنتج , الرجاء تاكيد الشراء', 2);
          }
          if (isset($_GET['error'])) seterror($_GET['error']);

          the3selectsbox();
          ?>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <label class="text-right font-medium">كمية المنتج</label>
            <input type="text" required name="productqanti" class="border rounded-lg p-2 w-full" placeholder="كمية المنتج">

          </div>

          <?php if (!isset($_POST['InaddBut'])) { ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
              <label class="text-right font-medium">اسم العميل</label>
              <input type="text" name="customername" class="border rounded-lg p-2 w-full" placeholder="اختياري">

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
              <label class="text-right font-medium">اسم المستلم</label>
              <input type="text" name="customernamerecept" class="border rounded-lg p-2 w-full" placeholder="اختياري">

            </div>

            <?php DisplayDate("التاريخ"); ?>
          <?php } ?>

          <div class="flex justify-between pt-4">
		              <button name="InaddBut" type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">اضافة</button>

            <button type="reset" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">تفريغ البيانات</button>
          </div>
        </form>

        <?php if (isset($_POST['InaddBut'])) { ?>
          <div class="overflow-x-auto mt-6">
            <table class="w-full border border-gray-300 text-sm text-right">
              <thead class="bg-gray-100">
                <tr>
                  <th class="p-2 border">الرقم</th>
                  <th class="p-2 border">اسم المنتج</th>
                  <th class="p-2 border">سعر البيع</th>
                  <th class="p-2 border">صنف المنتج</th>
                  <th class="p-2 border">اسم العميل</th>
                  <th class="p-2 border">اسم المستلم</th>
                  <th class="p-2 border">كمية المنتج</th>
                  <th class="p-2 border">اجمالي</th>
                  <th class="p-2 border">التاريخ</th>
                  <th class="p-2 border"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!isset($_GET['producttempno'])) {
                  $productname_name = $_POST['proudctnameboxselect'];
                  $cataname_name    = $_POST['proudctnameboxselect2'];
                  $productid        = checkiftherethisproduct($productname_name);
                  $cataid           = checkiftherename($cataname_name);
                  $productquant     = $_POST['productqanti'];
                  $customername     = $_POST['customername'];
                  $customernamerecept = $_POST['customernamerecept'];
                  $datesoldat       = isset($_POST['Day']) ? changedateformate(Eatdayformat($_POST['Day'], $_POST['Month'], $_POST['Year'])) : date("Y-m-d");
                  $proudctsoldprice = getprincefromproductid($productid, $cataid);
                  $returnfromquandata = intval(updatequantityfromids($productid, $cataid, "-", $productquant));

                  if ($returnfromquandata == "-2") messagedisplaying("لا توجد كمية  كافية بالمخزن", 2);
                  if ($returnfromquandata == "-1") {
                    $whatsin = getqantityfromids($productid, $cataid);
                    messagedisplaying(" $whatsin , هذه هي الكمية الموجود فقط  الرجاء التاكد من الطلب", 2);
                  }
                  if ($returnfromquandata >= 0) {
                    mysqli_query($link, "INSERT INTO `productsellstemp`(`idprod`,`cataid`,`pricesold`,`datesold`,`quntity`,`customername`,`customernamerecept`,`whodidthis`)
                    VALUES ('$productid','$cataid','$proudctsoldprice','$datesoldat','$productquant','$customername','$customernamerecept','$suser_name')");
                  }
                }
				
                $resultproudact = mysqli_query($link, "SELECT `id`,`idprod`,`cataid`,`pricesold`,`datesold`,`quntity`,`customername`,`customernamerecept` FROM `productsellstemp` where `whodidthis` = '$suser_name' order by `id`");
                $countx = 1;
				$totalall=0;
                while ($rowproudact = mysqli_fetch_array($resultproudact)) {
                  $idproducttemp = $rowproudact['id'];
                  $categoryvar   = catafromidtoname($rowproudact['cataid']);
                  $proudactName  = getproductnamefromid($rowproudact['idprod']);
				  $quntityvalue  = $rowproudact['quntity'];
                  $pricetobesoldvar = getprincefromproductid($rowproudact['idprod'], $rowproudact['cataid']);
				  $totalall         += ($quntityvalue * $pricetobesoldvar);
                ?>
                  <form action="addprouductsells.php" method="POST">
                    <input name="proudactid" type="hidden" value="<?php echo $proudactid; ?>">
                    <input type="hidden" name="producttempno" value="<?php echo $idproducttemp; ?>">
                    <tr>
                      <td class="p-2 border"><?php echo $countx; ?>.</td>
                      <td class="p-2 border"><?php echo $proudactName; ?></td>
                      <td class="p-2 border"><?php echo number_format($pricetobesoldvar ,2);?></td>
                      <td class="p-2 border"><?php echo $categoryvar; ?></td>
                      <td class="p-2 border"><?php echo $rowproudact['customername']; ?></td>
                      <td class="p-2 border"><?php echo $rowproudact['customernamerecept']; ?></td>
                      <td class="p-2 border"><?php echo $rowproudact['quntity']; ?></td>
                      <td class="p-2 border"><?php echo number_format ($rowproudact['quntity'] * $pricetobesoldvar,2);?></td>
                      <td class="p-2 border">
                        <?php if ($countx == 1) {
                          DisplaySelectedDate("", explode("-", $rowproudact['datesold'])[2], explode("-", $rowproudact['datesold'])[1], explode("-", $rowproudact['datesold'])[0]);
                        } else { ?>
                          <a href="addprouductsells.php?producttempno=<?php echo $idproducttemp; ?>" class="font-bold text-red-600 hover:underline">حذف</a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php 
				  $countx++;
                } 
				?>
				<tr>
                <td class="p-2 border font-bold align-middle">اجمالي</td>
                <td class="p-2 border"></td>
                <td class="p-2 border"></td>
                <td class="p-2 border"></td>
                <td class="p-2 border"></td>
				<td class="p-2 border"></td>
				<td class="p-2 border"></td>
				<td class="p-2 border font-bold align-middle "><strong><?php echo number_format($totalall,2);?></strong></td>
               </tr>
              </tbody>
            </table>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center mt-4">
            <select name="discountsold" class="border rounded-lg p-2 w-full">
              <?php for ($i = 0; $i <= 20; $i++) echo "<option value='$i'>$i%</option>"; ?>
            </select>
            <label class="text-right font-medium">تخفيض</label>
          </div>

          <input type="hidden" name="nowordelay" value="now">

          <div class="flex justify-between mt-4">
		    <button name="relocatebut" type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">تاكيد الشراء</button>
            <button name="killtempbut" type="submit" class="px-4 py-2 bg-red-200 rounded hover:bg-red-300">الغاء الطلب الحالي</button>
            </form>
          </div>
        <?php } ?>
      </div>
    </section>
  </div>