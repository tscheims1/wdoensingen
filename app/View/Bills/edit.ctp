<div class="bills form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Bill'); ?></h1>
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
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Bill', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => __('Id')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('customer_id', array('class' => 'form-control', 'placeholder' => __('Customer Id')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bill_type_id', array('class' => 'form-control', 'placeholder' => __('Bill Type Id')));?>
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('paid_type',array('options' => array("Kredit" => "Kredit", "Post" => "Post")	) , array('class' => 'form-control', 'placeholder' => __('Paid Type'))); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bill_number', array('class' => 'form-control', 'placeholder' => __('Bill Number')));?>
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('text_garantie', array('class' => 'form-control', 'placeholder' => __('Product Warranty'))); ?>
				</div>
				<div class="offerteInputs" style="display: none;">
					<?php echo $this -> Form -> input('offerte_titel', array('class' => 'form-control', 'placeholder' => __('Offerte Titel'))); ?>
					<?php echo $this -> Form -> input('offerte_text', array('class' => 'form-control', 'placeholder' => __('Offerte Text'))); ?>
					<?php echo $this -> Form -> input('text_bauseits', array('class' => 'form-control', 'placeholder' => __('Bauseits'))); ?>
					<?php echo $this -> Form -> input('text_konditionen', array('class' => 'form-control', 'placeholder' => __('Konditionen'))); ?>
					<?php echo $this -> Form -> input('text_lieferfrist', array('class' => 'form-control', 'placeholder' => __('Lieferfrist'))); ?>
					
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>
			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
