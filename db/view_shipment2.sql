CREATE VIEW `view_shipment2` AS
SELECT `a`.`ID` AS `ID`,
  `a`.`keyCustomer` AS `keyCustomer`,
  `b`.`Nama` AS `customer`,
  `a`.`Tanggal` AS `tanggal`,
  `a`.`Shipment_No` AS `shipment`,
  `a`.`Keterangan` AS `description`,
  `a`.`Catatan` AS `note`,
  `c`.`Nama` AS `status`,
  `d`.`Nama` AS `service`,
  `a`.`Lokasi` AS `now_at`,
  `a`.`Dari_Perusahaan` AS `origin_company`,
  `a`.`Dari_Alamat` AS `origin_address`,
  `a`.`Dari_Kota` AS `origin_city`,
  `a`.`Dari_Provinsi` AS `origin_province`,
  `a`.`Dari_Negara` AS `origin_country`,
  `a`.`Dari_ZIP` AS `origin_zip`,
  `a`.`Dari_Kontak` AS `origin_contact`,
  `a`.`Dari_Telpon` AS `origin_phone`,
  `a`.`Dari_Email` AS `origin_email`,
  `a`.`Untuk_Perusahaan` AS `destination_company`,
  `a`.`Untuk_Alamat` AS `destination_address`,
  `a`.`Untuk_Kota` AS `destination_city`,
  `a`.`Untuk_Provinsi` AS `destination_province`,
  `a`.`Untuk_Negara` AS `destination_country`,
  `a`.`Untuk_ZIP` AS `destination_zip`,
  `a`.`Untuk_Kontak` AS `destination_contact`,
  `a`.`Untuk_Telpon` AS `destination_phone`,
  `a`.`Untuk_Email` AS `destination_email`,
  `a`.`Collie` AS `collie`,
  `a`.`AW` AS `weight`
FROM `shipment` `a`
LEFT JOIN `customer` `b`
  ON `a`.`keyCustomer` = `b`.`ID`
LEFT JOIN `status` `c`
  ON `a`.`Status` = `c`.`ID`
LEFT JOIN `service` `d`
  ON `a`.`Service` = `d`.`ID`