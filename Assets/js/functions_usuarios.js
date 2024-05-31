let tableUsuarios;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function()
{
    iniciarApp();
});

function iniciarApp()
{
    tablaUsuarios();
    fntCrearUsuario();
    fntActualizarPerfil();
    fntActualizarDatosFiscales();
    fntRutasUsuario();
    fntRolesUsuario(); 
}
function tablaUsuarios() {
    tableUsuarios = $('#tableUsuarios').dataTable( 
        {
            "aProcessing":true,
            "aServerSide":true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "ajax":{
                "url": " "+base_url+"/Usuarios/getUsuarios",
                "dataSrc":""
            },
            "columns":[
                {"data":"matricula"},
                {"data":"nombres"},
                {"data":"email_user"},
                {"data":"telefono"},
                {"data":"nombrerol"},
                {"data":"status"},
                {"data":"options"}
            ],
            "resonsieve":"true",
            "bDestroy": true,
            "iDisplayLength": 10,
            "order":[[0,"desc"]]  
        });
}

function fntCrearUsuario() {
    //NUEVO USUARIO
    if(document.querySelector("#formUsuario")){
        let formUsuario = document.querySelector("#formUsuario");
        formUsuario.onsubmit = function(e)
        {
            e.preventDefault();
            let strMatricula = document.querySelector('#txtMatricula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtApellido').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let intTipoUsuario = document.querySelector('#listRolid').value;
            let intStatus = document.querySelector('#listStatus').value;
            let intRuta = document.querySelector('#listRuta').value;

            if(strMatricula == '' || strNombre == '' || strApellido == '' || intTipoUsuario == '' || intRuta == '')
            {
                swal("Atenção", 'Os campos com asterisco (*) são obrigatórios.', "error");
                return false;
            }

            let ElementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < ElementsValid.length; i++) {
                if(ElementsValid[i].classList.contains('is-invalid')){
                    swal("Atenção!", "Por favor verifique os campos em vermelho.", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/setUsuario';
            let formData = new FormData(formUsuario);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableUsuarios.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ? 
                            '<span class"badge badge-success">Ativo</span>' : 
                            '<span class"badge badge-danger">Inativo</span>';
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strApellido;
                            rowTable.cells[3].textContent = strEmail;
                            rowTable.cells[4].textContent = intTelefono;
                            rowTable.cells[5].textContent = document.querySelector("#listRolid").selectedOptions[0].text;
                            rowTable.cells[6].innerHTML = htmlStatus;
                            tableUsuarios.api().ajax.reload();
                        }
                        $('#modalFormUsuario').modal("hide");
                        formUsuario.reset();
                        swal("Usuários", objData.msg, "success");
                        
                    }else{
                        swal("Erro", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

function fntActualizarPerfil() {
    //Actualizar perfil
    if(document.querySelector("#formPerfil")){
        let formPerfil = document.querySelector("#formPerfil");
        formPerfil.onsubmit = function(e)
        {
            e.preventDefault();
            let strMatricula = document.querySelector('#txtMatricula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtApellido').value;
            let intTelefono = document.querySelector('#txtTelefono').value;

            if(strMatricula == '' || strNombre == '' || strApellido == '' || intTelefono == '')
            {
                swal("Atenção", "Todos os campos são obrigatórios.", "error");
                return false;
            }

            let ElementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < ElementsValid.length; i++) {
                if(ElementsValid[i].classList.contains('is-invalid')){
                    swal("Atenção!", "Por favor verifique os campos em vermelho.", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/putPerfil';
            let formData = new FormData(formPerfil);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4) return;
                if(request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);                
                    if(objData.status){
                        $('#modalFormPerfil').modal('hide');
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "Aceitar",
                            closeOnConfirm: false,
                        }, function(isConfirm){
                            if(isConfirm){
                                location.reload();
                            }
                        });
                    }else{
                        swal("Erro", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

function fntActualizarDatosFiscales() {
    //Actualizar Datos Fiscales
    if(document.querySelector("#formDataFiscal")){
        let formDataFiscal = document.querySelector("#formDataFiscal");
        formDataFiscal.onsubmit = function(e)
        {
            e.preventDefault();
            let strNit = document.querySelector('#txtNit').value;
            let strNombreFiscal = document.querySelector('#txtNombreFiscal').value;
            let strDirFiscal = document.querySelector('#txtDirFiscal').value;

            if(strNit == '' || strNombreFiscal == '' || strDirFiscal == '')
            {
                swal("Atenção", "Todos os campos são obrigatórios.", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Usuarios/putDFiscal';
            let formData = new FormData(formDataFiscal);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4) return;
                if(request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);                
                    if(objData.status){
                        $('#modalFormPerfil').modal('hide');
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "Aceitar",
                            closeOnConfirm: false,
                        }, function(isConfirm){
                            if(isConfirm){
                                location.reload();
                            }
                        });
                    }else{
                        swal("Erro", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

function fntRutasUsuario()
{
    if(document.querySelector('#listRuta')){
        let ajaxUrl = base_url + '/Usuarios/getRutas';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listRuta').innerHTML = request.responseText;
                $('#listRuta').selectpicker('render');
            }
        }
    }
}

function fntRolesUsuario()
{
    if(document.querySelector('#listRolid')){
        let ajaxUrl = base_url + '/Roles/getSelectRoles';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listRolid').innerHTML = request.responseText;
                $('#listRolid').selectpicker('render');
            }
        }
    }
}

function fntViewUsuario(idpersona)
{
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Usuarios/getUsuario/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let estadoUsuario  = objData.data.status == 1 ? 
                '<span class="badge badge-success">Ativo</span>' : 
                '<span class="badge badge-danger">Inativo</span>';

                document.querySelector("#celNombres").innerHTML = objData.data.nombres;
                document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
                document.querySelector("#celMatricula").innerHTML = objData.data.matricula;
                if(objData.data.telefono) {
                    document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                } else {
                    document.querySelector("#celTelefono").innerHTML = '<span class="font-italic">nenhum<span/>';
                }

                if(objData.data.email_user) {
                    document.querySelector("#celEmail").innerHTML = objData.data.email_user;
                } else {
                    document.querySelector("#celEmail").innerHTML = '<span class="font-italic">nenhum<span/>';
                }
                document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;

                $('#modalViewUser').modal('show');
            }else{
                swal("Error", objData.msg, "error");
            }
        }
    }
}

function fntEditUsuario(element,idpersona)
{
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Usuário";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";
    if(document.querySelector('#divListRuta')){
        document.querySelector('#divListRuta').classList.add('d-none');
    }


    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Usuarios/getUsuario/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {

        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.idpersona;
                document.querySelector("#txtMatricula").value = objData.data.matricula;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellido").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_user;
                document.querySelector("#listRolid").value = objData.data.idrol;
                $('#listRolid').selectpicker('render');

                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');
            }
        }

        $('#modalFormUsuario').modal('show');
    }
}

function fntDelUsuario(idpersona)
{
    swal({
        title: "Remover Usuário",
        text: "¿Realmente quer remover o Usuário?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, Remover!",
        cancelButtonText: "Não, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuarios/delUsuario';
            let strData = "idUsuario="+idpersona;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Remover!", objData.msg , "success");
                        tableUsuarios.api().ajax.reload();
                    }else{
                        swal("Atenção!", objData.msg , "error");
                    }
                }
            }
        }
    });
}

function openModal()
{
    rowTable = "";
    document.querySelector('#idUsuario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Usuário";
    document.querySelector("#formUsuario").reset();
	$('#modalFormUsuario').modal('show');
    if(document.querySelector('#divListRuta')){
        document.querySelector('#divListRuta').classList.remove('d-none');
    }
}

function openModalPerfil(){
    $('#modalFormPerfil').modal('show');
}
