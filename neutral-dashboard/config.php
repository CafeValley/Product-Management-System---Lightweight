<?php
require_once "solotheconnection.php";

function spacingformat($i)
{
    for ($s = 0; $s < $i; $s++)
        echo "&nbsp;";
}

/*
 * takes the fees and the % of its discount and returns
 * the amount after the discount
  example echo CalaDiscount(300,50);
 * */
function CalaDiscount($DiscountValue, $DiscountPer)
{
    $DiscountPer = preg_replace('/[^0-9]/', '', $DiscountPer);
    if ($DiscountPer == 0) {
        return ($DiscountValue);
    }
    $DiscountMin = ($DiscountValue * $DiscountPer) / 100;
    $TotalPayAfterDis = $DiscountValue - $DiscountMin;
    return ($TotalPayAfterDis);
}

require_once "funcontrolpages.php";
require_once "funrealtedate.php";
require_once "funrealtedisplay.php";

require_once "fundelayrelatedmanf.php";

function listofcata($Par = NULL)
{
    global $link;
?>
    <select name="cataid" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm py-2 px-3">
        <?php if (isset($Par)) { ?>
            <option value='0'>اسم الصنف</option>
        <?php } else { ?>
            <option selected value='0'>اسم الصنف</option>
        <?php }

        $sqlcataquery = mysqli_query($link, "SELECT `id`, `cname` FROM `productcategory` ORDER BY `cname` ASC");
        $sqlcatacount = mysqli_num_rows($sqlcataquery);

        if ($sqlcatacount > 0) {
            while ($SqlcataReturn = mysqli_fetch_array($sqlcataquery)) {
                $cataId = $SqlcataReturn['id'];
                $cataName = $SqlcataReturn['cname'];
                $selected = ($cataId == $Par) ? "selected" : "";
                echo "<option $selected value='$cataId'>$cataName</option>";
            }
        }
        ?>
    </select>
<?php
}

function listofproname($Par = NULL)
{
    global $link;
?>
    <select name="pnameid" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm py-2 px-3">
        <?php if ($Par != "NULL") { ?>
            <option value='nothing'>اسم المنتج</option>
        <?php } else { ?>
            <option selected value='nothing'>اسم المنتج</option>
            <?php }
        $sqlcataquery = mysqli_query($link, "SELECT `id`, `pname` FROM `productname`  order by `pname` ASC  ");
        $sqlcatacount = mysqli_num_rows($sqlcataquery);
        if ($sqlcatacount > 0) {

            while ($SqlcataReturn = mysqli_fetch_array($sqlcataquery)) {

                $pnameId = $SqlcataReturn['id'];
                $apname = $SqlcataReturn['pname'];
                if ($pnameId == $Par) {
            ?>
                    <option selected value='<?php echo $pnameId; ?>'><?php echo $apname; ?></option>
                <?php
                }
                ?>
                <option value='<?php echo $pnameId; ?>'><?php echo $apname; ?></option>
        <?php

            }
        } ?>
    </select> <?php
            }
                ?>
<?php

function listofpronamebox($Par = NULL)
{
    global $link;
    $SqlCommandForCFe = "SELECT `id`, `pname` FROM `productname` order by `pname` ";
    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
    $countd = 0;
    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

        $studentname = $CheckIfReturnInF['pname'];
        if ($countd == 0) { ?>
            <datalist id="cars">
            <?php
            $countd++;
        } ?>
            <option><?php echo $studentname; ?></option>
        <?php
    }
        ?>
            </datalist>
        <?php
    }
        ?>
        <?php

        function listofcatanamebox($Par = NULL)
        {
            global $link;
            $SqlCommandForCFe = "SELECT DISTINCT(`cname`) as cname FROM `productcategory` order by `cname` ";
            $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
            $countd = 0;
            while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                $studentname = $CheckIfReturnInF['cname'];
                if ($countd == 0) { ?>
                    <datalist id="cars2">
                    <?php
                    $countd++;
                } ?>
                    <option><?php echo $studentname; ?></option>
                <?php
            }
                ?>
                    </datalist>
                <?php
            }
                ?>
                <?php
                function datalistforpaymentcus($Par = NULL)
                {
                    global $link;
                    //
                    $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'زبون' order by accountname ";
                    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                    $countd = 0;
                    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                        $studentname = $CheckIfReturnInF['accountname'];
                        if ($countd == 0) { ?>
                            <datalist id="accountname">
                            <?php
                            $countd++;
                        } ?>
                            <option><?php echo $studentname; ?></option>
                        <?php
                    }
                        ?>
                            </datalist>
                            <?php
                        }
                        function datalistforpaymentprofit($Par = NULL)
                        {
                            global $link;
                            //
                            $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'profits' order by accountname ";
                            $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                            $countd = 0;
                            while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                $studentname = $CheckIfReturnInF['accountname'];
                                if ($countd == 0) { ?>
                                    <datalist id="accountname">
                                    <?php
                                    $countd++;
                                } ?>
                                    <option><?php echo $studentname; ?></option>
                                <?php
                            }
                                ?>
                                    </datalist>
                                <?php
                            }
                                ?>
                                <?php
                                function datalistforpaymentexloans($Par = NULL)
                                {
                                    global $link;
                                    //
                                    $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'externalloan' order by accountname ";
                                    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                    $countd = 0;
                                    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                        $studentname = $CheckIfReturnInF['accountname'];
                                        if ($countd == 0) { ?>
                                            <datalist id="accountname">
                                            <?php
                                            $countd++;
                                        } ?>
                                            <option><?php echo $studentname; ?></option>
                                        <?php
                                    }
                                        ?>
                                            </datalist>
                                            <?php
                                        }
                                        function datalistforpaymentCars($Par = NULL)
                                        {
                                            global $link;
                                            //
                                            $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'العربات' order by accountname ";
                                            $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                            $countd = 0;
                                            while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                                $studentname = $CheckIfReturnInF['accountname'];
                                                if ($countd == 0) { ?>
                                                    <datalist id="accountname">
                                                    <?php
                                                    $countd++;
                                                } ?>
                                                    <option><?php echo $studentname; ?></option>
                                                <?php
                                            }
                                                ?>
                                                    </datalist>
                                                    <?php
                                                }

                                                function datalistforpaymentGasStation($Par = NULL)
                                                {
                                                    global $link;
                                                    //
                                                    $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'محطة الوقود' order by accountname ";
                                                    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                                    $countd = 0;
                                                    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                                        $studentname = $CheckIfReturnInF['accountname'];
                                                        if ($countd == 0) { ?>
                                                            <datalist id="accountname">
                                                            <?php
                                                            $countd++;
                                                        } ?>
                                                            <option><?php echo $studentname; ?></option>
                                                        <?php
                                                    }
                                                        ?>
                                                            </datalist>
                                                            <?php
                                                        }
                                                        function datalistforpaymentLoens($Par = NULL)
                                                        {
                                                            global $link;
                                                            //
                                                            $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'سلفية' order by accountname ";
                                                            $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                                            $countd = 0;
                                                            while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                                                $studentname = $CheckIfReturnInF['accountname'];
                                                                if ($countd == 0) { ?>
                                                                    <datalist id="accountname">
                                                                    <?php
                                                                    $countd++;
                                                                } ?>
                                                                    <option><?php echo $studentname; ?></option>
                                                                <?php
                                                            }
                                                                ?>
                                                                    </datalist>
                                                                    <?php
                                                                }
                                                                function datalistforpaymentExpences($Par = NULL)
                                                                {
                                                                    global $link;
                                                                    //
                                                                    $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'منصرفات' order by accountname ";
                                                                    $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                                                    $countd = 0;
                                                                    while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                                                        $studentname = $CheckIfReturnInF['accountname'];
                                                                        if ($countd == 0) { ?>
                                                                            <datalist id="accountname">
                                                                            <?php
                                                                            $countd++;
                                                                        } ?>
                                                                            <option><?php echo $studentname; ?></option>
                                                                        <?php
                                                                    }
                                                                        ?>
                                                                            </datalist>
                                                                            <?php
                                                                        }
                                                                        function datalistforpaymentSalarys($Par = NULL)
                                                                        {
                                                                            global $link;
                                                                            //
                                                                            $SqlCommandForCFe = "SELECT DISTINCT(`accountname`) as accountname FROM `accountp` where `accountroot` = 'رواتب' order by accountname ";
                                                                            $CheckIfHereInF = mysqli_query($link, $SqlCommandForCFe);
                                                                            $countd = 0;
                                                                            while ($CheckIfReturnInF = mysqli_fetch_array($CheckIfHereInF)) {

                                                                                $studentname = $CheckIfReturnInF['accountname'];
                                                                                if ($countd == 0) { ?>
                                                                                    <datalist id="accountname">
                                                                                    <?php
                                                                                    $countd++;
                                                                                } ?>
                                                                                    <option><?php echo $studentname; ?></option>
                                                                                <?php
                                                                            }
                                                                                ?>
                                                                                    </datalist>
                                                                                <?php
                                                                            }




                                                                            function the3selects()
                                                                            {
                                                                                ?>
                                                                                    <div class="mb-4 flex flex-col md:flex-row md:items-center">
                                                                                        <label for="productName" class="md:w-1/3 text-right font-semibold mb-2 md:mb-0">اسم المنتج</label>
                                                                                        <div class="md:flex-1">
                                                                                            <?php listofproname(); ?>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mb-4 flex flex-col md:flex-row md:items-center">
                                                                                        <label for="productCategory" class="md:w-1/3 text-right font-semibold mb-2 md:mb-0">صف المنتج</label>
                                                                                        <div class="md:flex-1">
                                                                                            <?php listofcata(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                            }



                                                                            function the3selectsbox()
                                                                            {
                                                                                ?>
                                                                                    <div class="space-y-6">

                                                                                        <!-- Product Name Input -->
                                                                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                                                                                            <label for="proudctnameboxselect" class="text-right font-medium text-gray-700">
                                                                                                اسم المنتج
                                                                                            </label>
                                                                                            <div class="md:col-span-2">
                                                                                                <input name="proudctnameboxselect" type="text" list="cars"
                                                                                                    class="w-full rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                                                                                                <?php listofpronamebox(); ?>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Product Description Input -->
                                                                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                                                                                            <label for="proudctnameboxselect2" class="text-right font-medium text-gray-700">
                                                                                                صف المنتج
                                                                                            </label>
                                                                                            <div class="md:col-span-2">
                                                                                                <input name="proudctnameboxselect2" type="text" list="cars2"
                                                                                                    class="w-full rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                                                                                                <?php listofcatanamebox(); ?>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                <?php
                                                                            }



                                                                            function productidtoname($idp)
                                                                            {
                                                                                global $link;
                                                                                $SqlforName = "SELECT `pname` FROM `productname` WHERE `id` = '$idp' ";
                                                                                $resultTName = mysqli_query($link, $SqlforName);
                                                                                $rowName = mysqli_fetch_assoc($resultTName);
                                                                                $name = $rowName['pname'];
                                                                                return ($name);
                                                                            }

                                                                            function getlastid()
                                                                            {
                                                                                global $link;
                                                                                $SqlforName = "SELECT max(`id`) as maxid FROM `productname`  ";
                                                                                $resultTName = mysqli_query($link, $SqlforName);
                                                                                $rowName = mysqli_fetch_assoc($resultTName);
                                                                                $name = $rowName['maxid'];
                                                                                if (empty($name))
                                                                                    return (1);
                                                                                return ($name);
                                                                            }

                                                                            function getlastorder()
                                                                            {
                                                                                global $link;
                                                                                $thelastcount = getlastorder_max();
                                                                                $thelastcount += 1;
                                                                                $SqlforName = "UPDATE `ordercount` SET `orderid` = '$thelastcount' ";
                                                                                mysqli_query($link, $SqlforName);

                                                                                $maxoforder = getlastorder_max();
                                                                                $thecount = 1;
                                                                                $result2 = mysqli_query($link, "SELECT distinct(`orderno`) as orderno FROM `productsells` ");
                                                                                while ($row = mysqli_fetch_assoc($result2)) {
                                                                                    $orderno[] = $row['orderno'];
                                                                                }
                                                                                foreach ($orderno as $orderforeach) {

                                                                                    if (in_array($thecount, $orderno)) {
                                                                                        echo " ";
                                                                                    } else {
                                                                                        return ($thecount);
                                                                                    }
                                                                                    $thecount += 1;
                                                                                }
                                                                                while ($thecount <= $maxoforder) {
                                                                                    if (in_array($thecount, $orderno)) {
                                                                                        echo " ";
                                                                                    } else {
                                                                                        return ($thecount);
                                                                                    }
                                                                                    $thecount += 1;
                                                                                }
                                                                                if ($thecount == 1) {
                                                                                    $thecount += 1;
                                                                                    return ($thecount);
                                                                                }
                                                                            }

                                                                            function getlastorder_max()
                                                                            {
                                                                                global $link;
                                                                                $SqlforName = "SELECT max(`orderid`) as maxid FROM `ordercount` ";
                                                                                $resultTName = mysqli_query($link, $SqlforName);
                                                                                $rowName = mysqli_fetch_assoc($resultTName);
                                                                                $name = $rowName['maxid'];
                                                                                if (empty($name))
                                                                                    return (1);
                                                                                return ($name);
                                                                            }

                                                                            function orderadding()
                                                                            {
                                                                                echo " ";
                                                                            }

                                                                            function ordersubing()
                                                                            {
                                                                                echo " ";
                                                                            }


                                                                            function getprincefromproductid($idp, $idc)
                                                                            {
                                                                                global $link;
                                                                                $SqlforName = "SELECT pricetobesold FROM `productprice` WHERE `active` = 1 and `idprod` = $idp and `cataid` = $idc ";
                                                                                $resultTName = mysqli_query($link, $SqlforName);
                                                                                $rowName = mysqli_fetch_assoc($resultTName);
                                                                                $name = $rowName['pricetobesold'];
                                                                                return ($name);
                                                                            }

                                                                            function getlimmitquantit($idp, $idc)
                                                                            {
                                                                                global $link;
                                                                                $typequery = "SELECT `id`, `idprod`, `limitnumber`, `cataid`, `timedofa` FROM `productquantitlimit` WHERE `cataid` = '$idc' and `idprod` = '$idp'";
                                                                                $resulttype = mysqli_query($link, $typequery);
                                                                                $rowtype = mysqli_fetch_array($resulttype);
                                                                                //to set the variables
                                                                                if ($rowtype) {
                                                                                    $pname = $rowtype['limitnumber'];
                                                                                } else {
                                                                                    $pname = null; // or some default value
                                                                                }
                                                                            }


                                                                            function getqantityfromids($idp, $idc)
                                                                            {
                                                                                global $link;
                                                                                $SqlforName = "SELECT `numberin` FROM `productquantit` WHERE `idprod` = $idp  and `cataid` = $idc ";
                                                                                $resultTName = mysqli_query($link, $SqlforName);
                                                                                $rowName = mysqli_fetch_assoc($resultTName);
                                                                                $name = $rowName['numberin'];
                                                                                if (empty($name))
                                                                                    return (0);
                                                                                return ($name);
                                                                            }
                                                                            //-1 -> the Qantity you want to take is more than what we have in the store
                                                                            //-2 -> the Qantity at first , that you are trying to get is empty
                                                                            function updatequantityfromids($idp, $idc, $inotout, $sumamount)
                                                                            {
                                                                                global $link;
                                                                                $currentquan = getqantityfromids($idp, $idc);
                                                                                if ($inotout == "+") {
                                                                                    $updatedquan = $currentquan + $sumamount;
                                                                                }
                                                                                if ($inotout == "-") {
                                                                                    if ($currentquan == "0")
                                                                                        return ("-2");
                                                                                    $updatedquan = $currentquan - $sumamount;
                                                                                    if ($updatedquan < 0)
                                                                                        return ("-1");
                                                                                }

                                                                                $SqlforName = "UPDATE `productquantit` SET `numberin` = '$updatedquan' where `idprod` = $idp and `cataid` = $idc ";
                                                                                mysqli_query($link, $SqlforName);

                                                                                return ($updatedquan);
                                                                            }


                                                                            function catafromidtoname($idc)
                                                                            {
                                                                                global $link;
                                                                                $categoryquery = "SELECT `id`, `cname` FROM `productcategory` WHERE  `id` = '$idc' ";
                                                                                $resultcategory = mysqli_query($link, $categoryquery);
                                                                                $rowcategory = mysqli_fetch_array($resultcategory);
                                                                                //to set the variables
                                                                                if (empty($rowcategory)) return 0;
                                                                                $categoryvar = $rowcategory['cname'];
                                                                                return ($categoryvar);
                                                                            }
                                                                            function catafromnametoid($cname)
                                                                            {
                                                                                global $link;
                                                                                $categoryquery = "SELECT `id`, `cname` FROM `productcategory` WHERE  `cname` = '$cname' ";
                                                                                $resultcategory = mysqli_query($link, $categoryquery);
                                                                                $rowcategory = mysqli_fetch_array($resultcategory);
                                                                                //to set the variables
                                                                                $categoryvar = $rowcategory['id'];
                                                                                return ($categoryvar);
                                                                            }
                                                                            function namefromnametoid($pname)
                                                                            {
                                                                                global $link;
                                                                                $pronamequery = "SELECT `id`, `pname` FROM `productname` WHERE  `pname` = '$pname' ";
                                                                                $resultproname = mysqli_query($link, $pronamequery);
                                                                                $rowname = mysqli_fetch_array($resultproname);
                                                                                //to set the variables
                                                                                $pronamevar = $rowname['id'];
                                                                                return ($pronamevar);
                                                                            }

                                                                            function getproductnamefromid($idp)
                                                                            {
                                                                                global $link;
                                                                                $typequery = "SELECT `pname` FROM `productname` WHERE `id` = $idp";
                                                                                $resulttype = mysqli_query($link, $typequery);
                                                                                $rowtype = mysqli_fetch_array($resulttype);
                                                                                //to set the variables
                                                                                if (isset($rowtype['pname'])) {
                                                                                    $pname = $rowtype['pname'];
                                                                                    return ($pname);
                                                                                } else
                                                                                    return (" ");
                                                                            }



                                                                            function getcutomerfromorderid($ido)
                                                                            {

                                                                                global $link;
                                                                                $typequery = "SELECT  `ordercutomername` FROM `orderdisanddate` WHERE `orderid` = $ido";
                                                                                $resulttype = mysqli_query($link, $typequery);
                                                                                $rowtype = mysqli_fetch_array($resulttype);
                                                                                //to set the variables
                                                                                $pname = $rowtype['ordercutomername'];
                                                                                if (empty($pname))
                                                                                    return (" ");
                                                                                return ($pname);
                                                                            }
                                                                            function customernamereceptrid($ido)
                                                                            {

                                                                                global $link;
                                                                                $typequery = "SELECT  `ordercutomernamerecept` FROM `orderdisanddate` WHERE `orderid` = $ido";
                                                                                $resulttype = mysqli_query($link, $typequery);
                                                                                $rowtype = mysqli_fetch_array($resulttype);
                                                                                //to set the variables
                                                                                $pname = $rowtype['ordercutomernamerecept'];
                                                                                if (empty($pname))
                                                                                    return (" ");
                                                                                return ($pname);
                                                                            }
                                                                            function getdatefromorderid($ido)
                                                                            {
                                                                                global $link;
                                                                                $typequery = "SELECT DATE(`orderdate`) as orderdate FROM `orderdisanddate` WHERE `orderid` = $ido";
                                                                                $resulttype = mysqli_query($link, $typequery);

                                                                                if ($resulttype) {
                                                                                    $rowtype = mysqli_fetch_array($resulttype);
                                                                                    if ($rowtype) {
                                                                                        return $rowtype['orderdate'];
                                                                                    }
                                                                                }
                                                                                // Return null or a default value if no data found or query fails
                                                                                return null;
                                                                            }



                                                                            function getdiscountfromorderid($ido)
                                                                            {
                                                                                global $link;
                                                                                $typequery = "SELECT `orderdiscount` FROM `orderdisanddate` WHERE `orderid` = $ido";
                                                                                $resulttype = mysqli_query($link, $typequery);
                                                                                $rowtype = mysqli_fetch_array($resulttype);
                                                                                //to set the variables
                                                                                $pname = $rowtype['orderdiscount'];
                                                                                return ($pname);
                                                                            }


                                                                            function gettotaloforder($ido)
                                                                            {
                                                                                global $link;
                                                                                $total = 0;

                                                                                $discountper = getdiscountfromorderid($ido);

                                                                                $sqlsellsfromorder = "SELECT `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` WHERE `orderno` = $ido";
                                                                                $resultsellsfromorder = mysqli_query($link, $sqlsellsfromorder);
                                                                                while ($rowprice = mysqli_fetch_array($resultsellsfromorder)) {
                                                                                    $pricesold = $rowprice['pricesold'];
                                                                                    $quansold = $rowprice['quntity'];
                                                                                    $priceaftermult = $pricesold * $quansold;
                                                                                    $total += $priceaftermult;
                                                                                }

                                                                                $totalafterdiscount = CalaDiscount($total, $discountper);
                                                                                return ($totalafterdiscount);
                                                                            }
                                                                            function gettotaloforderwithoutdiscount($ido)
                                                                            {
                                                                                global $link;
                                                                                $total = 0;

                                                                                $sqlsellsfromorder = "SELECT `idprod`, `cataid`, `pricesold`, `quntity`, `orderno` FROM `productsells` WHERE `orderno` = $ido";
                                                                                $resultsellsfromorder = mysqli_query($link, $sqlsellsfromorder);
                                                                                while ($rowprice = mysqli_fetch_array($resultsellsfromorder)) {
                                                                                    $pricesold = $rowprice['pricesold'];
                                                                                    $quansold = $rowprice['quntity'];
                                                                                    $priceaftermult = $pricesold * $quansold;
                                                                                    $total += $priceaftermult;
                                                                                }


                                                                                return ($total);
                                                                            }

                                                                            function getboughtprice($soldprice, $idp, $idc)
                                                                            {
                                                                                global $link;
                                                                                $sqlsellsfromorder = "SELECT `pricein` FROM `productprice` WHERE `pricetobesold` = '$soldprice' and  `cataid` = '$idc' and  `idprod` = '$idp'";
                                                                                $resultsellsfromorder = mysqli_query($link, $sqlsellsfromorder);
                                                                                $rowprice = mysqli_fetch_array($resultsellsfromorder);
                                                                                if (isset($rowprice['pricein']))
                                                                                    $pricebought = $rowprice['pricein'];
                                                                                else
                                                                                    $pricebought = 0;
                                                                                return ($pricebought);
                                                                            }

                                                                            function changepricewithper($idp, $idc, $value)
                                                                            {
                                                                                global $link;
                                                                                global $suser_name;
                                                                                $Sqlforpricevalue = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid` FROM `productprice` WHERE `active` = 1 and `idprod` = $idp and `cataid` = $idc ";

                                                                                $resultTVal = mysqli_query($link, $Sqlforpricevalue);
                                                                                $rowval = mysqli_fetch_assoc($resultTVal);
                                                                                $idfrompricetype = $rowval['id'];


                                                                                $pricebought = $rowval['pricein'];
                                                                                $newaddedpartin = ($pricebought * $value) / 100;
                                                                                $newaddedin = $newaddedpartin + $pricebought;


                                                                                $oldvalue = $rowval['pricetobesold'];
                                                                                $newaddedpart = ($oldvalue * $value) / 100;
                                                                                $newadded = $newaddedpart + $oldvalue;

                                                                                $Sqlupdateactivezero = "UPDATE `productprice` SET `active` = '0' WHERE `id`  = '$idfrompricetype'";
                                                                                mysqli_query($link, $Sqlupdateactivezero);

                                                                                //ShowinaLine($SqlforName);
                                                                                $Sqlforaddingnew = "INSERT INTO `productprice`( `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) VALUES ('$idp','$newaddedin','$newadded','1','$idc','$suser_name',now())";
                                                                                mysqli_query($link, $Sqlforaddingnew);
                                                                            }

                                                                            function changepricewithperless($idp, $idc, $value)
                                                                            {
                                                                                global $link;
                                                                                global $suser_name;
                                                                                $Sqlforpricevalue = "SELECT `id`, `idprod`, `pricein`, `pricetobesold`, `active`, `cataid` FROM `productprice` WHERE `active` = 1 and `idprod` = $idp and `cataid` = $idc ";

                                                                                $resultTVal = mysqli_query($link, $Sqlforpricevalue);
                                                                                $rowval = mysqli_fetch_assoc($resultTVal);
                                                                                $idfrompricetype = $rowval['id'];

                                                                                $oldpricebought = $rowval['pricein'];
                                                                                $newsubedpartin = ($oldpricebought * $value) / 100;
                                                                                $newaddedpricein = $oldpricebought - $newsubedpartin;

                                                                                $oldvalue = $rowval['pricetobesold'];
                                                                                $newsubedpart = ($oldvalue * $value) / 100;
                                                                                $newadded = $oldvalue - $newsubedpart;

                                                                                $Sqlupdateactivezero = "UPDATE `productprice` SET `active` = '0' WHERE `id`  = '$idfrompricetype'";
                                                                                mysqli_query($link, $Sqlupdateactivezero);

                                                                                //ShowinaLine($SqlforName);
                                                                                $Sqlforaddingnew = "INSERT INTO `productprice`( `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) VALUES ('$idp','$newaddedpricein','$newadded','1','$idc','$suser_name',now())";
                                                                                mysqli_query($link, $Sqlforaddingnew);
                                                                            }


                                                                            function checkiftherename($name)
                                                                            {
                                                                                global $link;
                                                                                $sql = "SELECT `id` as countname FROM `productcategory` WHERE `cname` = '$name'";
                                                                                $result = mysqli_query($link, $sql);
                                                                                $row = mysqli_fetch_array($result);
                                                                                $count = $row['countname'];
                                                                                if (empty($count))
                                                                                    return ("no id");
                                                                                return ($count);
                                                                            }
                                                                            function checkiftherethisproduct($name)
                                                                            {
                                                                                global $link;
                                                                                $sql = "SELECT `id` as countname  FROM `productname` WHERE `pname` = '$name'";
                                                                                $result = mysqli_query($link, $sql);
                                                                                $row = mysqli_fetch_array($result);
                                                                                $count = $row['countname'];
                                                                                if (empty($count))
                                                                                    return ("no id");
                                                                                return ($count);
                                                                            }
                                                                            function checkbothifthere($idp, $idc)
                                                                            {
                                                                                global $link;
                                                                                $sql = "SELECT count(*) as counthere FROM `productprice` WHERE `cataid` = '$idc' and `idprod` = '$idp' ";
                                                                                $result = mysqli_query($link, $sql);
                                                                                $row = mysqli_fetch_array($result);
                                                                                $count = $row['counthere'];
                                                                                if (empty($count))
                                                                                    return (-1);
                                                                                return ($count);
                                                                            }
                                                                            function listofpaymenttypes($Par = NULL)
                                                                            {

                                                                                ?>

                                                                                    <select name="sourceofcash" id="Statetypo" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm py-2 px-3">
                                                                                        <?php
                                                                                        switch ($Par) {
                                                                                            case 'زبون': {
                                                                                        ?>
                                                                                                    <option selected value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'رواتب': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option selected value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>

                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'منصرفات': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option selected value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'سلفية': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option selected value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>

                                                                                                <?php
                                                                                                }
                                                                                                break;

                                                                                            case 'profits': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option selected value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'externalloan': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option selected value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;

                                                                                            case 'خزنه': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="profits">ارباح</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option selected value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'مبيعات': {
                                                                                                ?>
                                                                                                    <option selected value="مبيعات">مبيعات</option>

                                                                                                <?php
                                                                                                }

                                                                                                break;

                                                                                            default:
                                                                                                ?>
                                                                                                <option value="زبون">زبون</option>
                                                                                                <option value="رواتب">رواتب</option>
                                                                                                <option value="منصرفات">منصرفات</option>
                                                                                                <option value="profits">ارباح</option>
                                                                                                <option value="سلفية">سلفية</option>
                                                                                                <option value="externalloan">سلفيات خارجية</option>
                                                                                                <option value="خزنه">خزنه</option>
                                                                                        <?php
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                <?php
                                                                            }
                                                                            function listofpaymenttypes2($Par = NULL)
                                                                            {

                                                                                ?>

                                                                                    <select name="sourceofcash" id="Statetypo" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 text-sm py-2 px-3">
                                                                                        <?php
                                                                                        switch ($Par) {
                                                                                            case 'زبون': {
                                                                                        ?>
                                                                                                    <option selected value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'رواتب': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option selected value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>

                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'منصرفات': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option selected value="منصرفات">منصرفات</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'سلفية': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option selected value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>

                                                                                                <?php
                                                                                                }
                                                                                                break;

                                                                                            case 'externalloan': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option selected value="externalloan">سلفيات خارجية</option>
                                                                                                    <option value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;

                                                                                            case 'خزنه': {
                                                                                                ?>
                                                                                                    <option value="زبون">زبون</option>
                                                                                                    <option value="رواتب">رواتب</option>
                                                                                                    <option value="منصرفات">منصرفات</option>
                                                                                                    <option value="سلفية">سلفية</option>
                                                                                                    <option value="externalloan">سلفيات خارجية</option>
                                                                                                    <option selected value="خزنه">خزنه</option>
                                                                                                <?php
                                                                                                }
                                                                                                break;
                                                                                            case 'مبيعات': {
                                                                                                ?>
                                                                                                    <option selected value="مبيعات">مبيعات</option>

                                                                                                <?php
                                                                                                }

                                                                                                break;

                                                                                            default:
                                                                                                ?>
                                                                                                <option value="زبون">زبون</option>
                                                                                                <option value="رواتب">رواتب</option>
                                                                                                <option value="منصرفات">منصرفات</option>
                                                                                                <option value="سلفية">سلفية</option>
                                                                                                <option value="externalloan">سلفيات خارجية</option>
                                                                                                <option value="خزنه">خزنه</option>
                                                                                        <?php
                                                                                                break;
                                                                                        }
                                                                                        ?>
                                                                                    </select>

                                                                                <?php
                                                                            }
                                                                                ?>