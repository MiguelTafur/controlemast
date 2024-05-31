let tableRutas;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    tablaRutas();
    formularioRutas();
}

function tablaRutas() {
    tableRutas = $('#tableRutas').dataTable( 
        {
            "aProcessing":true,
            "aServerSide":true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "ajax":{
                "url": " "+base_url+"/Rutas/getRutas",
                "dataSrc":""
            },
            "columns":[
                {"data":"nombre"},
                {"data":"codigo"},
                {"data":"datecreated"},
                {"data":"options"}
            ],
            
            "resonsieve":"true",
            "bDestroy": true,
            "iDisplayLength": 20,
            "order":[[2,"DESC"]]  
        });
}

function formularioRutas() {
    if(document.querySelector("#formRuta")){
        let formRuta = document.querySelector("#formRuta");
        formRuta.onsubmit = function(e)
        {
            e.preventDefault();
            let strNombre = document.querySelector('#txtNombre').value;
            let codigoRuta = document.querySelector('#codigoRuta').value;

            if(strNombre == '' || codigoRuta == '')
            {
                swal("Atenção", "Digite seu Nome.", "error");
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
            let ajaxUrl = base_url + '/Rutas/setRutas';
            let formData = new FormData(formRuta);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableRutas.api().ajax.reload();
                        }else{
                            rowTable.cells[0].textContent = strNombre;
                            rowTable.cells[1].textContent = codigoRuta;
                            rowTable = "";
                        }
                        //tableRutas.api().ajax.reload();
                        $('#modalFormRutas').modal("hide");
                        formRuta.reset();
                        swal("Ruta", objData.msg, "success");
                        
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

function fntEditInfo(element, idRuta)
{
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Emrpesa";
    document.querySelector('#btnText').innerHTML = "Atualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Rutas/getRuta/'+idRuta;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idRuta").value = objData.data.idruta;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#codigoRuta").value = objData.data.codigo;
            }
                
        }
        $('#modalFormRutas').modal('show');
    }
}

function fntDelInfo(idruta)
{
    swal({
        title: "Remover Empresa",
        text: "¿Realmente quer remover a empresa?",
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
            let ajaxUrl = base_url+'/Rutas/delRuta';
            let strData = "idRuta="+idruta;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Remover!", objData.msg , "success");
                        tableRutas.api().ajax.reload();
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
    document.querySelector('#idRuta').value ="";
    document.querySelector('#btnText').innerHTML ="Salvar";
    document.querySelector('#titleModal').innerHTML = "Nova Empresa";
    document.querySelector("#formRuta").reset();
    $('#modalFormRutas').modal('show');
}