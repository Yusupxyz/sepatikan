<script type="text/javascript">
var periode;
function p1() {
    document.getElementById("p1").className = "btn btn-danger";
    document.getElementById("p2").className = "btn btn-default";
    periode=1;
}

function p2() {
    document.getElementById("p1").className = "btn btn-default";
    document.getElementById("p2").className = "btn btn-danger";
    periode=2;
}

$('#submit').on('click',function(){
    alert("aa");
            // var product_code = $('#product_code').val();
            // var product_name = $('#product_name').val();
            // var price        = $('#price').val();
            // $.ajax({
            //     type : "POST",
            //     url  : "<?php echo site_url('product/save')?>",
            //     dataType : "JSON",
            //     data : {product_code:product_code , product_name:product_name, price:price},
            //     success: function(data){
            //         $('[name="product_code"]').val("");
            //         $('[name="product_name"]').val("");
            //         $('[name="price"]').val("");
            //         $('#Modal_Add').modal('hide');
            //         show_product();
            //     }
            // });
            // return false;
        });

</script>