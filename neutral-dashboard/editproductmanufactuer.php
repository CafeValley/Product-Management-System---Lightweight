<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active9 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الدفعيات      <small class="text-sm text-gray-500">تعديل</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Main content -->
    <div class="bg-white shadow rounded-lg p-4">
        <form action="editproductmanufactuer.php" method="POST" class="space-y-6">
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200 text-sm text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-right">الرقم</th>
                            <th class="px-4 py-2 text-right">اسم المورد</th>
                            <th class="px-4 py-2 text-right">الفاتوره</th>
                            <th class="px-4 py-2 text-right whitespace-nowrap w-auto">حركة المال</th>
                            <th class="px-4 py-2 text-right whitespace-nowrap w-auto">تاريخ السحب</th>
                            <th class="px-4 py-2 text-right whitespace-nowrap w-auto">تاريخ السداد</th>
                            <th class="px-4 py-2 text-right">ملاحظات</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        if (isset($_POST['E'])) {
                            $idvar       = $_POST['idvar'];
                            $manfname    = $_POST['manfname'];
                            $manfamount  = $_POST['manfamount'];
                            $inout       = $_POST['inoroutvar'];
                            $manfnote    = $_POST['mannote'];
                            $manfdate    = changedateformate(Eatdayformat($_POST['Day'], $_POST['Month'], $_POST['Year']));
                            $manfdate2nd = changedateformate(Eatdayformat($_POST['Day2nd'], $_POST['Month2nd'], $_POST['Year2nd']));

                            $querytoupdate = "UPDATE `manfacdelaypayment` 
                                SET `manfname`='$manfname',
                                    `manfamount`='$manfamount',
                                    `inorout`= '$inout',
                                    `manfdate`='$manfdate',
                                    `manfdate2nd`='$manfdate2nd',
                                    `note`= '$manfnote' 
                                WHERE `id` = '$idvar'";
                            mysqli_query($link, $querytoupdate);

                            messagedisplaying('تم تعديل البيانات بنجاح', 3);
                        }

                        $resultproudact = mysqli_query($link, "SELECT `id`, `manfname`, `manfamount`, `inorout`, date(`manfdate`) as manfdate, date(`manfdate2nd`) as manfdate2nd, `note` FROM `manfacdelaypayment` ORDER BY `manfname`");
                        $countx = 0;
                        while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                            $countx++;
                            $idvar       = $rowproduct['id'];
                            $manfname    = $rowproduct['manfname'];
                            $manfamount  = $rowproduct['manfamount'];
                            $inout       = $rowproduct['inorout'];
                            $manfdate    = $rowproduct['manfdate'];
                            list($manfyear, $manfmonth, $manfday) = explode("-", $manfdate);

                            $manfdate2nd = $rowproduct['manfdate2nd'];
                            list($manf2ndyear, $manf2ndmonth, $manf2ndday) = explode("-", $manfdate2nd);

                            $manfnote    = $rowproduct['note'];
                        ?>
                        <form action="editproductmanufactuer.php" method="POST">
                            <tr>
                                <input type="hidden" name="idvar" value="<?php echo $idvar; ?>">
                                <td class="px-4 py-2"><?php echo $countx; ?>.</td>
                                <td class="px-4 py-2">
                                    <input type="text" name="manfname" value="<?php echo $manfname; ?>" class="w-full border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-300">
                                </td>
                                <td class="px-4 py-2">
                                    <input type="text" name="manfamount" value="<?php echo $manfamount; ?>" class="w-full border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-300">
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap w-auto">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="inoroutvar" value="23" <?php if ($inout == 23) echo "checked"; ?> class="text-blue-600">
                                        <span class="mr-1">مطالب</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="inoroutvar" value="12" <?php if ($inout == 12) echo "checked"; ?> class="text-green-600">
                                        <span class="mr-1">ايداع</span>
                                    </label>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap w-auto">
                                    <?php if (isset($manfyear)) DisplaySelectedDate("", $manfday, $manfmonth, $manfyear);
                                    else DisplayDate(""); ?>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap w-auto">
                                    <?php if (isset($manfdate2nd)) DisplaySelectedDate2nd("", $manf2ndday, $manf2ndmonth, $manf2ndyear);
                                    else DisplayDate2nd(""); ?>
                                </td>
                                <td class="px-4 py-2">
                                    <input type="text" name="mannote" value="<?php echo $manfnote; ?>" class="w-full border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-300">
                                </td>
                                <td class="px-4 py-2">
                                    <button name="E" type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded shadow">
                                        تعديل
                                    </button>
                                </td>
                            </tr>
                        </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
      </section>
</div>
