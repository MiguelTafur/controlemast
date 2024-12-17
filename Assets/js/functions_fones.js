let tableEquipamentos;
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
    fntTablaEquipamentos();
    fntCrearEquipamento();
    fntEditStatus();
    fntAddAnnotation();
}

function fntTablaEquipamentos() {
    tableEquipamentos = $('#tableEquipamentos').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Fones/getFones",
            "dataSrc":""
        },
        "dom": 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                // "exportOptions": { 
                //     "columns": [ 0, 1, 2, 3, 4, 5] 
                // }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                // "exportOptions": { 
                //     "columns": [ 0, 1, 2, 3, 4, 5] 
                // } 
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                // "exportOptions": { 
                //     "columns": [ 0, 1, 2, 3, 4, 5] 
                // }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                // "exportOptions": { 
                //     "columns": [ 0, 1, 2, 3, 4, 5] 
                // }
            }
        ],
        "columns":[
            {"data":"marca"},
            {"data":"codigo"},
            {"data":"lacre"},
            {"data":"status"},
            {"data":"options"}
        ],
        
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20 
    });
}

function fntCrearEquipamento() {
    if(document.querySelector("#formEquipamentos")){
        let formEquipamentos = document.querySelector("#formEquipamentos");
        formEquipamentos.onsubmit = function(e)
        {
            e.preventDefault();

            document.querySelector("#txtMarca").disabled = false;
            document.querySelector("#txtLacre").disabled = false;
            document.querySelector("#txtCodigo").disabled = false;

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
                    swal("Atenção!", "Verifique os campos em vermelho.", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Fones/setFone';
            let formData = new FormData(formEquipamentos);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantFoneD").textContent = objData.cantFoneD;
                        document.querySelector("#cantFoneU").textContent = objData.cantFoneU;
                        document.querySelector("#cantFoneE").textContent = objData.cantFoneE;
                        document.querySelector("#cantFoneC").textContent = objData.cantFoneC;

                        let mes = objData.infoGrafica.numeroMes;
                        let ano = objData.infoGrafica.anio;

                        let fecha = [mes, ano].join("-");

                        fntInfoGrafica(fecha);

                        if(rowTable == ""){
                            tableEquipamentos.api().ajax.reload();
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
                        $('#modalFormEquipamentos').modal("hide");
                        formEquipamentos.reset();
                        swal("Equipamento", objData.msg, "success");
                        
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
    document.querySelector('#titleModal').innerHTML = "Alterar Fone";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";
    document.querySelector('#divEditarEstado').classList.remove('d-none');
    document.querySelector('#divTxtAnotacion').classList.add('d-none');
    document.querySelector('#divFileAnotacion').classList.add('d-none');
    document.querySelector('#divEqEstragado').classList.add('d-none');

    document.querySelector("#txtMarca").disabled = false;
    document.querySelector("#txtLacre").disabled = false;
    document.querySelector("#txtCodigo").disabled = false;

    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Fones/getFone/'+idequipamento;
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
                } else if(objData.data.status === 3) {
                    estadoActual.innerHTML = `<u>Estragado</u>`;
                } else if(objData.data.status === 4){
                    estadoActual.innerHTML = `<u>Concerto</u>`;
                } else {
                    estadoActual.textContent = `Em uso`;
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

                document.querySelector("#txtMarca").addEventListener("keyup", function() {
                    fntMarca(objData.data.marca);
                });
                document.querySelector("#txtLacre").addEventListener("keyup", function() {
                    fntLacre(objData.data.lacre);
                });
                document.querySelector("#txtCodigo").addEventListener("keyup", function() {
                    fntCodigo(objData.data.codigo);
                });
            }
        }
        $('#modalFormEquipamentos').modal('show');
        divLoading.style.display = "none";
        return false;
    }
}

function fntMarca(marca)
{
    let valorMarca = document.getElementById("txtMarca").value;
  
    if(valorMarca !== marca){
        document.getElementById("txtLacre").disabled = true;
        document.getElementById("txtCodigo").disabled = true;
    } else {
        document.getElementById("txtLacre").disabled = false;
        document.getElementById("txtCodigo").disabled = false;
    }
}

function fntLacre(lacre) {
    let valorLacre = document.getElementById("txtLacre").value;

    if(valorLacre !== lacre){
        document.getElementById("txtMarca").disabled = true;
        document.getElementById("txtCodigo").disabled = true;	
    } else {
        document.getElementById("txtMarca").disabled = false;
        document.getElementById("txtCodigo").disabled = false;
    }
}

function fntCodigo(codigo) {
    let valorCodigo = document.getElementById("txtCodigo").value;

    if(valorCodigo !== codigo){
        document.getElementById("txtMarca").disabled = true;
        document.getElementById("txtLacre").disabled = true;	
    } else {
        document.getElementById("txtMarca").disabled = false;
        document.getElementById("txtLacre").disabled = false;
    }
}

function fntEditStatus() {
    if(document.querySelector("#formEditarEstado")){
        let formEditarEstado = document.querySelector("#formEditarEstado");
        
        formEditarEstado.onsubmit = function(e)
        {
            e.preventDefault();
            let listEstado = document.querySelector('#listEstado').value;
            let txtAnotacion = document.querySelector('#txtAnotacaoEstado').value;

            if(listEstado === '' || txtAnotacion === '')
            {
                swal("Atenção", "Os campos com asterisco (*) são obrigatórios.", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Fones/setEstadoFone';
            let formData = new FormData(formEditarEstado);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    
                    if(objData.status)
                    {
                        document.querySelector("#cantFoneD").textContent = objData.cantFoneD;
                        document.querySelector("#cantFoneU").textContent = objData.cantFoneU;
                        document.querySelector("#cantFoneE").textContent = objData.cantFoneE;
                        document.querySelector("#cantFoneC").textContent = objData.cantFoneC;

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
                        $('#modalFormEquipamentos').modal("hide");
                        formEditarEstado.reset();
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

function fntAddAnnotation() {
    if(document.querySelector("#formAnotacao")){
        let formAnotacao = document.querySelector("#formAnotacao");
        
        formAnotacao.onsubmit = function(e)
        {
            e.preventDefault();
            let txtAnotacao = document.querySelector('#txtAnotacao').value;

            if(txtAnotacao === '')
            {
                swal("Atenção", "Digite uma anotação.", "error");
                return false;
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Fones/setAdicionarAnotacao';
            let formData = new FormData(formAnotacao);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalAddAnnotation').modal('hide');
                        formAnotacao.reset();
                        swal("Anotação", objData.msg, "success");
                        
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

                $('#modalViewEquipamento').modal('show');
            }else{
                swal("Erro", objData.msg, "error");
            }
        }
        divLoading.style.display = "none";
        return false;
    }
}

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

function fntViewAddAnnotation(idequipamento)
{
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
            document.querySelector('#equipamentoLacre').innerHTML = 'Fone: #' + objData.data.lacre;
            document.querySelector('#idEquipamentoAnotacao').value = objData.data.idequipamento;
            document.querySelector('#estadoEquipamentoAnotacao').value = objData.data.status;
            $('#modalAddAnnotation').modal('show');
        }
        divLoading.style.display = "none";
        return false;
    }
}

function openModalEditStatus() {

    $('#listEstado').select2({
        placeholder: " -- Escolha o Tipo de Estado -- ",
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
    document.querySelector('#titleModal').innerHTML = "Novo Fone";
    document.querySelector("#formEquipamentos").reset();
    document.querySelector('#divEditarEstado').classList.add('d-none');
    document.querySelector('#divTxtAnotacion').classList.remove('d-none');
    document.querySelector('#divFileAnotacion').classList.remove('d-none');
    document.querySelector('#divEqEstragado').classList.remove('d-none');

    document.querySelector("#txtMarca").disabled = false;
    document.querySelector("#txtLacre").disabled = false;
    document.querySelector("#txtCodigo").disabled = false;

    document.querySelector("#txtMarca").addEventListener("keyup", function() {
        document.querySelector("#txtMarca").disabled = false;
        document.querySelector("#txtLacre").disabled = false;
        document.querySelector("#txtCodigo").disabled = false;
    });
    document.querySelector("#txtLacre").addEventListener("keyup", function() {
        document.querySelector("#txtMarca").disabled = false;
        document.querySelector("#txtLacre").disabled = false;
        document.querySelector("#txtCodigo").disabled = false;
    });
    document.querySelector("#txtCodigo").addEventListener("keyup", function() {
        document.querySelector("#txtMarca").disabled = false;
        document.querySelector("#txtLacre").disabled = false;
        document.querySelector("#txtCodigo").disabled = false;
    });

    $('#modalFormEquipamentos').modal('show');
}

/*** GRÁFICAS ***/

//Buscador gráfica mensual
function fntSearchFonesMes()
{
    let fecha = document.querySelector(".fonesMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Fones/fonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchFonesAnio() 
{
    let anio = document.querySelector(".fonesAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Fones/fonesAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioFones").html(request.responseText);
                divLoading.style.display = "none";
                return false;
            }
        }
    }
}

//Infoamrción de la gráfica
function fntInfoChartEquipamento(fecha) 
{
    let date = fecha.join("-")
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Fones/getDatosGraficaEquipamento';
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
                    
                    document.querySelector("#listgraficaEquipamentos").innerHTML = tdAnotaciones;
                    document.querySelector("#dateFoneGrafica").textContent = fecha;
                    $('#modalViewEquipamentoGrafica').modal('show');
                } else {
                    swal("Fones", objData.msg, "warning");
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
    let  ajaxUrl = base_url+'/Fones/fonesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesFones").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}