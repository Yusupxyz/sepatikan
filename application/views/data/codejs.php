<script type="text/javascript">
//update set unit chart
$(document).ready(function(){
    $("#lokasi").change(function () {
        var lokasi = $("#lokasi").val();
        var jd = $("#jd").val();
        var tahun = $("#tahun").val();
        if (jd==1){
            var formAction = '<?= base_url($action2); ?>';
        }else if(jd==2){
            var formAction = '<?= base_url($action3); ?>';
        }else if(jd==3){
            var formAction = '<?= base_url($action4); ?>';
        }
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
        if (jd==1){
            var formAction = '<?= base_url($action2); ?>';
        }else if(jd==2){
            var formAction = '<?= base_url($action3); ?>';
        }else if(jd==3){
            var formAction = '<?= base_url($action4); ?>';
        }
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
        if (jd==1){
            var formAction = '<?= base_url($action2); ?>';
        }else if(jd==2){
            var formAction = '<?= base_url($action3); ?>';
        }else if(jd==3){
            var formAction = '<?= base_url($action4); ?>';
        }
        if (sungai!="" && jd!="" && tahun!=""){
            $('#submit2').attr("disabled",false);
            $('#form2').attr('action', formAction+'/'+lokasi+'/'+jd+'/'+tahun);
        }else{
            $('#submit2').attr("disabled",true);
        }
    });
});
</script>