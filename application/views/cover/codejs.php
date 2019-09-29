<script type="text/javascript">
//update set unit chart
$(document).ready(function(){
    $("#sungai").change(function () {
        var sungai = $("#sungai").val();
        var jenis_data = $("#jenis_data").val();
        var formAction = $('#form1').attr("action");
        if (sungai!="" && jenis_data!=""){
            $('#submit1').attr("disabled",false);
            $('#form1').attr('action', formAction+'/'+sungai+'/'+jenis_data);
        }else{
            $('#submit1').attr("disabled",true);
        }
    });

    $("#jenis_data").change(function () {
        var sungai = $("#sungai").val();
        var jenis_data = $("#jenis_data").val();
        var formAction = $('#form1').attr("action");
        if (sungai!="" && jenis_data!=""){
            $('#submit1').prop("disabled",false);
            $('#submit1').attr("disabled",false);
            // $('#form1').attr("action", formAction+'/'+sungai+'/'+jenis_data);
        }else{
            $('#submit1').prop("disabled",true);
        }
    });
});
</script>