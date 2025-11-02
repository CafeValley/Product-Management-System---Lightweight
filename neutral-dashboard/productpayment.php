<?php
include 'config.php';
include 'header.php';
$main2 = "true";
$active5 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

 
	
	<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">الدفعيات<small class="text-sm text-gray-500">أضافه</small></h1>
    </header>
    <?php
    if (isset($_GET['RID'])) {
      messagedisplaying('تم ادخال البيانات بنجاج', 4);
    }
    if (isset($_GET['error']))
      seterror($_GET['error']);
    ?>
	<section class="bg-white shadow-md rounded-lg p-6">
        <div class="bg-white rounded-lg shadow p-6">
    <form class="space-y-6"  action="dbproductpayment.php" method="POST">
      <div>
        <label class="block mb-1 text-sm text-gray-700">اسم العميل </label>
        <input name="accountname" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-700">مصدر الحساب </label>
        <?php listofpaymenttypes(); ?>
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-700"> المقدار </label>
        <input name="amountpayed" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-700"> طريقة الدفع </label>
        <select name="typepayment" id="typepayment" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm py-2 px-3">
          <option value="كاش">كاش</option>
          <option value="شيك">شيك</option>
        </select>
      </div>

      <div>
        <?php DisplayDate("التاريخ"); ?>
      </div>
<div class="mb-4">
  <label class="block mb-2 text-sm font-medium text-gray-700">حركة المال</label>
  <div class="flex items-center gap-6 text-sm text-gray-700">
    <label class="flex items-center gap-1">
      <input type="radio" name="inotout" value="23" class="text-blue-600 focus:ring-blue-500">
      سحب
    </label>

    <label class="flex items-center gap-1">
      <input type="radio" name="inotout" value="12" class="text-blue-600 focus:ring-blue-500">
      إيداع
    </label>
  </div>
</div>

      <div>
        <label class="block mb-1 text-sm text-gray-700"> ملحوظة </label>
        
          <textarea name="note" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
      </div>
      <div class="flex justify-between pt-4 border-t">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        اضافة
                    </button>
					<button type="reset" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        الغاء
                    </button>
                </div>
    </form>
  </form>
        </div>
    </section>
</body>

</html>