<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active8 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الدفعيات       <small class="text-sm text-gray-500">حذف</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <form action="deleteproductpayment.php" method="POST" class="space-y-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 text-sm text-right">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-2 border">الرقم</th>
                                <th class="p-2 border">اسم العميل</th>
                                <th class="p-2 border">مصدر الحساب</th>
                                <th class="p-2 border">طريقة الدفع</th>
                                <th class="p-2 border">ملحوظة</th>
                                <th class="p-2 border">المقدار</th>
                                <th class="p-2 border">حركة المال</th>
                                <th class="p-2 border">التاريخ</th>
                                <th class="p-2 border">الإجراء</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            if (isset($_POST['E'])) {
                                $idvar            = $_POST['idvar'];
                                $querytodelete = "DELETE FROM `accountp` WHERE `id`='$idvar'";
                                mysqli_query($link, $querytodelete);

                                messagedisplaying('تم حذف البيانات بنجاح', 1);
                            }

                            $resultproudact = mysqli_query($link, "SELECT `id`, `accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`, `inorout`, date(`accountdate`) as accountdate , `user_namel`, `timedofa` FROM `accountp` order by `accountname`");

                            $countx = 0;
                            while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                                $countx += 1;
                                $idvar            = $rowproduct['id'];
                                $accountnamevar   = $rowproduct['accountname'];
                                $accountrootvar   = $rowproduct['accountroot'];
                                $methodvar        = $rowproduct['method'];
                                $accountdescvar   = $rowproduct['accountdesc'];
                                $accountamountvar = $rowproduct['accountamount'];
                                $inoroutvar       = $rowproduct['inorout'];
                                $accountdatevar   = $rowproduct['accountdate'];
                                list($accountdatevaryear, $accountdatevarmonth, $accountdatevarday) = explode("-", $accountdatevar);
                            ?>
                                <form action="deleteproductpayment.php" method="POST" class="contents">
                                    <tr>
                                        <input name="idvar" type="hidden" value="<?php echo $idvar; ?>">

                                        <td class="p-2 border"><?php echo $countx; ?>.</td>
                                        <td class="p-2 border"><?php echo $accountnamevar; ?></td>
                                        <td class="p-2 border"><?php echo $accountrootvar; ?></td>
                                        <td class="p-2 border"><?php echo $methodvar; ?></td>
                                        <td class="p-2 border"><?php echo $accountdescvar; ?></td>
                                        <td class="p-2 border"><?php echo $accountamountvar; ?></td>
                                        <td class="p-2 border"><?php echo naminginorout($inoroutvar); ?></td>
                                        <td class="p-2 border"><?php echo $accountdatevar; ?></td>

                                        <td class="p-2 border">
                                            <button name="E" type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                حذف
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
