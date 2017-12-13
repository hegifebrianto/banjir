<link rel="stylesheet" href="<?=base_url()?>assets/table/style.css" rel="stylesheet">

<div style=" background-color: #FFFFFF">
<h2 style=" background-color: #FFFFFF" ><span class="green">Skala Penilaian AHP</span></h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="box-table-a">
    <tr>
		<th>Nilai</th>
		<th>Keterangan</th>
	</tr>
	<?php
        foreach($skemas as $row) { ?>
        <tr>
        <td>
        <?php echo $row['nilai'];?>
        </td>
        <td>
        <?php echo $row['keterangan'];?>
        </td>
        </tr>
    <?php } ?>
 </table>
 </div>
