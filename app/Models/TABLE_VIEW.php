<?php

// Create table view gedung_parkir
// CREATE OR REPLACE VIEW gedung_parkir AS
// SELECT bs.secid, bs.code, bs.name, bl.levelid as levelcode, bl.name as levelname, bd.spaceid as gedungcode, bd.nama as gedung, bd.prov, bd.kab, bd.kec, bd.fulladdress as alamat, pr.ratepark FROM building_section bs LEFT JOIN building_level bl ON bs.levelcode = bl.levelid LEFT JOIN building bd ON bl.buildcode = bd.spaceid LEFT JOIN parking_rate pr ON bd.spaceid = pr.building;

// Create table view channel_service
// CREATE OR REPLACE VIEW channel_service AS
// SELECT pc.id, pc.methodid, pc.nama as nama_akun, pc.accountno, pm.nama as methodname, pm.keterangan FROM payment_channel pc LEFT JOIN payment_method pm ON pc.methodid = pm.id;

// Create table view report_cost
// CREATE OR REPLACE VIEW report_cost AS
// SELECT bk.userid, DATE_FORMAT(bk.datebook, '%M-%y') AS tanggal, SUM(bp.total) as biaya FROM booking bk LEFT JOIN booking_payment bp ON bk.bookid = bp.bookid GROUP BY bk.userid, YEAR(bk.datebook), MONTH(bk.datebook) ORDER BY bk.datebook ASC ;

// Create table view park_freq
// CREATE OR REPLACE VIEW park_freq AS
// SELECT bk.userid, COUNT(bk.spacerent) as frekuensi, gp.gedung FROM booking bk LEFT JOIN gedung_parkir gp ON bk.spacerent = gp.secid GROUP BY bk.userid, bk.spacerent ORDER BY bk.datebook ASC ;

?>