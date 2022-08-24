const d = document,
  w = window;
let tableRoles;

d.addEventListener("DOMContentLoaded", function () {
  tableRoles = $("#tablaRoles").DataTable({
    aProcessing: true,
    aServerSide: true,
    //cambiar lenguaje

    language: {
      url: "//cdn.datatables.net./plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: " " + BASEURL + "/Roles/getRoles",
      dataSrc: "",
    },
    columns: [
      { data: "idrol" },
      { data: "nombrerol" },
      { data: "descripcion" },
      { data: "status" },
      { data: "options" },
    ],
    responieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
  //nuevo rol

  let formRol = d.querySelector("#form-rol");
  formRol.onsubmit = function (e) {
    e.preventDefault();

    let strNombre = d.querySelector("#txtNombre").value,
      strDescripcion = d.querySelector("#txtDescripcion").value,
      intStatus = d.querySelector("#listStatus").value,
      intIdRol = d.querySelector("#idRol").value;

    if (strNombre == "" || strDescripcion == "" || intStatus == "") {
      swal("Atención", "Todos los campos son obligatorios.", "error");
      return false;
    }

    //detectando si es un navegador crhome crea un nuevo elemento de XMLHttpRequest , de lo contrario si estamos en otro navegador nos crea ActiveXObject
    let request = w.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = BASEURL + "/Roles/setRol";
    let formData = new FormData(formRol);
    request.open("POST", ajaxUrl, true);

    request.send(formData);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if (objData.status) {
          formRol.reset();
          swal("roles de usuario", objData.msg, "success");
          $("#modalFormRol").modal("hide");
          tableRoles.ajax.reload(function () {
            w.addEventListener(
              "load",
              () => {
                ftnDelRol();
                fntEditRol();
                ftnPermisos();
                $("#modalFormRol").modal("hide");
              },
              false
            );
          });
        } else {
          swal("error", objData.msg, "error");
        }
      }
    };
  };
});

/// para eliminar el rol
$(function ftnDelRol() {
  $(document).on("click", "#btnDelRolID", function () {
    let idrol = this.getAttribute("rl");
    swal(
      {
        title: "Eliminar Rol",
        text: "¿estas seguro de que quieres eliminar el Rol?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true,
      },
      (isConfirm) => {
        if (isConfirm) {
          let request = w.XMLHttpRequest
            ? new XMLHttpRequest()
            : new ActiveXObject("Microsoft.XMLHTTP");
          let ajaxDelRol = BASEURL + "/Roles/delRol/";
          let strData = "idrol=" + idrol;
          request.open("POST", ajaxDelRol, true);
          request.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
          );
          request.send(strData);
          request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
              let objData = JSON.parse(request.responseText);
              if (objData.status) {
                swal("Eliminar!", objData.msg, "success");
                tableRoles.ajax.reload(() => {});
              } else {
                swal("Atención!", objData.msg, "error");
              }
            }
          };
        }
      }
    );
  });
});

d.querySelector("#btnActionForm").addEventListener("click", () =>
  $("#ModalFormRol").modal("hide")
); //para actualizar el modal
$(function fntEditRol() {
  $(document).on("click", "#btnEditrolID", function () {
    d.querySelector("#titleModal").innerHTML = "Actualizar Rol";
    d.querySelector(".modal-header").classList.replace(
      "headerRegister",
      "headerUpdate"
    );
    d.querySelector("#btnActionForm").classList.replace(
      "btn-primary",
      "btnActionCambio"
    );
    d.querySelector("#btnText").innerHTML = "Actualizar";
    $("#ModalFormRol").modal("show");

    var idrol = parseInt(this.getAttribute("rl"));
    var request = w.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUser = BASEURL + "/Roles/getRol/" + idrol;
    request.open("GET", ajaxUser, true);
    request.send();

    request.onreadystatechange = function () {
      if (request.status == 200) {
        let objData = JSON.parse(request.responseText);
        if (objData.status) {
          d.querySelector("#idRol").value = objData.data.idrol;
          d.querySelector("#txtNombre").value = objData.data.nombrerol;
          d.querySelector("#txtDescripcion").value = objData.data.descripcion;
          if (objData.data.status == 1) {
            var optionSelect =
              '<option value="1" selected class="notBlock">Activo</option>';
          } else {
            var optionSelect =
              '<option value="2" selected class="notBlock">Inactivo</option>';
          }

          var htmlSelect = `${optionSelect}
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>`;
          d.querySelector("#listStatus").innerHTML = htmlSelect;
        } else {
          swal("error", objData.msg, "error");
        }
      }
    };
  });
});
//abrir modal en editar es el mismo que en para nuevo rol

/*  */
function openModal() {
  d.querySelector("#idRol").value = "";
  d.querySelector(".modal-header").classList.replace(
    "headerUpdate",
    "headerRegister"
  );
  d.querySelector("#btnActionForm").classList.replace(
    "btnActionCambio",
    "btn-primary"
  );

  d.querySelector("#titleModal").innerHTML = "Nuevo Rol";
  d.querySelector("#form-rol").reset();
  $("#ModalFormRol").modal("show");
}

/*  PERMISOS */
// permisos
$(function ftnPermisos() {
  $(document).on("click", "#btnPermisosID", function () {
    let idrol = this.getAttribute("rl"),
      request = w.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP"),
      ajaxUser = BASEURL + "Permisos/getPermisosRol/" + idrol;
    request.open("GET", ajaxUser, true);
    request.send();

    request.onreadystatechange = () => {
      if (request.readyState == 4 && request.status == 200) {
        d.querySelector("#contentAjax").innerHTML = request.responseText;
        $(".modalPermisos").modal("show");
        d.querySelector("#formPermisos").addEventListener(
          "submit",
          ftnSavePermisos,
          false
        );
      }
    };
  });
});
function ftnSavePermisos(e) {
  e.preventDefault();
  let request = w.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP"),
    ajaxUrl = BASEURL + "/Permisos/setPermisos",
    formElement = d.querySelector("#formPermisos"),
    formData = new FormData(formElement);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      console.log(request.responseText);
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        $(".modalPermisos").modal("hide");
        swal("Permisos de usuario", objData.msg, "success");
      } else {
        swal("Erro", objData.msg, "error");
      }
    }
  };
}
