<?php

function cekDir($dir, $disk = "public")
{
    if (!\Storage::disk($disk)->exists($dir)) {
        Storage::disk($disk)->makeDirectory($dir, 0777, true);
    }
}

function rupiah($angka){
	$result = "Rp " . number_format($angka,0,',','.');
	return $result;
}