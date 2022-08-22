SELECT
    `dt`.`RINumber` AS `No_Transaksi`,
    `gr`.`RIDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    `dt`.`volume` AS `masuk_volume`,
    `dt`.`QTY` AS `masuk_QTY`,
    `pd`.`HargaBeli` AS `HS_beli`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'RI' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`VendorCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        (
            `wms`.`tbl_receipt_item` `gr`
        JOIN `wms`.`tbl_ri_detail` `dt`
        ON
            ((`dt`.`RINumber` = `gr`.`RINumber`))
        )
    JOIN `wms`.`tbl_pi_detail` `pd`
    ON
        ((`pd`.`PONumber` = `dt`.`PONumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`PRNumber` AS `No_Transaksi`,
    `gr`.`PRDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    `dt`.`volume` AS `keluar_volume`,
    `dt`.`QTY` AS `keluar_QTY`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'PR' AS `Type_Transaksi`,
    'OUT' AS `In_Out`,
    `gr`.`VendorCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        (
            `wms`.`tbl_purchase_return` `gr`
        JOIN `wms`.`tbl_pr_detail` `dt`
        ON
            ((`dt`.`PRNumber` = `gr`.`PRNumber`))
        )
    JOIN `wms`.`tbl_po_detail` `pd`
    ON
        ((`pd`.`PONumber` = `dt`.`PONumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`DONumber` AS `No_Transaksi`,
    `gr`.`DODate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    `pd`.`HargaJual` AS `HS_jual`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    `dt`.`volume` AS `keluar_volume`,
    `dt`.`QTY` AS `keluar_QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'DO' AS `Type_Transaksi`,
    'OUT' AS `In_Out`,
    `gr`.`CustomerCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        (
            `wms`.`tbl_delivery_order` `gr`
        JOIN `wms`.`tbl_do_detail` `dt`
        ON
            ((`dt`.`DONumber` = `gr`.`DONumber`))
        )
    JOIN `wms`.`tbl_si_detail` `pd`
    ON
        ((`pd`.`SONumber` = `dt`.`SONumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`SRNumber` AS `No_Transaksi`,
    `gr`.`SRDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    `dt`.`volume` AS `masuk_volume`,
    `dt`.`QTY` AS `masuk_QTY`,
    (
        CASE WHEN(`dt`.`volume` <= 0) THEN '0'
    END
) AS `keluar_volume`,
(
    CASE WHEN(`dt`.`QTY` <= 0) THEN '0'
END
) AS `keluar_QTY`,
'0' AS `HS_retur_jual`,
'0' AS `HS_retur_beli`,
'0' AS `HS_beli`,
'0' AS `HS_jual`,
'0' AS `HS_produksi`,
'0' AS `HS_penyesuaian`,
'0' AS `penyesuaian_QTY`,
'0' AS `penyesuaian_volume`,
'0' AS `produksi_QTY`,
'0' AS `produksi_volume`,
'SR' AS `Type_Transaksi`,
'IN' AS `In_Out`,
`gr`.`CustomerCode` AS `Object_Transaksi`,
`gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        (
            `wms`.`tbl_sales_return` `gr`
        JOIN `wms`.`tbl_sr_detail` `dt`
        ON
            ((`dt`.`SRNumber` = `gr`.`SRNumber`))
        )
    JOIN `wms`.`tbl_si_detail` `pd`
    ON
        ((`pd`.`SONumber` = `dt`.`SONumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`IANumber` AS `No_Transaksi`,
    `gr`.`IADate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    `dt`.`QTY` AS `penyesuaian_QTY`,
    `dt`.`volume` AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'IA' AS `Type_Transaksi`,
    (
        CASE WHEN(`dt`.`QTY` <= 0) THEN 'OUT' ELSE 'IN'
    END
) AS `In_Out`,
'Adjustment' AS `Object_Transaksi`,
`gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_inventory_adjustment` `gr`
    JOIN `wms`.`tbl_ia_detail` `dt`
    ON
        ((`dt`.`IANumber` = `gr`.`IANumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`MINumber` AS `No_Transaksi`,
    `gr`.`MIDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    `dt`.`volume` AS `keluar_volume`,
    `dt`.`QTY` AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    'MI' AS `Type_Transaksi`,
    'OUT' AS `In_Out`,
    `gr`.`WarehouseFrom` AS `Object_Transaksi`,
    `gr`.`WarehouseTo` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_mutasi_item` `gr`
    JOIN `wms`.`tbl_mi_detail` `dt`
    ON
        ((`dt`.`MINumber` = `gr`.`MINumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`MINumber` AS `No_Transaksi`,
    `gr`.`MIDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    `dt`.`volume` AS `masuk_volume`,
    `dt`.`QTY` AS `masuk_QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'MI' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`WarehouseTo` AS `Object_Transaksi`,
    `gr`.`WarehouseTo` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_mutasi_item` `gr`
    JOIN `wms`.`tbl_mi_detail` `dt`
    ON
        ((`dt`.`MINumber` = `gr`.`MINumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`MMNumber` AS `No_Transaksi`,
    `gr`.`MMDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    `dt`.`QTY` AS `produksi_QTY`,
    `dt`.`volume` AS `produksi_volume`,
    'MM' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`WarehouseCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_material_modifier` `gr`
    JOIN `wms`.`tbl_mm_detail` `dt`
    ON
        ((`dt`.`MMNumber` = `gr`.`MMNumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`MMNumber` AS `No_Transaksi`,
    `gr`.`MMDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'MM' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`WarehouseCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_material_modifier` `gr`
    JOIN `wms`.`tbl_mm_detail1` `dt`
    ON
        ((`dt`.`MMNumber` = `gr`.`MMNumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`PMNumber` AS `No_Transaksi`,
    `gr`.`PMDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    `dt`.`QTY` AS `produksi_QTY`,
    `dt`.`volume` AS `produksi_volume`,
    'PM' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`WarehouseCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_premix_modifier` `gr`
    JOIN `wms`.`tbl_pm_detail` `dt`
    ON
        ((`dt`.`PMNumber` = `gr`.`PMNumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))
UNION
SELECT
    `dt`.`PMNumber` AS `No_Transaksi`,
    `gr`.`PMDate` AS `Tgl_Transaksi`,
    `dt`.`ItemCode` AS `ItemCode`,
    `dt`.`ItemDesc` AS `ItemDesc`,
    `dt`.`ItemUnit` AS `ItemUnit`,
    `dt`.`volume` AS `volume`,
    `dt`.`QTY` AS `QTY`,
    '0' AS `HS_retur_jual`,
    '0' AS `HS_retur_beli`,
    '0' AS `HS_beli`,
    '0' AS `HS_jual`,
    '0' AS `HS_produksi`,
    '0' AS `HS_penyesuaian`,
    '0' AS `masuk_volume`,
    '0' AS `masuk_QTY`,
    '0' AS `keluar_volume`,
    '0' AS `keluar_QTY`,
    '0' AS `penyesuaian_QTY`,
    '0' AS `penyesuaian_volume`,
    '0' AS `produksi_QTY`,
    '0' AS `produksi_volume`,
    'PM' AS `Type_Transaksi`,
    'IN' AS `In_Out`,
    `gr`.`WarehouseCode` AS `Object_Transaksi`,
    `gr`.`WarehouseCode` AS `WarehouseCode`
FROM
    (
        `wms`.`tbl_premix_modifier` `gr`
    JOIN `wms`.`tbl_pm_detail1` `dt`
    ON
        ((`dt`.`PMNumber` = `gr`.`PMNumber`))
    )
WHERE
    (`gr`.`TransStatus` IN(1, 2))