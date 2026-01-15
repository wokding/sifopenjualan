-- ============================================================
-- SOLUSI PERMANEN: Database Session untuk Free Hosting
-- ============================================================
-- Jalankan query ini di phpMyAdmin hosting Anda
-- Ini akan mengatasi error session permission di InfinityFree

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Setelah create table ini, update application/config/config.php
-- Ubah:
-- $config['sess_driver'] = 'files';
-- $config['sess_save_path'] = APPPATH . 'cache/';
-- 
-- Jadi:
-- $config['sess_driver'] = 'database';
-- $config['sess_save_path'] = 'ci_sessions';
