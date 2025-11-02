<?php
require_once "checkiffromup.php"; 
?>
<aside class="w-64 h-screen bg-white shadow-md fixed right-0 top-0 overflow-y-auto flex flex-col justify-between text-right" dir="rtl">
  <div class="px-4 py-6 space-y-4">

    <!-- HOME SECTION -->
    <div class="space-y-2">
      <h2 class="text-xs text-gray-400 font-semibold mb-1">الرئيسية</h2>
      <div class="space-y-1">
        <a href="info.php" class="<?php echo $active01; ?>">معلومات</a>
        <a href="adminstarterpage.php" class="<?php echo $active02; ?>">الاستعلامات</a>
      </div>
    </div>

    <!-- first SECTION -->
    <h2 class="text-xs text-gray-400 font-semibold mb-1">مدخلات</h2>
    <div x-data="{ open: <?php echo $main1; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-currency-dollar text-base"></i>
          المبيعات
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
       <?php if ($stype == 'SprAdmin'): ?>
       <!-- Only visible to SprAdmin -->
        <a href="priceprouductsells.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active1; ?>">معرفة السعر</a>
        <?php endif; ?>
        <a href="addprouductsells.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active2; ?>">بيع</a>
        <a href="productorder.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active3; ?>">الطلبات</a>
        <a href="productorderreturn.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active4; ?>">الطلبات المردودة</a>
      </div>
    </div>
    <div x-data="{ open: <?php echo $main2; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-wallet2  text-base"></i>
          الدفعيات
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="productpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active5; ?>">إضافه</a>
        <a href="productmanufactuer.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active6; ?>"> اضافه حسابات الموردين</a>
        <a href="editproductpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active7; ?>">تعديل</a>
        <a href="deleteproductpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active8; ?>">حذف</a>
        <a href="editproductmanufactuer.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active9; ?>">تعديل - مورد</a>
        <a href="deleteproductmanfactuer.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active10; ?>">حذف -مورد</a>
      </div>
    </div>
    <!-- 2nd SECTION -->
	<?php if ($stype == 'SprAdmin'): ?>
	<!-- Only visible to SprAdmin -->
    <div x-data="{ open: <?php echo $main3; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-cash-stack text-base"></i>
          تغيير الاسعار
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="editproductpricelist.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active11; ?>">تغير الاسعار بالصنف</a>
        <a href="editproductprice.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active12; ?>">تغير سعر كل المنتجات</a>
        <a href="productprice.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active13; ?>">تغير سعر منتج معين</a>
        <a href="productpricecata.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active14; ?>">تغير سعر - اضافه نسبه</a>
        <a href="productallprice.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active15; ?>">تغير سعر كافة المنتجات بالنسبه</a>
        <a href="productpricecatadown.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active16; ?>">تغير سعر - خصم نسبه</a>
      </div>
    </div>
	<?php endif; ?>

  
    <div x-data="{ open: <?php echo $main4; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-123 text-base"></i>
          الكميات
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="editproductquantity.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active17; ?>">تغيير كمية المنتج</a>
        <a href="prouductquantity.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active18; ?>">أضافة كمية</a>
        <a href="setproductquantitylimit.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active19; ?>">وضع الحد الإدني</a>
      </div>
    </div>
  

    
    <!-- 3rd SECTION -->
    
    <h2 class="text-xs text-gray-400 font-semibold mb-2">أساسيات النظام</h2>
    <div x-data="{ open: <?php echo $main5; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-box-seam text-base"></i>
          المنتجات
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="productname.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active20; ?>">إضافه</a>
         <?php if ($stype == 'SprAdmin'): ?>
         <!-- Only for SprAdmin -->
        <a href="editproductname.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active21; ?>">تعديل</a>
        <a href="deleteproductname.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active22; ?>">حذف</a>
         <?php endif; ?>
      </div>
    </div>
   
	
	
	<?php if ($stype == 'SprAdmin'): ?>
    <!-- Only for SprAdmin -->
    <div x-data="{ open: <?php echo $main6; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-collection  text-base"></i>
          اصناف المبيعات
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="productcategories.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active23; ?>">إضافه</a>
        <a href="editproductcategories.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active24; ?>">تعديل</a>
        <a href="deleteproductcategories.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active25; ?>">حذف</a>
      </div>
    </div>
	<?php endif; ?>
	
    <!-- 4th SECTION -->
    <h2 class="text-xs text-gray-400 font-semibold mb-2">التقارير</h2>
    <div x-data="{ open: <?php echo $main7; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-list  text-base"></i>
          قائمة التقارير
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="reportmanfpaymentdelay.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active26; ?>">تقرير ديون الموردين(الاجل)</a>
       <?php if ($stype == 'SprAdmin'): ?>
       <!-- Only visible to SprAdmin -->
        <a href="reportprouductprice.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active27; ?>">تقرير الاسعار</a>
        <?php endif; ?>
        <a href="reportprouductcategories.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active28; ?>">تقرير اصناف المبيعات</a>
        <a href="reportpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active29; ?>">تقرير الدفعيات</a>
        <?php if ($stype == 'SprAdmin'): ?>
        <!-- Only for SprAdmin -->
        <a href="reportdaypayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active30; ?>">تقرير الدفعيات اليومي</a>
        <a href="reportsoldprofits.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active31; ?>">تقرير الارباح</a>
        <a href="reportorderssold.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active32; ?>">تقرير المبيعات</a>
        <a href="reportdayorderssold.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active33; ?>">تقرير المبيعات اليومي</a>
        <?php endif; ?>
      </div>
    </div>

	 <?php if ($stype == 'SprAdmin'): ?>
      <!-- Only for SprAdmin -->
    <div x-data="{ open: <?php echo $main8; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-calendar  text-base"></i>
          التقارير الشهرية
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="reportmonthorderssold.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active34; ?>">تقرير المبيعات الشهري</a>
        <a href="reportmonthpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active35; ?>">تقرير الدفعيات الشهري</a>
      </div>
    </div>
	<?php endif; ?>
	
	 <?php if ($stype == 'SprAdmin'): ?>
      <!-- Only for SprAdmin -->
    <div x-data="{ open: <?php echo $main9; ?> }" class="space-y-1">
      <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 hover:bg-blue-100 rounded-md transition">
        <span class="flex items-center gap-2">
          <i class="bi bi-calendar-event text-base"></i>
          التقارير السنوية
        </span>
        <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm transition-all duration-300"></i>
      </button>
      <div x-show="open" x-transition class="pr-5 pl-2 mt-1 space-y-1">
        <a href="reportyearorderssold.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active36; ?>">تقرير المبيعات السنوي</a>
        <a href="reportyearpayment.php" class="block w-full text-sm px-3 py-2 rounded-md <?php echo $active37; ?>">تقرير الدفعيات السنوي</a>
      </div>
    </div>
	<?php endif; ?>

  </div>

  <div class="border-t px-4 py-4" x-data="{ open: false }">
    <div class="relative">

      <!-- Button -->
      <button @click="open = !open"
        class="w-full flex justify-between items-center text-gray-700 hover:text-blue-600 px-4 py-2 rounded-md transition">
        <img src="logo.jpg" alt="user" class="rounded-full w-9 h-9 border">
        <p class="text-sm font-semibold text-gray-800"><?php echo $suser_name; ?> </p>/ <p class="text-xs text-gray-500"><?php echo $stype; ?></p>

        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <!-- Dropdown Menu -->
      <div x-show="open" @click.outside="open = false"
        x-transition
        class="absolute bottom-full mb-2 right-0 w-40 bg-white border rounded shadow-md z-50 text-sm overflow-hidden">
        <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
          تسجيل الخروج
        </a>
      </div>

    </div>
  </div>

</aside>
</aside>