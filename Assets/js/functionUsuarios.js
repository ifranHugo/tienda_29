const d = document,
  w = window;
let tableUsuarios;

d.addEventListener(
  "DOMContentLoaded",
  () => {
    tableUsuarios = $("#tableUsuarios").DataTable({
      aProcessing: true,
      aServerSide: true,
      //cambiar lenguaje

      language: {
        url: "//cdn.datatables.net./plug-ins/1.10.20/i18n/Spanish.json",
      },
      ajax: {
        url: " " + BASEURL + "/Usuarios/getUsuarios",
        dataSrc: "",
      },
      columns: [
        { data: "idpersona" },
        { data: "identificacion" },
        { data: "nombre" },
        { data: "apellido" },
        { data: "telefono" },
        { data: "email_user" },
        { data: "dni" },
        { data: "status" },
        { data: "options" },
      ],
      dom: "lBfrtip",
      buttons: [
        {
          extend: "copyHtml5",
          text: "<i class='fa fa-file'></i>COPIAR",
          titleAttr: "copiar",
          className: "btn btn-secondary",
        },
        {
          extend: "excelHtml5",
          text: "<i class='fa fa-file-excel-o'></i> EXCEL",
          titleAttr: "Exportar a Excel",
          className: "btn btn-success",
        },
        {
          extend: "pdfHtml5",
          text: "<i class='fa fa-file-pdf-o'></i> PDF",
          titleAttr: "Exportar a PDF",
          className: "btn btn-danger",
        },
        {
          extend: "csvHtml5",
          text: "<i class='fa fa-file-archive-o'></i> CSV",
          titleAttr: "Exportar a CSV",
          className: "btn btn-info",
        },
      ],
      responieve: "true",
      bDestroy: true,
      iDisplayLength: 10,
      order: [[0, "desc"]],
    });

    d.querySelector("#btnTextGuardar").addEventListener("click", (e) => {
      e.preventDefault();
      if (d.querySelector("#idUsuario").value == "") {
        let strIdentificacion = d.querySelector("#txtIdentificacion").value,
          strNombre = d.querySelector("#txtNombre").value,
          strApellido = d.querySelector("#txtApellido").value,
          strEmail = d.querySelector("#txtEmail").value,
          intTelefono = d.querySelector("#intTelefono").value,
          intTipousuario = d.querySelector("#listRolid").value,
          strPassword = d.querySelector("#txtPassword").value,
          intDni = d.querySelector("#intDni").value;
        if (
          strIdentificacion == "" ||
          strApellido == "" ||
          strNombre == "" ||
          strEmail == "" ||
          intTelefono == "" ||
          intTipousuario == "" ||
          strPassword == "" ||
          intDni == ""
        ) {
          swal("Atencion", "Todos los campos deben estar completos", "error");
          return false;
        }
      } else {
        if (d.querySelector("#optionPassword").classList.contains("notBlock")) {
          let strIdentificacion = d.querySelector("#txtIdentificacion").value,
            strNombre = d.querySelector("#txtNombre").value,
            strApellido = d.querySelector("#txtApellido").value,
            strEmail = d.querySelector("#txtEmail").value,
            intTelefono = d.querySelector("#intTelefono").value,
            intTipousuario = d.querySelector("#listRolid").value,
            strPassword = d.querySelector("#txtPassword").value,
            strPasswordnew = d.querySelector("#txtPasswordNew").value,
            intDni = d.querySelector("#intDni").value;
          if (
            strIdentificacion == "" ||
            strApellido == "" ||
            strNombre == "" ||
            strEmail == "" ||
            intTelefono == "" ||
            intTipousuario == "" ||
            strPassword == "" ||
            strPasswordnew == "" ||
            intDni == ""
          ) {
            swal("Atencion", "Todos los campos deben estar completos", "error");
            return false;
          }
        }

        let strIdentificacion = d.querySelector("#txtIdentificacion").value,
          strNombre = d.querySelector("#txtNombre").value,
          strApellido = d.querySelector("#txtApellido").value,
          strEmail = d.querySelector("#txtEmail").value,
          intTelefono = d.querySelector("#intTelefono").value,
          intTipousuario = d.querySelector("#listRolid").value,
          strPassword = d.querySelector("#txtPassword").value,
          strPasswordnew = d.querySelector("#txtPasswordNew").value,
          intDni = d.querySelector("#intDni").value;
        if (
          strIdentificacion == "" ||
          strApellido == "" ||
          strNombre == "" ||
          strEmail == "" ||
          intTelefono == "" ||
          intTipousuario == "" ||
          intDni == ""
        ) {
          swal("Atencion", "Te falto un campo por completar", "error");
          return false;
        }
      }
      let elementsValid = d.getElementsByClassName("valid");
      for (let i = 0; i < elementsValid.length; i++) {
        if (elementsValid[i].classList.contains("is-invalid")) {
          swal("Atención", "Por favor verifique los campos en rojo.", "error");
          return false;
        }
      }
      let ajaxUrl = BASEURL + "Usuarios/setUsuario",
        request = w.XMLHttpRequest
          ? new XMLHttpRequest()
          : new ActiveXObject("Microsoft.XMLHTTP"),
        formData = new FormData(formUsuario);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function () {
        let objData = JSON.parse(request.responseText);
        if (request.readyState == 4 && request.status == 200) {
          if (objData.status) {
            $("#modalFormUsuarios").modal("hide");
            formUsuario.reset();
            swal("Usuarios", objData.msg, "success");
            tableUsuarios.ajax.reload(function () {
              ftnDelUsuario();
              ftnEditUsuario();
              ftnViewUsuario();
            });
          }
        } else {
          swal("Error", objData.msg, "error");
        }
      };
    });
  },
  false
);

function ftnDelUsuario() {
  $(document).on("click", "#btnDelUsID", function () {
    console.log();
    let idUsuario = this.getAttribute("us");
    swal(
      {
        title: "Eliminar Usuario",
        text: "¿estas seguro de que quieres eliminar el Usuario?",
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
          let ajaxDelRol = BASEURL + "/Usuarios/delUsuario/";
          let strData = "idUsuario=" + idUsuario;
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
                tableUsuarios.ajax.reload(function () {
                  fntRolesUsuario();
                  ftnViewUsuario();
                  ftnEditUsuario();
                });
              } else {
                swal("Atención!", objData.msg, "error");
              }
            }
          };
        }
      }
    );
  });
}
function ftnViewUsuario() {
  $(document).on("click", "#btnVerUsId", function () {
    let idpersona = this.getAttribute("us"),
      ajaxUrl = BASEURL + "Usuarios/getUsuario/" + idpersona,
      request = w.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var objData = JSON.parse(request.responseText);
        if (objData.status) {
          let estadoUsuario =
            objData.data.status == 1
              ? '<span class="badge badge-success">Activo</span>'
              : '<span class="badge badge-danger">Inactivo</span>';
          d.querySelector("#celIdentificacion").innerHTML =
            objData.data.identificacion;
          d.querySelector("#celNombre").innerHTML = objData.data.nombre;
          d.querySelector("#celApellido").innerHTML = objData.data.apellido;
          d.querySelector("#celTelefono").innerHTML = objData.data.telefono;
          d.querySelector("#celEmail").innerHTML = objData.data.email_user;
          d.querySelector("#celDni").innerHTML = objData.data.dni;
          d.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
          d.querySelector("#celEstado").innerHTML = estadoUsuario;
          d.querySelector("#celFechaRegistro").innerHTML =
            objData.data.fecharegistro;
          $("#modalViewUser").modal("show");
        } else {
          swal("Error", objData.msg, "error");
        }
      }
    };
  });
}
w.addEventListener(
  "load",
  function () {
    fntRolesUsuario();
    ftnViewUsuario();
    ftnEditUsuario();
    ftnDelUsuario();
  },
  false
);

function openModal() {
  d.querySelector("#idUsuario").value = "";
  d.querySelector(".modal-header").classList.replace(
    "headerUpdate",
    "headerRegister"
  );
  d.querySelector("#btnActionForm").classList.replace("btn-inf", "btn-primary");
  d.querySelector("#btnTextGuardar").value = "Guardar";
  d.querySelector(".titleModal").value = "Nuevo Usuario";
  d.querySelector("#formUsuario").reset();
  d.querySelector("#PasswordNew").classList.remove("yesBlock");
  d.querySelector("#PasswordPass").classList.remove("notBlock");
  d.querySelector("#PasswordNew").classList.add("notBlock");

  d.querySelector("#optionPassword").classList.add("notBlock");
  $("#modalFormUsuarios").modal("show");
}

function fntRolesUsuario() {
  let ajaxUrl = BASEURL + "Roles/getSelectRoles",
    request = w.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let listRolid = d.querySelector("#listRolid");
      listRolid.innerHTML = request.responseText;
      listRolid.value = 1;
      $("#listRolid").selectpicker("refresh");
    }
  };
}
function ftnEditUsuario() {
  $(document).on("click", "#btnEditUsID", function () {
    d.querySelector(".titleModal").innerHTML = "Actualizar usuario";
    d.querySelector(".modal-header").classList.replace(
      "headerRegister",
      "headerUpdate"
    );
    d.querySelector("#btnTextGuardar").classList.replace(
      "btn-success",
      "btn-info"
    );
    d.querySelector("#optionPassword").classList.remove("notBlock");
    d.querySelector("#PasswordNew").classList.add("notBlock");
    d.querySelector("#PasswordPass").classList.add("notBlock");
    d.querySelector("#btnTextGuardar").innerHTML = "Actualizar";
    $("#modalFormUsuarios").modal("show");
    d.querySelector("#btnpasswordOption").addEventListener("click", () => {
      d.querySelector("#PasswordNew").classList.remove("notBlock");
      d.querySelector("#PasswordPass").classList.remove("notBlock");
      d.querySelector("#optionPassword").classList.add("notBlock");
    });
    let idpersona = this.getAttribute("us"),
      ajaxUrl = BASEURL + "Usuarios/getUsuario/" + idpersona,
      request = w.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var objData = JSON.parse(request.responseText);

        if (objData.status) {
          d.querySelector("#idUsuario").value = objData.data.idpersona;
          d.querySelector("#txtIdentificacion").value =
            objData.data.identificacion;
          d.querySelector("#txtNombre").value = objData.data.nombre;
          d.querySelector("#txtApellido").value = objData.data.apellido;
          d.querySelector("#intTelefono").value = objData.data.telefono;
          d.querySelector("#txtEmail").value = objData.data.email_user;
          d.querySelector("#intDni").value = objData.data.dni;
          d.querySelector("#listRolid").value = objData.data.idrol;
          $("#listRolid").selectpicker("render");
          if (objData.data.status == 1) {
            d.querySelector("#listStatus").value = 1;
          } else {
            d.querySelector("#listStatus").value = 2;
          }
        } else {
          swal("Error", objData.data, "error");
        }
      }
    };
  });
}
