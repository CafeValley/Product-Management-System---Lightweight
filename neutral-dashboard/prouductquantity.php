<?php
include 'config.php';
include 'header.php';
$main4 = "true";
$active18 = 'bg-blue-600 text-white';
include 'menu.php';
require_once "checkiffromup.php"; 
?>

<div class="min-h-screen bg-gray-100 p-4">
  <div class="max-w-6xl mx-auto">
    <header class="mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">صفحة تغير الكميات        <small class="text-sm text-gray-500"> اضافة كمية     </small></h1>
    </header>

    <section class="bg-white shadow-md rounded-lg p-6">

    <!-- Default box -->
    <div class="bg-white shadow rounded-lg p-6">

      <?php
      if (isset($_GET['RID'])) {
        $text = "تم التعديل  ";
        $text .= " الكمية الجديدة ->" . $_GET['newquan'];
        messagedisplaying($text, 12);
      }
      ?>

      <form action="dbproductquantity.php" method="POST" class="space-y-6">

        <?php the3selects(); ?>

        <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
          <label for="qansize" class="md:w-1/4 mb-2 md:mb-0 font-semibold text-gray-700 text-right">كمية المنتج</label>
          <input
            type="text"
            id="qansize"
            name="qansize"
            required
            placeholder="كمية المنتج"
            class="w-full md:w-3/4 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          />
        </div>

        <div class="flex justify-between">
          <button
            type="reset"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-md px-6 py-2 transition"
          >
            الغاء
          </button>
          <button
            type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md px-6 py-2 transition"
          >
            اضافة
          </button>
        </div>

      </form>

    </div>

  </section>
</div>
