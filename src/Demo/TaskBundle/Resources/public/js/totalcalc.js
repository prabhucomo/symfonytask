

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
    //alert ($("#input[id$='_orderitem_0_total']").val());
    var amountvalue = $("input[id$='_amount']").val();
    //alert (amountvalue);
    var quantityvalue = $("input[id$='_quantity']").val();
    //alert (quantityvalue);
    //alert (amountvalue);alert (quantityvalue);
    var totalvalue = amountvalue * quantityvalue;
    //alert (totalvalue);
    //alert (totalvalue);
    $(".quantityvalue").val(totalvalue);
}

function getStatus(obj) {
    var statusValue = $(obj).val();
    globalVar = statusValue;
    return statusValue;
}
function sendmail() {
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
        $.ajax
                ({
                    type: "POST",
                    url: "/app_dev.php/sending_mail",
                    data: {customerName: orderedCustomer,
                        orderStatus: orderedStatus,
                        orderedDate: orderedDate,
                        orderedAmount: orderedAmount,
                        orderedQuantity: orderedQuantity,
                        itemName: orderedProduct,
                        grandTotal: orderedTotal},
                    async: false,
                    cache: false,
                    beforeSend: function() {
                        //alert ('hi');
                        $("#result").html('<img src="bundles/demotask/images/tumblr_mfpmmdCdWA1s1r5leo1_500.gif"/> Now loding...');
                    },
                    success: function(data)
                    {
                        //alert (response);
                        if (orderedQuantity >= data) {
                            alert('Please try to place the order below ' + data);
                            alert(orderlisturl);
                            window.location.href = orderlisturl;
                            //window.location = orderlisturl;
                            return false;
                        }
                        alert('An Email is sent to you Please have a look at it');
                    }
                })
    }
//    else if (base_url[1] == "/demo/task/customer/create") {
//        var customerName = $("input[id$='_firstname']").val();
//        var customerEmailAddress = $("input[id$='_emailaddress']").val();
//        var customerPhoneNumber = $("input[id$='_phonenumber']").val();
//        $.ajax
//                ({
//                    type: "POST",
//                    url: "/app_dev.php/customer_details",
//                    data: {name: customerName,
//                        emailAddress: customerEmailAddress,
//                        phoneNumber: customerPhoneNumber
//                    },
//                    async: false,
//                    cache: false,
//                    success: function(data)
//                    {
//                        alert('good');
//                    }
//                })
//    }
}
function checkName(obj) {
    var name = $(obj).val();
    $.ajax
            ({
                type: "POST",
                url: "/app_dev.php/customer_details",
                data: {customerName: name},
                async: false,
                cache: false,
                success: function(response)
                {
                    if (response == 'failed') {
                        //$.modal("<div><h1>SimpleModal</h1></div>");
                        alert('The Firstname you have entered is Already registered. Try to choose some Other Name');
                        $("input[id$='_firstname']").val("");
                    } else {
                        return true;
                    }
                }
            })
}
function checkEmail(obj) {
    var email = $(obj).val();
    $.ajax
            ({
                type: "POST",
                url: "/app_dev.php/customer_email",
                data: {customerEmail: email},
                async: false,
                cache: false,
                success: function(response)
                {
                    if (response == 'failed') {
                        alert('The EmailAddress you have entered is Already registered. Try to choose some Other Email');
                        $("input[id$='_emailaddress']").val("");
                    } else {
                        return true;
                    }
                }
            })
}
function checkPhone(obj) {
    var phone = $(obj).val();
    $.ajax
            ({
                type: "POST",
                url: "/app_dev.php/customer_phone",
                data: {customerName: phone},
                async: false,
                cache: false,
                success: function(response)
                {
                    if (response == 'failed') {
                        alert('The Phone Number you have entered is Already registered. Try to choose some Other Number');
                        $("input[id$='_phonenumber']").val("");
                    } else {
                        return true;
                    }
                }
            })
}
$(function() {
    $("#dialog").dialog();
});

