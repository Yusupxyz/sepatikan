<script type="text/javascript">
var periode=0;
var stasiun=1;
var id_stasiun;
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
            url  : "<?php echo site_url('input_sen/saveStasiun')?>",
            dataType : "JSON",
            data : {stasiun:stasiun, desa:document.getElementById("desa").value, koordinat:document.getElementById("koordinat").value, id_sungai : id_sungai, id_tahun : id_tahun,  id_periode : periode},
            success: function(data){
                id_stasiun = data;
                saveSen(id_stasiun);
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

function saveSen(id) {
    //input data sosial ekonomi nelayan
    var id_parameter = $('input[name="id_sen[]"]').map(function(){ 
                    return this.value; 
                }).get();
    var data = $('select[name="data[]"]').map(function(){
    if ($(this).val())
        return $(this).val();
    }).get();

    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_sen/saveDataSen')?>",
        dataType : "JSON",
        data : { 'id_parameter[]':id_parameter, 'data[]':data, id_st : id},
        success: function(data){
            console.log(data);
            alert("Data tersimpan.");
            $('#lanjut').removeAttr("disabled");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    }); 
}

</script>