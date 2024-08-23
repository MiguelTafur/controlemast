let tableCoordinadores;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

$('.date-picker').datepicker( {
    closeText: 'Fechar',
    prevText: '<Ant',
    nextText: 'Seg>',
    currentText: 'Hoje',
    monthNames: ['1 -', '2 -', '3 -', '4 -', '5 -', '6 -', '7 -', '8 -', '9 -', '10 -', '11 -', '12 -'],
    monthNamesShort: ['Janeiro','Fevereiro','Março','Abril', 'Maio','Junho','Julho','Agosto','Setembro', 'Outubro','Novembro','Dezembro'],
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    showDays: false,
    onClose: function(dateText, inst) {
        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
});

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaCoordinadores();
    fntCrearCoordinadores();
}

function fntTablaCoordinadores() {
    tableCoordinadores = $('#tableCoordinadores').dataTable( 
    {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Coordinadores/getCoordinadores",
            "dataSrc":""
        },
        "columns":[
            {"data":"matricula"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"modelo"},
            {"data":"options"}
        ],
        
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}

function fntCrearCoordinadores() {
    if(document.querySelector("#formCoordinador")){
        let formCoordinador = document.querySelector("#formCoordinador");
        formCoordinador.onsubmit = function(e)
        {
            e.preventDefault();
            let strMatricula = document.querySelector('#txtMatricula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtSobrenome').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let intModelo = document.querySelector('#listModelo').value;

            if(strMatricula == '' || strNombre == '' || strApellido == '' || intModelo == '')
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
            let ajaxUrl = base_url + '/Coordinadores/setCoordinador';
            let formData = new FormData(formCoordinador);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantCoordenadores").textContent = objData.cantCoordenadores;

                        if(rowTable == ""){
                            tableCoordinadores.api().ajax.reload();
                        }else{
                            htmlModelo = intModelo == 1 ? 
                            'Presencial' : 
                            'Home Office';
                            rowTable.cells[0].innerHTML = '<b>' + strMatricula + '</b>';
                            rowTable.cells[1].textContent = strNombre.toUpperCase();
                            rowTable.cells[2].textContent = strApellido.toUpperCase();
                            rowTable.cells[3].innerHTML = htmlModelo;

                            rowTable = "";
                        }
                        $('#modalFormCoordinador').modal("hide");
                        formCoordinador.reset();
                        swal("Coordinador", objData.msg, "success");
                        
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

function fntEditInfo(element, idpersona)
{
    divLoading.style.display = "flex";
        
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Atualizar Coordinador";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Coordinadores/getCoordinador/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {

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
                let htmlModelo = objData.data.modelo === "Presencial" ? 1 : 2;
                document.querySelector("#listModelo").value = htmlModelo;
                $('#listModelo').selectpicker('render');
            }
                
        }
        divLoading.style.display = "none";
        return false;
        $('#modalFormCoordinador').modal('show');
    }
}

function fntViewInfo(idpersona)
{
    divLoading.style.display = "flex";
        
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Coordinadores/getCoordinador/'+idpersona;
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
                document.querySelector("#celModelo").innerHTML = objData.data.modelo;
                document.querySelector("#celFechaRegistro").innerHTML = fechaFormateada;

                $('#modalViewCoordinador').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

function fntDelInfo(idpersona)
{
    swal({
        title: "Remover Coordinador",
        text: "¿Realmente quer Remover o Coordinador?",
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
            let ajaxUrl = base_url+'/Coordinadores/delCoordinador';
            let strData = "idUsuario="+idpersona;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantCoordenadores").textContent = objData.cantCoordenadores;
                        swal("Remover!", objData.msg , "success");
                        tableCoordinadores.api().ajax.reload();
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
    document.querySelector('#titleModal').innerHTML = "Novo Coordinador";
    document.querySelector("#formCoordinador").reset();
    $('#modalFormCoordinador').modal('show');
}

/*** GRÁFICAS ***/

//Buscador gráfica mensual
function fntSearchCoordenadoresMes()
{
    let fecha = document.querySelector(".coordenadoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Coordinadores/coordenadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesCoordenadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchCoordenadoresAnio()
{
    let anio = document.querySelector(".coordenadoresAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Coordinadores/coordenadoresAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioCoordenadores").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}
//Infoamrción de la gráfica
function fntInfoChartPersona(fecha) 
{
    let date = fecha.join("-")
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Coordinadores/getDatosGraficaPersona';
    let  formData = new FormData();
    formData.append('fecha', date);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
            if(request.status == 200)
            {
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    let tdAnotaciones = objData.data;
                    let fecha = objData.fecha;
                    
                    document.querySelector("#listgraficaPersona").innerHTML = tdAnotaciones;
                    document.querySelector("#datePersonaGrafica").textContent = fecha;
                    $('#modalViewPersonaGrafica').modal('show');
                } else {
                    swal("Coordenador", objData.msg, "warning");
                }
            }
            divLoading.style.display = "none";
            return false;
    }
}