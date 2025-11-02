<script>
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

<?php

function ShowinaLine($what)
{
    echo "<br>";
    echo $what;
    echo "<br>";
}

?>

<style>
    @import "assets/css/bootstrap.css" print;
    @import "assets/css/arb.css" print;


    .alert-custom0 {
        background-color: #c21bd5;
        color: #fff;
    }

    .alert-custom1 {
        background-color: #d5d042;
        color: #fff;
    }

    .alert-custom2 {
        background-color: #d51363;
        color: #fff;
    }

    .alert-custom3 {
        background-color: #210ed5;
        color: #fff;
    }

    .alert-custom4 {
        background-color: #26d5be;
        color: #fff;
    }

    .alert-custom5 {
        background-color: #c8d594;
        color: #fff;
    }

    .alert-custom6 {
        background-color: #e48e58;
        color: #fff;
    }

    .alert-custom7 {
        background-color: #635b5b;
        color: #fff;
    }

    .alert-custom8 {
        background-color: #000000;
        color: #fff;
    }

    .alert-custom9 {
        background-color: #7b15ff;
        color: #fff;
    }

    .alert-custom10 {
        background-color: #b4ff76;
        color: #fff;
    }
</style>


<?php
function messagedisplaying($message, $type)
{
    switch ($type) {
        case 1: {
?>
                <!-- RED-->
                <div class="flex items-center justify-between p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg shadow" role="alert" id="user-created-alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?php echo $message; ?></span>
                    </div>
                    <button type="button" class="text-red-700 hover:text-red-900 focus:outline-none" onclick="document.getElementById('user-created-alert').remove();">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            <?php
            }
            break;
        case 2: {
            ?>

                <!-- Light BLUE-->
                <div class="flex items-center justify-between p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg shadow" role="alert" id="user-created-alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?php echo $message; ?></span>
                    </div>
                    <button type="button" class="text-blue-700 hover:text-blue-900 focus:outline-none" onclick="document.getElementById('user-created-alert').remove();">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            <?php
            }
            break;
        case 3: {
            ?>

                <!-- yellow-->
                <div class="flex items-center justify-between p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg shadow" role="alert" id="user-created-alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?php echo $message; ?></span>
                    </div>
                    <button type="button" class="text-yellow-700 hover:text-yellow-900 focus:outline-none" onclick="document.getElementById('user-created-alert').remove();">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            <?php
            }
            break;
        case 4: {
            ?>

                <!-- Green-->
                <div class="flex items-center justify-between p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg shadow" role="alert" id="user-created-alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?php echo $message; ?></span>
                    </div>
                    <button type="button" class="text-green-700 hover:text-green-900 focus:outline-none" onclick="document.getElementById('user-created-alert').remove();">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            <?php
            }
            break;

        case 12: {
            ?>
                <!-- darkish-->
                <div class="flex items-center justify-between p-4 mb-4 text-sm text-stone-700 bg-stone-100 rounded-lg shadow" role="alert" id="user-created-alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-stone-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span><?php echo $message; ?></span>
                    </div>
                    <button type="button" class="text-stone-700 hover:text-stone-900 focus:outline-none" onclick="document.getElementById('user-created-alert').remove();">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            <?php
            }
            break;
        case 13: {
            ?>
                <!-- black -->
                <div class="alert alert-custom8 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $message; ?>
                </div>
    <?php
            }
            break;
    }
}


function naminginorout($what)
{
    if ($what == 23)
        return ("سحب");
    //return("-");
    if ($what == 12)
        return ("ايداع");
    //return("+");
}
function naminginoroutman($what)
{
    if ($what == 23)
        return ("مطالب");
    //return("-");
    if ($what == 12)
        return ("سداد");
    //return("+");
}


function arabic_w2e($str)
{
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_western, $arabic_eastern, $str);
}
/**
 * Converts numbers from eastern to western Arabic numerals.
 *
 * @param  string $str Arbitrary text
 * @return string Text with eastern Arabic numerals converted into western Arabic numerals.
 */
function arabic_e2w($str)
{
    $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($arabic_eastern, $arabic_western, $str);
}
//testing 
//echo arabic_w2e("1234567890"); // Outputs: ١٢٣٤٥٦٧٨٩٠
//	echo arabic_e2w("١٢٣٤٥٦٧٨٩٠"); // Outputs: 1234567890


?>