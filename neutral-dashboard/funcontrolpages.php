<?php
//2014-0-0Day only year
    //2012-05-0Day year- month
    //check $date for the word Day
    //2013-0-05 year - day 
    //Year-05-08 day month
//using 
//url -> current url + $_get values 
// ? & ? & ? as much as you want
//redirectcheckcustomername($customerid,);
//redirectcheckdate($soldate,'productpaymentdelay.php?Fu');
function redirectcheckdate($date,$url)
{
    if($date == "Year-0-0Day")
    {
        header ('Location:'.$url.'?error=dateweird');  
        die();
    }
}

/*
how to use 
redirectcheckproductcata("وش راس R12","تايوتا","");

*/
function redirectcheckproductcata($pname,$cataname,$url)
{
    $idpn = checkiftherethisproduct($pname);
    $idcn = checkiftherename($cataname);
    if (checkbothifthere($idpn,$idcn) > 0)
    {
        header ('Location:'.$url.'?error=productcatehere');  
        die();
    }
}
function redirectcheckcustomername($name,$url)
{
    if ($name == '' || $name == 'nothing')
    {
        header ('Location:'.$url.'?error=customerweird');
        die();
    }
}
function redirectextrapay($url)
{
    header ('Location:'.$url.'?error=extrapayweird');
    die();
    }

function redirectcataornameexisit($idp,$idc,$url)
{
     if ($idc == "no id" or $idp == "no id")
          {
            header ('Location:'.$url.'?error=nocataorname');  
            die();
          }
}

function seterror($whatsmissing)
{
    if ( $whatsmissing == "nocataorname")
    {
        $text ="يوجد خطاء";
        $text = $text."  ";
        $text =$text."في "."اسم المنتج او اسم النوع";
        messagedisplaying($text,12);
    }
    if ( $whatsmissing == "customerweird")
    {
        $text ="يوجد خطاء";
        $text = $text."  ";
        $text =$text."في "."اسم العميل او المستخدم";
        messagedisplaying($text,12);
    }
    if ( $whatsmissing == "productcatehere")
    {
        $text ="يوجد خطاء";
        $text = $text."  ";
        $text =$text."في "."اسم المنتج او النوع";
        messagedisplaying($text,12);
    }
    if ( $whatsmissing == "dateweird")
    {
        $text ="يوجد خطاء";
        $text = $text."  ";
        $text =$text."في "."ادخال التاريخ";
        messagedisplaying($text,12);
    }
    if ( $whatsmissing == "extrapayweird")
    {
        $text ="يوجد خطاء";
        $text = $text."  ";
        $text =$text."في "."مبلغ المال";
        messagedisplaying($text,12);
    }

}

?>