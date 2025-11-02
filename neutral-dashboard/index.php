<?php include 'header.php'; ?>

<!-- Main Content -->
<main class="flex items-center justify-center min-h-screen bg-gray-100 px-6 py-24">

  <!-- Form Container -->
  <div class="bg-white shadow-md rounded-lg p-10 w-full max-w-3xl text-center relative"
       style="background-image: url('logo.jpg'); background-repeat: no-repeat; background-position: center; background-size: 50% 50%;">

    <!-- Overlay (optional if logo is too distracting) -->
    <!-- <div class="absolute inset-0 bg-white bg-opacity-80 z-0 rounded-lg"></div> -->

    <!-- Arabic Title -->
    <div class="relative z-10">
      <div class="block text-xl font-semibold mb-12 text-[#38d7ff]">
        نظام 
		<a href="ourlockfailsafe.php">-</a> مبيعات
      </div>   

      <h2 class="text-xl fo nt-semibold mb-6">تسجيل الدخول</h2>
      <!-- Login Form -->
      <form action="checklogin.php" method="post" class="grid grid-cols-1 gap-6 text-right mt-4">

        <div>
          <label class="block mb-1 text-sm text-black-700">الاسم</label>
          <input name="fusername" type="text"
                 class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <div>
          <label class="block mb-1 text-sm text-black-700">كلمه المرور</label>
          <input name="fpassword" type="password"
                 class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>

        <div class="text-center">
          <button type="submit"
                  class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
            تسجيل الدخول
          </button>
        </div>
      </form>

        <!-- Error Messages -->
      <?php
      if (isset($_GET['TT'])) {
        echo "<p style='color:#ff0517'>خطاء : اسم المستخدم او كلمة المرور خاطئه </p>";
      }
      if (isset($_GET['var'])) {
        echo "<p style='color:#6390ff'>الرجاء اتباع الارشادات الطبيعية</p>";
      }
      if (isset($_GET['lock'])) {
        echo "<p style='color:#49ffb1'>Error : User Was Locked , Ask admin to unlock</p>";
      }
      if (isset($_GET['TimeChanged'])) {
        echo "<p style='color:#3aff21'>Error : Sorry the clock doesn't have the right time , please Fix it.</p>";
      }
      if (isset($_GET['SystemLock'])) {
        echo "<p style='color:#ff7488'>Error : System it's lock , contact Admin please .</p>";
      }
      if (isset($_GET['Failtwotimes'])) {
        echo "<p style='color:#d014ff'>Error : System Shutdown now , contact System Admin Now.</p>";
      }
      if (isset($_GET['AllGood'])) {
        echo "<p style='color:#faff5e'>Try: To login now , all good.</p>";
      }
      ?>
    </div>
  </div>
</main>
</body>
</html>
