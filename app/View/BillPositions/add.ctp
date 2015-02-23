<div class="billPositions form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Bill Position'); ?></h1>
			</div>
		</div>
	</div>

<?php
	echo $this -> Html -> script('billForm');
	echo $this -> Html -> script('jqueryui/jquery-ui.min');
	echo $this -> Html -> css('jqueryui/jquery-ui.min');
	echo $this -> Html -> css('billForm');
?>
<script type="text/javascript">
	$(document).ready(function(){
	// Konfiguriere Widget
	$.widget("custom.catcomplete", $.ui.autocomplete, {
		_renderMenu : function(ul, items) {
			var that = this, currentCategory = "";
			$.each(items, function(index, item) {
				if (item.category != currentCategory) {
					ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
					currentCategory = item.category;
				}
				that._renderItemData(ul, item);
			});
		},
		_renderItem: function( ul, item ) {
		  return $( "<li>" )
		    .attr( "data-value", item.uid )
		    .append( $( "<a>" ).text( item.label ) )
		    .appendTo( ul );
		}
	});
	
	//Products data
	<?php
	$str = 'var produkte = [';
	foreach ($Product as $ware) {
		$str .= '{ label: "' . $ware['Product']['name'] . '", category:"' . $ware['Category']['name'] . '", uid: "' . $ware['Product']['id'] . '", catid: "' . $ware['Product']['category_id'] . '", number: "' . $ware['Product']['prodid'] . '", price: "' . $ware['Product']['price'] . '"},';
	}
	$str = substr($str, 0, -1);
	$str .= ']';
	echo $str;
	?>
		// Autocomplete action
		$("#BillPositionCatcomplete").catcomplete({
			delay : 0,
			source : produkte,
			select : function(event, ui) {
				var ware = ui.item
				var form = $('#BillPositionAddForm');					
					$(form).find("textarea").val(ware.label);
					$(form).find("input[name*=price]").val(ware.price);
					$(form).find("input[name*=amount]").val("1");
				return false;

			}
		});
		});
</script>


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
			<?php echo $this->Form->create('BillPosition', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('bill_id', array('class' => 'form-control', 'placeholder' => __('Bill Id'), 'default' => $billid));?>
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('catcomplete', array('class' => 'form-control', 'placeholder' => __('Search Products'))); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => __('Description')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => __('Price')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('kulanz', array('class' => 'form-control-chk', 'placeholder' => __('Vat')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('vat', array('class' => 'form-control-chk', 'placeholder' => __('Vat')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('amount', array('class' => 'form-control', 'placeholder' => __('Amount')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
