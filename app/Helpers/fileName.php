<?php

function generate_filename(string $filename): string
{
    return md5(uniqid()) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
}