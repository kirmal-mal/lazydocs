$(function() {
	window.$rows = 1;
	window.$columns = 1;

	$("#addRowButton").click(function() {
		$rows++;
		var $lastRow = $("#lastRow").prev().clone().removeAttr('id');
		$lastRow.find(".downloadForm").attr('id','form' + $rows);
		$lastRow.find("input").attr('form','form' + $rows);
		$("#lastRow").before($lastRow);
		
	})

	$("#mainTable").on('click', '.removeRowButton', function() {
		$rows--;
		$(this).parent().parent().remove();
	})

	$("#addColumnButton").click(function() {
		$columns++;
		$("#lastColumn").prev().clone().insertBefore($("#lastColumn"));
		//var $newColumn = $("#templateRow #templateField").clone().removeAttr('id');
		//$newColumn.find('.textField').attr('name', 'field' + $columns);
		// $("#mainTable tr:not('#lastRow'):not('#headerRow')").find("td:last").before($newColumn);
		$("#mainTable tr:not('#lastRow'):not('#headerRow')").find("td:last").each(function() {
			var $newColumn = $(this).prev().clone();
			$newColumn.find('.textField').attr('name', 'field' + $columns);
			$(this).before($newColumn);
		})
	})

	$("#mainTable").on('click', '.removeColumnButton', function() {
		if ($columns > 1) {
			var $index = $(this).parent().index();
			$("#mainTable tr:not('#lastRow'):not('#templateRow')").find('td:eq(' + $index + '),th:eq(' + $index + ')').remove();
		}
	})

	$("#mainTable").on('submit', '.downloadForm', function(event) {
		alert("this works");
		event.preventDefault();
		console.log( $( this ).serialize() );
	})


});