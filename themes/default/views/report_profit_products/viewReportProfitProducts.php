<center>
	<p>Laporan Pembelian <br>
		Periode <?php echo $dateStart." - ".$dateEnd; ?>
	</p>
</center>

<table width="100%">
	<?php 
		foreach($viewReport as $dt){
	?>

	<tr style="border-top: solid 2px #12A89D;">
		<td colspan="8">
			<table width="100%">
				<tr style="font-weight: bold;color:#12A89D;">
					<td style="vertical-align: top;" width="25%">No PO : <?php echo $dt->no_po; ?></td>
					<td style="vertical-align: top;" width="25%">Tanggal : <?php echo date_format(date_create($dt->tanggal_po),'d M Y'); ?></td>
				</tr>
			</table>
		</td>
	</tr>

	<tr style="color: black;font-weight: bold;border-top: solid 1px black;border-bottom: solid 1px black;">
		<td width="15%">SKU</td>
		<td width="24%">Nama Produk</td>
		<td align="right" width="10%">Pembelian</td>
		<td align="right" width="10%">Diskon</td>
		<td align="right" width="10%">Penjualan</td>
		<td align="center" width="10%">Laba</td>
	</tr>

	<?php
		$dataPembelian = $this->modelLaporan->purchaseItem($dt->no_po);

		$total = 0;
		foreach($dataPembelian as $row){
	?>
	<tr>
		<td style="vertical-align: top;"><?php echo $row->id_produk; ?></td>
		<td style="vertical-align: top;"><?php echo $row->nama_produk; ?></td>
		<td align="right" style="vertical-align: top;"><?php echo number_format($row->qty,'0',',','.'); ?></td>
		<td align="right" style="vertical-align: top;">
			<?php
            	$delivered_qty  = $this->modelLaporan->delivered_qty($dt->no_po,$row->id_produk);

            	echo number_format($delivered_qty,'0',',','.');
			?>
		</td>
		<td align="right" style="vertical-align: top;">
			<?php
				$retur = $this->modelLaporan->returItem($dt->no_po,$row->id_produk);

				echo number_format($retur,'0',',','.');
			?>
		</td>
		<td align="center" style="vertical-align: top;"><?php echo $row->satuan;?></td>
	</tr>

	<?php $total = $total+($row->harga*($delivered_qty-$retur)); } //data pembelian end ?>

	<?php } //data po end ?>
</table>