<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('rupiah')) {
	function rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
	}

	function angka($angka)
	{
		$hasil = number_format($angka, 2, ',', '.');
		return $hasil;
	}
}
