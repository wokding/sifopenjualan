-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql308.infinityfree.com
-- Generation Time: Jan 19, 2026 at 08:51 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40824706_sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `satuan`, `harga`) VALUES
('B-0001', 'Pulpen Standard', 'Pcs', 5000),
('B-0002', 'Pulpen Gel', 'Pcs', 8000),
('B-0003', 'Buku Tulis 38 Lembar', 'Pcs', 7000),
('B-0004', 'Buku Tulis 58 Lembar', 'Pcs', 10000),
('B-0005', 'Kertas A4 70gsm', 'Roll', 65000),
('B-0006', 'Kertas A4 80gsm', 'Roll', 75000),
('B-0007', 'Lakban Bening Besar', 'Roll', 15000),
('B-0008', 'Lakban Hitam Besar', 'Roll', 18000),
('B-0009', 'Spidol Permanent Hitam', 'Pcs', 12000),
('B-0010', 'Spidol Whiteboard', 'Pcs', 13000),
('B-0011', 'Obeng Plus', 'Unit', 35000),
('B-0012', 'Obeng Minus', 'Unit', 35000),
('B-0013', 'Palu Besi', 'Unit', 75000),
('B-0014', 'Tang Kombinasi', 'Unit', 85000),
('B-0015', 'Kabel Listrik NYA', 'Roll', 300000),
('B-0016', 'Kabel Listrik NYM', 'Roll', 450000),
('B-0017', 'Stop Kontak 4 Lubang', 'Unit', 65000),
('B-0018', 'Mouse USB', 'Unit', 85000),
('B-0019', 'Keyboard USB', 'Unit', 120000),
('B-0020', 'Monitor LED 19 Inch', 'Unit', 1500000),
('B-0021', 'CPU Komputer i3', 'Unit', 3500000),
('B-0022', 'Flashdisk 32GB', 'Unit', 75000),
('B-0023', 'Kipas Angin Berdiri', 'Unit', 350000),
('B-0024', 'Lampu LED 12 Watt', 'Unit', 35000),
('B-0025', 'Ember Plastik Besar', 'Unit', 45000),
('B-0026', 'Sapu Ijuk', 'Unit', 30000),
('B-0027', 'Pel Lantai Microfiber', 'Unit', 65000),
('B-0028', 'Kursi Plastik', 'Unit', 150000),
('B-0029', 'Meja Kantor', 'Unit', 850000),
('B-0030', 'Rak Besi Gudang', 'Unit', 1250000),
('B-0031', 'Map Plastik Folio', 'Pcs', 5000),
('B-0032', 'Amplop Coklat A4', 'Pcs', 4000),
('B-0033', 'Penghapus Pensil', 'Pcs', 3000),
('B-0034', 'Pensil 2B', 'Pcs', 4000),
('B-0035', 'Stabilo Warna', 'Pcs', 9000),
('B-0036', 'Gunting Kantor', 'Unit', 25000),
('B-0037', 'Penggaris Besi 30cm', 'Pcs', 12000),
('B-0038', 'Stapler Besar', 'Unit', 65000),
('B-0039', 'Isi Stapler No 10', 'Pcs', 12000),
('B-0040', 'Kalkulator Meja', 'Unit', 125000),
('B-0041', 'Printer Inkjet', 'Unit', 950000),
('B-0042', 'Tinta Printer Hitam', 'Pcs', 85000),
('B-0043', 'Kertas Thermal 80mm', 'Roll', 18000),
('B-0044', 'Masker Medis', 'Pcs', 2500),
('B-0045', 'Sarung Tangan Karet', 'Pcs', 6000),
('B-0046', 'Helm Proyek', 'Unit', 250000),
('B-0047', 'Rompi Safety', 'Unit', 150000),
('B-0048', 'Sepatu Safety', 'Unit', 450000),
('B-0049', 'Kabel LAN Cat6', 'Roll', 650000),
('B-0050', 'Switch Hub 8 Port', 'Unit', 350000),
('B-0051', 'Router Wifi', 'Unit', 450000),
('B-0052', 'Access Point Indoor', 'Unit', 750000),
('B-0053', 'Harddisk External 1TB', 'Unit', 850000),
('B-0054', 'SSD Internal 512GB', 'Unit', 950000),
('B-0055', 'Pulpen Standard Varian 1', 'Pcs', 5000),
('B-0056', 'Pulpen Gel Varian 2', 'Pcs', 8000),
('B-0057', 'Buku Tulis 38 Lembar Varian 3', 'Pcs', 7000),
('B-0058', 'Buku Tulis 58 Lembar Varian 4', 'Pcs', 10000),
('B-0059', 'Kertas A4 70gsm Varian 5', 'Roll', 65000),
('B-0060', 'Kertas A4 80gsm Varian 6', 'Roll', 75000),
('B-0061', 'Lakban Bening Besar Varian 7', 'Roll', 15000),
('B-0062', 'Lakban Hitam Besar Varian 8', 'Roll', 18000),
('B-0063', 'Spidol Permanent Hitam Varian 9', 'Pcs', 12000),
('B-0064', 'Spidol Whiteboard Varian 10', 'Pcs', 13000),
('B-0065', 'Obeng Plus Varian 11', 'Unit', 35000),
('B-0066', 'Obeng Minus Varian 12', 'Unit', 35000),
('B-0067', 'Palu Besi Varian 13', 'Unit', 75000),
('B-0068', 'Tang Kombinasi Varian 14', 'Unit', 85000),
('B-0069', 'Kabel Listrik NYA Varian 15', 'Roll', 300000),
('B-0070', 'Kabel Listrik NYM Varian 16', 'Roll', 450000),
('B-0071', 'Stop Kontak 4 Lubang Varian 17', 'Unit', 65000),
('B-0072', 'Mouse USB Varian 18', 'Unit', 85000),
('B-0073', 'Keyboard USB Varian 19', 'Unit', 120000),
('B-0074', 'Monitor LED 19 Inch Varian 20', 'Unit', 1500000),
('B-0075', 'CPU Komputer i3 Varian 21', 'Unit', 3500000),
('B-0076', 'Flashdisk 32GB Varian 22', 'Unit', 75000),
('B-0077', 'Kipas Angin Berdiri Varian 23', 'Unit', 350000),
('B-0078', 'Lampu LED 12 Watt Varian 24', 'Unit', 35000),
('B-0079', 'Ember Plastik Besar Varian 25', 'Unit', 45000),
('B-0080', 'Sapu Ijuk Varian 26', 'Unit', 30000),
('B-0081', 'Pel Lantai Microfiber Varian 27', 'Unit', 65000),
('B-0082', 'Kursi Plastik Varian 28', 'Unit', 150000),
('B-0083', 'Meja Kantor Varian 29', 'Unit', 850000),
('B-0084', 'Rak Besi Gudang Varian 30', 'Unit', 1250000),
('B-0085', 'Map Plastik Folio Varian 31', 'Pcs', 5000),
('B-0086', 'Amplop Coklat A4 Varian 32', 'Pcs', 4000),
('B-0087', 'Penghapus Pensil Varian 33', 'Pcs', 3000),
('B-0088', 'Pensil 2B Varian 34', 'Pcs', 4000),
('B-0089', 'Stabilo Warna Varian 35', 'Pcs', 9000),
('B-0090', 'Gunting Kantor Varian 36', 'Unit', 25000),
('B-0091', 'Penggaris Besi 30cm Varian 37', 'Pcs', 12000),
('B-0092', 'Stapler Besar Varian 38', 'Unit', 65000),
('B-0093', 'Isi Stapler No 10 Varian 39', 'Pcs', 12000),
('B-0094', 'Kalkulator Meja Varian 40', 'Unit', 125000),
('B-0095', 'Printer Inkjet Varian 41', 'Unit', 950000),
('B-0096', 'Tinta Printer Hitam Varian 42', 'Pcs', 85000),
('B-0097', 'Kertas Thermal 80mm Varian 43', 'Roll', 18000),
('B-0098', 'Masker Medis Varian 44', 'Pcs', 2500),
('B-0099', 'Sarung Tangan Karet Varian 45', 'Pcs', 6000),
('B-0100', 'Helm Proyek Varian 46', 'Unit', 250000),
('B-0101', 'Kabel UTP CAT-6', 'Roll', 850000);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0ac9139178f6a50c83d7c8575be74db4d2fe737b', '118.96.234.229', 1768873772, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383837333737323b),
('166d47d1dbced655893a5e6801786f71425517b2', '118.96.85.99', 1768726221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383732363232313b),
('1b6871b28239e73ecd742d7a121b5f7a38bce310', '118.96.234.229', 1768789535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383738393439323b6d6573736167657c733a38363a223c64697620636c6173733d22616c65727420616c6572742d737563636573732220726f6c653d22616c657274223e0a2020202020202020596f752068617665206265656e206c6f67676564206f7574213c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d6d73675f73686f776e5f64393838663765343032316465363638356163386463306466623136363466307c623a313b),
('323c7fd0b77b9649a07824183b425270a57e16ec', '118.96.85.99', 1768706414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383730363431323b),
('4174e4cd75c9d5803f8c2b16e296ea31f67d05b8', '118.96.234.229', 1768789492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383738393439323b),
('996fd364b9dd227caab3b7342b876c0694be2ea6', '66.249.66.64', 1768776743, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383737363734333b),
('aab2732e8b2ac967b9e4486edc75383d98a60015', '118.96.85.99', 1768698010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383639383031303b),
('b6df894190ee4c20ce71555d532673cd9a28ae1f', '118.96.234.229', 1768785085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383738353038353b),
('d9a191274615932f592f36ff7ad768a262a6f988', '66.249.66.161', 1768762279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383736323237393b),
('e5459b321481b2436ac913b6701abd9b07ae6c19', '182.2.166.69', 1768704903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383730343839393b),
('f98baaae1b8617e0e020f05edc37a4a3950b235d', '118.96.85.99', 1768706412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313736383730363431323b);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `jk`, `tgl_lahir`, `agama`, `hp`, `alamat`) VALUES
('P-0001', 'Wulan Utami', 'L', '2001-03-06', 'Kristen', '08484363056', 'Jl. Hidayat No. 96'),
('P-0002', 'Yuni Saputra', 'P', '2005-09-07', 'Kristen', '08475426245', 'Jl. Pratama No. 280'),
('P-0003', 'Adi Santoso', 'P', '1996-08-24', 'Katolik', '08442561372', 'Jl. Susanto No. 202'),
('P-0004', 'Dewi Susanto', 'L', '2003-04-05', 'Katolik', '08162685899', 'Jl. Ramadhan No. 243'),
('P-0005', 'Andi Susanto', 'P', '1990-05-09', 'Konghucu', '08690644308', 'Jl. Ramadhan No. 274'),
('P-0006', 'Lina Saputra', 'L', '1977-04-17', 'Buddha', '08582477264', 'Jl. Susanto No. 149'),
('P-0007', 'Wulan Hidayat', 'L', '1974-07-06', 'Katolik', '08618763238', 'Jl. Wijaya No. 71'),
('P-0008', 'Nina Putra', 'P', '1997-02-07', 'Katolik', '08606967817', 'Jl. Ramadhan No. 42'),
('P-0009', 'Rizki Putra', 'L', '1990-01-22', 'Katolik', '08424083514', 'Jl. Ramadhan No. 66'),
('P-0010', 'Ahmad Maulana', 'P', '1992-05-13', 'Hindu', '08345729231', 'Jl. Kurniawan No. 127'),
('P-0011', 'Rina Santoso', 'L', '1980-02-16', 'Islam', '08692279258', 'Jl. Kurniawan No. 82'),
('P-0012', 'Lina Utami', 'L', '1993-02-22', 'Konghucu', '08652042218', 'Jl. Ramadhan No. 288'),
('P-0013', 'Hendra Saputra', 'P', '1996-06-09', 'Hindu', '08238380137', 'Jl. Hidayat No. 83'),
('P-0014', 'Wulan Firmansyah', 'L', '2001-12-18', 'Buddha', '08597528196', 'Jl. Saputra No. 187'),
('P-0015', 'Hendra Maulana', 'P', '1980-05-24', 'Katolik', '08562660573', 'Jl. Sari No. 92'),
('P-0016', 'Adi Santoso', 'P', '1973-10-03', 'Buddha', '08414316599', 'Jl. Saputra No. 274'),
('P-0017', 'Rina Wijaya', 'P', '1982-07-23', 'Hindu', '08849850081', 'Jl. Hidayat No. 202'),
('P-0018', 'Yuni Firmansyah', 'P', '1982-02-06', 'Buddha', '08365445554', 'Jl. Santoso No. 253'),
('P-0019', 'Putri Wijaya', 'P', '2002-11-06', 'Islam', '08448576174', 'Jl. Ramadhan No. 38'),
('P-0020', 'Putri Firmansyah', 'L', '1973-05-02', 'Katolik', '08786250748', 'Jl. Susanto No. 119'),
('P-0021', 'Yuni Utami', 'P', '1996-08-06', 'Islam', '08735015516', 'Jl. Wijaya No. 289'),
('P-0022', 'Ahmad Santoso', 'L', '1980-01-06', 'Buddha', '08340164737', 'Jl. Hidayat No. 241'),
('P-0023', 'Ahmad Susanto', 'P', '1978-10-25', 'Konghucu', '08236207286', 'Jl. Sari No. 155'),
('P-0024', 'Adi Pratama', 'P', '2003-01-22', 'Konghucu', '08643663772', 'Jl. Utami No. 184'),
('P-0025', 'Fajar Pratama', 'L', '1989-12-06', 'Hindu', '08382596074', 'Jl. Utami No. 192'),
('P-0026', 'Nina Sari', 'P', '2002-12-21', 'Buddha', '08709128987', 'Jl. Susanto No. 171'),
('P-0027', 'Fajar Saputra', 'P', '2002-08-05', 'Hindu', '08767845128', 'Jl. Maulana No. 46'),
('P-0028', 'Bayu Susanto', 'L', '1998-09-10', 'Katolik', '08368978709', 'Jl. Putra No. 42'),
('P-0029', 'Bayu Utami', 'P', '1984-08-17', 'Buddha', '08731631458', 'Jl. Ramadhan No. 289'),
('P-0030', 'Hendra Ramadhan', 'P', '1981-09-13', 'Konghucu', '08230001593', 'Jl. Santoso No. 34'),
('P-0031', 'Rudi Kurniawan', 'L', '1972-01-05', 'Konghucu', '08772845782', 'Jl. Putra No. 132'),
('P-0032', 'Hendra Maulana', 'P', '1976-12-21', 'Islam', '08494271125', 'Jl. Utami No. 204'),
('P-0033', 'Yuni Ramadhan', 'L', '1995-08-16', 'Buddha', '08554294986', 'Jl. Santoso No. 4'),
('P-0034', 'Wulan Maulana', 'L', '1981-04-28', 'Hindu', '08351586911', 'Jl. Saputra No. 125'),
('P-0035', 'Yuni Kurniawan', 'P', '1989-08-23', 'Buddha', '08538640497', 'Jl. Santoso No. 29'),
('P-0036', 'Budi Firmansyah', 'L', '1997-10-07', 'Hindu', '08641251823', 'Jl. Putra No. 297'),
('P-0037', 'Wulan Maulana', 'L', '1995-04-23', 'Islam', '08389169664', 'Jl. Susanto No. 83'),
('P-0038', 'Rudi Ramadhan', 'P', '2004-11-18', 'Islam', '08804304373', 'Jl. Ramadhan No. 1'),
('P-0039', 'Lina Kurniawan', 'P', '1989-11-10', 'Kristen', '08323932470', 'Jl. Putra No. 261'),
('P-0040', 'Yuni Kurniawan', 'L', '1995-03-27', 'Konghucu', '08406217353', 'Jl. Saputra No. 212'),
('P-0041', 'Budi Kurniawan', 'P', '1992-10-15', 'Buddha', '08165970395', 'Jl. Wijaya No. 26'),
('P-0042', 'Agus Saputra', 'P', '1992-12-05', 'Katolik', '08135190151', 'Jl. Santoso No. 229'),
('P-0043', 'Rudi Hidayat', 'L', '1983-05-22', 'Hindu', '08956299931', 'Jl. Susanto No. 59'),
('P-0044', 'Lina Hidayat', 'P', '2002-07-29', 'Hindu', '08672390934', 'Jl. Maulana No. 47'),
('P-0045', 'Rizki Pratama', 'L', '1980-10-04', 'Buddha', '08714741867', 'Jl. Putra No. 226'),
('P-0046', 'Fajar Wijaya', 'L', '1993-04-03', 'Kristen', '08440100275', 'Jl. Sari No. 273'),
('P-0047', 'Siti Maulana', 'P', '1991-02-02', 'Hindu', '08199373772', 'Jl. Sari No. 90'),
('P-0048', 'Dian Pratama', 'P', '1984-07-10', 'Buddha', '08363687373', 'Jl. Maulana No. 24'),
('P-0049', 'Yuni Ramadhan', 'P', '1993-04-24', 'Islam', '08924556458', 'Jl. Pratama No. 57'),
('P-0050', 'Dewi Saputra', 'P', '1992-08-27', 'Kristen', '08137087464', 'Jl. Wijaya No. 215'),
('P-0051', 'Budi Hidayat', 'P', '1990-01-06', 'Buddha', '08552326549', 'Jl. Pratama No. 69'),
('P-0052', 'Nina Susanto', 'P', '1982-02-11', 'Hindu', '08787930839', 'Jl. Sari No. 123'),
('P-0053', 'Ahmad Maulana', 'P', '1994-07-31', 'Hindu', '08193809634', 'Jl. Utami No. 261'),
('P-0054', 'Rudi Maulana', 'P', '1995-06-04', 'Konghucu', '08398505951', 'Jl. Utami No. 17'),
('P-0055', 'Rina Firmansyah', 'L', '1982-09-29', 'Islam', '08730531577', 'Jl. Maulana No. 177'),
('P-0056', 'Dewi Sari', 'P', '1975-12-04', 'Katolik', '08779501537', 'Jl. Firmansyah No. 39'),
('P-0057', 'Rizki Utami', 'L', '1985-12-04', 'Katolik', '08499270931', 'Jl. Wijaya No. 213'),
('P-0058', 'Nina Pratama', 'P', '1983-08-17', 'Kristen', '08585894052', 'Jl. Firmansyah No. 278'),
('P-0059', 'Rudi Santoso', 'P', '1994-05-08', 'Buddha', '08302639571', 'Jl. Ramadhan No. 279'),
('P-0060', 'Rudi Santoso', 'P', '1996-03-14', 'Katolik', '08697425493', 'Jl. Ramadhan No. 200'),
('P-0061', 'Nina Putra', 'L', '1975-02-03', 'Konghucu', '08944689666', 'Jl. Hidayat No. 85'),
('P-0062', 'Lina Kurniawan', 'P', '1979-10-11', 'Katolik', '08314568749', 'Jl. Sari No. 248'),
('P-0063', 'Rudi Santoso', 'L', '1981-01-04', 'Katolik', '08802377770', 'Jl. Putra No. 238'),
('P-0064', 'Yuni Firmansyah', 'P', '1982-08-17', 'Kristen', '08972922399', 'Jl. Wijaya No. 259'),
('P-0065', 'Hendra Kurniawan', 'L', '2001-10-07', 'Buddha', '08786925455', 'Jl. Pratama No. 218'),
('P-0066', 'Bayu Utami', 'P', '1970-03-07', 'Buddha', '08151469233', 'Jl. Wijaya No. 286'),
('P-0067', 'Fajar Putra', 'L', '1978-11-12', 'Kristen', '08873235209', 'Jl. Maulana No. 219'),
('P-0068', 'Wulan Utami', 'L', '1989-05-14', 'Katolik', '08755241459', 'Jl. Hidayat No. 233'),
('P-0069', 'Rudi Susanto', 'L', '1979-01-22', 'Katolik', '08168456166', 'Jl. Saputra No. 106'),
('P-0070', 'Siti Kurniawan', 'L', '1994-11-28', 'Konghucu', '08222394152', 'Jl. Hidayat No. 25'),
('P-0071', 'Hendra Susanto', 'L', '1986-09-08', 'Katolik', '08136425081', 'Jl. Kurniawan No. 281'),
('P-0072', 'Putri Wijaya', 'P', '1984-02-08', 'Buddha', '08961494245', 'Jl. Putra No. 168'),
('P-0073', 'Andi Pratama', 'L', '2000-12-18', 'Konghucu', '08954428663', 'Jl. Utami No. 158'),
('P-0074', 'Agus Putra', 'P', '1998-11-23', 'Buddha', '08268616098', 'Jl. Putra No. 253'),
('P-0075', 'Lina Putra', 'P', '1990-03-18', 'Buddha', '08294990199', 'Jl. Pratama No. 278'),
('P-0076', 'Adi Maulana', 'P', '1997-02-07', 'Islam', '08701861494', 'Jl. Susanto No. 136'),
('P-0077', 'Budi Saputra', 'L', '1991-11-08', 'Konghucu', '08131117698', 'Jl. Firmansyah No. 224'),
('P-0078', 'Siti Pratama', 'L', '1991-01-10', 'Islam', '08388494990', 'Jl. Utami No. 299'),
('P-0079', 'Siti Putra', 'L', '1976-02-16', 'Buddha', '08138278926', 'Jl. Ramadhan No. 7'),
('P-0080', 'Andi Susanto', 'P', '1980-02-03', 'Hindu', '08361786999', 'Jl. Saputra No. 72'),
('P-0081', 'Wulan Wijaya', 'L', '1976-05-22', 'Konghucu', '08366409155', 'Jl. Santoso No. 171'),
('P-0082', 'Tono Maulana', 'P', '2001-03-11', 'Kristen', '08677808658', 'Jl. Firmansyah No. 67'),
('P-0083', 'Fajar Pratama', 'P', '1991-04-18', 'Kristen', '08535231054', 'Jl. Maulana No. 184'),
('P-0084', 'Rudi Saputra', 'P', '1989-07-11', 'Konghucu', '08876059131', 'Jl. Saputra No. 197'),
('P-0085', 'Andi Pratama', 'P', '1982-08-23', 'Konghucu', '08693860883', 'Jl. Saputra No. 5'),
('P-0086', 'Yuni Susanto', 'P', '2005-08-08', 'Hindu', '08299642389', 'Jl. Kurniawan No. 89'),
('P-0087', 'Dewi Sari', 'P', '2003-10-18', 'Islam', '08632393357', 'Jl. Susanto No. 166'),
('P-0088', 'Hendra Susanto', 'P', '1974-03-23', 'Buddha', '08656247106', 'Jl. Utami No. 42'),
('P-0089', 'Rudi Saputra', 'P', '1997-04-14', 'Hindu', '08686689851', 'Jl. Susanto No. 267'),
('P-0090', 'Siti Santoso', 'L', '1985-10-25', 'Kristen', '08569415400', 'Jl. Susanto No. 205'),
('P-0091', 'Hendra Kurniawan', 'P', '1997-12-22', 'Hindu', '08237068559', 'Jl. Firmansyah No. 111'),
('P-0092', 'Budi Ramadhan', 'P', '1973-02-28', 'Kristen', '08857606841', 'Jl. Utami No. 200'),
('P-0093', 'Siti Sari', 'P', '1997-07-12', 'Buddha', '08566055004', 'Jl. Saputra No. 200'),
('P-0094', 'Tono Putra', 'P', '1998-08-22', 'Kristen', '08707229321', 'Jl. Putra No. 54'),
('P-0095', 'Rina Ramadhan', 'L', '1971-06-20', 'Kristen', '08372604049', 'Jl. Santoso No. 121'),
('P-0096', 'Adi Ramadhan', 'P', '1982-04-22', 'Hindu', '08578622764', 'Jl. Firmansyah No. 296'),
('P-0097', 'Dian Santoso', 'P', '1987-10-03', 'Konghucu', '08690877553', 'Jl. Wijaya No. 93'),
('P-0098', 'Dian Putra', 'P', '1971-08-09', 'Kristen', '08441899943', 'Jl. Kurniawan No. 224'),
('P-0099', 'Hendra Firmansyah', 'P', '2000-01-31', 'Islam', '08817213777', 'Jl. Putra No. 137'),
('P-0100', 'Yuni Utami', 'L', '1999-01-07', 'Hindu', '08296552475', 'Jl. Maulana No. 148'),
('P-0101', 'Rizki Alpian', 'L', '2026-01-01', 'Islam', '08991592888', 'Gg. Nikam No. 88');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_penjualan` varchar(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kd_penjualan`, `tgl_penjualan`, `kd_pelanggan`, `kd_barang`, `qty`) VALUES
('T-0001', '2026-01-06', 'P-0014', 'B-0018', 10),
('T-0002', '2026-01-06', 'P-0001', 'B-0003', 500),
('T-0003', '2026-01-06', 'P-0006', 'B-0018', 50),
('T-0004', '2026-01-08', 'P-0045', 'B-0004', 100),
('T-0005', '2026-01-10', 'P-0003', 'B-0009', 150),
('T-0006', '2026-01-10', 'P-0040', 'B-0101', 50),
('T-0007', '2026-01-14', 'P-0100', 'B-0017', 144),
('T-0008', '2026-01-14', 'P-0013', 'B-0002', 654),
('T-0009', '2026-01-15', 'P-0005', 'B-0018', 124),
('T-0010', '2026-01-15', 'P-0092', 'B-0046', 554);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'ADMINISTRATOR', 'administrator@gmail.com', 'default.jpg', '$2y$10$a2Sp72NMyKr6YDmDE1GIce/bxIxGlLZO.pzOJm3UkiCZGKBJY8D9K', 1, 1, 1622105924),
(2, 'USER', 'userdemo@gmail.com', 'default.jpg', '$2y$10$Wp/Wj2aq4agR.AWsmqrPa.oyXoZKIrLDr9HLJnKFRG97r0kqnw0i.', 2, 1, 1622106426),
(6, 'ADE NAUFAL RIANTO', 'adenaufalr@gmail.com', 'default.jpg', '$2y$10$kzf/16NVYlAOishz3Gq0gOP2w.vG6mqg5x0o1IygZqk8l7x31QnQe', 1, 1, 1767672928);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 0),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(31, 1, 'Master Pelanggan', 'admin/masterpelanggan', 'fas fa-fw fa-users', 1),
(32, 1, 'Master Barang', 'admin/masterbarang', 'fas fa-fw fa-database', 1),
(35, 1, 'Transaksi Penjualan', 'admin/transaksipenjualan', 'fas fa-fw fa-money-bill-alt', 1),
(36, 2, 'Transaksi Penjualan', 'transaksi/penjualan', 'fas fa-fw fa-shopping-cart', 1),
(37, 1, 'User Management', 'admin/usermanagement', 'fas fa-fw fa-user-cog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_penjualan`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
