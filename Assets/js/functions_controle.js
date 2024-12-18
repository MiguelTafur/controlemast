let tableEntregue;
let tableEntregueComputadores;
let tableEntregueTelas;
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
    fntTablaControles();
    fntTablaControlesComputadores();
    fntTablaControlesTelas();
    fntCrearControleEntrega();
    fntActualizarProtocolo();
}

// Tabela dos controles de los fones
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
        "dom": 'lBfrtip',
        'buttons': 
        [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions": { 
                    "columns": [ 0, 2, 3, 4] 
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 2, 3, 4] 
                } 
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 2, 3, 4] 
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                "exportOptions": { 
                    "columns": [ 0, 2, 3, 4] 
                }
            }
        ],
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
        "iDisplayLength": 20
    });
}

// Tabela dos controles de los computadores
function fntTablaControlesComputadores() {
    tableEntregueComputadores = $('#tableEntregueComputadores').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Entregar/getEntreguesComputadores",
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
        "iDisplayLength": 20
    });
}

// Tabela dos controles de los telas
function fntTablaControlesTelas() {
    tableEntregueTelas = $('#tableEntregueTelas').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Entregar/getEntreguesTelas",
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
        "iDisplayLength": 20
    });
}

//Información completa del equipamento
function fntViewFone(idequipamento)
{
    const btnAnnotation =  document.querySelector(".btnAnnotation");

    btnAnnotation.setAttribute('id', idequipamento);

    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Fones/getFone/'+idequipamento;
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

                document.querySelector("#celMarcaF").innerHTML = objData.data.marca;
                if(objData.data.codigo) {
                    document.querySelector("#celCodigo").innerHTML = objData.data.codigo;
                } else {
                    document.querySelector("#celCodigo").innerHTML = '<span class="font-italic">nenhum<span/>';
                }

                document.querySelector("#celLacreF").innerHTML = '#' + objData.data.lacre;
                
                document.querySelector("#celFechaRegistroF").innerHTML = fechaFormateada;
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

                $('#modalViewEquipamento').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

//anotaciones del equipamento
function fntViewAnnotation()
{
    let idequipamento = document.querySelector(".btnAnnotation").getAttribute('id');

    divLoading.style.display = "flex";
    
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Fones/getAnotacionesFone/'+idequipamento;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
           
            if(objData.status)
            {
                let trAnotaciones = objData.data;
                document.querySelector("#listAnotaciones").innerHTML = trAnotaciones;
            }else{
                document.querySelector("#listAnotaciones").innerHTML = '<tr><td class"textcenter font-italic" colspan="5">Nenhuma anotação</td><tr>';
            }
            $('#modalViewAnnotation').modal('show');
            $('#modalViewAnnotation').addClass('myModal');
        }
        divLoading.style.display = "none";
        return false;
    }
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


                        let mesFone = objData.infoGraficaFone.numeroMes;
                        let anoFone = objData.infoGraficaFone.anio;
                        let mesPc = objData.infoGraficaPc.numeroMes;
                        let anoPc = objData.infoGraficaPc.anio;
                        let mesMonitor = objData.infoGraficaMonitor.numeroMes;
                        let anoMonitor = objData.infoGraficaMonitor.anio;

                        let fechaFone = [mesFone, anoFone].join("-");
                        let fechaPc = [mesPc, anoPc].join("-");
                        let fechaMonitor = [mesMonitor, anoMonitor].join("-");

                        fntInfoGraficaFone(fechaFone);
                        fntInfoGraficaPc(fechaPc);
                        fntInfoGraficaMonitor(fechaMonitor);

                        document.querySelector("#cantEntregas").textContent = objData.cantEntregas;
                        document.querySelector("#cantEntregasHoy").textContent = objData.cantEntregasHoy;

                        tableEntregue.api().ajax.reload();
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
                const dia = fechaObj.getDate() + 2;
                const year = fechaObj.getFullYear();
                const fechaUTC = new Date(Date.UTC(year, mes, dia));
                const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
                const fechaFormateada = fechaUTC.toLocaleDateString('pt-BR', opciones);

                const nombres = objData.data.nombres;
                const apellidos = objData.data.apellidos;

                document.querySelector("#celMatricula").innerHTML = objData.data.matricula;
                document.querySelector("#celNombres").innerHTML = nombres.toUpperCase();
                document.querySelector("#celApellidos").innerHTML = apellidos.toUpperCase();
                document.querySelector("#celModelo").innerHTML = objData.data.modelo;
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

    $('#fileEditProtocolo').on('change',function(e){
        let fileName = e.target.files[0].name;
        if(e.target.files[0].name){
            $(this).next('.custom-file-label').html(fileName);
        }
    })

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
                $('#modalEditProtocolo').modal('show');
            }
        }
        divLoading.style.display = "none";
        return false;
    }
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

/** FONES **/
//Buscador gráfica mensual
function fntSearchEntregarFonesMes()
{
    let fecha = document.querySelector(".entregarFonesMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarFonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchEntregarFonesAnio(){
    let anio = document.querySelector(".entregarFonesAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Entregar/entregarFonesAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioEntregarFones").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

/** PCS **/
//Buscador gráfica mensual
function fntSearchEntregarComputadoresMes()
{
    let fecha = document.querySelector(".entregarComputadoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarComputadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchEntregarComputadoresAnio(){
    let anio = document.querySelector(".entregarComputadoresAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Entregar/entregarComputadoresAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioEntregarComputadores").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

/** TELAS **/
//Buscador gráfica mensual
function fntSearchEntregarTelasMes()
{
    let fecha = document.querySelector(".entregarTelasMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarTelasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarTelas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchEntregarTelasAnio(){
    let anio = document.querySelector(".entregarTelasAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Entregar/entregarTelasAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioEntregarTelas").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

//Infoamrción de la gráfica
function fntInfoChartEquipamento(fecha) 
{
    let equipamento = fecha.pop();
    let date = fecha.join("-");
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/getDatosGraficaEquipamento';
    let  formData = new FormData();
    formData.append('fecha', date);
    formData.append('equipamento', equipamento);
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
                    
                    document.querySelector("#listgraficaEquipamentos").innerHTML = tdAnotaciones;
                    document.querySelector("#dateFoneGrafica").textContent = fecha;
                    $('#modalViewEquipamentoGrafica').modal('show');
                } else {
                    if(equipamento === 8)
                    {
                        equipamento = 'Fone';
                    } else if (equipamento === 16){
                        equipamento = 'Computador';
                    } else {
                        equipamento = 'Monitor';
                    }
                    swal(equipamento, objData.msg, "warning");
                }
            }
            divLoading.style.display = "none";
            return false;
    }
}

function fntInfoGraficaFone(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarFonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}
function fntInfoGraficaPc(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarComputadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}
function fntInfoGraficaMonitor(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Entregar/entregarTelasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregarTelas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}