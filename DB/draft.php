if ($numsRB > 0){
		$i = 1;
		$saldo = 0;
		$totDebit = 0;
		$totCredit = 0;
		
		$overDue = 0;
		//$toDay = date('Y-m-d');
		
		while ($dtRB = mysqli_fetch_array($sqlRB)){
			$cek = $dtRB['cek'];
			if ($cek == 'SI'){
				$dateSI = date('d-M-Y',strtotime($dtRB['invoice_date']));
				$noSR = '';
				$dateSR = '';
				$bank = '';
				$noSO = $dtRB['sales_order_no'];
				$noDO = $dtRB['delivery_order_no'];
				$top = $dtRB['top'];
				if ($dtRB['due_date'] > 0){
					$dateDue = date('d-M-Y',strtotime($dtRB['due_date']));
					$overDue = (strtotime($toDay) - strtotime($dtRB['due_date']))/(3600*24);
				}
				$currency = $dtRB['currency'];
				$debit = $dtRB['debit'];
				$credit = '';
				
				$status = 'ON SCHEDULE';
				if ($overDue > 0){
					$status = 'OVER DUE';
				}
				$a = $dtRB['debit'] - $dtRB['total_credit'];
				if ($a < 1){
					$status = 'SOLVED';
					$overDue = 0;
				}
			}
			elseif ($cek == 'SR'){
				$dateSI = '';
				$noSR = $dtRB['finance_receipt_no'];
				$dateSR = date('d-M-Y',strtotime($dtRB['finance_receipt_date']));
				$bank = $dtRB['bank'];
				$noSO = '';
				$noDO = '';
				$top = '';
				$dateDue = '';
				$overDue = '';
				$currency = '';
				$debit = '';
				$credit = $dtRB['credit'];
				$status = '';
			}
			
			$saldo = $saldo + $debit - $credit;
			$totDebit = $totDebit + $dtRB['debit'];
			$totCredit = $totCredit + $dtRB['credit'];
			
			$dataRB[] = array(	'noSI' => $dtRB['invoice_no'],
								'dateSI' => $dateSI,
								'noSR' => $noSR,
								'dateSR' => $dateSR,
								'bank' => $bank,
								'noSO' => $noSO,
								'noDO' => $noDO,
								'accCust' => $dtRB['account_customer'],
								'nameCust' => $dtRB['customer_name'],
								'payTOP' => $top,
								'dateDue' => $dateDue,
								'overDue' => $overDue,
								'currency' => $currency,
								'debit' => number_format($debit),
								'credit' => number_format($credit),
								'saldo' => number_format($saldo),
								'status' => $status,
								'cek' => $cek,
								'category' => $dtRB['category'],
								'no' => $i);
			$i++;
		}
	}	
	$smarty->assign("dtRB", $dataRB);
	$smarty->assign("totDebit", number_format($totDebit));
	$smarty->assign("totCredit", number_format($totCredit));
	$smarty->assign("totSaldo", number_format($saldo));