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
            url  : "<?php echo site_url('input_ikan/saveStasiun')?>",
            dataType : "JSON",
            data : {stasiun:stasiun, desa:document.getElementById("desa").value, koordinat:document.getElementById("koordinat").value, id_sungai : id_sungai, id_tahun : id_tahun,  id_periode : periode},
            success: function(data){
                id_stasiun = data;
                saveIkan(id_stasiun);
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

function saveIkan(id) {
    //input data tangkapan ikan
    var ikan = $('input[name="ikan[]"]').map(function(){ 
                    return this.value; 
                }).get();
    var hasil = $('input[name="hasil[]"]').map(function(){ 
                    return this.value; 
                }).get();
    var ukuran = $('input[name="ukuran[]"]').map(function(){ 
                    return this.value; 
                }).get();
    var id_tahun = <?= $id_tahun ?>;
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ikan/saveDataIkan')?>",
        dataType : "JSON",
        data : { 'ikan[]':ikan, 'hasil[]':hasil, 'ukuran[]':ukuran, id_st : id},
        success: function(data){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    }); 

    //input Rata rata hasil tangkapan total 
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ikan/saveDataRata')?>",
        dataType : "JSON",
        data : {id_st : id, rata : document.getElementById("rata").value},
        success: function(data){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });  

    //input Jenis alat tangkap
    var alat = $('input[name="alat[]"]').map(function(){ 
                    return this.value; 
                }).get();
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ikan/saveDataAlat')?>",
        dataType : "JSON",
        data : { 'alat[]':alat, id_st : id},
        success: function(data){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    }); 

    //input Lokasi pengakapan
    var lokasi = $('input[name="lokasi[]"]').map(function(){ 
                    return this.value; 
                }).get();
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ikan/saveDataLokasi')?>",
        dataType : "JSON",
        data : { 'lokasi[]':lokasi, id_st : id},
        success: function(data){
            console.log(data);
            alert("Data tersimpan");
            $('#lanjut').removeAttr("disabled");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    }); 
}

</script>