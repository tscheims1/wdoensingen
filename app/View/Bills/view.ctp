<div class="bills view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Bill'); ?></h1>
			</div>
		</div>
	</div>
<?php
	echo $this -> Html -> script('billForm');
	echo $this -> Html -> script('jqueryui/jquery-ui.min');
	echo $this -> Html -> css('jqueryui/jquery-ui.min');
	echo $this -> Html -> css('billForm');
?>
	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Kunden'), array('controller' => 'customers','action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neuer Kunde'), array('controller' => 'customers','action' => 'add'), array('escape' => false)); ?></li>
								<li>&nbsp;</li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Rechnungen'), array('controller' => 'bills', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neue Rechnung'), array('controller' => 'bills', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li>&nbsp;</li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Produkte'), array('controller' => 'products', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neues Produkt'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li>&nbsp;</li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Kategorien'), array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neue Produktkategorie'), array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
<tr>
		<th><?php echo __('Bill Number'); ?></th>
		<td>
			<?php echo h($bill['Bill']['bill_number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Customer'); ?></th>
		<td>
			<?php echo $this->Html->link($bill['Customer']['firstname']." ".$bill['Customer']['lastname'], array('controller' => 'customers', 'action' => 'view', $bill['Customer']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Create Date'); ?></th>
		<td>
			<?php echo h($bill['Bill']['create_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Print Date'); ?></th>
		<td>
			<?php echo h($bill['Bill']['print_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Paid Date'); ?></th>
		<td>
			<?php echo h($bill['Bill']['paid_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bill Type'); ?></th>
		<td>
			<?php echo $this->Html->link($bill['BillType']['name'], array('controller' => 'bill_types', 'action' => 'view', $bill['BillType']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
	<th>
		<?php echo __('Offerte Titel') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['offerte_titel']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th>
		<?php echo __('Offerte Text') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['offerte_text']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th>
		<?php echo __('Bauseits') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['text_bauseits']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th>
		<?php echo __('Konditionen') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['text_konditionen']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th>
		<?php echo __('Lieferfrist') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['text_lieferfrist']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th>
		<?php echo __('Products Warranty') ?>
	</th>
	<td>
		<?php echo h($bill['Bill']['text_garantie']); ?>
			&nbsp;
	</td>
</tr>
<tr>
	<th><?php echo __('Print') ?></th>
	<td><?php echo $this->Html->link('<span class="glyphicon glyphicon-download-alt"></span>', array('action' => 'pdfExport', $bill['Bill']['id']), array('escape' => false)); ?></td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Bill Positions'); ?></h3>
	<?php if (!empty($bill['BillPosition'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Product Number'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Vat'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
		<?php
		$mwstTot = 0;
		$preisTot = 0;
		?>
	<?php foreach ($bill['BillPosition'] as $billPosition): ?>
		<?php
			if($billPosition['vat'] == 1){
				$mwstTot += $billPosition['price']*0.08;
			}
			$preisTot += $billPosition['price'];
		
		?>
		<tr>
			<td><?php echo $billPosition['amount']; ?></td>
			<td><?php echo $billPosition['product_number']; ?></td>
			<td><?php echo $billPosition['description']; ?></td>
			<td><?php echo ($billPosition['vat'] == 1 ? "Ja" : "Nein"); ?></td>
			<td><?php echo "Fr. ".$this->Price->roundTo($billPosition['price']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'bill_positions', 'action' => 'view', $billPosition['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'bill_positions', 'action' => 'edit', $billPosition['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'bill_positions', 'action' => 'delete', $billPosition['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $billPosition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	
		<tr style="border-top: 2px solid black;">
			<td colspan="4">Mehrwertsteuer</td>
			<td colspan="3"><?php echo "Fr. ".$this->Price->roundTo($mwstTot); ?></td>
		</tr>
		<tr>
			<td colspan="4">Preis total</td>
			<td colspan="3"><?php echo "Fr. ".$this->Price->roundTo($mwstTot+$preisTot); ?></td>
		</tr>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Produkt / Dienstleistung hinzufügen'), array('controller' => 'bill_positions', 'action' => 'add', 'billid' => $bill['Bill']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
