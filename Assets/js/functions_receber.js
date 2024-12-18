let tableReceber;
let tableReceberComputadores;
let tableReceberTelas;
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
    fntTablaReceber();
    fntTablaReceberComputadores();
    fntTablaReceberTelas();
    fntCrearControleReceber();
}

//Tabela fones recebidos
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
        "dom": 'lBfrtip',
        'buttons': 
        [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4] 
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4] 
                } 
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4] 
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4] 
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
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}

//Tabela pcs recebidos
function fntTablaReceberComputadores() {
    tableReceberComputadores = $('#tableReceberComputadores').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "dn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Receber/getRecebidosComputadores",
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

//Tabela telas recebidos
function fntTablaReceberTelas() {
    tableReceberTelas = $('#tableReceberTelas').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "dn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Receber/getRecebidosTelas",
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

                        document.querySelector("#cantRecebidos").textContent = objData.cantRecebidos;
                        document.querySelector("#cantRecebidosHoy").textContent = objData.cantRecebidosHoy;

                        tableReceber.api().ajax.reload();
                        tableReceberComputadores.api().ajax.reload();
                        tableReceberTelas.api().ajax.reload();

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
        const options = e.target.value;
        const arrData = options.split(',');
        const idUsuario = arrData[0];
        const idEquipamento = arrData[1];

        fntEquipamento(idUsuario, idEquipamento);
    });
}

function fntEquipamento(idusuario, idequipamento) {
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Receber/getEquipamento';
    let strData = "idUsuario=" + idusuario + "&idEquipamento=" + idequipamento;
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
            equipamento.value = '#' + lacre;
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
                const dia = fechaObj.getDate() + 2;
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
                document.querySelector("#celEvidencia").innerHTML = objData.data.protocolo;

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

/** GRÁFICA FONES **/
//mensual
function fntSearchReceberFonesMes()
{
    let fecha = document.querySelector(".receberFonesMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberFonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchReceberFonesAnio(){
    let anio = document.querySelector(".receberFonesAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Receber/receberFonesAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioReceberFones").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

/** GRÁFICA PCS **/
//mensual
function fntSearchReceberComputadoresMes()
{
    let fecha = document.querySelector(".receberComputadoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberComputadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchReceberComputadoresAnio(){
    let anio = document.querySelector(".receberComputadoresAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Receber/receberComputadoresAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioReceberComputadores").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

/** GRÁFICA TELAS **/
//mensual
function fntSearchReceberTelasMes()
{
    let fecha = document.querySelector(".receberTelasMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberTelasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberTelas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchReceberTelasAnio(){
    let anio = document.querySelector(".receberTelasAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Receber/receberTelasAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioReceberTelas").html(request.responseText);
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
    let  ajaxUrl = base_url+'/Receber/getDatosGraficaEquipamento';
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

//
function fntInfoGraficaFone(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberFonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntInfoGraficaPc(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberComputadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntInfoGraficaMonitor(fecha) 
{
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Receber/receberTelasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesReceberTelas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}
