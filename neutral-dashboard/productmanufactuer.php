<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active6 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 

// Get datalist for supplier names
$Sqlgetman = "SELECT `id`, `manfname`, `manfamount` FROM `manfacdelaypayment`";
$retogetname = mysqli_query($link, $Sqlgetman);
$countd = 0;
while ($manrow = mysqli_fetch_array($retogetname)) {
    $mannamefrominlist = $manrow['manfname'];
    if ($countd == 0) {
        echo "<datalist id='manslist'>";
        $countd++;
    } else { ?>
        <option><?php echo $mannamefrominlist; ?></option>
<?php }
}
echo "</datalist>";
?>
<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة الموردين <small class="text-sm text-gray-500">حسابات الموردين</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <form class="space-y-6" action="dbproductmanufactuer.php" method="POST">
                <?php
                if (isset($_GET['RID'])) {
                    messagedisplaying('تم ادخال البيانات بنجاج', 4);
                }
                ?>

                <!-- اسم المورد -->
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <label for="Id" class="w-full md:w-1/5 text-gray-700 font-medium">اسم المورد</label>
                    <input type="text" required name="manfname" list="manslist" id="Id" placeholder="اسم المورد"
                        class="w-full md:w-4/5 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- المقدار -->
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <label for="amount" class="w-full md:w-1/5 text-gray-700 font-medium">المقدار</label>
                    <input type="text" name="manamount" id="amount" placeholder="المقدار"
                        class="w-full md:w-4/5 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- تاريخ سحب البضاعة -->
                <?php DisplayDate("تاريخ سحب البضاعة"); ?>

                <!-- تاريخ السداد -->
				<div></div>
				<label for="amount" class="w-full md:w-1/5 text-gray-700 font-medium">تاريخ السداد</label>
                <?php DisplayDate2nd(""); ?>

                <!-- حركة المال -->
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <label class="w-full md:w-1/5 text-gray-700 font-medium">حركة المال</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-1">
                            <input type="radio" name="inotout" value="23" class="text-blue-600">
                            مطالبه
                        </label>
                        <label class="flex items-center gap-1">
                            <input type="radio" name="inotout" value="12" class="text-blue-600">
                            سداد
                        </label>
                    </div>
                </div>

                <!-- ملحوظة -->
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <label for="note" class="w-full md:w-1/5 text-gray-700 font-medium">ملحوظة</label>
                    <input type="text" name="mandesc" id="note" placeholder="ملحوظة"
                        class="w-full md:w-4/5 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between pt-4 border-t">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        اضافة
                    </button>
					<button type="reset" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        الغاء
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>


