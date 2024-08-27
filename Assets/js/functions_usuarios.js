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
                {"data":"modelo"},
                {"data":"codigoruta"},
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
            let intModelo = document.querySelector('#listModelo').value;

            if(strMatricula == '' || strNombre == '' || strApellido == '' || intTipoUsuario == '' || intRuta == '' || intModelo == '')
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

                            let htmlModelo = intModelo == 1 ? 
                            'Precensial' : 
                            'Home Office';

                            let htmlStatus = intStatus == 1 ? 
                            '<span class"badge badge-success">Ativo</span>' : 
                            '<span class"badge badge-danger">Inativo</span>';

                            rowTable.cells[1].innerHTML = '<b>' + strMatricula + '</b>';
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strEmail;
                            rowTable.cells[3].textContent = intTelefono;
                            rowTable.cells[4].textContent = document.querySelector("#listRolid").selectedOptions[0].text;
                            rowTable.cells[5].innerHTML = htmlModelo;
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
    divLoading.style.display = "flex";
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

                const datacreated = objData.data.fechaRegistro;
                const fechaObj = new Date(datacreated);
                const mes = fechaObj.getMonth();
                const dia = fechaObj.getDate() + 2;
                const year = fechaObj.getFullYear();
                const fechaUTC = new Date(Date.UTC(year, mes, dia));
                const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
                const fechaFormateada = fechaUTC.toLocaleDateString('pt-BR', opciones);

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
                document.querySelector("#celModelo").innerHTML = objData.data.modelo;
                document.querySelector("#celEstado").innerHTML = estadoUsuario;
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;

                $('#modalViewUser').modal('show');
            }else{
                swal("Error", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

function fntEditUsuario(element,idpersona)
{
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Usuário";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#divListModelo').classList.replace("col-md-6", "col-md-12");
    document.querySelector('#btnText').innerHTML = "Atualizar";
    if(document.querySelector('#divListRuta')){
        document.querySelector('#divListRuta').classList.add('d-none');
    }

    divLoading.style.display = "flex";
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
                if(objData.data.telefono === 0) {
                    document.querySelector("#txtTelefono").value = '';   
                }
                document.querySelector("#txtEmail").value = objData.data.email_user;
                document.querySelector("#listRolid").value = objData.data.idrol;
                $('#listRolid').selectpicker('render');

                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');
                let htmlModelo = objData.data.modelo === "Presencial" ? 1 : 2;
                document.querySelector("#listModelo").value = htmlModelo;
                $('#listModelo').selectpicker('render');
            }
        }
        $('#modalFormUsuario').modal('show');
        divLoading.style.display = "none";
        return false;
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
    document.querySelector('#divListModelo').classList.replace("col-md-12", "col-md-6");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Usuário";
    document.querySelector("#formUsuario").reset();
	$('#modalFormUsuario').modal('show');
    if(document.querySelector('#divListRuta')){
        document.querySelector('#divListRuta').classList.remove('d-none');
    }
}
