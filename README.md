# 📊 SiPenjualan - Sistem Informasi Penjualan

[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.1.11-orange.svg)](https://codeigniter.com/)
[![PHP Version](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-blue.svg)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Status](https://img.shields.io/badge/status-active-success.svg)]()

> Sistem Informasi Penjualan berbasis web dengan fitur lengkap untuk manajemen transaksi, inventory, dan customer management. Dibangun dengan CodeIgniter 3 dan Bootstrap 4.

## ✨ Features

### 🔐 Authentication & Authorization
- **Multi-level User Roles** - Admin, User, dan role custom
- **User Activation System** - Admin dapat mengaktifkan/menonaktifkan user
- **Secure Password Reset** - Reset password dengan default password
- **Role-based Menu Access** - Kontrol akses menu berdasarkan role

### 📦 Master Data Management
- **Customer Management** - CRUD customer dengan import/export Excel
- **Product Management** - Manajemen barang dengan kode auto-generate
- **User Management** - Kelola user dengan aktivasi dan role assignment

### 💰 Transaction Management
- **Sales Transaction** - Pencatatan transaksi penjualan
- **Auto-generate Transaction Code** - Kode transaksi otomatis dengan format custom
- **Transaction History** - Riwayat transaksi lengkap dengan filter

### 🎨 Modern UI/UX
- **SweetAlert2 Integration** - Toast notifications yang modern dan elegan
- **Loading Indicators** - Feedback visual saat proses form submission
- **Confirmation Modals** - Konfirmasi delete dengan SweetAlert2
- **Image Preview** - Preview gambar sebelum upload
- **Responsive Design** - Mobile-friendly dengan Bootstrap 4
- **DataTables** - Table dengan search, sort, dan pagination
- **Date Picker** - Input tanggal yang user-friendly

## 🚀 Quick Start

### Prerequisites

Pastikan sistem Anda telah terinstall:
- **PHP** >= 8.0
- **MySQL** >= 5.7
- **Apache/Nginx** Web Server
- **Composer** (optional)

### Installation

1. **Clone repository**
   ```bash
   git clone https://github.com/wokding/sifopenjualan.git
   cd sifopenjualan
   ```

2. **Setup Database**
   - Buat database baru di MySQL
   ```sql
   CREATE DATABASE db_sip;
   ```
   - Import database dari `database/db_sip.sql`
   ```bash
   mysql -u root -p db_sip < database/db_sip.sql
   ```

3. **Configure Application**
   
   Edit `application/config/database.php`:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'root',        // Sesuaikan username MySQL
       'password' => '',            // Sesuaikan password MySQL
       'database' => 'db_sip',
   );
   ```
   
   Edit `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost:8000/';  // Sesuaikan URL
   ```

4. **Run Application**
   
   Menggunakan PHP Built-in Server:
   ```bash
   php -S localhost:8000
   ```
   
   Atau setup dengan Apache/Nginx virtual host.

5. **Login**
   
   Default credentials:
   - **Email**: admin@admin.com
   - **Password**: password123

## 📁 Project Structure

```
sifopenjualan/
├── application/
│   ├── config/          # Configuration files
│   ├── controllers/     # Controllers (Admin, Auth, User, Menu, Transaksi)
│   ├── models/          # Models (Admin_model, Menu_model)
│   ├── views/           # Views (admin, user, auth, menu)
│   ├── helpers/         # Custom helpers (rupiah, bulan, kfa)
│   └── libraries/       # Custom libraries (Pdfgenerator, dompdf, MPDF)
├── assets/
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   ├── img/             # Images and uploads
│   └── vendor/          # Frontend libraries (Bootstrap, jQuery, DataTables)
├── database/
│   └── db_sip.sql       # Database schema and seed data
└── system/              # CodeIgniter core files
```

## 🎯 Usage

### Admin Dashboard
- Akses semua fitur aplikasi
- Manage users dan aktivasi
- Full CRUD master data
- View dan manage semua transaksi
- Role & menu access management

### User Dashboard
- View profile dan edit profile
- Create dan manage transaksi pribadi
- View riwayat transaksi
- Limited menu access based on role

### Master Data
1. **Master Pelanggan**
   - Add/Edit/Delete customer
   - Import dari Excel
   - Export ke Excel

2. **Master Barang**
   - Add/Edit/Delete product
   - Auto-generate kode barang
   - Import/Export Excel

3. **Transaksi Penjualan**
   - Create transaksi dengan detail
   - Auto-generate nomor transaksi
   - View dan print transaksi

## 🔧 Technology Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| CodeIgniter | 3.1.11 | PHP Framework |
| PHP | 8.0+ | Backend Language |
| MySQL | 5.7+ | Database |
| Bootstrap | 4.6 | Frontend Framework |
| jQuery | 3.x | JavaScript Library |
| SweetAlert2 | 11 | Modern Alerts |
| DataTables | 1.10 | Table Plugin |
| MPDF/Dompdf | Latest | PDF Generation |
| Chart.js | 2.9 | Charts (Future) |

## 🎨 Screenshots

*Coming soon - Screenshots aplikasi akan ditambahkan*

## 📝 API Documentation

Aplikasi ini tidak menggunakan REST API. Semua interaksi menggunakan traditional request-response pattern dengan CodeIgniter.

## 🤝 Contributing

Kontribusi sangat diterima! Silakan baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk detail proses submit pull request.

### Development Guidelines

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

Project ini dilisensikan under MIT License - lihat [LICENSE](LICENSE) file untuk detail.

## 👥 Authors

- **Ade Naufal Rianto** - *Initial work* - [wokding](https://github.com/wokding)

## 🙏 Acknowledgments

- [CodeIgniter](https://codeigniter.com/) - PHP Framework
- [Bootstrap](https://getbootstrap.com/) - Frontend Framework  
- [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2) - Admin Template
- [SweetAlert2](https://sweetalert2.github.io/) - Beautiful Alert Library
- [DataTables](https://datatables.net/) - Table Plugin

## 📞 Support

Jika Anda menemukan bug atau memiliki saran, silakan buat [issue baru](https://github.com/wokding/sifopenjualan/issues).

## 🗺️ Roadmap

- [ ] Dashboard dengan statistik dan charts
- [ ] Export PDF untuk laporan
- [ ] Kategori produk
- [ ] Discount system
- [ ] Multiple payment methods
- [ ] Stock management & alerts
- [ ] Return/Refund system
- [ ] Email notifications
- [ ] Advanced reporting

---

<p align="center">Made with ❤️ by Developer Team</p>
