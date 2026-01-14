<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitemap extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        
        // Set header sebagai XML
        header("Content-Type: application/xml; charset=utf-8");
        
        // Buat sitemap
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Homepage
        echo "  <url>\n";
        echo "    <loc>" . base_url() . "</loc>\n";
        echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
        echo "    <changefreq>daily</changefreq>\n";
        echo "    <priority>1.0</priority>\n";
        echo "  </url>\n";
        
        // Halaman Auth/Login
        echo "  <url>\n";
        echo "    <loc>" . base_url('auth') . "</loc>\n";
        echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
        echo "    <changefreq>monthly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
        
        // Tambahkan halaman lain sesuai kebutuhan
        // Contoh untuk halaman produk atau transaksi jika public
        
        echo '</urlset>';
    }
}
