<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active7 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الدفعيات      <small class="text-sm text-gray-500">تعديل</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <form action="editproductpayment.php" method="POST" class="space-y-6">

                <!-- Table -->
                <div class="w-auto ">
                    <table class="border border-gray-200 text-sm text-right">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-2 border">الرقم</th>
                                <th class="p-2 border">اسم العميل</th>
                                <th class="p-2 border">مصدر الحساب</th>
                                <th class="p-2 border">طريقة الدفع</th>
                                <th class="p-2 border">ملحوظة</th>
                                <th class="p-2 border">المقدار</th>
                                <th class="p-2 border w-auto whitespace-nowrap">حركة المال</th>
                                <th class="p-2 border w-auto whitespace-nowrap">التاريخ</th>
                                <th class="p-2 border">الإجراء</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            <?php
                            if (isset($_POST['E'])) {
                                $idvar            = $_POST['idvar'];
                                $accountnamevar   = $_POST['accountnamevar'];
                                $accountrootvar   = $_POST['sourceofcash'];
                                $methodvar        = $_POST['methodvar'];
                                $accountdescvar   = $_POST['accountdescvar'];
                                $accountamountvar = $_POST['accountamountvar'];
                                $inoroutvar       = $_POST['inoroutvar'];
                                $accountdatevar   = changedateformate(Eatdayformat($_POST['Day'], $_POST['Month'], $_POST['Year']));

                                $querytoupdate = "UPDATE `accountp` SET `accountname`='$accountnamevar',`accountroot`='$accountrootvar',`method`='$methodvar',`accountdesc`='$accountdescvar',`accountamount`='$accountamountvar',`inorout`='$inoroutvar',`accountdate`='$accountdatevar' WHERE `id`='$idvar'";
                                mysqli_query($link, $querytoupdate);

                                messagedisplaying('تم تعديل البيانات بنجاح', 3);
                            }

                            $resultproudact = mysqli_query($link, "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`, `inorout`, date(`accountdate`) as accountdate , `user_namel`, `timedofa` FROM `accountp` order by `accountname`");

                            $countx = 0;
                            while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                                $countx += 1;
                                $idvar             = $rowproduct['id'];
                                $accountnamevar    = $rowproduct['accountname'];
                                $accountrootvar    = $rowproduct['accountroot'];
                                $methodvar         = $rowproduct['method'];
                                $accountdescvar    = $rowproduct['accountdesc'];
                                $accountamountvar  = $rowproduct['accountamount'];
                                $inoroutvar        = $rowproduct['inorout'];
                                $accountdatevar    = $rowproduct['accountdate'];
                                list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);
                            ?>
                                <form action="editproductpayment.php" method="POST" class="contents">
                                    <tr>
                                        <input name="idvar" type="hidden" value="<?php echo $idvar; ?>">

                                        <td class="p-2 border"><?php echo $countx; ?>.</td>

                                        <td class="p-2 border">
                                            <input type="text" name="accountnamevar" value="<?php echo $accountnamevar; ?>"
                                                class="w-full border-gray-300 rounded p-1 focus:ring-blue-500 focus:border-blue-500">
                                        </td>

                                        <td class="p-2 border">
                                            <?php listofpaymenttypes($accountrootvar); ?>
                                        </td>

                                        <td class="p-2 border">
                                            <input type="text" name="methodvar" value="<?php echo $methodvar; ?>"
                                                class="w-full border-gray-300 rounded p-1 focus:ring-blue-500 focus:border-blue-500">
                                        </td>

                                        <td class="p-2 border">
                                            <input type="text" name="accountdescvar" value="<?php echo $accountdescvar; ?>"
                                                class="w-full border-gray-300 rounded p-1 focus:ring-blue-500 focus:border-blue-500">
                                        </td>

                                        <td class="p-2 border">
                                            <input type="text" name="accountamountvar" value="<?php echo $accountamountvar; ?>"
                                                class="w-full border-gray-300 rounded p-1 focus:ring-blue-500 focus:border-blue-500">
                                        </td>

                                        <td class="p-2 border w-auto whitespace-nowrap">
                                            <label class="inline-flex items-center gap-1">
                                                <input type="radio" name="inoroutvar" <?php if ($inoroutvar == 23) echo "checked"; ?> value="23" class="text-blue-600">
                                                سحب
                                            </label>
                                            <label class="inline-flex items-center gap-1 ml-2">
                                                <input type="radio" name="inoroutvar" <?php if ($inoroutvar == 12) echo "checked"; ?> value="12" class="text-blue-600">
                                                ايداع
                                            </label>
                                        </td>

                                        <td class="p-2 border w-auto whitespace-nowrap">
                                            <?php
                                            if (isset($accountdatevaryear))
                                                DisplaySelectedDate("", $accountdatevarday, $accountdatevarmonth, $accountdatevaryear);
                                            else
                                                DisplayDate("");
                                            ?>
                                        </td>

                                        <td class="p-2 border">
                                            <button name="E" type="submit"
                                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
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
