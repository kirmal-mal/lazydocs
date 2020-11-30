//TODO: Save table to db
//TODO: Load template to folder
//TODO: Download file with replaced template

function reset() {
	window.$columns = 1;
	window.$rows = 1;
	sessionStorage.setItem("rows", 1);
	sessionStorage.setItem("columns", 1);
	$('.auto-save').savy('destroy');
	localStorage.clear();
	$.post( "tableSession.php", { reset: true });

	$.get("table.html", function(data) {
		$("#mainTable").html(data);
	});
	
}


function save() {
	$('.auto-save').savy('load');
	$table = $("#mainTableArea").html();
	sessionStorage.setItem("table", $table);
	sessionStorage.setItem("rows", window.$rows);
	sessionStorage.setItem("columns", window.$columns);
	$.post( "tableSession.php", { session: $table});
}

$(function() {
	$.getScript("./js/savy.min.js");
	$('.auto-save').savy('load');

	if (sessionStorage.getItem("rows")) {
		window.$rows = sessionStorage.getItem("rows");
	} else {
		window.$rows = 1;
	}
	
	if (sessionStorage.getItem("columns")) {
		window.$columns = sessionStorage.getItem("columns");
	} else {
		window.$columns = 1;
	}

	$("#workingArea").on('click','#resetButton', function() {
		reset();
	});

	$("#logoutLink").on('click', function() {
		reset();
	});

	$("#mainTableArea").on('click', '#addRowButton', function() {
		$rows++;
		var $lastRow = $("#lastRow").prev().clone().removeAttr('id');
		$lastRow.find("#templateField").removeAttr('id');
		$lastRow.find(".downloadForm").attr('id','form' + $rows);
		$lastRow.find("input").attr('form','form' + $rows);
		$lastRow.find(".fileName").attr('id','filename' + $rows).val('');
		$lastRow.find(".replaceField").each(function() {
			const regex = /(?<=fr)\d+(?=c)/g;
			$oId = $(this).attr('id');
			$newId = $(this).attr('id').replace(regex, $rows);
			$(this).attr('id', $newId);
			$(this).val('');
		})
		$("#lastRow").before($lastRow);
		save();
	});

	$("#mainTableArea").on('click', '.removeRowButton', function() {
		$rows--;
		$(this).parent().parent().remove();
		save();
	})

	$("#mainTableArea").on('click', '#addColumnButton', function() {
		$columns++;
		$newField = $("#lastColumn").prev().clone();
		$newField.find("input").attr('name', 'field' + $columns);
		$newField.find("input").attr('id', 'fn' + $columns);
		$newField.insertBefore($("#lastColumn"));
		$("#mainTable tr:not('#lastRow'):not('#headerRow')").find("td:last").each(function() {
			var $newColumn = $(this).prev().clone();
			$inputField = $newColumn.find('.textField')
			$inputField.attr('name', 'field' + $columns).val('');
			const regex = /(?<=c)\d+/;
			$newColId = $inputField.attr('id').replace(regex, $columns);
			$inputField.attr('id', $newColId);
			$(this).before($newColumn);
		})
		save();
	});

	$("#mainTableArea").on('click', '.removeColumnButton', function() {
		if ($columns > 1) {
			var $index = $(this).parent().index();
			$("#mainTable tr:not('#lastRow'):not('#templateRow')").find('td:eq(' + $index + '),th:eq(' + $index + ')').remove();
		}
		save();
	});

	$("#mainTableArea").on('submit', '.downloadForm', function(event) {
		event.preventDefault();
		$fields = $("#fieldForm").serializeArray();
		$values = $( this ).serializeArray();
		var $fieldsSend = {};
		$fieldsSend['filename'] = $values[0].value;
		jQuery.each($fields, function(i, field) {
			$fieldsSend[$fields[i].value] = $values[i+1].value;
		});
		$.post( "processTemplate.php", { 'replace': JSON.stringify($fieldsSend) }, function (data) {
			try {
				// console.log(data);
				$res = JSON.parse(data);
				if ($res.isSuccess) {
					var link = document.createElement('a');
					link.href = "./send/" + $res.filename;
					// console.log(link.href);
					link.download = $res.filename.split('/').reverse()[0];
					link.click();
					link.remove()
				} else {
					$("#phpErrorArea").css('display', 'block').html($res.message).fadeOut(5000);
				}
			} catch (err) {
				$("#phpErrorArea").css('display', 'block').html(data);
			}
		});
		
		save();
	});
});