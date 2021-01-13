$(document).ready(function(){
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
})