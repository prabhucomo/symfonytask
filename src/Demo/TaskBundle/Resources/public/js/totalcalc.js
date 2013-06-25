

function updateData(obj){
    
   $.ajax
    ({
        type: "GET",
        url: "/product_ajax/"+$(obj).val(),
        async: false,
        cache: false,
        success: function(response)
        {
            var originalResponse = eval(response);
            if(originalResponse[0] != 'error') {
                var product =  originalResponse[0];
                var idString = $(obj).attr('id');
                var amountElementId = '#'+idString.replace('product', 'amount');
                $(amountElementId).val(product.unitprice);
            }
        }
    });
}

function updateTotal(){
    var amountvalue = $("input[id$='_amount']").val();
    var quantityvalue = $("input[id$='_quantity']").val();
    alert (amountvalue);alert (quantityvalue);
    var totalvalue = amountvalue * quantityvalue;
    //alert (totalvalue);
    $("#input[id$='_total']").val(totalvalue);
}

function sendmail(){
    alert ('prabhu');
    $.ajax
    ({
        type: "GET",
        url: "/sending_mail",
        async: false,
        cache: false,
        success: function(response)
        {
            alert ('success');
        }
    })
}
