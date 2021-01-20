$(document).ready(function(){
        /* Sweetalert */
        if(typeof authStatus !== "undefined"){
            if(authStatus == "logedIn"){
                Swal.fire({
                    position: "center",
                    showConfirmButton: true,
                    timer: 2500,
                    icon: "info",
                    title: 'Selamat Datang ' + authUser
                })
            }
        }
})