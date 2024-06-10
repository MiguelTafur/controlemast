let tableEntregue;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaControles();
    fntCrearControleEntrega();
    fntActualizarProtocolo();
}

// Tabela dos controles
function fntTablaControles() {
    tableEntregue = $('#tableEntregue').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Entregar/getEntregues",
            "dataSrc":""
        },
        "columns":[
            {"data":"fechaRegistro"},
            {"data":"status"},
            {"data":"equipamento"},
            {"data":"matricula"},
            {"data":"nombres"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}

// função para criar o controle de entrega
function fntCrearControleEntrega() {
    if(document.querySelector("#formControleEntrega")){
        let formControleEntrega = document.querySelector("#formControleEntrega");
        formControleEntrega.onsubmit = function(e)
        {
            e.preventDefault();
            let listUsuario = document.querySelector('#listUsuario').value;
            let listEquipamento = document.querySelector('#listEquipamento').value;
            let strObservacion = document.querySelector('#txtObservacion').value;

            if(listUsuario == '' || listEquipamento == '')
            {
                swal("Atenção", 'Os campos com asterisco (*) são obrigatórios.', "error");
                return false;
            }

            let ElementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < ElementsValid.length; i++) {
                if(ElementsValid[i].classList.contains('is-invalid')){
                    swal("Atenção!", 'Verifique os campos em vermelho.', "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Entregar/setControleEntrega';
            let formData = new FormData(formControleEntrega);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        // if(rowTable == ""){
                            tableEntregue.api().ajax.reload();
                        // }else{
                        //     rowTable.cells[0].textContent = strNombre;
                        //     rowTable.cells[1].textContent = strMarca;
                        //     if(strCodigo === '') {
                        //         rowTable.cells[2].innerHTML = `<span class="font-italic">nenhum</span>`;
                        //     } else {
                        //         rowTable.cells[2].textContent = strCodigo;
                        //     }
                        //     if(strLacre === '') {
                        //         rowTable.cells[3].innerHTML = `<span class="font-italic">nenhum</span>`;
                        //     } else {
                        //         rowTable.cells[3].textContent = strLacre;
                        //     }

                        //     rowTable = "";
                        // }
                        $('#modalFormControleEntrega').modal("hide");
                        formControleEntrega.reset();
                        swal("Entrega", objData.msg, "success");
                        
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

function fntActualizarProtocolo() {
    if(document.querySelector("#formEditarProtocolo")) {
        let formEditarProtocolo = document.querySelector("#formEditarProtocolo");
        formEditarProtocolo.onsubmit = function(e) {
            e.preventDefault();
            let protocolo = document.querySelector('#fileEditProtocolo').value;
            if(protocolo == '')
            {
                swal("Atenção", 'Seleciona um arquivo.', "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Entregar/setUpdateProtocolo';
            let formData = new FormData(formEditarProtocolo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        tableEntregue.api().ajax.reload();

                        $('#modalEditProtocolo').modal("hide");
                        formEditarProtocolo.reset();
                        swal("Protocolo", objData.msg, "success");
                        
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

// funcion que trae los Usuarios a entregar equipamento
function fntUsuarios()
{
    if(document.querySelector('#listUsuario')){
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Entregar/getUsuarios';
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listUsuario').innerHTML = request.responseText;
                $('#listUsuario').select2({
                    placeholder: " -- Escolher Usuário -- ",
                    allowClear: true,
                    width: 'resolve',
                    theme: "classic"
                });
                
            }
        }
    }
}

// funcion que trae los equipamentos en estoque
function fntEquipamentos()
{
    if(document.querySelector('#listEquipamento')){
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Entregar/getEquipamentos';
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listEquipamento').innerHTML = request.responseText;
                $('#listEquipamento').select2({
                    placeholder: " -- Escolher Equipamento -- ",
                    allowClear: true,
                    width: 'resolve',
                    theme: "classic"
                });
                
            }
        }
    }
}

// funcion para ver los detalles del control de la entrega
function fntViewInfo(identrega)
{
    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Entregar/getEntrega/'+identrega;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                const datacreated = objData.data.datecreated;
                const fechaObj = new Date(datacreated);
                const mes = fechaObj.getMonth();
                const dia = fechaObj.getDate() + 1;
                const year = fechaObj.getFullYear();
                const fechaUTC = new Date(Date.UTC(year, mes, dia));
                const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
                const fechaFormateada = fechaUTC.toLocaleDateString('pt-BR', opciones);

                const nombres = objData.data.nombres;
                const apellidos = objData.data.apellidos;

                document.querySelector("#celMatricula").innerHTML = objData.data.matricula;
                document.querySelector("#celNombres").innerHTML = nombres.toUpperCase();
                document.querySelector("#celApellidos").innerHTML = apellidos.toUpperCase();
                document.querySelector("#celEquipamento").innerHTML = objData.data.equipamento;
                document.querySelector("#celMarca").innerHTML = objData.data.marca;
                document.querySelector("#celLacre").innerHTML = '#' + objData.data.lacre;
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;
                document.querySelector("#celObservacion").innerHTML = objData.data.observacion;

                $('#modalViewControleEntrega').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

function fntEditProtocolo(identrega) {

    document.querySelector("#fileEditProtocolo").value = "";

    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Entregar/getEntrega/'+identrega;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idControle").value = objData.data.idcontrole;
                let imagen = base_url + '/Assets/images/imagenes/' + objData.data.protocolo;
                document.querySelector("#protocoloActual").setAttribute('target', '_blank');   
                document.querySelector("#protocoloActual").setAttribute('href', imagen);   
            }
        }
        divLoading.style.display = "none";
        return false;
    }

    $('#modalEditProtocolo').modal('show');
}

// funcion para eliminar el control de la entrega
function fntDelInfo(identrega, idequipamento)
{
    swal({
        title: "Remover Entrega",
        text: "¿Realmente quer remover o controle de entrega?",
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
            let ajaxUrl = base_url+'/Entregar/delEntrega';

            let strData = "idEntrega=" + identrega + "&idEquipamento=" + idequipamento;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Remover!", objData.msg , "success");
                        tableEntregue.api().ajax.reload();
                    }else{
                        swal("Atenção!", objData.msg , "error");
                    }
                }
            }
        }
    });
}

function openModalEntregue()
{
    rowTable = "";  
    document.querySelector('#idControleEntregue').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Controle de Entrega";
    document.querySelector("#formControleEntrega").reset();
    fntEquipamentos();
    fntUsuarios();
    $('#modalFormControleEntrega').modal('show');
}