import "./bootstrap";
import swal from "sweetalert";

window.deleteConfirm = function (e) {
    e.preventDefault();
    swal({
        title: "¿Estas seguro de eliminar el registro?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = e.target.href;
        }
    });
};
