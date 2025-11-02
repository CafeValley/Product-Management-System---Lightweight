<?php
include 'config.php';
include 'header.php';
$main9 = "true";
$active37 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <section class="mb-8">
      <h1 class="text-3xl font-semibold text-gray-900 mb-1">صفحة التقارير</h1>
      <p class="text-gray-600 text-lg">تقرير الدفعيات السنوي</p>
    </section>

    <!-- Form -->
     <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">
      <form action="reportyearpayment.php" method="POST" class="space-y-4">
      
          <?php
          $before = date('Y-01-01');
          $after = date('Y-12-t');
          $where = "where date(accountdate) between '$before' and '$after'";
          if (isset($_POST['sourceofcash'])) {
            $sourceofcash = $_POST['sourceofcash'];
            if ($sourceofcash == "كل")
              $where = $where . " ";
            else
              $where = $where . " and `accountroot` ='$sourceofcash'";
          }
          ?>

          <div class="space-y-4">
        <label for="Statetypo" class="block text-gray-700 font-medium">مصدر الحساب</label>
        <select name="sourceofcash" id="Statetypo" class="w-full border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <?php
              $options = [
                "كل", "زبون", "رواتب", "منصرفات", "ارباح", "سلفية",
                "سلفيات خارجية", "مبيعات", "خزنه"
              ];
              foreach ($options as $opt) {
                $selected = (isset($sourceofcash) && $sourceofcash === $opt) ? "selected" : "";
                echo "<option value=\"$opt\" $selected>$opt</option>";
              }
              ?>
            </select>
          </div>

          <?php
          if (isset($sourceofcash) && in_array($sourceofcash, ["زبون", "رواتب", "منصرفات", "سلفية","profits", "externalloan"])) {
          ?>
            <div class="mt-4">
              <input
                name="nameofcusin"
                type="text"
                list="accountname"
                value="<?php echo isset($_POST['nameofcusin']) ? htmlspecialchars($_POST['nameofcusin']) : ''; ?>"
                placeholder="اكتب هنا..."
                class="w-full sm:w-64 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              <p class="mt-1 text-sm text-gray-600">
                <?php
                $labels = [
                  "زبون" => "تخصيص الزبون",
                  "رواتب" => "تخصيص رواتب",
                  "منصرفات" => "تخصيص منصرفات",
                  "سلفية" => "تخصيص سلفية",
                  "profits" => "تخصيص الارباح",
                  "externalloan" => "تخصيص السلفيات الخارجيه"
                ];
                echo $labels[$sourceofcash] ?? "";
                ?>
              </p>
            </div>
          <?php } ?>

          <div class="mt-6">
            <input
              type="submit"
              name="dateprested"
              value="بحث"
              class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer transition"
            />
          </div>
      
      </form>

      <!-- Table -->
      <div  id="printableArea" class="overflow-x-auto mt-8">
	    <div class="text-center mb-6">
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
        <table class="min-w-full border border-gray-300 border-collapse text-right">
          <thead class="bg-gray-100">
            <tr>
              <th class="border border-gray-300 px-4 py-2">الرقم</th>
              <th class="border border-gray-300 px-4 py-2">اسم العميل</th>
              <th class="border border-gray-300 px-4 py-2">مصدر الحساب</th>
              <th class="border border-gray-300 px-4 py-2">طريقة الدفع</th>
              <th class="border border-gray-300 px-4 py-2">المقدار</th>
              <th class="border border-gray-300 px-4 py-2">حركة المال</th>
              <th class="border border-gray-300 px-4 py-2">التاريخ</th>
              <th class="border border-gray-300 px-4 py-2">ملحوظه</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST['nameofcusin']) && $_POST['nameofcusin'] != '') {
              $namepfcus = $_POST['nameofcusin'];
              $where .= " and `accountname` = '$namepfcus'";
            }

            $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate FROM `accountp` $where order by accountname";
            $resultproudact = mysqli_query($link, $sqltogettheereport);
            $countx = 1;
            $total23 = 0;
            $total12 = 0;
            while ($rowproduct = mysqli_fetch_array($resultproudact)) {
              $accountnamevar = $rowproduct['accountname'];
              $accountrootvar = $rowproduct['accountroot'];
              $methodvar = $rowproduct['method'];
              $accountdescvar = $rowproduct['accountdesc'];
              $accountamountvar = $rowproduct['accountamount'];
              $inoroutvar = $rowproduct['inorout'];
              $accountdatevar = $rowproduct['accountdate'];

              if ($accountrootvar == 'profits') $accountrootvar = 'ارباح';
              if ($accountrootvar == 'externalloan') $accountrootvar = 'سلفيات خارجية';

              if ($inoroutvar == '23') $total23 += $accountamountvar;
              if ($inoroutvar == '12') $total12 += $accountamountvar;
            ?>
              <tr class="<?= $countx % 2 == 0 ? 'bg-gray-50' : '' ?>">
                <td class="border border-gray-300 px-4 py-2"><?= $countx ?>.</td>
                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($accountnamevar) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $accountrootvar ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $methodvar ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= number_format($accountamountvar, 0) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= naminginorout($inoroutvar) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $accountdatevar ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($accountdescvar) ?></td>
              </tr>
            <?php
              $countx++;
            }
            ?>
          </tbody>
        </table>
     

      <!-- Totals -->
      <table class="w-full max-w-md mt-8 border border-gray-300 border-collapse mx-auto text-center">
        <tr class="bg-gray-100 font-semibold">
          <td class="border border-gray-300 px-4 py-2">اجمالي السحب</td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total23, 0) ?></td>
          <td class="border border-gray-300 px-4 py-2">اجمالي الايداع</td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total12, 0) ?></td>
          <td class="border border-gray-300 px-4 py-2">اجمالي الخزنه</td>
          <td class="border border-gray-300 px-4 py-2"><?= number_format($total12 - $total23, 0) ?></td>
        </tr>
      </table>
 </div>
     <div class="mt-6">
        <button type="button" onclick="printDiv('printableArea')"
         class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
          طباعة
        </button>
      </div>
    </section>
  </div>
</div>
