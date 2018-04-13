/**

 * Created by Tarek Monjur on 2/13/2018.

 */



function showLoading() {

    $.busyLoadFull("show", {});

}



function hideLoading() {

    $.busyLoadFull("hide", {});

}


function confirmAction(btn, message, url)
{
    swal({
        title: message,
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#218838',
        cancelButtonColor: '#c82333',
        confirmButtonText: 'Yes, '+btn+' it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        console.log(url);
        window.location.href=url;
    }, function (dismiss) {
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'your stuff is safe.',
                'error'
            )
        }
    })
}


function PrintInvoice(elem)
{
   var invoice_print = document.getElementById('invoice_print');
   invoice_print.style.visibility='hidden';

   var win = window.open('', '');
   var content = '<html><head><title>Invoice</title>' +
        '<link rel="stylesheet" type="text/css" href="'+baseUrl+'/assets/site/css/bootstrap.min.css" />'+
        '<link rel="stylesheet" type="text/css" href="'+baseUrl+'/assets/site/css/style.css" /></head>';
    content += "<body onload=\"window.print(); window.close();\">";
    content += document.getElementById(elem).innerHTML ;
    content += "</body>";
    content += "</html>";
    win.document.write(content);
    win.document.close();

    invoice_print.style.visibility='visible';
   return true;
}



function addToCart(medicine_id){

    showLoading();

    $.ajax({

       url : baseUrl + '/add-to-cart',

       type : 'get',

       dataType : 'json',

       data : {id: medicine_id, unit: 'box', qty: 1},

       success : function(data, status){

           if(data.success == true){

                swal({title: 'Success!', text: data.msg, type:'success', showCancelButton: false, showConfirmButton: false, timer: 1000});

                showCart(data.data);

                document.getElementById('cart-menu-open-right').click();
                setTimeout(function(){ document.getElementById('right-side-menu-close').click(); }, 2000);

           }else{

                swal('Error!',data.msg,'error');

           }

       },

       error : function(error){

           hideLoading();

       }

    }).done(function () {

       hideLoading();

    });

    return false;
}


function showCart(data){

    document.getElementById('total_item1').innerHTML = data.totalItem;
    document.getElementById('total_item2').innerHTML = data.totalItem;
    document.getElementById('total1').innerHTML = data.cartTotal;
    document.getElementById('total2').innerHTML = data.cartTotal;
    document.getElementById('cart_table').innerHTML = data.cart_table;

}



$(function ($){

    "use strict";

    //Date picker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    });

    $(document).on("keyup", ".search_product",function () {

        var q = $(this).val();
        var id = $(this).attr('sid');
        $(".search_product").val(q);

        if(q.length >= 3 ){

            $('#'+id).show();

            $.ajax({

                url : baseUrl+'/search?id='+id+'&q='+q,

                type : 'get',

                dataType: 'text',

                success: function (data, status) {
                    // console.log(data = JSON.parse(data));
                    $('#'+id).html(data);

                },

                error: function (error) {



                }

            });

        }else{

            $('#'+id).hide();

        }

    });


    // Add to shoping card from single page

    $(document).on('submit', '#addtoCard', function(e){

        e.preventDefault();

        showLoading();

       $.ajax({

           url : baseUrl + '/add-to-cart',

           type : 'get',

           dataType : 'json',

           data : $(this).serialize(),

           success : function(data, status){

               if(data.success == true){

                   swal({title: 'Success!', text: data.msg, type:'success', showCancelButton: false, showConfirmButton: false, timer: 1000});

                   showCart(data.data);

                   document.getElementById('cart-menu-open-right').click();
                   setTimeout(function(){ document.getElementById('right-side-menu-close').click(); }, 2000);

               }else{

                   swal('Error!',data.msg,'error');

               }

           },

           error : function(error){

               hideLoading();

           }

       }).done(function () {

           hideLoading();

       });

    });

});





function cartUpdate(item_id, qty)
{
    
    if(qty != '' && qty >= 0) {

        showLoading();

        $.ajax({

            url: baseUrl + '/update-to-cart/' + item_id + '/' + qty,

            type: 'get',

            dataType: 'json',

            success: function (data, status) {

                showCart(data);

                hideLoading();

            },

            error: function (error) {

                hideLoading();

            }

        }).done(function () {

            hideLoading();

        });

    }

}





function cartItemRemove(item_id)

{

    swal({

        text: "Are you sure remove item to cart?",

        type: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#218838',

        cancelButtonColor: '#c82333',

        confirmButtonText: 'Yes, Remove it!',

        cancelButtonText: 'No, cancel!',

        confirmButtonClass: 'btn btn-success',

        cancelButtonClass: 'btn btn-danger',

        buttonsStyling: false

    }).then(function () {

        showLoading();

        $.ajax({

            url : baseUrl + '/remove-to-cart/'+item_id,

            type : 'get',

            dataType : 'json',

            success : function (data, status) {

                showCart(data);

                hideLoading();

                swal('Success!','Item successfully remove.','success');

            },

            error: function(error){

                hideLoading();

                swal('Error!','Item not remove.','error');

            }

        }).done(function () {

            hideLoading();

        });

    }, function (dismiss) {

        if (dismiss === 'cancel') {

            swal('Cancelled','your item is safe.','error');

        }

    });

}



function randerProducts(products)
{
    var html = "";

    document.getElementById('product_item').innerHTML = products.length + " items found";

    for(index in products)
    {
        var product = products[index];

        html += '<div class="col-md-4">'+

            '<div class="first-aid-single-product">' +

                '<div class="features-single-item" style="min-height:382px">' +

                    '<a href="'+baseUrl+'/non-prescriptions/'+product.medicine_slug+'" class="offer-buget-area">';

                    if(product.offer_percent){

                        html += '<div class="offer-badge"></div>'+

                            '<div class="b-text">'+ product.offer_percent + '<span class="buget-per">%</span><span class="off-offer">Off</span></div>';
                    }

                    if(product.medicine_image){
                        html += '<div class="slide-img-wrapper"><img src="'+baseUrl+'/files/medicine/medium/'+product.medicine_image+'" alt=""></div>';
                    }else{
                        html += '<div class="slide-img-wrapper"><img src="'+baseUrl+'/assets/site/img/medicine.jpg" alt=""></div>';
                    }

                     html += '</a>'+

                    '<div class="features-text-best">'+

                        '<a href="'+baseUrl+'/non-prescriptions/'+product.medicine_slug+'" class="pro-name">'+word_limit(product.medicine_name)+'</a>'+

                        '<span class="price-text">';

                        if(product.offer_percent){
                            html += '<del>TK.'+product.medicine_price+'</del>'+
                            'TK.'+ (product.medicine_price - ((product.medicine_price * product.offer_percent) /100)).toFixed(2) +'</span><br>';
                        }else{
                            html += 'TK.'+product.medicine_price+'</span><br>';
                        }
                        if(product.medicine_stock == 'yes'){
                          html += '<span class="instock">In Stock</span>'+
                          '<div class="view-del"><a href="#" onclick="addToCart('+product.id+')">Add to Cart</a></div>';
                        }else{
                          html += '<span class="instock" style="color:red">Out of Stock</span>'+
                          '<div class="view-del"><a href="#">Not Available</a></div>';
                        }
                        
                     html += '</div>'+

                '</div>'+

            '</div>'+

        '</div>';
    }
    document.getElementById('products').innerHTML += html;
}



function word_limit(str)
{
  if(str.length > 45){
    str = str.substr(0,45) + '...';
  }
  return str;
}



function getProducts(){

}






