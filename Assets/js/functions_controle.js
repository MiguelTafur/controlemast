let tableControle;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaControles();
    fntCrearControle();
    fntEquipamentos();
}

function fntTablaControles() {
    tableControle = $('#tableControle').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Controle/getControles",
            "dataSrc":""
        },
        "columns":[
            {"data":"matricula"},
            {"data":"nombres"},
            {"data":"equipamento"},
            {"data":"protocolo"},
            {"data":"fechaRegistro"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}

function fntCrearControle() {
    if(document.querySelector("#formControles")){
        let formControles = document.querySelector("#formControles");
        formControles.onsubmit = function(e)
        {
            e.preventDefault();
            let listUsuario = document.querySelector('#listUsuario').value;
            let listEquipamento = document.querySelector('#listEquipamento').value;
            let listEstado = document.querySelector('#listEstadoEquipamento').value;
            let strProtocolo = document.querySelector('#fileProtocolo').value;
            let strObservacion = document.querySelector('#txtObservacion').value;

            if(listUsuario == '' || listEquipamento == '' || listEstado == '')
            {
                swal("Atenção", 'Os campos com asterisco (<span class="required">*</span>) são obrigatórios.', "error");
                return false;
            }

            let ElementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < ElementsValid.length; i++) {
                if(ElementsValid[i].classList.contains('is-invalid')){
                    swal("Atenção!", 'Os campos com asterisco (<span class="required">*</span>) são obrigatórios.', "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Controle/setControle';
            let formData = new FormData(formControles);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        // if(rowTable == ""){
                            tableEquipamentos.api().ajax.reload();
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
                        $('#modalFormControles').modal("hide");
                        formControles.reset();
                        swal("Controle", objData.msg, "success");
                        
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

function fntEquipamentos()
{
    if(document.querySelector('#listEquipamento')){
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Controle/getEquipamentos';
        request.open("POST",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listEquipamento').innerHTML = request.responseText;
                $('#listEquipamento').select2({
                    placeholder: '-- Escolher --'
                });
            }
        }
    }
}

function openModal()
{
    rowTable = "";  
    document.querySelector('#idControle').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Novo Controle";
    document.querySelector("#formControles").reset();
    $('#modalFormControles').modal('show');
}