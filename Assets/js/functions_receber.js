let tableReceber;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaReceber();
    fntCrearControleReceber();
    fntUsuarios();
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
            {"data":"matricula"},
            {"data":"nombres"},
            {"data":"equipamento"},
            {"data":"status"},
            {"data":"fechaRegistro"},
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
                        // if(rowTable == ""){
                            tableReceber.api().ajax.reload();
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
                listUsuarios.innerHTML = request.responseText;
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
            let nombre = objData.data.nombre;
            let lacre = objData.data.lacre;

            let equipamento = document.querySelector('#txtEquipamento');
            let idequipamento = document.querySelector('#idequipamentoReceber');
            idequipamento.value = id;
            equipamento.value = nombre + ': #' + lacre;
        }
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
    $('#modalFormControleReceber').modal('show');
}
