<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active10 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الدفعيات      <small class="text-sm text-gray-500">حذف</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
        <div class="bg-white shadow-md rounded-lg p-6">

            <form class="space-y-4" action="deleteproductmanfactuer.php" method="POST">

                <div class="overflow-x-auto">
                    <table id="example2" class="min-w-full border border-gray-300 divide-y divide-gray-200 text-right">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">الرقم</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">اسم المورد</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">الفاتوره</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">حركة المال</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">تاريخ السحب</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">تاريخ السداد</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">ملحوظه</th>
                                <th class="px-4 py-2 text-sm font-semibold text-gray-700">إجراء</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                        <?php
                        if (isset($_POST['E'])) {
                            $idvar = $_POST['idvar'];
                            $querytodelete = "DELETE FROM `manfacdelaypayment` WHERE `id` = '$idvar'";
                            mysqli_query($link, $querytodelete);
                            messagedisplaying('تم حذف البيانات بنجاح', 1);
                        }

                        $resultproudact = mysqli_query(
                            $link,
                            "SELECT `id`, `manfname`, `manfamount`, `inorout`,
                            DATE(`manfdate`) as manfdate, DATE(`manfdate2nd`) as manfdate2nd,
                            `note`
                            FROM `manfacdelaypayment` ORDER BY `manfname`"
                        );

                        $countx = 0;
                        while ($rowproduct = mysqli_fetch_array($resultproudact)) {
                            $countx++;
                            $idvar       = $rowproduct['id'];
                            $manfname    = $rowproduct['manfname'];
                            $manfamount  = $rowproduct['manfamount'];
                            $inout       = $rowproduct['inorout'];
                            $manfdate    = $rowproduct['manfdate'];
                            $manfdate2nd = $rowproduct['manfdate2nd'];
                            $manfnote    = $rowproduct['note'];
                        ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $countx; ?>.</td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $manfname; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $manfamount; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo naminginoroutman($inout); ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $manfdate; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $manfdate2nd; ?></td>
                                <td class="px-4 py-2 text-sm text-gray-700"><?php echo $manfnote; ?></td>
                                <td class="px-4 py-2">
                                    <form action="deleteproductmanfactuer.php" method="POST" class="inline-block">
                                        <input name="idvar" type="hidden" value="<?php echo $idvar; ?>">
                                        <button name="E" type="submit"
                                            class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                                            حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
</div>
