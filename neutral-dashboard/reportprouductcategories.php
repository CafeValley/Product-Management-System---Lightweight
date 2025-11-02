<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active28 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>
 
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <section class="mb-8">
      <h1 class="text-3xl font-semibold text-gray-900 mb-1">صفحة التقارير   </h1>
      <p class="text-gray-600 text-lg"> تقرير اصناف المبيعات    </p>
    </section>

    <!-- Form -->
        <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">
    <!-- Report Content -->
    <form action="reportprouductcategories.php" method="POST" class="space-y-4">
      
      

      <div id="printableArea" class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
        <div class="text-center py-6">
          <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
         <p class="text-gray-800 font-bold text-black"> تقرير اصناف المبيعات     </p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">

        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200 border text-right">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 font-semibold text-gray-700 border">الرقم</th>
                <th class="px-4 py-2 font-semibold text-gray-700 border">صنف المنتج</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">

              <?php
              if (isset($_POST['E'])) {
                $idvar = $_POST['idvar'];
                $producttnamevar = $_POST['producttnamevar'];
                $producttname = $_POST['producttname'];

                messagedisplaying('Data for price , Edited', 2);
              }

              $resultproudact = mysqli_query($link, "SELECT `id`, CONCAT(UCASE(LEFT(`cname`, 1)), SUBSTRING(`cname`, 2)) as cname
                                                    FROM `productcategory` ORDER BY `cname`");

              $countx = 1;
              while ($rowproudact = mysqli_fetch_array($resultproudact)) {
                $proudactid = $rowproudact['id'];
                $categoryvar = $rowproudact['cname'];
              ?>
                <tr>
                  <input type="hidden" name="idvar" value="<?php echo $idvar; ?>">
                  <td class="px-4 py-2 border"><?php echo $countx; ?>.</td>
                  <td class="px-4 py-2 border"><?php echo $categoryvar; ?></td>
                </tr>
              <?php
                $countx += 1;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
	  <button 
	type="button" 
	onclick="printDiv('printableArea')"
    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
    </form>
  </div>
</div>
