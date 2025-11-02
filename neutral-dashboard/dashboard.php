<?php 
include 'header.php';
include 'menu.php';
require_once "checkiffromup.php"; 

?>
  <!-- Main Content -->
  <main class="mr-64 min-h-screen px-6 py-8">
    <!-- Grid Form Layout -->
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-3xl">
      <h2 class="text-xl font-semibold mb-6">نموذج الإدخال</h2>
      <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block mb-1 text-sm text-gray-700">الاسم الأول</label>
          <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700">الاسم الأخير</label>
          <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700">البريد الإلكتروني</label>
          <input type="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div>
          <label class="block mb-1 text-sm text-gray-700">رقم الهاتف</label>
          <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div class="md:col-span-2">
          <label class="block mb-1 text-sm text-gray-700">رسالة</label>
          <textarea rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
        </div>
        <div class="md:col-span-2 text-left">
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">إرسال</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>
