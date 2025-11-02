<?php
include 'config.php';
include 'header.php';
$main7 = "true";
$active26 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <section class="mb-8 ">
      <h1 class="text-3xl font-semibold text-gray-900 mb-1">صفحة التقارير   </h1>
      <p class="text-gray-600 text-lg"> تقرير الموردين    </p>
    </section>

    <!-- Form class="mb-6 flex flex-wrap items-center gap-4 -->

           <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">

      <form action="reportmanfpaymentdelay.php" method="POST" class="space-y-4">
        <?php 
        $where = "";
        if (isset($_POST['manfdelayname'])) {
          $manfName = $_POST['manfdelayname'];
          listofmansdelayenhanced($manfName);
          if ($manfName == "nothing")
            $where = "";
          else
            $where = " where `manfname` = '$manfName'";
        } else {
          listofmansdelayenhanced();
          $where = "";
        }
        ?>
        <button name="killtempbut" type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
          بحث
        </button>
      </form>
  

    <!-- Report Table  -->

    <div id="printableArea" class="overflow-x-auto max-w-7xl mx-auto bg-white shadow-md rounded-md font-serif">
        <div class="text-center py-6">
        <h2 class="text-4xl font-bold text-black"><?php echo $company_name; ?></h2>
		<p class="text-gray-800 font-bold text-black"> تقرير الموردين    </p>
      </div>
	  <style>
       
        .logo {
            width: 200px;
            margin: 20px auto;
        }
       
    </style>
        <img src="logoinvo.jpg" class="logo" alt="Company Logo">

      <table class="min-w-full text-sm text-gray-800 border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="border border-gray-300 px-4 py-2">الرقم</th>
            <th class="border border-gray-300 px-4 py-2">اسم المورد</th>
            <th class="border border-gray-300 px-4 py-2">الفاتورة</th>
            <th class="border border-gray-300 px-4 py-2">حركة المال</th>
            <th class="border border-gray-300 px-4 py-2">ملحوظه</th>
            <th class="border border-gray-300 px-4 py-2">تاريخ سحب البضاعة</th>
            <th class="border border-gray-300 px-4 py-2">تاريخ السداد</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sqltoshow = "SELECT `id`, `manfname`, `manfamount`, `inorout`,`note`, date(`manfdate`) as manfdate , date(manfdate2nd) as manfdate2nd, `active`, `user_namel`, `timedofa` FROM `manfacdelaypayment` $where order by `manfdate`";
          $resultproudact = mysqli_query($link, $sqltoshow);
          $countx = 1;
          $totalofwanted = 0;
          $totalofpayed = 0;
          $total23 = 0;
          $total12 = 0;

          while ($rowproduct = mysqli_fetch_array($resultproudact)) {
            $manamount = $rowproduct['manfamount'];
            $maninorout = $rowproduct['inorout'];
            $mandate = $rowproduct['manfdate'];
            $mandate2nd = $rowproduct['manfdate2nd'];
            $manfname = $rowproduct['manfname'];
            $mannote = $rowproduct['note'];

            if ($maninorout == '12') {
              $totalofremeing = gettotalofwanted($manfname);
              $totalofpayed += $totalofremeing;
              $total12 += $manamount;
            }
            if ($maninorout == '23') {
              $total23 += $manamount;
              $reming = gettotalofpayed($manfname);
              $totalofwanted += $reming;
            }
            ?>
            <tr class="<?= $countx % 2 == 0 ? 'bg-gray-50' : '' ?>">
              <td class="border border-gray-300 px-4 py-2 w-12"><?= $countx ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($manfname) ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= number_format($manamount, 0) ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= naminginoroutman($maninorout) ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($mannote) ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= $mandate ?></td>
              <td class="border border-gray-300 px-4 py-2"><?= $mandate2nd ?></td>
            </tr>
            <?php
            $countx++;
          }
          ?>
        </tbody>
      </table>

      <table class="min-w-full border border-gray-300 border-collapse mt-6">
        <tr class="bg-gray-100 font-semibold text-center">
          <td class="border border-gray-300 px-4 py-2" colspan="2">اجمالي المطلوب</td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total23, 0) ?></td>
          <td class="border border-gray-300 px-4 py-2">اجمالي السداد</td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total12, 0) ?></td>
          <td class="border border-gray-300 px-4 py-2">المتبقي</td>
          <?php 
            $totalofreming = $totalofpayed - $totalofwanted;
          ?>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total23 - $total12, 0) ?></td>
        </tr>
      </table>
	  </div>
	   <div class="mt-6">
    <button 
	type="button" 
	onclick="printDiv('printableArea')"
    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
  </div>
	  
  </section>

 
  

    
	 
    


