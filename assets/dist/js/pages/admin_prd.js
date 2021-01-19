$(document).ready(function(){
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
            	$("#alert-prd").append('<div class="alert alert-success text-center" style="opacity: 0.8" role="alert">Berhasil menambahkan data produk ! <a href="' + site_url + '" class="alert-link">Klik untuk melihat data produk.</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if(flashStatus == "failedInsert"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "error",
                title: flashMsg
            }).then((result) => {
            	$("#alert-prd").append('<div class="alert alert-danger text-center" style="opacity: 0.8" role="alert">Gagal menambahkan data produk ! <a href="' + site_url + '" class="alert-link">Klik untuk melihat data produk.</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if(flashStatus == "successUpdate"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "success",
                title: flashMsg
            }).then((result) => {
            	$("#alert-prd").append('<div class="alert alert-success text-center" style="opacity: 0.8" role="alert">Berhasil mengubah data produk ! <a href="' + site_url + '" class="alert-link">Klik untuk melihat data produk.</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if(flashStatus == "failedUpdate"){
            Swal.fire({
                position: "center",
                showConfirmButton: true,
                timer: 2500,
                icon: "error",
                title: flashMsg
            }).then((result) => {
            	$("#alert-prd").append('<div class="alert alert-danger text-center" style="opacity: 0.8" role="alert">Gagal mengubah data produk ! <a href="' + site_url + '" class="alert-link">Klik untuk melihat data produk.</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        }
    }
})