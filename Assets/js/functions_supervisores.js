let tableSupervisores;
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
    fntTablaSupervisores();
    fntCrearSupervisores();
}

function fntTablaSupervisores() {
    tableSupervisores = $('#tableSupervisores').dataTable( 
    {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Supervisores/getSupervisores",
            "dataSrc":""
        },
        "dom": 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3] 
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3] 
                } 
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3] 
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3] 
                }
            }
        ],
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

function fntCrearSupervisores() {
    if(document.querySelector("#formSupervisor")){
        let formSupervisor = document.querySelector("#formSupervisor");
        formSupervisor.onsubmit = function(e)
        {
            e.preventDefault();
            let strMatricula = document.querySelector('#txtMatricula').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtSobrenome').value;
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
            let ajaxUrl = base_url + '/Supervisores/setSupervisor';
            let formData = new FormData(formSupervisor);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantSupervisores").textContent = objData.cantSupervisores;

                        let mes = objData.infoGrafica.numeroMes;
                        let ano = objData.infoGrafica.anio;

                        let fecha = [mes, ano].join("-");

                        fntInfoGrafica(fecha);

                        if(rowTable == ""){
                            tableSupervisores.api().ajax.reload();
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
                        $('#modalFormSupervisor').modal("hide");
                        formSupervisor.reset();
                        swal("Supervisor", objData.msg, "success");
                        
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
    rowTable = element.parentNode.parentNode.parentNode;
    divLoading.style.display = "flex";
    document.querySelector('#titleModal').innerHTML = "Atualizar Supervisor";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Supervisores/getSupervisor/'+idpersona;
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
                if(objData.data.telefono === 0) {
                    document.querySelector("#txtTelefono").value = '';    
                }
                document.querySelector("#txtEmail").value = objData.data.email_user;
                let htmlModelo = objData.data.modelo === "Presencial" ? 1 : 2;
                document.querySelector("#listModelo").value = htmlModelo;
                $('#listModelo').selectpicker('render');
            }
                
        }
        $('#modalFormSupervisor').modal('show');
        divLoading.style.display = "none";
        return false;
    }
}

function fntViewInfo(idpersona)
{
    divLoading.style.display = "flex";
    
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Supervisores/getSupervisor/'+idpersona;
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

                $('#modalViewSupervisor').modal('show');
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
        title: "Remover Supervisor",
        text: "¿Realmente deseja Remover o Supervisor?",
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
            let ajaxUrl = base_url+'/Supervisores/delSupervisor';
            let strData = "idUsuario="+idpersona;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantSupervisores").textContent = objData.cantSupervisores;
                        swal("Remover!", objData.msg , "success");
                        tableSupervisores.api().ajax.reload();
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
    document.querySelector('#titleModal').innerHTML = "Novo Supervisor";
    document.querySelector("#formSupervisor").reset();
    $('#modalFormSupervisor').modal('show');
}

/*** GRÁFICAS ***/

//Buscador gráfica mensual
function fntSearchSupervisoresMes()
{
    let fecha = document.querySelector(".supervisoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Supervisores/supervisoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesSupervisores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchSupervisoresAnio()
{
    let anio = document.querySelector(".supervisoresAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Supervisores/supervisoresAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioSupervisores").html(request.responseText);
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
    let  ajaxUrl = base_url+'/Supervisores/getDatosGraficaPersona';
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
                    swal("Supervisor(a)", objData.msg, "warning");
                }
            }
            divLoading.style.display = "none";
            return false;
    }
}

function fntInfoGrafica(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Supervisores/supervisorMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesSupervisor").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}