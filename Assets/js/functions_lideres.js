let tableLideres;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaLideres();
    fntCrearLideres();
}

function fntTablaLideres() {
    tableLideres = $('#tableLideres').dataTable( 
        {
            "aProcessing":true,
            "aServerSide":true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "ajax":{
                "url": " "+base_url+"/Lideres/getLideres",
                "dataSrc":""
            },
            "columns":[
                {"data":"matricula"},
                {"data":"nombres"},
                {"data":"apellidos"},
                {"data":"options"}
            ],
            
            "resonsieve":"true",
            "bDestroy": true,
            "iDisplayLength": 20,
            "order":[[0,"desc"]]  
        });
}

function fntCrearLideres() {
    if(document.querySelector("#formCliente")){
        let formCliente = document.querySelector("#formCliente");
        formCliente.onsubmit = function(e)
        {
            e.preventDefault();
            let strMatricula = document.querySelector('#txtMatricula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtSobrenome').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let strEmail = document.querySelector('#txtEmail').value;

            if(strMatricula == '' || strNombre == '' || strApellido == '')
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
            let ajaxUrl = base_url + '/Lideres/setLider';
            let formData = new FormData(formCliente);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableLideres.api().ajax.reload();
                        }else{
                            rowTable.cells[0].textContent = strMatricula;
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = strApellido;

                            rowTable = "";
                        }
                        $('#modalFormCliente').modal("hide");
                        formCliente.reset();
                        swal("Líderes", objData.msg, "success");
                        
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

function fntViewInfo(idpersona)
{
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Lideres/getLider/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                const datacreated = objData.data.fechaRegistro;
                const fechaObj = new Date(datacreated);
                const mes = fechaObj.getMonth();
                const dia = fechaObj.getDate() + 2;
                const year = fechaObj.getFullYear();
                const fechaUTC = new Date(Date.UTC(year, mes, dia));
                const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
                const fechaFormateada = fechaUTC.toLocaleDateString('pt-BR', opciones);

                document.querySelector("#celMatricula").innerHTML = objData.data.matricula;
                document.querySelector("#celNombres").innerHTML = objData.data.nombres;
                document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
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
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;

                $('#modalViewCliente').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
    }
}

function fntEditInfo(element, idpersona)
{
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Líder";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Lideres/getLider/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.idpersona;
                document.querySelector("#txtMatricula").value = objData.data.matricula;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtSobrenome").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_user;
            }
                
        }
        $('#modalFormCliente').modal('show');
    }
}

function fntDelInfo(idpersona)
{
    swal({
        title: "Remover Líder",
        text: "¿Realmente quer Remover o Líder?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, Remover!",
        cancelButtonText: "Não, Cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Lideres/delLider';
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
                        tableLideres.api().ajax.reload();
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
    document.querySelector('#titleModal').innerHTML = "Novo Líder";
    document.querySelector("#formCliente").reset();
    $('#modalFormCliente').modal('show');
}