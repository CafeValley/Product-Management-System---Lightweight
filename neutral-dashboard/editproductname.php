<?php
include 'config.php';
include 'header.php';
$main5 = "true";
$active21 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة المنتجات   <small class="text-sm text-gray-500">تعديل</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
    <div class="bg-white shadow rounded-lg p-4">
      <form action="editproductname.php" method="POST" class="space-y-4">
        <?php
        if (isset($_POST['E'])) {
            $idproduct      = $_POST['idproduct'];
            $productnamevar = $_POST['productnamevar'];
            $postedcataid   = $_POST['cataid'];

            mysqli_query($link, "UPDATE `productprice` SET `cataid`='$postedcataid' WHERE `idprod` = '$idproduct'");
            mysqli_query($link, "UPDATE `productquantit` SET `cataid`='$postedcataid' WHERE `idprod` = '$idproduct'");
            $querytoupdate = "UPDATE `productname` SET `pname` ='$productnamevar' WHERE `id`='$idproduct'";
            mysqli_query($link, $querytoupdate);

            messagedisplaying('تم تعديل البيانات بنجاح', 3);
        }

        $resultproudact = mysqli_query($link, "SELECT * FROM `productname` ORDER BY `pname` ");
        $countx = 0;
        ?>

        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200 text-right">
            <thead class="bg-gray-100 text-gray-700">
              <tr>
                <th class="p-2 border">الرقم</th>
                <th class="p-2 border">اسم المنتج</th>
                <th class="p-2 border">صنف المنتج</th>
                <th class="p-2 border">إجراء</th>
              </tr>
            </thead>
            <tbody class="text-gray-800">
              <?php
              while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                  $countx++;
                  $idproduct = $rowproduct['id'];
                  $productnamevar = $rowproduct['pname'];

                  $resultproudactcata = mysqli_query($link, "SELECT `cataid` FROM `productprice` WHERE `idprod` = '$idproduct'");
                  $rowproductcata = mysqli_fetch_array($resultproudactcata);
                  $cataidhere = $rowproductcata['cataid'];
                 
                  $cname = catafromidtoname($cataidhere);
              ?>
              <form action="editproductname.php" method="POST">
                <input type="hidden" name="idproduct" value="<?php echo $idproduct; ?>">
                <tr class="hover:bg-gray-50">
                  <td class="p-2 border"><?php echo $countx; ?>.</td>
                  <td class="p-2 border">
                    <input type="text" name="productnamevar" value="<?php echo $productnamevar; ?>" class="w-full border border-gray-300 rounded p-1 text-right" />
                  </td>
                  <td class="p-2 border">
                    <?php listofcata($cataidhere); ?>
                  </td>
                  <td class="p-2 border">
                    <button name="E" type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">تعديل</button>
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
