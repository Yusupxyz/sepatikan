<script type="text/javascript">
var periode=0;
var stasiun=1;
var id_stasiun;

//pilih periode
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

function save() {
    //input stasiun
    if (periode==0){
        alert("Pilih periode terlebih dahulu");
    }else{
        var id_sungai = <?= $id_sungai ?>;
        var id_tahun = <?= $id_tahun ?>;
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('input_ekologis/saveStasiun')?>",
            dataType : "JSON",
            data : {stasiun:stasiun, desa:document.getElementById("desa").value, koordinat:document.getElementById("koordinat").value, id_sungai : id_sungai, id_tahun : id_tahun,  id_periode : periode},
            success: function(data){
                id_stasiun = data;
                saveEkologis(id_stasiun);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });  
    }
}

function lanjut(){
    stasiun=stasiun+1;
    document.getElementById("judul").innerHTML = "<b> Data Stasiun "+stasiun+"</b>";
    document.getElementById("form1").reset();
    $('#lanjut').attr("disabled", true);	
}

function saveEkologis(id) {
    var id_ekologis = $('input[name="id_ekologis[]"]').map(function(){ 
                    return this.value; 
                }).get();
    // input data ekologis
    var data = $('input[name="data[]"]').map(function(){ 
                    return this.value; 
                }).get();
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ekologis/saveDataEkologis')?>",
        dataType : "JSON",
        data : { 'data[]':data, 'id_parameter[]' : id_ekologis, id_st : id },
        success: function(data){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    }); 

    // input data ekologis baru
    var parameter_baru = $('input[name="parameter_baru[]"]').map(function(){ 
                    return this.value; 
                }).get();
    // input data ekologis
    var data_baru = $('input[name="data_baru[]"]').map(function(){ 
                    return this.value; 
                }).get();
    parameter_baru.forEach(function(value,i){
        if (value!=""){
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('input_ekologis/saveDataEkologisBaru')?>",
                dataType : "JSON",
                data : { 'data_baru[]':data_baru, 'parameter_baru' : value, id_st : id },
                success: function(data){
                    console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
    }); 
    alert("Data tersimpan.");
    $('#lanjut').removeAttr("disabled");
}

</script>