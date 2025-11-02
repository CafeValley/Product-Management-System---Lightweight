<?php
if (!isset($suser_name))
{
    session_destroy();
    header("location:index.php?var=why");
}
?>
