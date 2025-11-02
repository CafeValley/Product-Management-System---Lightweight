<?php
include 'config.php';
include 'header.php';
$main8 = "true";
$active35 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<!-- Content Wrapper -->

<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">
    <!-- Header -->
    <section class="mb-8">
      <h1 class="text-3xl font-semibold text-gray-900 mb-1">صفحة التقارير الشهرية </h1>
      <p class="text-gray-600 text-lg">تقرير الدفعيات الشهري  </p>
    </section>

    <!-- Form -->
     <section class="bg-white shadow-lg rounded-xl p-6 space-y-6">
    <form action="reportmonthpayment.php" method="POST" class="space-y-4">

      <?php
      $before = date('Y-m-01');
      $after = date('Y-m-t');
      $where = "where date(accountdate) between '$before' and '$after'";
      if (isset($_POST['sourceofcash'])) {
          $sourceofcash = $_POST['sourceofcash'];
          if ($sourceofcash != "كل") {
              $where .= " and `accountroot` ='$sourceofcash'";
          }
      }
      ?>

      <div class="space-y-4">
        <label for="Statetypo" class="block text-gray-700 font-medium">مصدر الحساب</label>
        <select name="sourceofcash" id="Statetypo" class="w-full border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
          <?php
          $options = [
            "كل" => "كل",
            "زبون" => "زبون",
            "رواتب" => "رواتب",
            "منصرفات" => "منصرفات",
            "profits" => "ارباح",
            "سلفية" => "سلفية",
            "externalloan" => "سلفيات خارجية",
            "مبيعات" => "مبيعات",
            "خزنه" => "خزنه",
          ];

          $selected = $_POST['sourceofcash'] ?? 'كل';

          foreach ($options as $value => $label) {
              $isSelected = ($selected === $value) ? "selected" : "";
              echo "<option value=\"$value\" $isSelected>$label</option>";
          }
          ?>
        </select>

        <?php if (in_array($selected, ["زبون", "رواتب", "منصرفات", "سلفية",  "profits", "externalloan"])): ?>
          <div>
            <input
              name="nameofcusin"
              type="text"
              value="<?php echo isset($_POST['nameofcusin']) ? htmlspecialchars($_POST['nameofcusin']) : ''; ?>"
              list="accountname"
              placeholder="أدخل اسم العميل"
              class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <p class="mt-1 text-sm text-gray-500">
              <?php
                $labels = [
                  "زبون" => "تخصيص الزبون",
                  "رواتب" => "تخصيص رواتب",
                  "منصرفات" => "تخصيص منصرفات",
                  "سلفية" => "تخصيص سلفية",
                  "profits" => "تخصيص الارباح",
                  "externalloan" => "تخصيص السلفيات الخارجيه",
                ];
                echo $labels[$selected] ?? "";
              ?>
            </p>
          </div>
        <?php endif; ?>
      </div>

      <button type="submit" name="dateprested" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
        بحث
      </button>
    </form>

    <!-- Table -->
    <div id="printableArea" class="bg-white shadow-md rounded-lg p-4 overflow-x-auto text-right font-[Droid Arabic Naskh]">
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
		
      <table class="min-w-full border border-gray-300 text-right" dir="rtl">
        <thead class="bg-gray-100">
          <tr>
            <th class="border p-2">الرقم</th>
            <th class="border p-2">اسم العميل</th>
            <th class="border p-2">مصدر الحساب</th>
            <th class="border p-2">طريقة الدفع</th>
            <th class="border p-2">المقدار</th>
            <th class="border p-2">حركة المال</th>
            <th class="border p-2">التاريخ</th>
            <th class="border p-2">ملحوظه</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Your PHP loop for rows here, only changed table cell classes for Tailwind

          $countx = 1;
          $total23 = 0;
          $total12 = 0;

          if (isset($_POST['nameofcusin']) && $_POST['nameofcusin'] != '') {
            $namepfcus = $_POST['nameofcusin'];
            $where .= " and `accountname` = '$namepfcus'";
          }

          $sqltogettheereport = "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`,  `inorout`, date(accountdate) as accountdate, `user_namel`, `timedofa` FROM `accountp` $where order by accountname";
          $resultproudact = mysqli_query($link, $sqltogettheereport);

          while ($rowproduct = mysqli_fetch_array($resultproudact)) {
            $idvar            = $rowproduct['id'];
            $accountnamevar   = $rowproduct['accountname'];
            $accountrootvar   = $rowproduct['accountroot'];
            $methodvar        = $rowproduct['method'];
            $accountdescvar   = $rowproduct['accountdesc'];
            $accountamountvar = $rowproduct['accountamount'];
            $inoroutvar       = $rowproduct['inorout'];
            $accountdatevar   = $rowproduct['accountdate'];

            if ($inoroutvar == '23') $total23 += $accountamountvar;
            if ($inoroutvar == '12') $total12 += $accountamountvar;

            if ($accountrootvar == 'profits') $accountrootvar = 'ارباح';
            if ($accountrootvar == 'externalloan') $accountrootvar = 'سلفيات خارجية';

            echo "<tr class='even:bg-gray-50 odd:bg-white'>";
            echo "<td class='border p-2 text-center'>{$countx}.</td>";
            echo "<td class='border p-2'>{$accountnamevar}</td>";
            echo "<td class='border p-2'>{$accountrootvar}</td>";
            echo "<td class='border p-2'>{$methodvar}</td>";
            echo "<td class='border p-2 text-right'>" . number_format($accountamountvar, 0) . "</td>";
            echo "<td class='border p-2'>" . naminginorout($inoroutvar) . "</td>";
            echo "<td class='border p-2'>{$accountdatevar}</td>";
            echo "<td class='border p-2'>{$accountdescvar}</td>";
            echo "</tr>";

            $countx++;
          }
          ?>
        </tbody>
      </table>

      <!-- Totals Table -->
      <table class="mt-6 w-full max-w-md mx-auto border border-gray-300 text-right" dir="rtl">
        <tr class="bg-gray-100">
          <td class="border p-2 font-semibold">اجمالي السحب</td>
          <td class="border p-2"><?php echo number_format($total23, 0); ?></td>
          <td class="border p-2 font-semibold">اجمالي الايداع</td>
          <td class="border p-2"><?php echo number_format($total12, 0); ?></td>
          <td class="border p-2 font-semibold">اجمالي الخزنه</td>
          <td class="border p-2"><?php echo number_format($total12 - $total23, 0); ?></td>
        </tr>
      </table>
    </div>

     <div class="mt-6">
    <button type="button" onclick="printDiv('printableArea')"
 class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">طباعة</button>
    </button>
    </div>
  </section>
</div>
