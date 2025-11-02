<?php
require_once "solotheconnection.php";


function gettotalofwanted($manfname)
{
    global $link;
    $SqlforName = "SELECT sum(`manfamount`) as manfamount FROM `manfacdelaypayment` WHERE active = 1 and `inorout` = '12' and `manfname` = '$manfname' ";
    $resultTName = mysqli_query($link, $SqlforName);
    $rowName = mysqli_fetch_assoc($resultTName);
    $name = $rowName['manfamount'];
    if (empty($name))
        return (0);
    return ($name);
}


function gettotalofpayed($manfname)
{
    global $link;
    $SqlforName = "SELECT sum(`manfamount`) as manfamount FROM `manfacdelaypayment` WHERE active = 1 and `inorout` = '23' and `manfname` = '$manfname' ";
    $resultTName = mysqli_query($link, $SqlforName);
    $rowName = mysqli_fetch_assoc($resultTName);
    $name = $rowName['manfamount'];
    return ($name);
}


function listofmansdelayenhanced($Par = NULL)
{
    global $link;
?>
    <select name="manfdelayname" class="form-control">
        <?php if (isset($Par)) { ?>
            <option value='nothing'>اسم المورد</option>
        <?php } else { ?>
            <option selected value='nothing'>اسم المورد</option>
            <?php }
        $SqlMember = mysqli_query($link, "SELECT distinct(`manfname`) as manfname FROM `manfacdelaypayment` order by `manfname` ASC  ");
        $SqlMemberCount = mysqli_num_rows($SqlMember);
        if ($SqlMemberCount > 0) {
            while ($SqlMemberReturn = mysqli_fetch_array($SqlMember)) {
                $MemberName = $SqlMemberReturn['manfname'];
                if (strcmp($MemberName, $Par) == 0) { ?>
                    <option selected value='<?php echo $MemberName; ?>'><?php echo $MemberName; ?></option>
                <?php } else { ?>
                    <option value='<?php echo $MemberName; ?>'><?php echo $MemberName; ?></option>
        <?php }
            }
        } ?>
    </select>
<?php
}



?>