<?php
include 'config.php';
include 'header.php';
$main3 = "true";
$active13 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800"> صفحة تغير الاسعار     <small class="text-sm text-gray-500"> تغير سعر منج معين</small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <form class="max-w-lg mx-auto" action="dbproductprice.php" method="POST">
        <div class="mb-6">
          <?php
          if (isset($_GET['RID'])) {
            $text = "تم التعديل  ";
            $text .= " سعر الشراء:" . htmlspecialchars($_GET['pricebought']) . " سعر البيع:" . htmlspecialchars($_GET['priceold']);
            messagedisplaying($text, 12);
          }
          ?>
        </div>

        <div class="mb-6">
          <?php the3selects(); ?>
        </div>

        <div class="flex flex-col md:flex-row md:items-center mb-4">
          <label for="newboughtprice" class="md:w-1/3 text-right font-semibold mb-2 md:mb-0">سعر الشراء الجديد</label>
          <input
            id="newboughtprice"
            name="newboughtprice"
            type="text"
            required
            placeholder="سعر الشراء الجديد"
            class="md:flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          >
        </div>

        <div class="flex flex-col md:flex-row md:items-center mb-6">
          <label for="newsoldprice" class="md:w-1/3 text-right font-semibold mb-2 md:mb-0">سعر البيع الجديد</label>
          <input
            id="newsoldprice"
            name="newsoldprice"
            type="text"
            required
            placeholder="سعر البيع الجديد"
            class="md:flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          >
        </div>

        <div class="flex justify-between">
		 <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition"
          >
            اضافة
          </button>
          <button
            type="reset"
            class="bg-red-300 hover:bg-red-400 text-red-800 font-semibold rounded-md px-4 py-2 transition"
          >
            الغاء
          </button>
         
        </div>
      </form>

    </div>

  </section>
</div>
