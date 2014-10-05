<?php

function dice($min, $max)
{
    return mt_rand($min, $max);
}

function roll3d6()
{
    return dice(1, 6) + dice(1, 6) + dice(1, 6);
}

function d100()
{
    return dice(1, 100);
}


?>