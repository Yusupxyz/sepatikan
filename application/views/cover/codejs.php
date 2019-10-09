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
            $('#submit1').attr("disabled",false);
            $('#form1').attr('action', formAction+'/'+sungai+'/'+jenis_data);
        }else{
            $('#submit1').prop("disabled",true);
        }
    });

    $("#lokasi").change(function () {
        var lokasi = $("#lokasi").val();
        var jd = $("#jd").val();
        var tahun = $("#tahun").val();
        var formAction = $('#form2').attr("action");
        if (sungai!="" && jd!="" && tahun!=""){
            $('#submit2').attr("disabled",false);
            $('#form2').attr('action', formAction+'/'+lokasi+'/'+jd+'/'+tahun);
        }else{
            $('#submit2').attr("disabled",true);
        }
    });

    $("#jd").change(function () {
        var lokasi = $("#lokasi").val();
        var jd = $("#jd").val();
        var tahun = $("#tahun").val();
        var formAction = $('#form2').attr("action");
        if (sungai!="" && jd!="" && tahun!=""){
            $('#submit2').attr("disabled",false);
            $('#form2').attr('action', formAction+'/'+lokasi+'/'+jd+'/'+tahun);
        }else{
            $('#submit2').attr("disabled",true);
        }
    });

    $("#tahun").change(function () {
        var lokasi = $("#lokasi").val();
        var jd = $("#jd").val();
        var tahun = $("#tahun").val();
        var formAction = $('#form2').attr("action");
        if (sungai!="" && jd!="" && tahun!=""){
            $('#submit2').attr("disabled",false);
            $('#form2').attr('action', formAction+'/'+lokasi+'/'+jd+'/'+tahun);
        }else{
            $('#submit2').attr("disabled",true);
        }
    });
});
</script>