<?php
include 'config.php';
include 'header.php';
$main5 = "true";
$active20 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>
  <div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
   <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة المنتجات <small class="text-sm text-gray-500">أضافه</small></h1>
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
      <form class="space-y-6" action = "dbproductname.php" method = "POST">
        <div>
          <label class="block mb-1 text-sm text-gray-700">اسم المنتج </label>
          <input name="productname" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700"> سعر شراء المنتج</label>
          <input name="pricebuyproduct" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700">سعر بيع المنتج </label>
          <input name="pricesellproduct" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700">كمية المنتج </label>
          <input name="productqanti" type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
       
         <div class="md:col-span-2">
          <label class="block mb-1 text-sm text-gray-700">صف المنتج </label>
        <?php listofcata(); ?>
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
    </div>
  </div>
   </section>
</body>
</html>
