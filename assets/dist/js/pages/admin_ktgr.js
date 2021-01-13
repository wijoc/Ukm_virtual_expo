$(document).ready(function(){
    /** Datatable */
    $("#table-kategori").DataTable({
        "responsive": true,
        "autoWidth": false,
    });

    /** Tombol edit kategori */
    $("#table-kategori tbody").on("click", ".edit-ktgr", function(){
        /* Get id dan nama */
        var ktgr_id = $(this).data("id");
        var ktgr_name = $(this).data("name");

        /* Set value DOM */
        $("#editKtgrID").prop("required", true);
        $("#editKtgrID").prop("disabled", false);
        $("#modal-edit-kategori").find("#editKtgrID").val(ktgr_id);
        $("#modal-edit-kategori").find("#editKtgrNama").val(ktgr_name);
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