$(document).ready(function(){
	
	$("body").on("click", "img.calcPositionPlus", function() {
		var clone = $(this).parent().parent().clone();
		var counter = parseInt($(".BillPosition .Position:last-child").find("textarea").attr("name").toString().match(/\d+/));
		counter++;
		$(clone).find("textarea").attr("name", "data[BillPositions]["+counter+"][BillPosition][description]");
		$(clone).find("textarea").attr("id", "dataBillPositions"+counter+"BillPositiondescription");
		
		$(clone).find("input[name*=price]").attr("name", "data[BillPositions]["+counter+"][BillPosition][price]");
		$(clone).find("input[name*=price]").attr("id", "dataBillPositions"+counter+"BillPositionPrice");
		
		$(clone).find("input[name*=amount]").attr("name", "data[BillPositions]["+counter+"][BillPosition][amount]");
		$(clone).find("input[name*=amount]").attr("id", "dataBillPositions"+counter+"BillPositionAmount");
		
		$(clone).find("input[name*=vat]").attr("name", "data[BillPositions]["+counter+"][BillPosition][vat]");
		$(clone).find("input[name*=vat]").attr("id", "dataBillPositions"+counter+"BillPositionVat");
		$(".BillPosition").append(clone);
	});
	
	$("body").on("click", "img.calcPositionMinus", function() {
		var del = confirm("Diesen Teil der Rechnung wirklich löschen?");
		if(del){
			$(this).parent().parent().remove();
		}
	});
	
	$("select#BillBillTypeId").on("change", function(){
		if(this.value == 6){
			$('.offerteInputs').css("display", "block");
		}else{
						$('.offerteInputs').css("display", "none");
		}
	});
});
