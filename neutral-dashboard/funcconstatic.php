<?php

function ShowHead($titlename)
{

/////////////////////////////////////////////////////////////////////////////////////////////
    ////////////here its the main code for the headers at the start of every page////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////?>
<!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <style>
        /*
  * Droid Arabic Naskh (Arabic) http://www.google.com/fonts/earlyaccess
  */
        @font-face {
            font-family: 'Droid Arabic Naskh';
            font-style: normal;
            font-weight: 400;
            src: url(fonts/DroidNaskh-Regular.eot);
            src: url(fonts/DroidNaskh-Regular.eot?#iefix) format('embedded-opentype'),
            url(fonts/DroidNaskh-Regular.woff2) format('woff2'),
            url(fonts/DroidNaskh-Regular.woff) format('woff'),
            url(fonts/DroidNaskh-Regular.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Droid Arabic Naskh';
            font-style: normal;
            font-weight: 700;
            src: url(fonts/DroidNaskh-Bold.eot);
            src: url(fonts/DroidNaskh-Bold.eot?#iefix) format('embedded-opentype'),
            url(fonts/DroidNaskh-Bold.woff2) format('woff2'),
            url(fonts/DroidNaskh-Bold.woff) format('woff'),
            url(fonts/DroidNaskh-Bold.ttf) format('truetype');
        }

    </style>
<div style="font-family:'Droid Arabic Naskh', serif;" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
      <?php if (isset($titlename)) {
        echo $titlename;
    } else {
        echo "ابو محمد";
    } ?>
    </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="idontlovespaces.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">القائمه</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>حلفاوي </b>للاسبيرات</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <a href="logout.php" class="btn btn-default">خروج</a>
            </ul>
         </div>

      </nav>
  </header>

<?php
}

/////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////here its the main at the end of every page/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

function ShowFoot()
{
    ?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Cafavalley</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>



<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////here its the main side bar code/////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
// 
function supersidebar($treemain, $treesub)
{
	global $stype;
	 if ($stype == 'SprAdmin') sidebarsuperadmin($treemain, $treesub);
	 if ($stype == 'Admin') sidebaradmin($treemain, $treesub);
	 
}

function sidebarsuperadmin($treemain, $treesub)
{
    global $suser_name;
    global $stype; ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <p style="color:white;" >
              اهلا بيك
              <?php echo $suser_name; ?>
          </p>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li><a href="info.php"><i class="fa fa-newspaper-o"></i>معلومات</a></li>
        <li><a href="adminstarterpage.php"><i class="fa fa-connectdevelop text-gray"></i>الاستعلامات</a></li>
        <li class="header">مدخلات</li>

          <?php switch ($treemain) {
        case 'prosells':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-circle-o-notch"></i> <span>المبيعات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
			        case 'knowprice':
            {
				?>
	   <li class="active"><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
      <li ><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
	  
      <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
      <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
		    <?php
            
            }
            break;
            case 'Add':
            {
				?>
	<li ><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
      <li class="active"><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
	  
      <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
      <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
		    <?php
            
            }
            break;
      case 'orderreturn':
            {
               ?>
			    <li ><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
               <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
               <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
			   <li  class="active"><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
       <?php
       
            }
            break;
            case 'order':
            {
              ?>
			   <li ><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
            <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
            <li   class="active"><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
              
          <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
          <?php
             
            }
            break;
            default:
            {
             ?>
	    <li ><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
        <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
        <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
        <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
  			<?php
        
          }
          } ?>
          </ul>
        </li>

        <?php switch ($treemain) {
        case 'propay':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } 
	?>
          <a href="#">
            <i class="fa fa-usd"></i> <span>الدفعيات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">


		  <?php
          switch ($treesub) {
            case 'Add':
            {
              ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                <li   class="active"><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه </a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;
            case 'edit':
            {
             ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                  <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                  <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                  <li class="active"><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                  <li ><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                  <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                  <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>


			<?php
            
            }
            break;
            case 'manfadd':
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
           
              <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li class = "active"><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li ><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;

            case 'delete':
            {
            ?>

              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
             
                <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li class="active"><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;

            case 'paydelay':
            {
             ?>
             <li class = "active"><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
          
              <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>
                  <?php
                 
                }
            break;
            case 'manfedit':
            {
              ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
           
              <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li  class = "active"><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php
                 
                }
            break;
            case 'manfdelete':
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
             
                <li ><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li   class = "active"><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php
                 
                }
            break;

            default:
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                <li><a href="productpayment.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php
              
                }
                } ?>
          </ul>
        </li>

          <li class="header">المتغيرات</li>
		<?php

        switch ($treemain) {
        case 'proprice':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-money"></i> <span>تغيير الاسعار</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
                  //
                case 'Add':

            {
            ?>
			  <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
              <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
              <li class="active"><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
              <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
              <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
              <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>
              <?php

            }
            break;
                  case 'pricecatadown':
            {
            ?>
			  <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
              <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
              <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
              <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
              <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
              <li class="active"><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>
              <?php

            }
            break;
            case 'edit':
            {
            ?>
			<li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li class="active"><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
            }
            break;
            case 'pricecata':
            {
            ?>
			<li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li class  = "active"><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
            }
            break;
      case 'priceallpro':
      {
      ?>
	       <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
           <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
           <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
           <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
           <li class  = "active"><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
           <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

      <?php
      }
      break;
	  case 'pricealllist':
      {
      ?>
	       <li class  = "active"><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
           <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
           <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
           <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
           <li ><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
           <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

      <?php
      }
      break;
            default:
            {
            ?>
		    <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
          }
          } ?>
          </ul>
        </li>

        <?php



            switch ($treemain) {
        case 'proquant':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-dropbox"></i> <span>الكميات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
                case 'Add':
                {
            ?>


        	<li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li class="active"><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>
				<?php
                }

                break;
            case 'edit':
            {
             ?>

      	<li class="active"><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>

			<?php
    }

            break;
case 'limmitlimmit':
            {
           ?>


      <li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li class="active"><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>

			<?php

    }
            break;

            default:
            {
            ?>


        <li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>
<?php }
    }
     ?>
          </ul>
        </li>
		<li class="header">أساسيات النظام</li>

				<?php

        switch ($treemain) {
        case 'proname':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-th-large"></i> <span>المنتجات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

		  <?php
          switch ($treesub) {
            case 'Add':
            {
            ?>
			<li   class="active"><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li><a href="editproductname.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li><a href="deleteproductname.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            
            }
            break;
            case 'edit':
            {
            ?>
			<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li class="active"><a href="editproductname.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li><a href="deleteproductname.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            }
            break;
            case 'delete':
            {
            ?>
			<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li><a href="editproductname.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li class="active"><a href="deleteproductname.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            }
            break;

            default:
            {
            ?>
			<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li><a href="editproductname.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li><a href="deleteproductname.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
          }
          }

          ?>
          </ul>
        </li>



        <?php switch ($treemain) {
        case 'procata':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-cog"></i> <span>اصناف المبيعات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
            case 'Add':
            {
            ?>
			<li class="active"><a href="productcategories.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li ><a href="editproductcategories.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li ><a href="deleteproductcategories.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            }
            break;
            case 'edit':
            {
            ?>
			<li ><a href="productcategories.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li class="active"><a href="editproductcategories.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li ><a href="deleteproductcategories.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            }
            break;
            case 'delete':
            {
            ?>
			<li ><a href="productcategories.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li ><a href="editproductcategories.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li class="active"><a href="deleteproductcategories.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

			<?php
            }
            break;


            default:
            {
            ?>
			<li ><a href="productcategories.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

              <li><a href="editproductcategories.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
            <li><a href="deleteproductcategories.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>

            <?php
                }
                }
                ?>
                </ul>
              </li>


      
<?php switch ($treemain) {
case 'Proreport':
{ ?> <li class="treeview active"> <?php }
break;
default:
{ ?> <li class="treeview">  <?php }
} ?>
  <a href="#">
    <i class="fa fa-newspaper-o"></i> <span>التقارير</span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
<?php
  switch ($treesub)  {

      case 'prices':
          {
          ?>
 <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>

  <li class="active"><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
  <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
   
  }
          break;
      case 'productcata':
            {
             ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>

<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li class="active"><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
 
}
          break;
      case 'payment':
            {
              ?>
  <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>

  <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li class ='active'><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
  <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
  <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
   
  }
          break;
          case 'paymentday':
                {
                   ?>
      <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  
      <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
      <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
      <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
      <li class ='active'><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
      <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
      <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
      <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
      <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
      <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
    <?php
       
      }
              break;
      case 'profit':
            {
              ?>
    <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
 
    <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
    <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
    <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
    <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
    <li class="active"><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
    <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
    <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
    <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
    <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>

  <?php
     
    }
          break;
      case 'cusdelay':
            {
               ?>
     <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
 
    <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
    <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
    <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
    <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
    <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
    <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
    <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
    <li class="active"><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
    <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>

<?php
   
  }

          break;
          case 'cusdelayday':
                {

                 ?>
        <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
        
          <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
          <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
          <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
          <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
          <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
          <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
          <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
          <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
          <li class="active"><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
  <?php
       
      }
              break;
          case 'manfdelay':
            {
             ?>
    <li  class="active"><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  
    <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
    <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
    <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
    <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
    <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
    <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
    <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
    <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
    <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>

<?php
   
  }
          break;
          case 'ordersoloreport':
            {
               ?>
             <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
  <li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
  <li class = "active" ><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>

<?php
 
}
          break;
          case 'ordersoloreportday':
            {
              ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li class = "active"><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
 
}
          break;
    default:
    {
      ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportsoldprofits.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الارباح</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php

  }
} ?>
</ul>
</li>


	<?php
switch ($treemain) {
case 'monthreport':
{ ?> <li class="treeview active"> <?php }
break;
default:
{ ?> <li class="treeview">  <?php }
} ?>

  <a href="#">
    <i class="fa fa-newspaper-o"></i> <span>التقارير الشهرية </span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
<?php
switch ($treesub) {
        //
      case 'ordersolorepormonth':

  {
  ?>
  <li class = "active"><a href="reportmonthorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات الشهري</a></li>
<li><a href="reportmonthpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات الشهري</a></li>
<li><a href="reportmonthprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) الشهري</a></li>

    <?php

  }
  break;
        case 'paymentmonth':
  {
  ?>
  <li><a href="reportmonthorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات الشهري</a></li>
<li class = "active"><a href="reportmonthpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات الشهري</a></li>
<li><a href="reportmonthprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) الشهري</a></li>
<?php

  }
  break;
  case 'prouductpaymentdelaymonth':
  {
  ?>
  <li><a href="reportmonthorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات الشهري</a></li>
<li><a href="reportmonthpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات الشهري</a></li>
<li class = "active"><a href="reportmonthprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) الشهري</a></li>

<?php
  }
  break;
default:
  {

  ?>

<li><a href="reportmonthorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات الشهري</a></li>
<li><a href="reportmonthpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات الشهري</a></li>
<li><a href="reportmonthprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) الشهري</a></li>
<?php
  }
  }
   ?>
  </ul>
</li>


        <?php
        switch ($treemain) {
        case 'yearreport':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
        } ?>

          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>التقارير السنوية</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
        <?php
          switch ($treesub) {
                  //

            case 'orderssoldyear':
            {
            ?>
      <li class = "active"><a href="reportyearorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات السنوي</a></li>
      <li><a href="reportyearpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات السنوي</a></li>
      <li><a href="reportyearprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) السنوي</a></li>

        <?php
            }
            break;
        case 'paymentyear':
        {
        ?>
        <li><a href="reportyearorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات السنوي</a></li>
      <li class = "active"><a href="reportyearpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات السنوي</a></li>
      <li><a href="reportyearprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) السنوي</a></li>

        <?php
        }
        break;
        case 'prouductpaymentdelayyear':
        {
        ?>
      <li><a href="reportyearorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات السنوي</a></li>
      <li ><a href="reportyearpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات السنوي</a></li>
      <li class = "active"><a href="reportyearprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) السنوي</a></li>
        <?php
        }
        break;
            default:
            {
            ?>
      <li><a href="reportyearorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات السنوي</a></li>
      <li><a href="reportyearpayment.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات السنوي</a></li>
      <li><a href="reportyearprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) السنوي</a></li>
        <?php
          }
          }
           ?>
          </ul>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
}

function sidebaradmin($treemain, $treesub)
{
    global $suser_name;
    global $stype; 
	//sidebarsuperadmin($treemain, $treesub)
	?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">


          <p style="color:white;" >
              اهلا بيك
              <?php echo $suser_name; ?>

          </p>


      </div>

     <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li><a href="adminstarterpage.php"><i class="fa fa-connectdevelop text-gray"></i>الاستعلامات</a></li>
        <li class="header">مدخلات</li>

          <?php switch ($treemain) {
        case 'prosells':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-circle-o-notch"></i> <span>المبيعات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
		  
		  
		  case 'knowprice':
            {
				?>
	   <li class="active"><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
	   <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
       <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
	   <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
        <?php 
            }
            break;
            case 'Add':
            {
              ?>
	   <li><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
      <li class="active"><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
      <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
	  <li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
        <?php 
            }
            break;
			
      case 'orderreturn':
            {
              ?>
			   <li><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
               <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
               <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
			   <li  class="active"><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>

                 <?php 
            }
            break;
            case 'order':
            {
              ?>
		    <li><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
            <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
            <li   class="active"><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
			<li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
              <?php 
            }
            break;
            default:
            {
              ?>
	    <li><a href="priceprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>معرفة السعر</a></li>
        <li><a href="addprouductsells.php"><i class="fa fa-circle-o text-aqua"></i>بيع</a></li>
        <li><a href="productorder.php"><i class="fa fa-circle-o text-yellow"></i>الطلبات</a></li>
		<li><a href="productorderreturn.php"><i class="fa fa-circle-o text-red"></i>الطلبات المردودة</a></li>
          <?php 
           }
          } ?>
          </ul>
        </li>

       

        <?php switch ($treemain) {
        case 'propay':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>
          <a href="#">
            <i class="fa fa-usd"></i> <span>الدفعيات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">


		  <?php
          switch ($treesub) {
             case 'Add':
            {
              ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                <li   class="active"><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه </a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;
            case 'edit':
            {
             ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                  <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                  <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                  <li class="active"><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                  <li ><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                  <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                  <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>


			<?php
            
            }
            break;
            case 'manfadd':
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
           
              <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li class = "active"><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li ><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;

            case 'delete':
            {
            ?>

              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
             
                <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li class="active"><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>

              <?php
                 
                }
            break;

            case 'paydelay':
            {
             ?>
             <li class = "active"><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
          
              <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مرد</a></li>
                  <?php
                 
                }
            break;
            case 'manfedit':
            {
              ?>
            <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
           
              <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
              <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
              <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
              <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
              <li  class = "active"><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php
                 
                }
            break;
            case 'manfdelete':
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
             
                <li ><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
                <li   class = "active"><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php
                 
                }
            break;

            default:
            {
              ?>
              <li><a href="productpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i> اضافه اجل (عملاء)</a></li>
            
                <li><a href="productpayment2.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>
                <li><a href="productmanufactuer.php"><i class="fa fa-circle-o text-aqua"></i> اضافه حسابات الموردين</a></li>
                <li ><a href="editproductpayment.php"><i class="fa fa-circle-o text-yellow"></i>تعديل</a></li>
                <li><a href="deleteproductpayment.php"><i class="fa fa-circle-o text-red"></i>حذف</a></li>
                <li><a href="editproductmanufactuer.php"><i class="fa fa-circle-o text-yellow"></i>تعديل - مورد</a></li>
              <li><a href="deleteproductmanfactuer.php"><i class="fa fa-circle-o text-red"></i>حذف -مورد</a></li>

              <?php 
                }
                } ?>
          </ul>
        </li>
        <li class="header">أساسيات النظام</li>

<?php

switch ($treemain) {
case 'proname':
{ ?> <li class="treeview active"> <?php }
break;
default:
{ ?> <li class="treeview">  <?php }
} ?>

  <a href="#">
    <i class="fa fa-th-large"></i> <span>المنتجات</span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">

<?php
  switch ($treesub) {
    case 'Add':
    {
    ?>
<li   class="active"><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

    

<?php
    
    }
    break;
    case 'edit':
    {
    ?>
<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

     

<?php
    }
    break;
    case 'delete':
    {
    ?>
<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

   

<?php
    }
    break;

    default:
    {
    ?>
<li><a href="productname.php"><i class="fa fa-circle-o text-aqua"></i>إضافه</a></li>

     

<?php
  }
  }

  ?>
  </ul>
</li>
           <li class="header">المتغيرات</li>
		<?php

        switch ($treemain) {
        case 'proprice':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-money"></i> <span>تغيير الاسعار</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
                  //
                case 'Add':

            {
            ?>
			  <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
              <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
              <li class="active"><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
              <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
              <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
              <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>
              <?php

            }
            break;
                  case 'pricecatadown':
            {
            ?>
			  <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
              <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
              <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
              <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
              <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
              <li class="active"><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>
              <?php

            }
            break;
            case 'edit':
            {
            ?>
			<li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li class="active"><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
            }
            break;
            case 'pricecata':
            {
            ?>
			<li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li class  = "active"><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
            }
            break;
      case 'priceallpro':
      {
      ?>
	       <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
           <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
           <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
           <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
           <li class  = "active"><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
           <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

      <?php
      }
      break;
	  case 'pricealllist':
      {
      ?>
	       <li class  = "active"><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
           <li ><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
           <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
           <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
           <li ><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
           <li ><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

      <?php
      }
      break;
            default:
            {
            ?>
		    <li ><a href="editproductpricelist.php"><i class="fa fa-circle-o text-aqua"></i>تغير الاسعار بالصنف</a></li>
			<li><a href="editproductprice.php"><i class="fa fa-circle-o text-aqua"></i>تغير سعر كل المنتجات</a></li>
            <li><a href="productprice.php"><i class="fa fa-circle-o text-yellow"></i>تغير سعر منتج معين</a></li>
            <li><a href="productpricecata.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - اضافه نسبه</a></li>
            <li><a href="productallprice.php"><i class="fa fa-circle-o text-red"></i>تغير سعر كافة المنتجات بالنسبه</a></li>
            <li><a href="productpricecatadown.php"><i class="fa fa-circle-o text-red"></i>تغير سعر - خصم نسبه</a></li>

			<?php
          }
          } ?>
          </ul>
        </li>

        <?php



            switch ($treemain) {
        case 'proquant':
        { ?> <li class="treeview active"> <?php }
        break;
        default:
        { ?> <li class="treeview">  <?php }
    } ?>

          <a href="#">
            <i class="fa fa-dropbox"></i> <span>الكميات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  <?php
          switch ($treesub) {
                case 'Add':
                {
            ?>


        	<li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li class="active"><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>
				<?php
                }

                break;
            case 'edit':
            {
             ?>

      	<li class="active"><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>

			<?php
    }

            break;
case 'limmitlimmit':
            {
           ?>


      <li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
		<li class="active"><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>

			<?php

    }
            break;

            default:
            {
            ?>


        <li><a href="editproductquantity.php"><i class="fa fa-circle-o text-aqua"></i>تغيير كمية المنتج</a></li>
              <li><a href="prouductquantity.php"><i class="fa fa-circle-o text-yellow"></i>أضافة كمية</a></li>
<li  ><a href="setproductquantitylimit.php"><i class="fa fa-circle-o text-aqua"></i>وضع الحد الإدني</a></li>
<?php }
    }
     ?>
          </ul>
        </li>

      
<?php switch ($treemain) {
case 'Proreport':
{ ?> <li class="treeview active"> <?php }
break;
default:
{ ?> <li class="treeview">  <?php }
} ?>
  <a href="#">
    <i class="fa fa-newspaper-o"></i> <span>التقارير</span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
<?php
  switch ($treesub)  {
                 case 'prices':
          {
          ?>
 <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  <li class="active"><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
  <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
   
  }
          break;
      case 'productcata':
            {
             ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>

<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li class="active"><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
 
}
          break;
      case 'payment2':
            {
              ?>
  <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li class ='active'><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
  <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
  }
          break;
          case 'paymentday2':
                {
                   ?>
      <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
      <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
      <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
      <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
      <li class ='active'><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
      <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
      <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
      <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
      <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
    <?php
      }
              break;
      case 'cusdelay':
            {
               ?>
     <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
    <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
    <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
    <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
    <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
    <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
    <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
    <li class="active"><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
    <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
  }

          break;
          case 'cusdelayday':
                {

                 ?>
        <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
          <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
          <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
          <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
          <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
          <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
          <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
          <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
          <li class="active"><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
  <?php  
      }
              break;
          case 'manfdelay':
            {
             ?>
    <li  class="active"><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
    <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
    <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
    <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
    <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
    <li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
    <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
    <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
    <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
  }
          break;
          case 'ordersoloreport':
            {
               ?>
             <li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
  <li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
  <li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
  <li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
  <li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
  <li class = "active" ><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
  <li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
  <li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
  <li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
}
          break;
          case 'ordersoloreportday':
            {
              ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li class = "active"><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
}
          break;
    default:
    {
      ?>
<li><a href="reportmanfpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون الموردين(الاجل)</a></li>
<li><a href="reportprouductprice.php"><i class="fa fa-circle-o text-yellow"></i>تقرير الاسعار</a></li>
<li><a href="reportprouductcategories.php"><i class="fa fa-circle-o text-aqua"></i>تقرير اصناف المبيعات</a></li>
<li><a href="reportpayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات</a></li>
<li><a href="reportdaypayment2.php"><i class="fa fa-circle-o text-red"></i>تقرير الدفعيات اليومي</a></li>
<li><a href="reportorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات</a></li>
<li><a href="reportdayorderssold.php"><i class="fa fa-circle-o text-yellow"></i>تقرير المبيعات اليومي</a></li>
<li><a href="reportprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل)</a></li>
<li><a href="reportdayprouductpaymentdelay.php"><i class="fa fa-circle-o text-aqua"></i>تقرير ديون العملاء(الاجل) اليومي</a></li>
<?php
  }
} ?>
</ul>
</li>



    </section>
    <!-- /.sidebar -->
  </aside>
<?php
}

?>
