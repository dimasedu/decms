#
# TABLE STRUCTURE FOR: faktur_detail
#

DROP TABLE IF EXISTS faktur_detail;

CREATE TABLE `faktur_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid` varchar(20) NOT NULL,
  `item` varchar(200) NOT NULL,
  `qty` float NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `hargasat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO faktur_detail (`id`, `refid`, `item`, `qty`, `satuan`, `hargasat`, `total`) VALUES (1, 'RF1507000004', 'Bolpen Merk Standard 0.5 mm', '1', 'Pcs', 50000, 50000);
INSERT INTO faktur_detail (`id`, `refid`, `item`, `qty`, `satuan`, `hargasat`, `total`) VALUES (2, 'RF1507000004', 'Kertas HVS Sinar Dunia A4 60 Gram', '2', 'Pcs', 35000, 70000);
INSERT INTO faktur_detail (`id`, `refid`, `item`, `qty`, `satuan`, `hargasat`, `total`) VALUES (3, 'RF1507000004', 'Kertas Folio', '1', 'Pcs', 30000, 30000);


#
# TABLE STRUCTURE FOR: faktur_head
#

DROP TABLE IF EXISTS faktur_head;

CREATE TABLE `faktur_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `id_trans` varchar(15) NOT NULL,
  `refid` varchar(30) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `nama_toko` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `input_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO faktur_head (`id`, `tanggal`, `id_trans`, `refid`, `no_faktur`, `nama_toko`, `alamat`, `kontak`, `total`, `input_by`) VALUES (1, '2015-07-15 00:00:00', '004/TW/III/2015', 'RF1507000004', '12345', 'TOKO BUKU MEDIA ILMU', 'JL. RAYA SLAWI NO 12 SLAWI', '-', 150000, '1');


#
# TABLE STRUCTURE FOR: group_akun
#

DROP TABLE IF EXISTS group_akun;

CREATE TABLE `group_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_group` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO group_akun (`id`, `nama_group`) VALUES (1, 'Pengembangan Perpustakaan');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (2, 'Kegiatan Penerimaan Siswa Baru');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (3, 'Kegiatan Pembelajaran dan Ekskul Siswa');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (4, 'Kegiatan Ulangan dan Ujian');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (5, 'Pembelian Bahan Habis Pakai');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (6, 'Langganan Daya dan Jasa');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (7, 'Perawatan Sekolah');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (8, 'Pembayaran Honorarium Bulanan Guru Honorer dan Tenaga Kependidikan Honorer');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (9, 'Pengembangan Profesi Guru');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (10, 'Membantu Siswa Miskin');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (11, 'Pembiayaan Pengelolaan BOS');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (12, 'Pembelian Perangkat Komputer');
INSERT INTO group_akun (`id`, `nama_group`) VALUES (13, 'Biaya Lainnya Jika Komponen 1 s.d 12 telah terpenuhi');


#
# TABLE STRUCTURE FOR: guru
#

DROP TABLE IF EXISTS guru;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO guru (`id`, `nip`, `nama_guru`, `alamat`, `telp`, `tahun`, `gaji`) VALUES (1, '1000', 'Rohadi', 'Ds. Slaranglor RT 01 RW 05 Adiwerna', '085866200003', 2015, 850000);
INSERT INTO guru (`id`, `nip`, `nama_guru`, `alamat`, `telp`, `tahun`, `gaji`) VALUES (2, '1002', 'Junaeah', 'Tegal', '021-12345678', 2014, 800000);
INSERT INTO guru (`id`, `nip`, `nama_guru`, `alamat`, `telp`, `tahun`, `gaji`) VALUES (3, '1003', 'Zumaeroh', 'Ds. Slaranglor RT 10 RW 05 Adiwerna', '-', 2010, 800000);
INSERT INTO guru (`id`, `nip`, `nama_guru`, `alamat`, `telp`, `tahun`, `gaji`) VALUES (4, '1004', 'Solikhudin', '-', '-', 2010, 800000);
INSERT INTO guru (`id`, `nip`, `nama_guru`, `alamat`, `telp`, `tahun`, `gaji`) VALUES (5, '1005', 'Sepudin', '-', '-', 2010, 800000);


#
# TABLE STRUCTURE FOR: honor_detail
#

DROP TABLE IF EXISTS honor_detail;

CREATE TABLE `honor_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid` varchar(20) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO honor_detail (`id`, `refid`, `guru_id`, `periode`, `tanggal`) VALUES (1, 'RF1507000003', 5, 3, '2015-07-13 00:00:00');
INSERT INTO honor_detail (`id`, `refid`, `guru_id`, `periode`, `tanggal`) VALUES (2, 'RF1507000003', 4, 3, '2015-07-13 00:00:00');
INSERT INTO honor_detail (`id`, `refid`, `guru_id`, `periode`, `tanggal`) VALUES (3, 'RF1507000003', 3, 3, '2015-07-13 00:00:00');
INSERT INTO honor_detail (`id`, `refid`, `guru_id`, `periode`, `tanggal`) VALUES (4, 'RF1507000003', 2, 3, '2015-07-13 00:00:00');
INSERT INTO honor_detail (`id`, `refid`, `guru_id`, `periode`, `tanggal`) VALUES (5, 'RF1507000003', 1, 3, '2015-07-13 00:00:00');


#
# TABLE STRUCTURE FOR: honor_head
#

DROP TABLE IF EXISTS honor_head;

CREATE TABLE `honor_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refid` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `termin` int(2) NOT NULL,
  `tahun` int(5) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO honor_head (`id`, `refid`, `tanggal`, `penerima`, `ket`, `kode_akun`, `termin`, `tahun`, `total`) VALUES (1, 'RF1507000003', '2015-07-13', 'Sepudin', 'Membayar Honor', 18, 3, 2015, 12150000);


#
# TABLE STRUCTURE FOR: jenis_akun
#

DROP TABLE IF EXISTS jenis_akun;

CREATE TABLE `jenis_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akun` varchar(20) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `nama_akun` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `enable` enum('Y','T') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (1, '1.1', 9, 'Penyusunan Kriteria Ketuntasan Minimal', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (2, '1.2', 9, 'Penyusunan Kriteria Kenaikan Kelas', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (3, '1.3', 9, 'Tryout Ujian Madrasah 3 Mapel Tingkat Propinsi', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (4, '1.3.1', 9, 'ATK dan bahan habis pakai', 5, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (5, '1.3.2', 9, 'Penggandaan Naskah', 3, 4, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (6, '1.4', 9, 'Tryout Ujian Madrasah 3 Mapel Tingkat Kabupaten', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (7, '1.4.1', 9, 'ATK dan bahan habis pakai', 6, 5, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (9, '1.5', 9, 'Tryout Ujian Madrasah 3 Mapel', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (10, '1.5.1', 9, 'ATK dan bahan habis pakai', 9, 5, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (11, '1.5.2', 9, 'Penggandaan Kartu Peserta', 9, 4, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (12, 'KT', 19, 'Penerimaan Kas Tunai', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (13, 'DB', 20, 'Penerimaan Dana BOS', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (14, '1.6', 9, 'Tryout Ujian Madrasah 3 Mapel Tingkat Sekolah', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (15, '1.6.1', 9, 'ATK dan bahan habis pakai', 5, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (16, '1.6.2', 9, 'Penggandaan Kartu Peserta', 14, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (17, '1.6.3', 9, 'Penggandaan Naskah', 14, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (18, '1.6.4', 9, 'Honor Pengawas Ruang', 14, 8, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (19, '0', 22, 'DB Bunga Deposito', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (20, '1', 23, 'Penyetoran', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (21, '2', 24, 'Pengambilan di Teller', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (22, '3', 25, 'Pengambilan di ATM', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (23, '4', 26, 'Biaya Administrasi', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (24, '5', 27, 'Setoran', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (25, '6', 28, 'Bunga', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (26, '7', 29, 'Koreksi', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (27, '8', 30, 'Saldo Pindahan', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (28, '9', 31, 'Terima Dana BOS Triwulan 1', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (29, '10', 32, 'Terima Dana BOS Triwulan 2', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (30, '11', 33, 'Terima Dana BOS Triwulan 3', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (31, '12', 34, 'Terima Dana BOS Triwulan 4', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (32, 'P', 35, 'Pajak', 0, 0, 'T');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (33, '1.9', 9, 'Kegiatan Pemantapan Persiapan Ujian', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (34, '2.1', 10, 'ATK dan bahan habis pakai', 0, 5, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (35, '2.3', 10, 'Penyusunan Kurikulum Madrasah', 0, 0, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (36, '2.3.1', 10, 'Pengadaan Dokumen Kurikulum', 35, 3, 'Y');
INSERT INTO jenis_akun (`id`, `kode_akun`, `pos_id`, `nama_akun`, `parent_id`, `group_id`, `enable`) VALUES (37, '2.3.2', 10, 'ATK dan bahan habis pakai', 35, 5, 'Y');


#
# TABLE STRUCTURE FOR: kelas
#

DROP TABLE IF EXISTS kelas;

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('aktif','tidak') NOT NULL,
  `kls_nm` varchar(100) NOT NULL,
  `kls_tgkt` int(3) NOT NULL,
  `nullified_by` tinyint(11) NOT NULL,
  `nullified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (13, 'aktif', 'I', 1, 0, '0000-00-00 00:00:00');
INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (14, 'aktif', 'II', 2, 0, '0000-00-00 00:00:00');
INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (15, 'aktif', 'III', 3, 0, '0000-00-00 00:00:00');
INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (16, 'aktif', 'IV', 4, 0, '0000-00-00 00:00:00');
INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (17, 'aktif', 'V', 5, 0, '0000-00-00 00:00:00');
INSERT INTO kelas (`id`, `status`, `kls_nm`, `kls_tgkt`, `nullified_by`, `nullified_date`) VALUES (18, 'aktif', 'VI', 6, 0, '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: modul
#

DROP TABLE IF EXISTS modul;

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mod_master` tinyint(1) NOT NULL,
  `mod_transaksi` tinyint(1) NOT NULL,
  `mod_kesiswaan` tinyint(1) NOT NULL,
  `mod_rekapitulasi` tinyint(1) NOT NULL,
  `mst_program` tinyint(1) NOT NULL,
  `mst_subprogram` tinyint(1) NOT NULL,
  `trs_rab` tinyint(1) NOT NULL,
  `trs_kas` tinyint(1) NOT NULL,
  `trs_guru` tinyint(1) NOT NULL,
  `trs_honor` tinyint(1) NOT NULL,
  `trs_bank` tinyint(1) NOT NULL,
  `trs_pajak` tinyint(1) NOT NULL,
  `sis_kelas` tinyint(1) NOT NULL,
  `sis_siswa` tinyint(1) NOT NULL,
  `sis_naik` tinyint(1) NOT NULL,
  `sis_pindah` tinyint(1) NOT NULL,
  `sis_tinggal` tinyint(1) NOT NULL,
  `sis_deaktif` tinyint(1) NOT NULL,
  `sis_lulus` tinyint(1) NOT NULL,
  `rek_k1` tinyint(1) NOT NULL,
  `rek_k2` tinyint(1) NOT NULL,
  `rek_k3` tinyint(1) NOT NULL,
  `rek_k4` tinyint(1) NOT NULL,
  `rek_k5` tinyint(1) NOT NULL,
  `rek_k6` tinyint(1) NOT NULL,
  `rek_k7` tinyint(1) NOT NULL,
  `rek_k7a` tinyint(1) NOT NULL,
  `rek_02` tinyint(1) NOT NULL,
  `rek_03` tinyint(1) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO modul (`id`, `userid`, `mod_master`, `mod_transaksi`, `mod_kesiswaan`, `mod_rekapitulasi`, `mst_program`, `mst_subprogram`, `trs_rab`, `trs_kas`, `trs_guru`, `trs_honor`, `trs_bank`, `trs_pajak`, `sis_kelas`, `sis_siswa`, `sis_naik`, `sis_pindah`, `sis_tinggal`, `sis_deaktif`, `sis_lulus`, `rek_k1`, `rek_k2`, `rek_k3`, `rek_k4`, `rek_k5`, `rek_k6`, `rek_k7`, `rek_k7a`, `rek_02`, `rek_03`, `create_date`, `update_date`, `update_by`) VALUES (0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2015-08-04 12:47:04', '0000-00-00 00:00:00', 0);


#
# TABLE STRUCTURE FOR: pos_akun
#

DROP TABLE IF EXISTS pos_akun;

CREATE TABLE `pos_akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pos` varchar(20) NOT NULL,
  `nama_pos` varchar(100) NOT NULL,
  `tipe` enum('terima','keluar') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `enable` enum('Y','N') NOT NULL,
  `input_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (1, '1', 'Pendapatan Rutin', 'terima', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (2, '2', 'Bantuan Operasional Sekolah', 'terima', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (3, '3', 'Bantuan', 'terima', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (4, '4', 'Pendapatan Asli Sekolah', 'terima', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (5, '1.1', 'Gaji PNS', 'terima', 1, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (6, '1.2', 'Gaji Pegawai Tidak Tetap', 'terima', 1, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (7, '1.3', 'Belanja Barang dan Jasa', 'terima', 1, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (8, '1', 'Program Sekolah', 'keluar', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (9, '1.1', 'Pengembangan kompetensi lulusan', 'keluar', 8, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (10, '1.2', 'Pengembangan Standar Isi', 'keluar', 8, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (11, '1.3', 'Pengembangan Standar Proses', 'keluar', 8, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (12, '1.4', 'Pengembangan Pendidik dan tenaga Kependidikan', 'keluar', 8, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (15, '2', 'Belanja Lainnya', 'keluar', 0, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (16, '2.1', 'Bos Pusat', 'terima', 2, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (17, '2.2', 'BOS Propinsi', 'terima', 2, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (18, '2.3', 'BOS Kabupaten/Kota', 'terima', 2, 'Y', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (19, 'KT', 'Penerimaan Kas Tunai', 'terima', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (20, 'DB', 'Penerimaan Dana BOS', 'terima', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (22, '0', 'DB Bunga Deposito', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (23, '1', 'Penyetoran', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (24, '2', 'Pengambilan di Teller', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (25, '3', 'Pengambilan di ATM', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (26, '4', 'Biaya Administrasi', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (27, '5', 'Setoran', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (28, '6', 'Bunga', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (29, '7', 'Koreksi', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (30, '8', 'Saldo Pindahan', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (31, '9', 'Terima Dana Bos Termin 1', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (32, '10', 'Terima Dana Bos Termin 2', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (33, '11', 'Terima Dana Bos Termin 3', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (34, '12', 'Terima Dana Bos termin 4', '', 0, 'N', '0000-00-00 00:00:00');
INSERT INTO pos_akun (`id`, `kode_pos`, `nama_pos`, `tipe`, `parent_id`, `enable`, `input_date`) VALUES (35, 'P', 'Pajak', '', 0, 'N', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: rab
#

DROP TABLE IF EXISTS rab;

CREATE TABLE `rab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  `termin` int(1) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `input_date` datetime NOT NULL,
  `input_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO rab (`id`, `tahun`, `termin`, `sumber_dana`, `kode_akun`, `nominal`, `input_date`, `input_by`) VALUES (1, 2015, 3, 16, 18, 12150000, '2015-07-23 10:17:35', 1);
INSERT INTO rab (`id`, `tahun`, `termin`, `sumber_dana`, `kode_akun`, `nominal`, `input_date`, `input_by`) VALUES (2, 2015, 3, 16, 5, 250000, '2015-07-23 10:18:27', 1);


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS setting;

CREATE TABLE `setting` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(200) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `akreditasi` char(2) NOT NULL,
  `nama_kepsek` varchar(200) DEFAULT NULL,
  `nip_kepsek` varchar(50) DEFAULT NULL,
  `nama_bendahara` varchar(200) DEFAULT NULL,
  `nip_bendahara` varchar(50) DEFAULT NULL,
  `nama_komite` varchar(200) DEFAULT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `nsm` varchar(30) NOT NULL,
  `termin_aktif` int(1) NOT NULL,
  `th_ajar` varchar(10) NOT NULL,
  `saldo_awal_tunai` int(11) NOT NULL,
  `saldo_bank_awal` int(11) NOT NULL,
  `app_id` varchar(30) NOT NULL,
  `reg_key` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO setting (`id`, `nama_sekolah`, `jenis`, `status`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `kota`, `propinsi`, `akreditasi`, `nama_kepsek`, `nip_kepsek`, `nama_bendahara`, `nip_bendahara`, `nama_komite`, `npsn`, `nsm`, `termin_aktif`, `th_ajar`, `saldo_awal_tunai`, `saldo_bank_awal`, `app_id`, `reg_key`) VALUES (1, 'BUSTANUL ARIFIN 1', 'MI', 'SWASTA', 'DS PAGEDANGAN ', 'Pagedangan', 'Adiwerna', 'Tegal', 'Slawi', 'Jawa Tengah', 'C', 'DUL JONEY', '1234567890', 'IMRON ROSADI', '1111111', 'ZAMRONI', '123456789', '1234567890', 3, '2014-2015', 500000, 100000, 'BOS-99CBD8', 'X7M300YXDN');


#
# TABLE STRUCTURE FOR: siswa
#

DROP TABLE IF EXISTS siswa;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jen_kel` enum('L','P') NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(200) NOT NULL,
  `alamat_ortu` varchar(200) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `th_ajar` varchar(10) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `nullified_by` tinyint(11) NOT NULL,
  `nullified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (1, '1000', '', 'SEBASTIAN G', 'TEGAL', '2000-09-01', 'L', 'CASMADI', 'MUJIROH', 'BURUH TANI', 'DESA APEL JAYA', '085713400010', '0', 'aktif', '2014-2015', 13, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (2, '1001', '', 'IMRON ROSIDI', 'TEGAL', '2000-09-02', 'L', '', 'TUNIROH', '', '', '085713400011', '', 'tidak', '2014-2015', 13, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (3, '1002', '', 'BELARINA', 'TEGAL', '2000-09-03', 'P', '', 'SARMAD', '', '', '085713400012', '', 'aktif', '2015-2016', 13, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (4, '1003', '', 'SAM DALLA BONA', 'TEGAL', '2000-09-04', 'P', '', 'SUDARSO', '', '', '085713400013', '', 'aktif', '2014-2015', 14, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (5, '1004', '', 'RONALDINHO', 'TEGAL', '2000-09-05', 'L', '', 'SUTARMIN', '', '', '085713400014', '', 'aktif', '2014-2015', 14, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (6, '1005', '', 'ROONEY WAYNE', 'TEGAL', '2000-09-06', 'L', '', 'SUMINTO', '', '', '085713400015', '', 'aktif', '2014-2015', 15, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (7, '1006', '', 'CLARA SINTA', 'TEGAL', '2000-09-07', 'P', '', 'GATO', '', '', '085713400016', '', 'aktif', '2014-2015', 15, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (8, '1007', '', 'J LOPEZ CARRO', 'TEGAL', '2000-09-08', 'P', '', 'NASWIN', '', '', '085713400017', '', 'aktif', '2014-2015', 16, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (9, '1008', '', 'BATISTUTA', 'TEGAL', '2000-09-09', 'L', '', 'NASRULLOH', '', '', '085713400018', '', 'aktif', '2014-2015', 16, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (10, '1009', '', 'LEONEL OSMAN', 'TEGAL', '2000-09-10', 'L', '', 'H. RIPIN', '', '', '085713400019', '', 'aktif', '2014-2015', 17, '-', 0, '0000-00-00 00:00:00');
INSERT INTO siswa (`id`, `nis`, `nisn`, `nama_siswa`, `tmpt_lahir`, `tgl_lahir`, `jen_kel`, `nama_ayah`, `nama_ibu`, `pekerjaan_ortu`, `alamat_ortu`, `no_hp`, `foto`, `status`, `th_ajar`, `kelas_id`, `ket`, `nullified_by`, `nullified_date`) VALUES (11, '1010', '-', 'Soni Kurniawan', 'Tegal', '2001-07-24', 'L', '', 'Kasroah', '', '', '-', '0', 'aktif', '2014-2015', 17, '-', 0, '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: siswa_mutasi
#

DROP TABLE IF EXISTS siswa_mutasi;

CREATE TABLE `siswa_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `status` enum('keluar','dikeluarkan','mati','lulus') NOT NULL,
  `th_ajar` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO siswa_mutasi (`id`, `nis`, `status`, `th_ajar`, `ket`, `modified_by`, `modified_date`) VALUES (1, '1001', 'dikeluarkan', '2014-2015', 'Terlibat tawuran siswa', 'admin', '2015-07-25 15:23:58');


#
# TABLE STRUCTURE FOR: siswa_trans
#

DROP TABLE IF EXISTS siswa_trans;

CREATE TABLE `siswa_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `th_ajar` varchar(10) NOT NULL,
  `status` enum('penempatan','naik','pindah','tinggal') NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (12, '1000', 13, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (13, '1001', 13, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (14, '1002', 14, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (15, '1003', 14, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (16, '1004', 15, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (17, '1005', 15, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (18, '1006', 14, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (19, '1007', 14, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (20, '1008', 16, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (21, '1009', 17, '2014-2015', 'penempatan', 'Penempatan Siswa', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (22, '-', 13, '2014-2015', 'penempatan', 'Penempatan Siswa di Kelas', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (29, '1002', 13, '2015-2016', 'tinggal', 'Tinggal Kelas', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (28, '1000', 13, '2014-2015', 'pindah', 'Pindah Kelas', 0, '0000-00-00 00:00:00');
INSERT INTO siswa_trans (`id`, `nis`, `kelas_id`, `th_ajar`, `status`, `keterangan`, `modified_by`, `modified_date`) VALUES (27, '1000', 15, '2014-2015', 'pindah', 'Pindah Kelas', 0, '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: termin
#

DROP TABLE IF EXISTS termin;

CREATE TABLE `termin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `termin` int(2) NOT NULL,
  `periode_awal` int(2) NOT NULL,
  `periode_akhir` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO termin (`id`, `termin`, `periode_awal`, `periode_akhir`) VALUES (1, 1, 1, 3);
INSERT INTO termin (`id`, `termin`, `periode_awal`, `periode_akhir`) VALUES (2, 2, 4, 6);
INSERT INTO termin (`id`, `termin`, `periode_awal`, `periode_akhir`) VALUES (3, 3, 7, 9);
INSERT INTO termin (`id`, `termin`, `periode_awal`, `periode_akhir`) VALUES (4, 4, 10, 11);


#
# TABLE STRUCTURE FOR: transaksi_bank
#

DROP TABLE IF EXISTS transaksi_bank;

CREATE TABLE `transaksi_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `termin` int(1) NOT NULL,
  `tahun` int(4) NOT NULL,
  `refid` varchar(20) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `terima` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('terima','keluar') NOT NULL,
  `input_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: transaksi_kas
#

DROP TABLE IF EXISTS transaksi_kas;

CREATE TABLE `transaksi_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans` varchar(15) NOT NULL,
  `refid` varchar(30) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `terima` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('terima','keluar') NOT NULL,
  `input_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (1, '001/TW/III/2015', 'RF1507000001', 12, '2015-07-01', 'Penerimaan Uang untuk kas tunai', 15000000, 0, 'terima', '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (2, '002/TW/III/2015', 'RF1507000002', 5, '2015-07-08', 'Penggandaan Naskah Tryout', 0, 250000, 'keluar', '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (3, '003/TW/III/2015', 'RF1507000003', 18, '2015-07-13', 'Membayar Honor', 0, 12150000, 'keluar', '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (4, '004/TW/III/2015', 'RF1507000004', 10, '2015-07-15', 'Pembelian kebutuhan ATK Guru', 0, 150000, 'keluar', '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (5, '005/TW/III/2015', 'RF1507000005', 36, '2015-07-24', 'Pembuatan Dokumen Silabus', 0, 500000, 'keluar', '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas (`id`, `id_trans`, `refid`, `kode_akun`, `tanggal`, `deskripsi`, `terima`, `keluar`, `jenis`, `input_by`, `modified_date`, `modified_by`) VALUES (6, '006/TW/III/2015', 'RF1507000006', 37, '2015-07-24', 'Pembelian ATK', 0, 25000, 'keluar', '1', '0000-00-00 00:00:00', 0);


#
# TABLE STRUCTURE FOR: transaksi_kas_bantu
#

DROP TABLE IF EXISTS transaksi_kas_bantu;

CREATE TABLE `transaksi_kas_bantu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `termin` int(1) NOT NULL,
  `id_trans` varchar(15) NOT NULL,
  `refid` varchar(30) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `terima` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('terima','keluar') NOT NULL,
  `faktur` int(1) NOT NULL,
  `lampiran` int(2) NOT NULL,
  `input_by` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (1, '2015-07-01 00:00:00', 3, '001/TW/III/2015', 'RF1507000001', 12, 'Penerimaan Uang untuk kas tunai', 15000000, 0, 'terima', 0, 0, '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (2, '2015-07-08 00:00:00', 3, '002/TW/III/2015', 'RF1507000002', 5, 'Penggandaan Naskah Tryout', 0, 250000, 'keluar', 0, 0, '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (3, '2015-07-13 00:00:00', 3, '003/TW/III/2015', 'RF1507000003', 18, 'Membayar Honor', 0, 12150000, 'keluar', 0, 1, '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (4, '2015-07-15 00:00:00', 3, '004/TW/III/2015', 'RF1507000004', 10, 'Pembelian kebutuhan ATK Guru', 0, 150000, 'keluar', 1, 0, '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (5, '2015-07-24 00:00:00', 3, '005/TW/III/2015', 'RF1507000005', 36, 'Pembuatan Dokumen Silabus', 0, 500000, 'keluar', 0, 0, '1', '0000-00-00 00:00:00', 0);
INSERT INTO transaksi_kas_bantu (`id`, `tanggal`, `termin`, `id_trans`, `refid`, `kode_akun`, `keterangan`, `terima`, `keluar`, `jenis`, `faktur`, `lampiran`, `input_by`, `modified_date`, `modified_by`) VALUES (6, '2015-07-24 00:00:00', 3, '006/TW/III/2015', 'RF1507000006', 37, 'Pembelian ATK', 0, 25000, 'keluar', 0, 0, '1', '0000-00-00 00:00:00', 0);


#
# TABLE STRUCTURE FOR: transaksi_pajak
#

DROP TABLE IF EXISTS transaksi_pajak;

CREATE TABLE `transaksi_pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `termin` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `refid` varchar(20) NOT NULL,
  `jenis_pajak` enum('ppn','21','22','23') NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `terima` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('terima','keluar') NOT NULL,
  `input_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `user_privillage` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_date` datetime NOT NULL,
  `ip_login` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO users (`id`, `username`, `password`, `nama_lengkap`, `role`, `user_privillage`, `status`, `login_date`, `ip_login`) VALUES (1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Dimas Edu P', 'admin', 1, 1, '2015-08-04 09:40:51', '::1');
INSERT INTO users (`id`, `username`, `password`, `nama_lengkap`, `role`, `user_privillage`, `status`, `login_date`, `ip_login`) VALUES (2, 'duljoni', '25d55ad283aa400af464c76d713c07ad', 'Doel Joney, SE.Akt', 'staff', 1, 0, '0000-00-00 00:00:00', '');


