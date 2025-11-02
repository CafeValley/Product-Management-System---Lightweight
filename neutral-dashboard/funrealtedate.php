<?php

function MonthToNumber($NameM)
{

    switch ($NameM) {
        case "January":
            $RNum = 1;
            break;
        case "February":
            $RNum = 2;
            break;
        case "March":
            $RNum = 3;
            break;
        case "April":
            $RNum = 4;
            break;
        case "May":
            $RNum = 5;
            break;
        case "June":
            $RNum = 6;
            break;
        case "July":
            $RNum = 7;
            break;
        case "August":
            $RNum = 8;
            break;
        case "September":
            $RNum = 9;
            break;
        case "October":
            $RNum = 10;
            break;
        case "November":
            $RNum = 11;
            break;
        case "December":
            $RNum = 12;
            break;
    }
    if (isset($RNum))
        return ($RNum);
}




function changedateformate($DateBefore)
{

    list($Pday, $Pmonth, $Pyear) = explode(" ", $DateBefore);

    $Postmonth = MonthToNumber($Pmonth);
    if ($Postmonth < 10)
        $Postmonth = "0" . $Postmonth;

    $DateAfter =  $Pyear . "-" . $Postmonth . "-" . $Pday;

    return ($DateAfter);
}
function Eatdayformat($Day, $Month, $Year)
{
    if ($Day < 10)
        $Day = "0" . $Day;
    switch ($Month) {
        case 1:
            $Month = "January";
            break;
        case 2:
            $Month = "February";
            break;
        case 3:
            $Month = "March";
            break;
        case 4:
            $Month = "April";
            break;
        case 5:
            $Month = "May";
            break;
        case 6:
            $Month = "June";
            break;
        case 7:
            $Month = "July";
            break;
        case 8:
            $Month = "August";
            break;
        case 9:
            $Month = "September";
            break;
        case 10:
            $Month = "October";
            break;
        case 11:
            $Month = "November";
            break;
        case 12:
            $Month = "December";
            break;
    }
    return ($Day . " " . $Month . " " . $Year);
    //2018-08-08
}
function DisplayDate($NameLabel)
{
    $today = date("Y-m-d");
    list($Tyear, $Tmonth, $Tday) = explode("-", $today);
?>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-700"><?= $NameLabel; ?></label>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Year Select -->
            <select id="Year" name="Year" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-sm py-2 px-3">
                <option value="Year" selected>السنة</option>
                <?php
                for ($i = date("Y"); $i >= 1950; $i--) {
                    $selected = ($Tyear == $i) ? "selected" : "";
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>

            <!-- Month Select -->
            <select id="Month" name="Month" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-sm py-2 px-3">
                <option value="Month" selected>الشهر</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $val = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $selected = ($Tmonth == $val) ? "selected" : "";
                    echo "<option value='$val' $selected>$val</option>";
                }
                ?>
            </select>

            <!-- Day Select -->
            <select id="Day" name="Day" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-sm py-2 px-3">
                <option value="Day" selected>اليوم</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    $val = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $selected = ($Tday == $val) ? "selected" : "";
                    echo "<option value='$val' $selected>$val</option>";
                }
                ?>
            </select>
        </div>
    </div>
<?php
}
function DisplayDate2nd($NameLabel)
{
    $today = date("Y-m-d");
    list($Tyear, $Tmonth, $Tday) = explode("-", $today);

?>
    <div class="form-group">
        <div class="col-sm-10">
            <select id="Year2nd" name="Year2nd" class="select2-selection__rendered">
                <option value="Year" selected>السنة</option>
                <?php
                for ($i = date("Y"); $i >= 1950; $i--) {
                    if ($Tyear == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                }

                ?>
            </select>
            <select id="Month2nd" name="Month2nd" class="select2-selection__rendered">
                <option value="Month" selected>الشهر</option>
                <?php
                for ($i = 01; $i <= 12; $i++) {
                    if ($Tmonth == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                }

                ?>
            </select>
            <select id="Day2nd" name="Day2nd" class="select2-selection__rendered">
                <option value="Day" selected>اليوم</option>
                <?php
                for ($i = 01; $i <= 31; $i++) {
                    if ($Tday == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                }

                ?>
            </select>
            <span class="glyphicon glyphicon-calendar"></span>
        </div>

        <label class="col-sm-2 control-label" for="radiobtns"><?php echo $NameLabel; ?></label>
    </div><!-- /control-group -->
    <br>
<?php
}

function DisplaySelectedDate($NameLabel, $Day, $Month, $Year)
{
?>
    <div class="form-group">
        <div class="col-sm-10">
            <select id="Year" name="Year" class="select2-selection__rendered">
                <option value="Year" selected>السنة</option>
                <?php
                for ($i = date("Y"); $i >= 1950; $i--)
                    if ($Year == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <select id="Month" name="Month" class="select2-selection__rendered">
                <option value="Month" selected>الشهر</option>
                <?php
                for ($i = 01; $i <= 12; $i++)
                    if ($Month == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <select id="Day" name="Day" class="select2-selection__rendered">
                <option value="Day" selected>اليوم</option>
                <?php
                for ($i = 01; $i <= 31; $i++)
                    if ($Day == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <span class="glyphicon glyphicon-calendar"></span>
        </div>

        <label class="col-sm-2 control-label" for="radiobtns"><?php echo $NameLabel; ?></label>
    </div><!-- /control-group -->
    <br>
<?php
}

function DisplaySelectedDate2nd($NameLabel, $Day, $Month, $Year)
{
?>
    <div class="form-group">
        <div class="col-sm-10">
            <select id="Year" name="Year2nd" class="select2-selection__rendered">
                <option value="Year" selected>السنة</option>
                <?php
                for ($i = date("Y"); $i >= 1950; $i--)
                    if ($Year == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <select id="Month2nd" name="Month2nd" class="select2-selection__rendered">
                <option value="Month" selected>الشهر</option>
                <?php
                for ($i = 01; $i <= 12; $i++)
                    if ($Month == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <select id="Day2nd" name="Day2nd" class="select2-selection__rendered">
                <option value="Day" selected>اليوم</option>
                <?php
                for ($i = 01; $i <= 31; $i++)
                    if ($Day == $i)
                        echo "<option selected value = $i> $i</option>";
                    else
                        echo "<option value = $i> $i</option>";
                ?>
            </select>
            <span class="glyphicon glyphicon-calendar"></span>
        </div>

        <label class="col-sm-2 control-label" for="radiobtns"><?php echo $NameLabel; ?></label>
    </div><!-- /control-group -->
    <br>
<?php
}
?>