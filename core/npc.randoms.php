<?php

function dice($min, $max)
{
    return mt_rand($min, $max);
}

function d100()
{
    return dice(1, 100);
}

function rolld6()
{
    return dice(1, 6);
}

function roll2d6()
{
    return dice(1, 6) + dice(1, 6);
}

function roll3d6()
{
    return dice(1, 6) + dice(1, 6) + dice(1, 6);
}

// нет, функцию roll4d6() я писать не буду :)
// зачем же я написал эти три? Старая ассемблерная привычка "разворачивать" короткие циклы.
