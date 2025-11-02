<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active27 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 

?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <section class="mb-8">
      <h1 class="text-3xl font-semibold text-gray-900 mb-1">صفحة التقارير   </h1>
      <p class="text-gray-600 text-lg"> تقرير الاسعار    </p>
    </section>

    <!-- Form -->
   <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

  <?php
  if (isset($_POST['Empty'])) unset($_POST['proudctnameboxselect']);
  if (isset($_POST['proudctnameboxselect'])) {
    $nameofcata = $_POST['proudctnameboxselect'];
    $cataid = catafromnametoid($nameofcata);
    $where = "where `cataid`= $cataid ";
  } else {
    $where = "";
  }
  ?>

  <form method="POST" action="reportprouductprice.php" class="space-y-4">
    <div class="flex flex-col w-full md:w-2/3">
      <label class="mb-1 text-right text-sm text-gray-600">صف المنتج</label>
      <input name="proudctnameboxselect" type="text"
        value="<?php if (isset($_POST['proudctnameboxselect'])) echo $_POST['proudctnameboxselect']; ?>"
        list="cars2"
        class="p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <?php listofcatanamebox(); ?>
    </div>

    <div class="flex gap-2"> 
      <button type="submit"
       class="bg-blue-600 text-white px-4 py-2 rounded">بحث</button>
      <button type="submit" name="Empty"
        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">عرض الكل</button>
    </div>
  </form>

  <div id="printableArea" class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
        <div class="text-center py-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		 <p class="text-gray-800 font-bold text-black"> تقرير الاسعار    </p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">
		
    <table class="min-w-full text-sm text-gray-800 border border-gray-200">
      <thead>
        <tr class="bg-gray-200 text-gray-700">
          <th class="p-2 border">الرقم</th>
          <th class="p-2 border">اسم المنتج</th>
          <th class="p-2 border">سعر الشراء</th>
          <th class="p-2 border">سعر البيع</th>
          <th class="p-2 border">كمية المنتج</th>
          <th class="p-2 border">صنف المنتج</th>
          <th class="p-2 border">مجموع سعر الشراء</th>
          <th class="p-2 border">مجموع سعر البيع</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $resultproudact = mysqli_query($link, "SELECT `id`, CONCAT(UCASE(LEFT(`pname`, 1)), SUBSTRING(`pname`, 2)) as pname FROM `productname` order by `pname` ");

        $countx = 1;
        $Total = 0;
        $Totalvar = 0;
        while ($rowproudact = mysqli_fetch_array($resultproudact)) {
          $proudactid = $rowproudact['id'];

          $quantityquery = "SELECT `id`, `idprod`, `numberin`, `cataid`, `timedofa` FROM `productquantit` WHERE `idprod` = '$proudactid' ";
          $resultquantity = mysqli_query($link, $quantityquery);
          $rowquantity = mysqli_fetch_array($resultquantity);

          $timedofavar = $rowquantity['timedofa'];
          $cataidvar = $rowquantity['cataid'];
          $numbervar = $rowquantity['numberin'];

          $pricequery = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid` FROM `productprice` WHERE `idprod` = $proudactid and `active` = 1";
          $resultprice = mysqli_query($link, $pricequery);
          $rowprice = mysqli_fetch_array($resultprice);

          $pricesoldvar = $rowprice['pricetobesold'];
          $priceinvar = $rowprice['pricein'];
          $cataid = $rowprice['cataid'];
          $categoryvar = catafromidtoname($cataid);

          $proudactName = $rowproudact['pname'];

          $showRow = !isset($_POST['proudctnameboxselect']) || $nameofcata == $categoryvar;

          if ($showRow) {
            $Total += ($numbervar * $priceinvar);
            $Totalvar += ($numbervar * $pricesoldvar);
        ?>
            <tr class="hover:bg-gray-50">
              <td class="p-2 border"><?php echo $countx++; ?>.</td>
              <td class="p-2 border"><?php echo $proudactName; ?></td>
              <td class="p-2 border"><?php echo $priceinvar; ?></td>
              <td class="p-2 border"><?php echo $pricesoldvar; ?></td>
              <td class="p-2 border"><?php echo $numbervar; ?></td>
              <td class="p-2 border"><?php echo $categoryvar; ?></td>
              <td class="p-2 border"><?php echo number_format($numbervar * $priceinvar, 0); ?></td>
              <td class="p-2 border"><?php echo number_format($numbervar * $pricesoldvar, 0); ?></td>
            </tr>
        <?php
          }
        }
        ?>
        <tr class="bg-gray-100 font-bold">
          <td class="p-2 border">اجمالي</td>
          <td class="p-2 border"></td>
          <td class="p-2 border"></td>
          <td class="p-2 border"></td>
          <td class="p-2 border"></td>
          <td class="p-2 border"></td>
          <td class="p-2 border"><?php echo number_format($Total, 0); ?></td>
          <td class="p-2 border"><?php echo number_format($Totalvar, 0); ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    <button type="submit" onclick="printDiv('printableArea')"
      class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
  </div>
</div>


