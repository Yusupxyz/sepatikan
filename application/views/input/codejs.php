<script type="text/javascript">
var periode;
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
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('input_ikan/saveStasiun')?>",
        dataType : "JSON",
        data : {stasiun:stasiun, desa:document.getElementById("desa").value, koordinat:document.getElementById("koordinat").value},
        success: function(data){
            id_stasiun = data;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });  

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
        data : { 'ikan[]':ikan, 'hasil[]':hasil, 'ukuran[]':ukuran, id_tahun : id_tahun, id_stasiun : id_stasiun},
        success: function(data){
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });   

}

</script>