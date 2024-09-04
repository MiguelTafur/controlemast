let tableComputadores;
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
    tableComputadores = $('#tableComputadores').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Computadores/getComputadores",
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
        "iDisplayLength": 20 
    });
}

function fntCrearEquipamento() {
    if(document.querySelector("#formEquipamentos")){
        let formEquipamentos = document.querySelector("#formEquipamentos");
        formEquipamentos.onsubmit = function(e)
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
                    swal("Atenção!", "Verifique os campos em vermelho.", "error");
                    return false;
                }
            }

            divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + '/Computadores/setComputador';
            let formData = new FormData(formEquipamentos);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        let mes = objData.infoGrafica.numeroMes;
                        let ano = objData.infoGrafica.anio;

                        let fecha = [mes, ano].join("-");

                        fntInfoGrafica(fecha);

                        document.querySelector("#cantComputadorD").textContent = objData.cantComputadorD;
                        document.querySelector("#cantComputadorU").textContent = objData.cantComputadorU;
                        document.querySelector("#cantComputadorE").textContent = objData.cantComputadorE;
                        document.querySelector("#cantComputadorC").textContent = objData.cantComputadorC;
                        
                        if(rowTable == ""){
                            tableComputadores.api().ajax.reload();
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
    document.querySelector('#titleModal').innerHTML = "Alterar Computador";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Atualizar";
    document.querySelector('#divEditarEstado').classList.remove('d-none');
    document.querySelector('#divTxtAnotacion').classList.add('d-none');
    document.querySelector('#divFileAnotacion').classList.add('d-none');
    document.querySelector('#divEstadoEquipamento').classList.add('d-none');

    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Computadores/getComputador/'+idequipamento;
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
                    //estadoActual.classList.add('text-info');
                    if(objData.data.idcontrole) {
                        document.querySelector("#noAlterado").classList.remove('d-none');
                        document.querySelector("#formEditarEstado").classList.add('d-none');
                        document.querySelector("#noAlterado").innerHTML = `<p class="text-uppercase text-center m-0 text-secondary font-weight-bold">Equipamento não pode ser alterado</p>`
                    }
                    
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
        document.getElementById("txtLacre").setAttribute("readonly", true);
        document.getElementById("txtCodigo").setAttribute("readonly", true);	
    } else {
        document.getElementById("txtLacre").removeAttribute("readonly", false);
        document.getElementById("txtCodigo").removeAttribute("readonly", false);
    }
}

function fntLacre(lacre) {
    let valorLacre = document.getElementById("txtLacre").value;

    if(valorLacre !== lacre){
        document.getElementById("txtMarca").setAttribute("readonly", true);
        document.getElementById("txtCodigo").setAttribute("readonly", true);	
    } else {
        document.getElementById("txtMarca").removeAttribute("readonly", false);
        document.getElementById("txtCodigo").removeAttribute("readonly", false);
    }
}

function fntCodigo(codigo) {
    let valorCodigo = document.getElementById("txtCodigo").value;

    if(valorCodigo !== codigo){
        document.getElementById("txtMarca").setAttribute("readonly", true);
        document.getElementById("txtLacre").setAttribute("readonly", true);	
    } else {
        document.getElementById("txtMarca").removeAttribute("readonly", false);
        document.getElementById("txtLacre").removeAttribute("readonly", false);
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
            let ajaxUrl = base_url + '/Computadores/setEstadoComputador';
            let formData = new FormData(formEditarEstado);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#cantComputadorD").textContent = objData.cantComputadorD;
                        document.querySelector("#cantComputadorU").textContent = objData.cantComputadorU;
                        document.querySelector("#cantComputadorE").textContent = objData.cantComputadorE;
                        document.querySelector("#cantComputadorC").textContent = objData.cantComputadorC;

                        if(rowTable == ""){
                            tableComputadores.api().ajax.reload();
                        }else{
                            if(objData.estado === 1) {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-success">Disponível</span></h5>`;
                            } else if(objData.estado === 2) {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-info">Em Uso</span></h5>`;
                            } else if(objData.estado === 3) {
                                rowTable.cells[3].innerHTML = `<h5><span class="badge badge-danger">Estragado</span></h5>`;
                            } else if(objData.estado === 4) {
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
            let ajaxUrl = base_url + '/Computadores/setAdicionarAnotacao';
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
    let ajaxUrl = base_url + '/Computadores/getComputador/'+idequipamento;
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
    let ajaxUrl = base_url + '/Computadores/getAnotacionesComputador/'+idequipamento;
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
    let ajaxUrl = base_url + '/Computadores/getComputador/'+idequipamento;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            document.querySelector('#equipamentoLacre').innerHTML = 'Computador: #' + objData.data.lacre;
            document.querySelector('#idEquipamentoAnotacao').value = objData.data.idequipamento;
            document.querySelector('#estadoEquipamentoAnotacao').value = objData.data.status;
        }
        divLoading.style.display = "none";
    return false;
    }

    $('#modalAddAnnotation').modal('show');
}

function openModalEditStatus() {

    $('#listEstado').select2({
        placeholder: " -- Escolha o Tipo de Estado -- ",
        allowClear: true,
        width: 'resolve',
        theme: "classic"
    });

    var data = {
        id: 2,
        text: 'Em Uso'
    }

    if (!$('#listEstado').find("option[value='" + data.id + "']").length) {
        var newOption = new Option(data.text, data.id, false, false);
        $('#listEstado').append(newOption).trigger('change');
    }

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
    document.querySelector('#titleModal').innerHTML = "Novo Computador";
    document.querySelector("#formEquipamentos").reset();
    document.querySelector('#divEditarEstado').classList.add('d-none');
    document.querySelector('#divTxtAnotacion').classList.remove('d-none');
    document.querySelector('#divFileAnotacion').classList.remove('d-none');
    document.querySelector('#divEstadoEquipamento').classList.remove('d-none');
    $('#modalFormEquipamentos').modal('show');
}

/*** GRÁFICAS ***/

//Buscador gráfica mensual
function fntSearchComputadoresMes()
{
    let fecha = document.querySelector(".computadoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Computadores/computadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

//Buscador gráfica anual
function fntSearchComputadoresAnio()
{
    let anio = document.querySelector(".computadoresAnio").value;
    if(anio == ""){
        swal("", "Digite o Ano " , "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ?
            new XMLHttpRequest() :
            new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Computadores/computadoresAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();
        formData.append('anio',anio);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                $("#graficaAnioComputadores").html(request.responseText);
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
    let  ajaxUrl = base_url+'/Computadores/getDatosGraficaEquipamento';
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
                    console.log(objData);
                    let tdAnotaciones = objData.data;
                    let fecha = objData.fecha;
                    
                    document.querySelector("#listgraficaEquipamentos").innerHTML = tdAnotaciones;
                    document.querySelector("#dateEquipamentoGrafica").textContent = fecha;
                    $('#modalViewEquipamentoGrafica').modal('show');
                } else {
                    swal("Computadores", objData.msg, "warning");
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
    let  ajaxUrl = base_url+'/Computadores/computadoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesComputadores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}