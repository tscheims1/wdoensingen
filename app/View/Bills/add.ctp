<div class="bills form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Bill'); ?></h1>
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
			$str .= '{ label: "' . $ware['Product']['name'] . '", category:"' . $ware['Category']['name'] . '", uid: "'.$ware['Product']['id'].'", catid: "'.$ware['Product']['category_id'].'", price: "'.$ware['Product']['price'].'"},';
		}
		$str = substr($str, 0, -1);
		$str .= ']';
		echo $str;
	?>
	// Autocomplete action
	$("#BillCatcomplete").catcomplete({
      delay: 0,
      source: produkte,
      select: function(event, ui){
      	var ware = ui.item
      	var clone = $(".BillPosition .Position:last-child").clone();
		var counter = parseInt($(".BillPosition .Position:last-child").find("textarea").attr("name").toString().match(/\d+/));
		counter++;
		$(clone).find("textarea").attr("name", "data[BillPositions]["+counter+"][BillPosition][description]");
		$(clone).find("textarea").attr("id", "dataBillPositions"+counter+"BillPositiondescription");
		$(clone).find("textarea").val(ware.label);
		
		$(clone).find("input[name*=price]").attr("name", "data[BillPositions]["+counter+"][BillPosition][price]");
		$(clone).find("input[name*=price]").attr("id", "dataBillPositions"+counter+"BillPositionPrice");
		$(clone).find("input[name*=price]").val(ware.price);
		
		$(clone).find("input[name*=amount]").attr("name", "data[BillPositions]["+counter+"][BillPosition][amount]");
		$(clone).find("input[name*=amount]").attr("id", "dataBillPositions"+counter+"BillPositionAmount");
		$(clone).find("input[name*=amount]").val("1");
		
		$(clone).find("input[name*=vat]").attr("name", "data[BillPositions]["+counter+"][BillPosition][vat]");
		$(clone).find("input[name*=vat]").attr("id", "dataBillPositions"+counter+"BillPositionVat");
		
		
		$(".BillPosition").append(clone);
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Auflistung Kunden'), array('action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Neuer Kunde'), array('action' => 'add'), array('escape' => false)); ?></li>
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
			<?php echo $this -> Form -> create('Bill', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this -> Form -> input('customer_id', array('class' => 'form-control', 'placeholder' => 'Customer Id')); ?>
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('bill_type_id', array('class' => 'form-control', 'placeholder' => 'Bill Type Id')); ?>
				<div class="offerteInputs" style="display: none;">
					<?php echo $this -> Form -> input('offerte_titel', array('class' => 'form-control', 'placeholder' => 'Offerte Titel')); ?>
					<?php echo $this -> Form -> input('offerte_text', array('class' => 'form-control', 'placeholder' => 'Offerte Text')); ?>
					<?php echo $this -> Form -> input('text_bauseits', array('class' => 'form-control', 'placeholder' => 'Bauseits')); ?>
					<?php echo $this -> Form -> input('text_konditionen', array('class' => 'form-control', 'placeholder' => 'Konditionen')); ?>
					<?php echo $this -> Form -> input('text_lieferfrist', array('class' => 'form-control', 'placeholder' => 'Lieferfrist')); ?>
					
				</div>
				
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('bill_number', array('class' => 'form-control', 'placeholder' => 'Bill Number')); ?>
				</div>
				<div class="form-group">
					<?php echo $this -> Form -> input('catcomplete', array('class' => 'form-control', 'placeholder' => 'Produkte suchen')); ?>
				</div>
				<div class="BillPosition">
					<div class="Position">
						<div style="width: 45%; float: left; clear: right; padding: 10px;">
							<div class="form-group">
							<?php echo $this -> Form -> input('BillPositions.0.BillPosition.description', array('class' => 'form-control', 'placeholder' => 'Description')); ?>
							</div>
						</div>
						<div style="width: 45%; float: left; padding: 10px;">
							<div class="form-group">
								<?php echo $this -> Form -> input('BillPositions.0.BillPosition.price', array('class' => 'form-control', 'placeholder' => 'Price')); ?>
							</div>
							<div class="form-group">
								<?php echo $this -> Form -> input('BillPositions.0.BillPosition.amount', array('class' => 'form-control', 'placeholder' => 'Amount')); ?>
							</div>
							<div class="form-group">
								<?php echo $this -> Form -> input('BillPositions.0.BillPosition.vat', array('class' => 'form-control-chk', 'placeholder' => 'Vat')); ?>
							</div>
						</div>
						<div style="width: 10%; float: right;">
							<?php echo $this -> Html -> image('minus.jpg', array('alt' => 'Minus', 'width' => "55px", "class" => "calcPositionMinus")); ?>
							<?php echo $this -> Html -> image('plus.jpg', array('alt' => 'Plus', 'width' => "50px", "class" => "calcPositionPlus")); ?>
						</div>
					</div>
				</div>
				<div class="form-group" style="width: 100%;">
					<?php echo $this -> Form -> submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
