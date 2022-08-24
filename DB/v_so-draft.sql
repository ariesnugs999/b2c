SELECT 
	fi.invoice_no AS invoice_no,
	fi.invoice_date AS invoice_date,
	fi.reference_no AS delivery_order_no,
	fi.due_date AS due_date,
	fi.currency AS currency,
	fi.amount_total AS debit,
	fi.amount_total AS total_debit,
	fi.top AS top,
	'' AS sales_order_no,
	'' AS finance_receipt_no,
	'' AS finance_receipt_date,
	'' AS bank,
	'' AS credit,
	(IFNULL(fri.total_credit1, 0) + IFNULL(nr.total_credit2, 0)) AS total_credit,
	'SI' AS cek,
	'' AS category,
    fi.account_customer AS account_customer

				FROM paste_finance_invoice AS fi
				LEFT JOIN
						(SELECT f1.invoice_no,SUM(fr1.amount) AS total_credit1
						FROM paste_finance_receipt_items AS fr1
						INNER JOIN paste_finance_receipt AS fr ON fr1.receipt_no=fr.receipt_no
						INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=fr1.invoice_no

						WHERE fr.status_id='3'
						GROUP BY f1.invoice_no) AS fri ON fri.invoice_no=fi.invoice_no

				LEFT JOIN
						(SELECT f1.invoice_no,SUM(nru.amount) AS total_credit2
						FROM paste_finance_sales_return_used AS nru
						INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
						INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=nru.invoice_no

						WHERE nr.status_id='3' 
						GROUP BY f1.invoice_no) AS nr ON nr.invoice_no=fi.invoice_no

				WHERE fi.category='SALES' AND fi.status_id='3'

UNION ALL

SELECT 	
	f.invoice_no AS invoice_no,
	f.invoice_date AS invoice_date,
	'' AS delivery_order_no,
	'' AS due_date,
	'' AS currency,
	'' AS debit,
	f.amount_total AS total_debit,
	'' AS top,
	'' AS sales_order_no,
	r.receipt_no AS finance_receipt_no,
	r.receipt_date AS finance_receipt_date,
	'' AS bank,
	SUM(ri.amount) AS credit,
	IFNULL(fri.total_credit, 0) AS total_credit,
	'SR' AS cek,
	'BANK' AS category,
    r.account_customer AS account_customer

				FROM paste_finance_receipt_items AS ri
				INNER JOIN paste_finance_receipt AS r ON r.receipt_no=ri.receipt_no
				INNER JOIN paste_finance_invoice AS f ON f.invoice_no=ri.invoice_no
				LEFT JOIN
						(SELECT f1.invoice_no,SUM(fr1.amount) AS total_credit
						FROM paste_finance_receipt_items AS fr1
						INNER JOIN paste_finance_receipt AS fr ON fr1.receipt_no=fr.receipt_no
						INNER JOIN paste_finance_invoice AS f1 ON f1.invoice_no=fr1.invoice_no

						WHERE fr.status_id='3'
						GROUP BY f1.invoice_no) AS fri ON fri.invoice_no=f.invoice_no

				WHERE r.status_id='3'
				AND f.category='SALES' AND f.status_id='3'
				GROUP BY r.receipt_no,f.invoice_no

UNION ALL

SELECT 	
	fn.invoice_no AS invoice_no,
	fn.invoice_date AS invoice_date,
	'' AS delivery_order_no,
	'' AS due_date,
	'' AS currency,
	'' AS debit,
	fn.amount_total AS total_debit,
	'' AS top,
	'' AS sales_order_no,
	nr.sales_return_no AS finance_receipt_no,
	nr.sales_return_date AS finance_receipt_date,
	'' AS bank,
	SUM(nru.amount) AS credit,
	IFNULL(nri.total_credit, 0) AS total_credit,
	'SR' AS cek,
	'RETURN' AS category,
    nr.account_customer AS account_customer

				FROM paste_finance_sales_return_used AS nru
				INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
				INNER JOIN paste_finance_invoice AS fn ON fn.invoice_no=nru.invoice_no
				LEFT JOIN
						(SELECT fn.invoice_no,SUM(nru.amount) AS total_credit
						FROM paste_finance_sales_return_used AS nru
						INNER JOIN paste_finance_sales_return AS nr ON nr.sales_return_no=nru.sales_return_no
						INNER JOIN paste_finance_invoice AS fn ON fn.invoice_no=nru.invoice_no

						WHERE nr.status_id='3'
						GROUP BY fn.invoice_no) AS nri ON nri.invoice_no=fn.invoice_no

				WHERE 	
						nr.status_id='3' AND
						fn.category='SALES' AND
						fn.status_id='3'
				GROUP BY nr.sales_return_no,fn.invoice_no

				ORDER BY invoice_no,finance_receipt_no ASC