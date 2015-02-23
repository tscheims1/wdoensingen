<div class="billPositions view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Bill Position'); ?></h1>
			</div>
		</div>
	</div>

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
		<th><?php echo __('Bill'); ?></th>
		<td>
			<?php echo $this->Html->link($billPosition['Bill']['bill_number'], array('controller' => 'bills', 'action' => 'view', $billPosition['Bill']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($billPosition['BillPosition']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Price'); ?></th>
		<td>
			<?php echo h($billPosition['BillPosition']['price']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Kulanz'); ?></th>
		<td>
			<?php echo h($billPosition['BillPosition']['kulanz']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Vat'); ?></th>
		<td>
			<?php echo h($billPosition['BillPosition']['vat']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Amount'); ?></th>
		<td>
			<?php echo h($billPosition['BillPosition']['amount']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

