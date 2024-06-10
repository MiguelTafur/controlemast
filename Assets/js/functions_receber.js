let tableReceber;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaReceber();
    fntCrearControleReceber();
}

//Tabela dos recebimentos
function fntTablaReceber() {
    tableReceber = $('#tableReceber').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "dn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Receber/getRecebidos",
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

// função para criar o controle de recebimento
function fntCrearControleReceber() {
    if(document.querySelector("#formControleReceber")){
        let formControleReceber = document.querySelector("#formControleReceber");
        formControleReceber.onsubmit = function(e)
        {
            e.preventDefault();
            let listUsuario = document.querySelector('#listUsuario').value;
            let txtEquipamento = document.querySelector('#txtEquipamento').value;
            let listAcao = document.querySelector('#listAcao').value;
            let strObservacion = document.querySelector('#txtObservacion').value;

            if(listUsuario == '' || txtEquipamento == '' || listAcao == '' || strObservacion == '')
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
            let ajaxUrl = base_url + '/Receber/setControleReceber';
            let formData = new FormData(formControleReceber);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        tableReceber.api().ajax.reload();

                        $('#modalFormControleReceber').modal("hide");
                        formControleReceber.reset();
                        
                        swal("Recebimento", objData.msg, "success");
                        
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
        const listUsuarios = document.querySelector('#listUsuario');

        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Receber/getUsuarios';
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listUsuario').innerHTML = request.responseText;
                $('#listUsuario').select2({
                    placeholder: " -- Escolher Usuário -- ",
                    width: 'resolve',
                    theme: "classic"
                });
            }
        }
        fntIdUsuario();
    }
}

function fntIdUsuario() {
    $('#listUsuario').on("change", function (e) {
        const idUsuario = e.target.value;
        fntEquipamento(idUsuario);
    });
}

function fntEquipamento(idusuario) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Receber/getEquipamento';
    let strData = "idUsuario=" + idusuario;
    request.open("POST",ajaxUrl,true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            let id = objData.data.idequipamento;
            let nombre = objData.data.tipo;
            let lacre = objData.data.lacre;

            let equipamento = document.querySelector('#txtEquipamento');
            let idequipamento = document.querySelector('#idequipamentoReceber');
            idequipamento.value = id;
            equipamento.value = nombre + ': #' + lacre;
        }
    }
}

// funcion para ver los detalles del control del Recebimiento
function fntViewInfo(idrecebido)
{
    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Receber/getRecebido/'+idrecebido;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                //Fecha actual completa 
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

                document.querySelector("#celAcao").innerHTML = objData.data.status;
                document.querySelector("#celMatricula").innerHTML = objData.data.matricula;
                document.querySelector("#celNombres").innerHTML = nombres.toUpperCase();
                document.querySelector("#celApellidos").innerHTML = apellidos.toUpperCase();
                document.querySelector("#celMarca").innerHTML = objData.data.marca;
                document.querySelector("#celLacre").innerHTML = '#' + objData.data.lacre;
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;
                document.querySelector("#celObservacion").innerHTML = objData.data.observacion;

                $('#modalViewControleReceber').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

function openModalReceber()
{
    rowTable = "";  
    document.querySelector('#idControleReceber').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Controle de Recebimento";
    document.querySelector("#formControleReceber").reset();
    $('#listAcao').select2({
        placeholder: " -- Escolher Ação -- ",
        allowClear: true,
        width: 'resolve',
        theme: "classic"
    });
    fntUsuarios();
    $('#modalFormControleReceber').modal('show');
}
