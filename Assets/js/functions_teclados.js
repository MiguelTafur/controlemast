let tableTeclados;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaTeclados();
    fntCrearTeclado();
    fntEditStatus();
}

function fntTablaTeclados() {
    tableTeclados = $('#tableTeclados').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Teclados/getTeclados",
            "dataSrc":""
        },
        "columns":[
            {"data":"marca"},
            {"data":"codigo"},
            {"data":"lacre"},
            {"data":"status"},
            {"data":"options"}
        ],
        
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}

function fntCrearTeclado() {
    if(document.querySelector("#formTeclados")){
        let formTeclados = document.querySelector("#formTeclados");
        formTeclados.onsubmit = function(e)
        {
            e.preventDefault();
            let strMarca = document.querySelector('#txtMarca').value;
            let strCodigo = document.querySelector('#txtCodigo').value;
            let strLacre = document.querySelector('#txtLacre').value;

            if(strLacre == '' || strMarca == '')
            {
                swal("Atenção", "Os campos com asterisco (*) são obrigatórios.", "error");
                return false;
            }

            let ElementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < ElementsValid.length; i++) {
                if(ElementsValid[i].classList.contains('is-invalid')){
                    swal("Atenção!", "Verifique os campos em vermelho .", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Teclados/setTelcado';
            let formData = new FormData(formTeclados);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableTeclados.api().ajax.reload();
                        }else{
                            rowTable.cells[0].textContent = strMarca;
                            if(strCodigo === '') {
                                rowTable.cells[1].innerHTML = `<span class="font-italic">nenhum</span>`;
                            } else {
                                rowTable.cells[1].textContent = strCodigo;
                            }
                            rowTable.cells[2].innerHTML = '<span class="font-weight-bold">#' + strLacre + '</span>';

                            rowTable = "";
                        }
                        $('#modalFormTeclados').modal("hide");
                        formTeclados.reset();
                        swal("Teclado", objData.msg, "success");
                        
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

function fntEditInfo(element, idequipamento)
{
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Teclado";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";
    document.querySelector('#divEditarEstado').classList.remove('d-none');

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Teclados/getTeclado/'+idequipamento;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                let estadoActual = document.querySelector("#estadoActual");
                estadoActual.classList.add('font-weight-bold');
                document.querySelector("#formEditarEstado").classList.remove('d-none');
                document.querySelector("#noAlterado").classList.add('d-none');
                if(objData.data.status === 1) {
                    estadoActual.innerHTML = `<u>Disponível</u>`;
                    //estadoActual.classList.add('text-success');
                } else if(objData.data.status === 3) {
                    estadoActual.innerHTML = `<u>Estragado</u>`;
                    //estadoActual.classList.add('text-danger');
                } else if(objData.data.status === 4){
                    estadoActual.innerHTML = `<u>Concerto</u>`;
                    //estadoActual.classList.add('text-warning');
                } else {
                    estadoActual.textContent = `Em uso`;
                    estadoActual.classList.add('text-info');
                    document.querySelector("#noAlterado").classList.remove('d-none');
                    document.querySelector("#formEditarEstado").classList.add('d-none');
                    document.querySelector("#noAlterado").innerHTML = `<p class="text-uppercase text-center m-0 text-secondary font-weight-bold">Equipamento não pode ser alterado</p>`
                }

                
                
                document.querySelector("#idEquipamento").value = objData.data.idequipamento;
                if(document.querySelector("#idEquipamentoEstado")) {
                    document.querySelector("#idEquipamentoEstado").value = objData.data.idequipamento;
                }
                document.querySelector("#txtMarca").value = objData.data.marca;
                document.querySelector("#txtCodigo").value = objData.data.codigo;
                document.querySelector("#txtLacre").value = objData.data.lacre;
            }
        }
        $('#modalFormTeclados').modal('show');
    }
}

function fntEditStatus() {
    if(document.querySelector("#formEditarEstado")){
        let formEditarEstado = document.querySelector("#formEditarEstado");
        
        formEditarEstado.onsubmit = function(e)
        {
            e.preventDefault();
            let listEstado = document.querySelector('#listEstado').value;

            if(listEstado === '')
            {
                swal("Atenção", "Esolha o Tipo de Estado.", "error");
                return false;
            }

            //divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Teclados/setEstadoTeclado';
            let formData = new FormData(formEditarEstado);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableEquipamentos.api().ajax.reload();
                        }else{
                            if(objData.estado === 1) {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-success">Disponível</span></h5>`;
                            } else if(objData.estado === 3) {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-danger">Estragado</span></h5>`;
                            } else {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-warning">Concerto</span></h5>`;
                            }

                            rowTable = "";
                        }
                        $('#modalEditStatus').modal('hide');
                        $('#modalFormTeclados').modal("hide");
                        formTeclados.reset();
                        swal("Estado", objData.msg, "success");
                        
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

function fntViewInfo(idequipamento)
{
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Teclados/getTeclado/'+idequipamento;
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

                document.querySelector("#celMarca").innerHTML = objData.data.marca;
                if(objData.data.codigo) {
                    document.querySelector("#celCodigo").innerHTML = objData.data.codigo;
                } else {
                    document.querySelector("#celCodigo").innerHTML = '<span class="font-italic">nenhum<span/>';
                }

                if(objData.data.lacre) {
                    document.querySelector("#celLacre").innerHTML = '#' + objData.data.lacre;
                } else {
                    document.querySelector("#celLacre").innerHTML = '<span class="font-italic">nenhum<span/>';
                }
                
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;
                switch (objData.data.status) {
                    case 1:
                        document.querySelector("#celEstado").innerHTML = '<pan class="text-uppercase text-success">Disponível</span>';    
                        break;
                    case 3:
                        document.querySelector("#celEstado").innerHTML = '<pan class="text-uppercase text-danger">Estragado</span>';    
                        break;
                    case 4:
                        document.querySelector("#celEstado").innerHTML = '<pan class="text-uppercase text-warning">Concerto</span>';    
                        break;
                    default:
                        document.querySelector("#celEstado").innerHTML = '<pan class="text-uppercase text-info">Em Uso</span>';    
                        break;
                }

                $('#modalViewTeclado').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
    }
}

function openModalEditStatus() {

    $('#listEstado').select2({
        placeholder: " -- Escolher o Tipo de Estado -- ",
        allowClear: true,
        width: 'resolve',
        theme: "classic"
    });

    $('#modalEditStatus').modal('show');
    $('#modalEditStatus').addClass('myModal');
}


function openModal()
{
    rowTable = "";  
    document.querySelector('#idEquipamento').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Teclado";
    document.querySelector("#formTeclados").reset();
    document.querySelector('#divEditarEstado').classList.add('d-none');
    $('#modalFormTeclados').modal('show');
}