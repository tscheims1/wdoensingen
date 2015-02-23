<div class="customers form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Customer'); ?></h1>
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
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Customer', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => __('Title')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('firstname', array('class' => 'form-control', 'placeholder' => __('Firstname')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('lastname', array('class' => 'form-control', 'placeholder' => __('Lastname')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('street', array('class' => 'form-control', 'placeholder' => __('Street')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('zip', array('class' => 'form-control', 'placeholder' => __('Zip')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('city', array('class' => 'form-control', 'placeholder' => __('City')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => __('Phone')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('phone_bussiness', array('class' => 'form-control', 'placeholder' => __('Phone Bussiness')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mobile', array('class' => 'form-control', 'placeholder' => __('Mobile Man')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mobile_woman', array('class' => 'form-control', 'placeholder' => __('Mobile Woman')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => __('Email')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
