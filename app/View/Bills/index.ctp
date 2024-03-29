<div class="bills index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Bills'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Kunden'), array('controller' => 'customers', 'action' => 'index'), array('escape' => false)); ?></li>
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
			<?php echo $this->Form->create("Bills",array('action' => 'search')); ?>
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tr>
					<td><?php echo $this->Form->input("search", array('label' => 'Nach Rechnungsnummer Suchen  ')); ?></td>
				</tr>
				<tr>
					<td><?php echo $this->Form->end("Search");?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('bill_number'); ?></th>
						<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
						<th><?php echo $this->Paginator->sort('create_date'); ?></th>
						<th><?php echo $this->Paginator->sort('print_date'); ?></th>
						<th><?php echo $this->Paginator->sort('paid_date'); ?></th>
						<th><?php echo $this->Paginator->sort('bill_type_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($bills as $bill): ?>
					<tr>
						<td><?php echo $this->Html->link(h($bill['Bill']['bill_number']), array('action' => 'view', $bill['Bill']['id']), array('escape' => false)); ?>&nbsp;</td>
						<td>
						<?php echo $this->Html->link($bill['Customer']['firstname']." ".$bill['Customer']['lastname'], array('controller' => 'customers', 'action' => 'view', $bill['Customer']['id'])); ?>
						</td>
						<td><?php echo h($bill['Bill']['create_date']); ?>&nbsp;</td>
						<td><?php echo h($bill['Bill']['print_date']); ?>&nbsp;</td>
						<td><?php echo h($bill['Bill']['paid_date']); ?>&nbsp;
							<?php if($bill['Bill']['paid_date'] == 0){
								echo $this->Html->link('<span class="glyphicon glyphicon-ok-sign"></span>', array('action' => 'setPaidDate', $bill['Bill']['id']), array('escape' => false));
							}
							?>
						</td>
						<td><?php echo h($bill['BillType']['name']) ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $bill['Bill']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-download-alt"></span>', array('action' => 'pdfExport', $bill['Bill']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $bill['Bill']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $bill['Bill']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bill['Bill']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->