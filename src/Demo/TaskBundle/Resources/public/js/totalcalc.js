

function updateData(obj) {

    $.ajax
            ({
                type: "GET",
                url: "/product_ajax/" + $(obj).val(),
                async: false,
                cache: false,
                success: function(response)
                {
                    var originalResponse = eval(response);
                    if (originalResponse[0] != 'error') {
                        var product = originalResponse[0];
                        var idString = $(obj).attr('id');
                        var amountElementId = '#' + idString.replace('product', 'amount');
                        $(amountElementId).val(product.unitprice);
                    }
                }
            });
}

function updateTotal() {
    var amountvalue = $("input[id$='_amount']").val();
    var quantityvalue = $("input[id$='_quantity']").val();
    //alert (amountvalue);alert (quantityvalue);
    var totalvalue = amountvalue * quantityvalue;
    //alert (totalvalue);
    $("#input[id$='_total']").val(totalvalue);
}

function getStatus(obj){
    //var orderedStatus = $("input[id$='_status']").val(); 
    var statusValue = $(obj).val();
    globalVar = statusValue;
    return statusValue;
    //alert (statusValue);
}
function sendmail() {
    //getStatus();
    var orderlisturl = $(location).attr('href');
    var base_url = orderlisturl.split("admin");
    if (base_url[1] == "/demo/task/purchaseorder/create") {
        var orderedCustomer = $("input[id$='_customer']").val();
        var orderedStatus = $("select[id$='_status']").val();
        var orderedDate = $("input[id$='_date']").val();
        var orderedAmount = $("input[id$='_amount']").val();
        var orderedQuantity = $("input[id$='_quantity']").val();
        var orderedProduct = $("select[id$='_product']").val();
        var orderedTotal = $("input[id$='_total']").val();
        //alert(orderedCustomer);alert(orderedStatus);alert(orderedDate);alert(orderedAmount);alert(orderedQuantity);alert(orderedProduct);alert(orderedTotal);
        $.ajax
                ({
                    type: "POST",
                    url: "/app_dev.php/sending_mail",
                    data: {customerName:    orderedCustomer,
                           orderStatus:     orderedStatus,
                           orderedDate:     orderedDate,
                           orderedAmount:   orderedAmount,
                           orderedQuantity: orderedQuantity,
                           itemName:        orderedProduct,
                           grandTotal:      orderedTotal },
                    async: false,
                    cache: false,
                    beforeSend: function(){
                        $("#result").html('<img src="tumblr_mfpmmdCdWA1s1r5leo1_500.gif"/> Now loding...');
                    },
                    success: function(response)
                    {
                        alert('An Email is sent to you Please have a look at it');
                    }
                })
    }
}
