SELECT
`tec_sale_items`.`id` AS `id`, 
`tec_sale_items`.`sale_id` AS `sale_id`, 
`tec_sale_items`.`product_id` AS `product_id`, 
`tec_sale_items`.`quantity` AS `quantity`, 
`tec_sale_items`.`unit_price` AS `unit_price`, 
`tec_sale_items`.`net_unit_price` AS `net_unit_price`, 
`tec_sale_items`.`discount` AS `discount`, 
`tec_sale_items`.`item_discount` AS `item_discount`, 
`tec_sale_items`.`tax` AS `tax`, 
`tec_sale_items`.`item_tax` AS `item_tax`, 
`tec_sale_items`.`subtotal` AS `subtotal`, 
`tec_sale_items`.`real_unit_price` AS `real_unit_price`, 
`tec_sale_items`.`cost` AS `cost`, 
`tec_sale_items`.`product_code` AS `product_code`, 
`tec_sale_items`.`product_name` AS `product_name`, 
`tec_sale_items`.`comment` AS `comment`,  
`tec_v_purchase_items_products`.`avg_purchase_price` AS `avg_purchase_price`, 
(`tec_sale_items`.`real_unit_price` - `tec_v_purchase_items_products`.`avg_purchase_price`) AS `profit_items`,
COALESCE((`tec_sale_items`.`real_unit_price` - `tec_v_purchase_items_products`.`avg_purchase_price`) * `tec_sale_items`.`quantity`, 0) AS `jml_profit_items` 
FROM 
(`tec_sale_items` 
	left join `tec_v_purchase_items_products` on(`tec_v_purchase_items_products`.`product_id` = `tec_sale_items`.`product_id`));