// $(document).ready(
//     var index = 1;
//     changeImage = function(){
//       var imgs = ["img/1.jpg","img/2.jpg","img/3.jpg"];
//       document.getElementById('img').src= imgs[index];
//       index++;
//       if(index==3){
//         index = 0;
//       }
//     }
//     setInterval(changeImage,5000);
// }
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('.backtop').fadeIn()
        }else{
            $('.backtop').fadeOut()
        }

    })
    $('.backtop').click(function(){
        $('html,body').animate({scrollTop:0},2000);
    })
    $('.toggie').click(function(){
        $(".menu").slideToggle();
    })

})

$(document).ready(function() {
   $('.product_title').click(function (){
       //  lấy ra id của sp vừa click
       var product_id = $(this).attr('data_id');
        // gọi ajax lên php để nhờ php thêm sp hiện tại
       $.ajax({
           //đường dẫn php xử lý ajax
           url: "index.php?controller=cart&action=add",
           // Phương thức chuyền dữ liệu
           method: 'GET',
           // dữ liệu gủi kèm ajax lên php
           data:{
               product_id: product_id
           },
           // nơi nhận dữ liệu trả về từ php
           success: function (data){
               var amount = $('.cart-amount').text();
               amount++;
               $('.cart-amount').text(amount);
           }
       });
   })
})



$(document).ready(function(){
    $('.update').click(function(){
        var qty_id = $(this).attr('data');
        // alert(product_id);
        var quantity = $("#qty"+qty_id).val();
        // alert(quantity);
        $.ajax({
            url:"index.php?controller=cart&action=update",
            method: "GET",
            data: {
                qty_id: qty_id,
                quantity : quantity
            },
            success: function(data){
                location.reload();  
                var amount = $('.update_number').val();
                amount++;
                $('.update_number').val(amount);
            }
        })
    })
})


$(document).ready(function(){
    $('.delete').click(function(){
        var product_id = $(this).attr('delete');
      
       $.ajax({
        
           url: "index.php?controller=cart&action=deleteData",
     
           method: 'GET',
          
           data:{
               product_id: product_id
           },
           
           success: function (data){
            location.reload(); 
           }
    })
    })
})

