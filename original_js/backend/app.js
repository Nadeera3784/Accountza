$(document).ready(function () {
	if($("#DatatableHolder").length > 0){

		$("#DatatableHolder").dataTable({
			pageLength: 10,
			isMobile: window.outerWidth < 800 ? true : false,
			responsive: window.outerWidth < 800 ? true : false, 
			aLengthMenu : [[5, 10, 25, -1], [5, 10, 25, "All"]],
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', // or '→'
				previous: '<i class="ti-angle-left"></i>' // or '←' 
				}
			}
		});

		$('#DatatableHolder').delegate('#delete_client', 'click', function(){ 
			ajax_data['client_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this client? <br> All related records in invoices, estimates will be deleted as well',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_client',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
								location.reload();
							}
						}
					}); 				
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		});

		$('#DatatableHolder').delegate('#delete_expense_category', 'click', function(){
			ajax_data['category_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this category?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_expense_category',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
								location.reload();
							}
						}
					}); 				
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		});

		$('#DatatableHolder').delegate('#delete_agent', 'click', function(){
			ajax_data['agent_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this user?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url  +'admin/delete_agent',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
								location.reload();
							}
						}
					}); 				
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		});

		$('#DatatableHolder').delegate('#delete_subscription', 'click', function(){ 
			ajax_data['subscription_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this subscription?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url  +'admin/delete_subscription',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
								location.reload();
							}
						}
					}); 				
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		});
	}

	if($(".select2").length > 0){
		$('.select2').select2();
	}

	if($(".date_01").length > 0){
		$('.date_01').daterangepicker({
			"singleDatePicker": true,
			"autoApply": true,
			"alwaysShowCalendars": true,
			'locale': {
				format: 'Y-M-D'
			}
		});
	}

	if($(".date_02").length > 0){
		$('.date_02').daterangepicker({
			"singleDatePicker": true,
			"autoApply": true,
			"alwaysShowCalendars": true,
			'locale': {
				format: 'Y-M-D'
			}
		});
	}

	if($('#start_date').length > 0){
		$('#start_date').datepicker({
			format: 'yyyy-mm-dd',
		}).on('changeDate', function(ev){
			$('#start_date').datepicker('hide');
		});
	}

	if($('#end_date').length > 0){
		$('#end_date').datepicker({
			format: 'yyyy-mm-dd',
		}).on('changeDate', function(ev){
			$('#end_date').datepicker('hide');
		});
	}

	if($("#genericFormValidation").length > 0){
		$("#genericFormValidation").validate();
	}

	$("#addFieldBtn").on('click', function(e){
		var inputTemplate = '<tr class="itemList">'+
									'<td><input type="text" class="form-control item"  name="item[]"></td>'+
									'<td><input type="text" class="form-control price" id="price"  name="price[]"></td>'+
									'<td><input type="number" class="form-control quantity"  name="quantity[]"></td>'+
									'<td><input type="text" class="form-control totals"  name="totals[]" readonly></td>'+
									'<td><button type="button" class="btn btn-default" id="removeFieldBtn"><i class="ti-trash"></i></button></td>'+
							'</tr>';
		$('#dyanmicContent').append(inputTemplate);
	});

	$("#invoiceTable").on("change", ".quantity", function(e){
		e.preventDefault();
		tablefieldcalculation();
	});

	$("#invoiceTable").on("change", ".quantity", function(e){
		e.preventDefault();
		tablefieldcalculation();
	});

	$("#invoiceTable").on("change", ".uprice", function(e){
		e.preventDefault();
		tablefieldcalculation();
	});

	$('#invoiceTable').delegate('#removeFieldBtn', 'click', function(e){
		e.preventDefault();

		if($(this).closest('tr').is('tr:only-child')){
           return false;
		}else{
			$(this).closest(".itemList").remove();
			tablefieldcalculation();
		}
	});

	$('#invoiceTable').delegate('#removeAjaxInvoiceItem', 'click', function(e){
		ajax_data['invoice_item_id'] = $(this).attr('data-id');
		lnv.confirm({
			title: 'Confirm',
			content: 'Are you sure you want to delete this item? this action cannot be undone',
			confirmBtnText: 'Yes',
			confirmHandler: function(){
				$.ajax({
					type: 'POST',
					url: App_url +'agent/delete_invoice_items',
					data: ajax_data,
					dataType  : 'json',
					success: function(response){
						if(response.type == "success"){
						   location.reload();
						}
					}
				});				
			},
			cancelBtnText: 'No',
			cancelHandler: function(){
		
			}
		})	
	});

	$('#invoiceTable').delegate('#removeAjaxEstimateItem', 'click', function(e){
		ajax_data['estimate_item_id'] = $(this).attr('data-id');
		lnv.confirm({
			title: 'Confirm',
			content: 'Are you sure you want to delete this item? this action cannot be undone',
			confirmBtnText: 'Yes',
			confirmHandler: function(){
				$.ajax({
					type: 'POST',
					url: App_url +'agent/delete_estimate_item',
					data: ajax_data,
					dataType  : 'json',
					success: function(response){
						if(response.type == "success"){
						   location.reload();
						}
					}
				});				
			},
			cancelBtnText: 'No',
			cancelHandler: function(){
		
			}
		})	
	});

	$("#discount").change(tablefieldcalculation);

	$("#selectClient").on("change", function(e){
		ajax_data['client_id'] = $(this).val();
		$.ajax({
			type: 'GET',
			url: App_url +'agent/get_client_details',
			data: ajax_data,
			dataType  : 'json',
			success: function(response){
				if(response.type == "success"){
					$("#discount").val(response.message.client.discount);
					//$("#saveddiscount").val(response.message.client.discount);
					$("#comments").text(response.message.client.notes);
					$("#payment_method").text(response.message.client.payment_info);  
					$("#remoteClientName").text(response.message.client.name);  
					$("#remoteClientAddress").text(response.message.client.address);  
					$("#remoteClientState").text(response.message.client.city + "," + response.message.client.state + " " + response.message.client.postal_code); 
					$("#remoteClientPhone").text(response.message.client.phone);   
				}
			}
		}); 	
	});

	function tablefieldcalculation(){
		var cumulativePrice = 0;
		$(".itemList").each(function(){
			var availQty = parseInt($(this).find(".quantity").val());
			var itemTotalPrice = parseInt(($(this).find(".price").val()) * availQty);
			itemTotalPrice = +(itemTotalPrice).toFixed(2);
			$(this).find(".totals").val(itemTotalPrice.toFixed(2));
			cumulativePrice += itemTotalPrice;
			cumTotalWithoutVATAndDiscount = cumulativePrice;
		});

		return new Promise(function(resolve, reject){
			var discountAmount = getDiscountAmount(cumulativePrice);
			$("#subtotal").text(cumulativePrice.toFixed(2));
			$("#savedSubTotal").val(cumulativePrice.toFixed(2));
			cumulativePrice = +(cumulativePrice - discountAmount).toFixed(2);
			resolve();
		}).then(function(){
			//var vatAmount = getVatAmount(cumulativePrice);
			cumulativePrice = +(cumulativePrice).toFixed(2);
			$("#amounttotal").text(cumulativePrice.toFixed(2));  
			$("#savedTotal").val(cumulativePrice.toFixed(2));  
			//duecalculation();
		}).catch(function(){
			console.log("Err");
		});
		
	}

	function getDiscountAmount(amounttotal){
		// var discountPercentage = $("#discount").text();
		var discountPercentage = $("#discount").val();
		var discountAmount = parseFloat((discountPercentage/100) * amounttotal);
		return discountAmount;
	}

	if($('#InvoiceDataTable').length > 0){
		$('#InvoiceDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"agent/invoice_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.client_id  = $('#client_id').val();
					data.status     = $('#status').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [6], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'agent/view_invoice/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								 '<a href="'+App_url+'agent/update_invoice/'+data+'" class="btn btn-outline btn-xs btn-primary mr-5">Edit</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_invoice" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyInvoiceFilter').click(function(){ 
			$('#InvoiceDataTable').DataTable().ajax.reload(); 
		});

		$('#resetInvoiceFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#client_id').val("");
			$('#status').val("");
			$('#InvoiceDataTable').DataTable().ajax.reload(); 
		});

		$('#InvoiceDataTable').delegate('#delete_invoice', 'click', function(e){
			ajax_data['invoice_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this invoice?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_invoice',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
								$('#InvoiceDataTable').DataTable().ajax.reload(); 
								$('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							 }else{
								 $('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							 }
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});
	}

	function JSPrinter(Elm) {
		var hashid = "#"+ Elm;
		var tagname =  $(hashid).prop("tagName").toLowerCase() ;
		var attributes = ""; 
		var attrs = document.getElementById(Elm).attributes;
		  $.each(attrs,function(i,elem){
			attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
		  })
		var divToPrint= $(hashid).html() ;
		var head = "<html><head>"+ $("head").html() + "</head>" ;
		var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
		var newWin=window.open('','Print-Window');
		newWin.document.open();
		newWin.document.write(allcontent);
		newWin.document.close();
        setTimeout(function(){newWin.close();},500);
	}


	if($('#printExpense').length > 0){
		$('#printExpense').click(function(){ 
			JSPrinter('expense_card');
		});
	}

	if($('#printInvoice').length > 0){
		$('#printInvoice').click(function(){ 
			//JSPrinter('invoice_card');
			printJS({
				printable: 'invoice_card',
				type: 'html',
				targetStyles: ['*']
			});
		});
	}

	$("#expense_addFieldBtn").on('click', function(e){
		var inputTemplate = '<tr class="expense_itemList">'+
									'<td><input type="text" class="form-control expense_item"  name="expense_item[]"></td>'+
									'<td><input type="text" class="form-control expense_price" id="expense_price"  name="expense_price[]"></td>'+
									'<td><input type="number" class="form-control expense_quantity"  name="expense_quantity[]"></td>'+
									'<td><input type="text" class="form-control expense_totals"  name="expense_totals[]" readonly></td>'+
									'<td><button type="button" class="btn btn-default" id="expense_removeFieldBtn"><i class="ti-trash"></i></button></td>'+
							'</tr>';
		$('#expense_dyanmicContent').append(inputTemplate);
	});

	$("#expenseTable").on("change", ".expense_quantity", function(e){
		e.preventDefault();
		Expensetablefieldcalculation();
	});

	$("#expenseTable").on("change", ".expense_uprice", function(e){
		e.preventDefault();
		Expensetablefieldcalculation();
	});

	$("#vat").change(Expensetablefieldcalculation);

	$('#expenseTable').delegate('#expense_removeFieldBtn', 'click', function(e){
		e.preventDefault();
		if($(this).closest('tr').is('tr:only-child')){
           return false;
		}else{
			$(this).closest(".expense_itemList").remove();
			Expensetablefieldcalculation();
		}
	});

	$('#expenseTable').delegate('#removeAjaxExpenseItem', 'click', function(e){
		ajax_data['expense_item_id'] = $(this).attr('data-id');
		lnv.confirm({
			title: 'Confirm',
			content: 'Are you sure you want to delete this item? this action cannot be undone',
			confirmBtnText: 'Yes',
			confirmHandler: function(){
				$.ajax({
					type: 'POST',
					url: App_url +'agent/delete_expense_item',
					data: ajax_data,
					dataType  : 'json',
					success: function(response){
						if(response.type == "success"){
						   location.reload();
						}
					}
				});				
			},
			cancelBtnText: 'No',
			cancelHandler: function(){
		
			}
		})	
	});

	function Expensetablefieldcalculation(){
		var cumulativePrice = 0;
		$(".expense_itemList").each(function(){
			var availQty = parseInt($(this).find(".expense_quantity").val());
			var itemTotalPrice = parseInt(($(this).find(".expense_price").val()) * availQty);
			itemTotalPrice = +(itemTotalPrice).toFixed(2);
			$(this).find(".expense_totals").val(itemTotalPrice.toFixed(2));
			cumulativePrice += itemTotalPrice;
			cumTotalWithoutVATAndDiscount = cumulativePrice;
		});

		return new Promise(function(resolve, reject){
			$("#expense_subtotal").text(cumulativePrice.toFixed(2));
			$("#expense_savedSubTotal").val(cumulativePrice.toFixed(2));
			resolve();
		}).then(function(){
			var vatAmount = getVatAmount(cumulativePrice);
			cumulativePrice = +(cumulativePrice + vatAmount).toFixed(2);
			$("#expense_amounttotal").text(cumulativePrice.toFixed(2));  
			$("#expense_savedTotal").val(cumulativePrice.toFixed(2));  
		}).catch(function(){
			console.log("Err");
		});
		
	}

	function getVatAmount(amounttotal){
		var vatPercentage = $("#vat").val();
		$("#expense_vat").text(vatPercentage);
		var vatAmount = parseFloat((vatPercentage/100) * amounttotal);
		return vatAmount;
	}

	if($('#ExpensesDataTable').length > 0){
		$('#ExpensesDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"agent/expense_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.category_id  = $('#category_id').val();
					data.status     = $('#status').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [4], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'agent/view_expense/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								 '<a href="'+App_url+'agent/update_expense/'+data+'" class="btn btn-outline btn-xs btn-primary mr-5">Edit</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_expense" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyExpensesFilter').click(function(){ 
			$('#ExpensesDataTable').DataTable().ajax.reload(); 
		});

		$('#resetExpensesFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#category_id').val("");
			$('#status').val("");
			$('#ExpensesDataTable').DataTable().ajax.reload(); 
		});

		
		$('#ExpensesDataTable').delegate('#delete_expense', 'click', function(e){
			ajax_data['expense_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this expense?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_expense',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#ExpensesDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#EstimatesDataTable').length > 0){
		$('#EstimatesDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"agent/estimate_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.client_id  = $('#client_id').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data.status     = $('#status').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [6], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'agent/view_estimate/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								 '<a href="'+App_url+'agent/update_estimate/'+data+'" class="btn btn-outline btn-xs btn-primary mr-5">Edit</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_estimate" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyEstimatesFilter').click(function(){ 
			$('#EstimatesDataTable').DataTable().ajax.reload(); 
		});

		$('#resetEstimatesFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#client_id').val("");
			$('#status').val("");
			$('#EstimatesDataTable').DataTable().ajax.reload(); 
		});

		
		$('#EstimatesDataTable').delegate('#delete_estimate', 'click', function(e){
			ajax_data['estimate_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this estimate?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_estimate',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#EstimatesDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#chart-income').length > 0){
		$.post(App_url + 'agent/get_total_income_report', ajax_data).done(function(response) {
			response = JSON.parse(response);
		// 	salesChart = new Chart($('#chart-income'), {
		// 	type: 'line',
		// 	data: response,
		// 	options: {
		// 		responsive: true,
		// 		maintainAspectRatio:false,
		// 		legend: {
		// 		    display: false,
		// 		},
		// 		scales: {
		// 			yAxes: [{
		// 			ticks: {
		// 				beginAtZero: true,
		// 			}
		// 			}]
		// 		},
		// 	}
		// })

		salesChart = new Chart($('#chart-income'), {
			type: 'line',
			data: response,
			options: {
				responsive: true,
				maintainAspectRatio:false,
				legend: {
				    display: false,
				},
				tooltips: {
                    backgroundColor: "#eff6ff",
                    titleFontSize: 13,
                    titleFontColor: "#6783b8",
                    titleMarginBottom: 10,
                    bodyFontColor: "#9eaecf",
                    bodyFontSize: 14,
                    bodySpacing: 4,
                    yPadding: 15,
                    xPadding: 15,
                    footerMarginTop: 5,
                    displayColors: !1
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: !0,
                            fontSize: 12,
                            fontColor: "#9eaecf"
                        },
                        gridLines: {
                            color: "#e5ecf8",
                            tickMarkLength: 0,
                            zeroLineColor: "#e5ecf8"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 12,
                            fontColor: "#9eaecf",
                            source: "auto"
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 20,
                            zeroLineColor: "#e5ecf8"
                        }
                    }]
                }
			}
		})
		});
	}

	if($('#report-expense-vs-income').length > 0){
		$.post(App_url + 'agent/get_expenses_vs_income', ajax_data).done(function(response) {
			response = JSON.parse(response);
			salesChart = new Chart($('#report-expense-vs-income'), {
			type: 'bar',
			data: response,
			options: {
				responsive: true,
				maintainAspectRatio:false,
				tooltips: {
					backgroundColor: "#eff6ff",
					titleFontSize: 13,
					titleFontColor: "#6783b8",
					titleMarginBottom: 10,
					bodyFontColor: "#9eaecf",
					bodyFontSize: 14,
					bodySpacing: 4,
					yPadding: 15,
					xPadding: 15,
					footerMarginTop: 5,
					displayColors: !1,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return parseInt(tooltipItem.yLabel).toFixed(2)
                        }
                    }
                },
				scales: {
					yAxes: [{
						ticks: {
						  callback: function (value) {
							  return parseInt(value).toFixed(2)
						  },
						  beginAtZero: true,
					   }
				  }]
				},
			}
		})
		});
	}
	
	if($('#mindmap_draw').length > 0){
		var mind = new MindElixir({
			el: '#map',
			direction: 2,
			data: ($('textarea#mindmap_content').val() != '')?JSON.parse($('textarea#mindmap_content').val()): MindElixir.new('new topic'),
			draggable: true,
			contextMenu: true,
			toolBar: true,
			nodeMenu: true,
			keypress: true,
		})
		mind.init();

		$("button.mindmap-btn").on('click', function (e) {
			$('textarea#mindmap_content').val(mind.getAllDataString());
			$('#genericFormValidation').submit();
		})
	}

	if($('#MindMapDataTable').length > 0){
		$('#MindMapDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"agent/mindmap_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [2], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'agent/view_mindmap/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								'<a href="'+App_url+'agent/update_mindmap/'+data+'" class="btn btn-outline btn-xs btn-primary mr-5">Edit</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_mindmap" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#MindMapDataTable').delegate('#delete_mindmap', 'click', function(e){
			ajax_data['mindmap_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this mindmap?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'agent/delete_mindmap',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#MindMapDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#AdminInvoiceDataTable').length > 0){
		$('#AdminInvoiceDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"admin/invoice_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.agent_id   = $('#agent_id').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data.status     = $('#status').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [6], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'admin/view_invoice/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_admin_invoice" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyAdminInvoiceFilter').click(function(){ 
			$('#AdminInvoiceDataTable').DataTable().ajax.reload(); 
		});

		$('#resetAdminInvoiceFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#agent_id').val("");
			$('#status').val("");
			$('#AdminInvoiceDataTable').DataTable().ajax.reload(); 
		});

		$('#AdminInvoiceDataTable').delegate('#delete_admin_invoice', 'click', function(e){
			ajax_data['invoice_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this invoice?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'admin/delete_invoice',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#AdminInvoiceDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#AdminExpensesDataTable').length > 0){
		$('#AdminExpensesDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"admin/expense_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.agent_id   = $('#agent_id').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data.status     = $('#status').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [6], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'admin/view_expense/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_admin_expense" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyAdminExpensesFilter').click(function(){ 
			$('#AdminExpensesDataTable').DataTable().ajax.reload(); 
		});

		$('#resetAdminExpensesFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#agent_id').val("");
			$('#status').val("");
			$('#AdminExpensesDataTable').DataTable().ajax.reload(); 
		});

		$('#AdminExpensesDataTable').delegate('#delete_admin_expense', 'click', function(e){
			ajax_data['expense_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this expense?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'admin/delete_expense',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#AdminExpensesDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#AdminEstimatesDataTable').length > 0){
		$('#AdminEstimatesDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"admin/estimate_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.agent_id   = $('#agent_id').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data.status     = $('#status').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [6], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<span class="badge badge-default">'+data+'</span>';
					}
				},
				{
					"targets": [7], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'admin/view_estimate/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_admin_estimate" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyAdminEstimatesFilter').click(function(){ 
			$('#AdminEstimatesDataTable').DataTable().ajax.reload(); 
		});

		$('#resetAdminEstimatesFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#agent_id').val("");
			$('#status').val("");
			$('#AdminEstimatesDataTable').DataTable().ajax.reload(); 
		});

		$('#AdminEstimatesDataTable').delegate('#delete_admin_estimate', 'click', function(e){
			ajax_data['estimate_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this estimate?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'admin/delete_estimate',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#AdminEstimatesDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#AdminClientDataTable').length > 0){
		$('#AdminClientDataTable').DataTable({
			responsive: true,
			processing: true, 
			serverSide: true, 
			ordering: false,
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			ajax: {
				url: App_url +"admin/client_list",
				dataType : "json",
				type: "POST",
				data: function (data) {
					data.agent_id   = $('#agent_id').val();
					data.start_date = $('#start_date').val();
					data.end_date   = $('#end_date').val();
					data[CSRF_NAME] =  CSRF_HASH;
				}
			},
			"columnDefs": [
				{
					"targets": [5], 
					"orderable": false,
					"render": function ( data, type, row, meta ) {
						return  '<a href="'+App_url+'admin/view_client/'+data+'" class="btn btn-xs btn-primary mr-5">View</a>'+
								'<button type="button" class="btn btn-xs btn-default" id="delete_admin_client" data-id="'+data+'">Delete</button>';
					}
				}
			]
			
		});

		$('#applyAdminClientFilter').click(function(){ 
			$('#AdminClientDataTable').DataTable().ajax.reload(); 
		});

		$('#resetAdminClientFilter').click(function(){ 
			$('#start_date').val("")
			$('#end_date').val("");
			$('#agent_id').val("");
			$('#AdminClientDataTable').DataTable().ajax.reload(); 
		});

		$('#AdminClientDataTable').delegate('#delete_admin_client', 'click', function(e){
			ajax_data['client_id'] = $(this).attr('data-id');
			lnv.confirm({
				title: 'Confirm',
				content: 'Are you sure you want to delete this client?',
				confirmBtnText: 'Yes',
				confirmHandler: function(){
					$.ajax({
						type: 'POST',
						url: App_url +'admin/delete_client',
						data: ajax_data,
						dataType  : 'json',
						success: function(response){
							if(response.type == "success"){
							   $('#AdminClientDataTable').DataTable().ajax.reload(); 
							   $('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}else{
								$('#AjaxResponse').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.message+'</div>');
							}
						}
					});					
				},
				cancelBtnText: 'No',
				cancelHandler: function(){
			
				}
			})	
		
		});

	}

	if($('#SupportDataTable').length > 0){
		$("#SupportDataTable").dataTable({
			pageLength: 10,
			isMobile: window.outerWidth < 800 ? true : false,
			responsive: window.outerWidth < 800 ? true : false, 
			aLengthMenu : [[5, 10, 25, -1], [5, 10, 25, "All"]],
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', 
				previous: '<i class="ti-angle-left"></i>'
				}
			},
			order : {'3' : 'DESC'}
		});

	}

	$(document).on("submit", "#chatForm", function(e){
		dataString  = new FormData(this);
		e.preventDefault();
		$.ajax({
            type: "POST",
            url: App_url  + "agent/add_reply",
            data: dataString,
            processData: false,
            contentType: false,
            cache: false,
			success: function(response){
				if(response.success){
					if(response.errors.attachment_error){
						$('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.errors.attachment_error+'</div>');
					}else{
						location.reload();
					}
				}
			}
	    });
	});

	$(document).on("submit", "#chatAdminForm", function(e){
		dataString  = new FormData(this);
		e.preventDefault();
		$.ajax({
            type: "POST",
            url: App_url  + "admin/add_reply",
            data: dataString,
            processData: false,
            contentType: false,
            cache: false,
			success: function(response){
				if(response.success){
					if(response.errors.attachment_error){
						$('#AjaxResponse').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+response.errors.attachment_error+'</div>');
					}else{
						location.reload();
					}
				}
			}
	    });
	});

	if($('#weekly-ticket-openings-chart').length > 0){
		chart = new Chart($('#weekly-ticket-openings-chart'),{
			type:'line',
			data:chart_data,
			options:{
			responsive:true,
			maintainAspectRatio:false,
			legend: {
			display: false,
			},
			scales: {
			yAxes: [{
				ticks: {
				beginAtZero: true,
				}
			}]
			}
		}
		});
	 }
	
	 if($('#PendingInvoiceDataTable').length > 0){
		$("#PendingInvoiceDataTable").dataTable({
			pageLength: 10,
			isMobile: window.outerWidth < 800 ? true : false,
			responsive: window.outerWidth < 800 ? true : false, 
			aLengthMenu : [[5, 10, 25, -1], [5, 10, 25, "All"]],
			dom : '<"top">t<"bottom col-md-12 text-center"p><"clear">',
			language: {
				paginate: {
				next: '<i class="ti-angle-right"></i>', // or '→'
				previous: '<i class="ti-angle-left"></i>' // or '←' 
				}
			}
		});
	}
	
	if($('#dueDateConvertor_15').length > 0){
		$('#dueDateConvertor_15, #dueDateConvertor_30, #dueDateConvertor_45, #dueDateConvertor_60, #dueDateConvertor_75, #dueDateConvertor_90').click(function(){ 
            var days = $(this).attr('data-value');
			$.ajax({
				type: 'POST',
				url: App_url +'agent/get_due_date/'+ days,
				data: ajax_data,
				dataType  : 'json',
				success: function(response){
					if(response.type == "success"){
						$('#due').val(response.message);
					}
				}
			});	

		});
    }
	

	if($('#calendar').length > 0){
		$('#calendar').fullCalendar({
		
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			droppable: false, 
			eventLimit: true, 
			
		eventMouseover: function (data, event, view) {
			var tooltip = '<div class="tooltiptopicevent tooltip tooltip-inner" style="width:auto;height:auto;position:absolute;z-index:10001;">'+ data.title + '</div>';
			$("body").append(tooltip);
			$(this).mouseover(function (e) {
				$(this).css('z-index', 10000);
				$('.tooltiptopicevent').fadeIn('500');
				$('.tooltiptopicevent').fadeTo('10', 1.9);
			}).mousemove(function (e) {
				$('.tooltiptopicevent').css('top', e.pageY + 10);
				$('.tooltiptopicevent').css('left', e.pageX + 20);
			});
		},
		eventMouseout: function (data, event, view) {
			$(this).css('z-index', 8);
			$('.tooltiptopicevent').remove();
		},
		dayClick: function () {
			tooltip.hide()
		},
		eventResizeStart: function () {
			tooltip.hide()
		},
		eventDragStart: function () {
			tooltip.hide()
		},
		viewDisplay: function () {
			tooltip.hide()
		},
		events: {
			url: App_url + 'agent/get_calendar_events',
			type: 'GET',
			error: function(err) {
				console.log('Error!- This request could not be completed' + err);
			},
			success: function(response) {

			},
		},
		});
     }
     
    if($('#weekchart').length > 0){
		$.ajax({
		  url: App_url+"admin/get_customer_week_report",
		  method: "GET",
		  dataType: "json",
		  success: function(response) {
			Morris.Bar({
			  element: 'weekchart',
			  data: response.message.weekdata,
			  xkey: 'date',
			  ykeys: ['total'],
			  labels: ['total'],
			  barRatio: 0.4,
			  xLabelAngle: 35,
			  pointSize: 1,
			  barOpacity: 1,
			  pointStrokeColors:['#ff6028'],
			  behaveLikeLine: true,
			  grid: true,
			  gridTextColor:'#878787',
			  hideHover: 'auto',
			  smooth: true,
			  barColors: ['#3324f5'],
			  resize: true,
			  gridTextFamily:"Roboto"
			});  
		  }
		});
	 }


});