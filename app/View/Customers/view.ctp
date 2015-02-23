<div class="customers view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Customer'); ?></h1>
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
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($customer['Customer']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Firstname'); ?></th>
		<td>
			<?php echo h($customer['Customer']['firstname']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lastname'); ?></th>
		<td>
			<?php echo h($customer['Customer']['lastname']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Street'); ?></th>
		<td>
			<?php echo h($customer['Customer']['street']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Zip'); ?></th>
		<td>
			<?php echo h($customer['Customer']['zip']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('City'); ?></th>
		<td>
			<?php echo h($customer['Customer']['city']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Phone'); ?></th>
		<td>
			<?php echo h($customer['Customer']['phone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Phone Bussiness'); ?></th>
		<td>
			<?php echo h($customer['Customer']['phone_bussiness']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mobile Man'); ?></th>
		<td>
			<?php echo h($customer['Customer']['mobile']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mobile Woman'); ?></th>
		<td>
			<?php echo h($customer['Customer']['mobile_woman']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($customer['Customer']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
	<th>
		<?php echo __('Edit Customer') ?>
	</th>
	<td>
		<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $customer['Customer']['id']), array('escape' => false)); ?>
	</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Bills'); ?></h3>
	<?php if (!empty($customer['Bill'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Bill Number'); ?></th>
		<th><?php echo __('Create Date'); ?></th>
		<th><?php echo __('Print Date'); ?></th>
		<th><?php echo __('Paid Date'); ?></th>
		<th><?php echo __('Bill Type'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($customer['Bill'] as $bill): ?>
		<tr>
			<td><?php echo $bill['bill_number']; ?></td>
			<td><?php echo $bill['create_date']; ?></td>
			<td><?php echo $bill['print_date']; ?></td>
			<td><?php echo $bill['paid_date']; ?></td>
			<td><?php
				foreach($BillTypes as $billType){
					if($bill['bill_type_id'] == $billType['BillTypes']['id']){
						echo $billType['BillTypes']['name'];
					}
				}
			 ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'bills', 'action' => 'view', $bill['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'bills', 'action' => 'edit', $bill['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'bills', 'action' => 'delete', $bill['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neue Rechnung'), array('controller' => 'bills', 'action' => 'add', 'customerid' => $customer['Customer']['id']), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
