$(document).ready(function(){

    /** Tombol edit kategori */
    $("#table-stream tbody").on("click", ".edit-stream", function(){
        /* Get id dan nama */
        var dstr_id = $(this).data("id");
        var dstr_title = $(this).data("title");
        var dstr_url   = $(this).data("url");
        var dstr_schedule = $(this).data("schedule");
        var dstr_hour = $(this).data("hour");
        var dstr_banner   = $(this).data("banner");
        var base_url = $(this).data("base-url");
        console.log(dstr_schedule);

        /* Set value DOM */
        $("#editStrID").prop("required", true);
        $("#editStrID").prop("disabled", false);
        $("#modal-edit-stream").find("#editStrID").val(dstr_id);
        $("#modal-edit-stream").find("#editStrJudul").val(dstr_title);
        $("#modal-edit-stream").find("#editStrLink").val(dstr_url);
        $("#modal-edit-stream").find("#editStrJadwal").val(dstr_schedule);
        $("#modal-edit-stream").find("#editStrJadwalJam").val(dstr_hour);
        $("#modal-edit-stream").find("#editStrBanner").val(dstr_banner);
        if(dstr_banner !== ''){
            $("#modal-edit-stream").find("#notfound").hide();
            $("#modal-edit-stream").find("#oldBannerImg").show();
            $("#modal-edit-stream").find("#oldBannerImg").attr("src", base_url + dstr_banner);
            $("#modal-edit-stream").find("#oldBannerImg").attr("width", "200");
        } else {
            $("#modal-edit-stream").find("#oldBannerImg").hide();
            $("#modal-edit-stream").find("#notfound").show();
        }
    })

    /* Sweetalert */
    if(typeof flashStatus !== "undefined" && flashMsg !== "undefined" ){
        if(flashStatus == "successInsert"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "success",
                title: flashMsg
            }).then((result) => {
            	$("#alert-kategori").append('<div class="alert alert-success text-center" style="opacity: 0.8" role="alert">Berhasil menambahkan data kategori ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button></div>')
            })
        } else if(flashStatus == "failedInsert"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "error",
                title: flashMsg
            }).then((result) => {
            	$("#alert-kategori").append('<div class="alert alert-danger text-center" style="opacity: 0.8" role="alert">Gagal menambahkan data kategori ! Silahkan ulangi proses input <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button></div>')
            })
        } else if(flashStatus == "successUpdate"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "success",
                title: flashMsg
            }).then((result) => {
            	$("#alert-kategori").append('<div class="alert alert-success text-center" style="opacity: 0.8" role="alert">Berhasil mengubah data kategori ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button></div>')
            })
        } else if(flashStatus == "failedUpdate"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "error",
                title: flashMsg
            }).then((result) => {
            	$("#alert-kategori").append('<div class="alert alert-danger text-center" style="opacity: 0.8" role="alert">Gagal mengubah data kategori ! Silahkan ulangi proses edit. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button></div>')
            })
        }
    }
})