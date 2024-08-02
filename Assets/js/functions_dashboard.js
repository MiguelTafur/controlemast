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

document.addEventListener('DOMContentLoaded', function()
{
    iniciarApp();
});

function iniciarApp() {
    
}


/********** USUARIOS ***********/
function fntSearchUAMes()
{
    let fecha = document.querySelector(".usuariosActivosMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/usuariosActivosMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesUsuariosActivos").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchUIMes()
{
    let fecha = document.querySelector(".usuariosInactivosMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/usuariosInactivosMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesUsuariosInactivos").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntsearchUser()
{
    $('#modalDetalleU').modal('show');
    document.querySelector("#divUsuariosD").classList.add("d-none");
    $('#fechaUsuarios').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaUsuarios').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaUsuarios').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
}

function fntSearchUsuariosD()
{
    let fecha = document.querySelector("#fechaUsuarios").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getUsuariosD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrUsuarios = objData.usuariosD;

            document.querySelector("#divUsuariosD").classList.remove("d-none");

            if(arrUsuarios) {
                document.querySelector("#datosUsuariosD").innerHTML = arrUsuarios;
            } else {
                document.querySelector("#divUsuariosD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }

        }

        divLoading.style.display = "none";
        return false;
    }
}

function fntsearchUserI()
{
    $('#modalDetalleUI').modal('show');
    document.querySelector("#divUsuariosID").classList.add("d-none");
    $('#fechaUsuariosI').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaUsuariosI').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaUsuariosI').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
}

function fntSearchUsuariosID()
{
    let fecha = document.querySelector("#fechaUsuariosI").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getUsuariosID';
    let  formData = new FormData();
    formData.append('fechaI', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrUsuarios = objData.usuariosID;

            document.querySelector("#divUsuariosID").classList.remove("d-none");

            if(arrUsuarios) {
                document.querySelector("#datosUsuariosID").innerHTML = arrUsuarios;
            } else {
                document.querySelector("#divUsuariosID").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }

        }

        divLoading.style.display = "none";
        return false;
    }
}

/********** EQUIPAMENTOS ***********/
function fntViewAnnotation(idequipamento, tipo)
{
    let equipamento = {
        'idequipamento': idequipamento,
        'tipo': tipo
    }
    let dados = JSON.stringify(equipamento);
    //divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Dashboard/getAnotacionesFone/'+dados;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
           
            let trAnotaciones = objData.data;
            document.querySelector("#listAnotaciones").innerHTML = trAnotaciones;
            $('#modalViewAnnotation').modal('show');
            $('#modalDetalleFones').modal('hide');
        }
        divLoading.style.display = "none";
        return false;
    }
}

function fntsearchFone()
{
    $('#modalDetalleFones').modal('show');
    document.querySelector("#divFonesD").classList.add("d-none");
    $('#fechaFones').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaFones').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaFones').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchFonesD()
{
    let fecha = document.querySelector("#fechaFones").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getFonesD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrFones = objData.fonesD;

            document.querySelector("#divFonesD").classList.remove("d-none");
            document.querySelector("#datosFonesD").innerHTML = arrFones;

        }

        divLoading.style.display = "none";
        return false;
    }
}

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
    let  ajaxUrl = base_url+'/Dashboard/FonesMes';
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

function fntSearchMousesMes()
{
    let fecha = document.querySelector(".mousesMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/MousesMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesMouses").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchTecladosMes()
{
    let fecha = document.querySelector(".tecladosMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/TecladosMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesTeclados").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchMonitoresMes()
{
    let fecha = document.querySelector(".monitoresMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/MonitoresMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesMonitores").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

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
    let  ajaxUrl = base_url+'/Dashboard/ComputadoresMes';
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

/********** CONTROLE ***********/

///*Información recente*///

//Entregas
function fntsearchEntregas()
{
    $('#modalDetalleEntregas').modal('show');
    document.querySelector("#divEntregasD").classList.add("d-none");
    $('#fechaEntregas').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaEntregas').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaEntregas').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchEntregasD()
{
    let fecha = document.querySelector("#fechaEntregas").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 1);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divEntregasD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosEntregasD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divEntregasD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }

        }

        divLoading.style.display = "none";
        return false;
    }
}

//Trocas
function fntsearchTrocas()
{
    $('#modalDetalleTrocas').modal('show');
    document.querySelector("#divTrocasD").classList.add("d-none");
    $('#fechaTrocas').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaTrocas').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaTrocas').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchTrocasD()
{
    let fecha = document.querySelector("#fechaTrocas").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 2);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrTrocas = objData.fonesD;

            document.querySelector("#divTrocasD").classList.remove("d-none");
            if(arrTrocas) {
                document.querySelector("#datosTrocasD").innerHTML = arrTrocas;
            } else {
                document.querySelector("#divTrocasD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
            

        }

        divLoading.style.display = "none";
        return false;
    }
}

//Desligados
function fntsearchDesligados()
{
    $('#modalDetalleDesligados').modal('show');
    document.querySelector("#divDesligadosD").classList.add("d-none");
    $('#fechaDesligados').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaDesligados').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaDesligados').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchDesligadosD()
{
    let fecha = document.querySelector("#fechaDesligados").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 3);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrDesligados = objData.fonesD;

            document.querySelector("#divDesligadosD").classList.remove("d-none");
            if(arrDesligados) {
                document.querySelector("#datosDesligadosD").innerHTML = arrDesligados;
            } else {
                document.querySelector("#divDesligadosD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
                //document.querySelector("#divDesligadosD").classList.add("d-none");
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//Pediu Conta
function fntsearchPediuConta()
{
    $('#modalDetallePediuConta').modal('show');
    document.querySelector("#divPediuContaD").classList.add("d-none");
    $('#fechaPediuConta').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaPediuConta').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaPediuConta').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchPediuContaD()
{
    let fecha = document.querySelector("#fechaPediuConta").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 4);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divPediuContaD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosPediuContaD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divPediuContaD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//Sem renovação
function fntsearchSemRenovacao()
{
    $('#modalDetalleSemRenovacao').modal('show');
    document.querySelector("#divSemRenovacaoD").classList.add("d-none");
    $('#fechaSemRenovacao').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaSemRenovacao').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaSemRenovacao').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchSemRenovacaoD()
{
    let fecha = document.querySelector("#fechaSemRenovacao").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 5);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divSemRenovacaoD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosSemRenovacaoD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divSemRenovacaoD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//Justa causa
function fntsearchJustaCausa()
{
    $('#modalDetalleJustaCausa').modal('show');
    document.querySelector("#divJustaCausaD").classList.add("d-none");
    $('#fechaJustaCausa').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaJustaCausa').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaJustaCausa').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchJustaCausaD()
{
    let fecha = document.querySelector("#fechaJustaCausa").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 6);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divJustaCausaD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosJustaCausaD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divJustaCausaD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//Recisão
function fntsearchRescisao()
{
    $('#modalDetalleRecisao').modal('show');
    document.querySelector("#divRecisaoD").classList.add("d-none");
    $('#fechaRecisao').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaRecisao').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaRecisao').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchRecisaoD()
{
    let fecha = document.querySelector("#fechaRecisao").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 7);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divRecisaoD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosRecisaoD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divRecisaoD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//INSS
function fntsearchINSS()
{
    $('#modalDetalleINSS').modal('show');
    document.querySelector("#divINSSD").classList.add("d-none");
    $('#fechaINSS').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaINSS').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaINSS').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchINSSD()
{
    let fecha = document.querySelector("#fechaINSS").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 8);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divINSSD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosINSSD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divINSSD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

//Maternidade
function fntsearchMaternidade()
{
    $('#modalDetalleMaternidade').modal('show');
    document.querySelector("#divMaternidadeD").classList.add("d-none");
    $('#fechaMaternidade').daterangepicker({
        "autoUpdateInput": false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abil",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('#fechaMaternidade').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });

    $('#fechaMaternidade').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

}

function fntSearchMaternidadeD()
{
    let fecha = document.querySelector("#fechaMaternidade").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/getControleD';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    formData.append('estado', 9);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            arrEntregas = objData.fonesD;

            document.querySelector("#divMaternidadeD").classList.remove("d-none");
            if(arrEntregas) {
                document.querySelector("#datosMaternidadeD").innerHTML = arrEntregas;
            } else {
                document.querySelector("#divMaternidadeD").innerHTML = '<h5 class="text-center font-italic">Nenhuma Informação</h5>';
            }
        }

        divLoading.style.display = "none";
        return false;
    }
}

function fntViewInfo(idcontrole)
{
    divLoading.style.display = "flex";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Dashboard/getRecebido/'+idcontrole;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(request.readyState == 4 && request.status == 200)
        {
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                console.log(objData);
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

function fntSearchEntregasMes()
{
    let fecha = document.querySelector(".entregasMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/entregasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesEntregas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchTrocasMes()
{
    let fecha = document.querySelector(".trocasMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/trocasMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesTrocas").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchDesligamentosMes()
{
    let fecha = document.querySelector(".desligamentosMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/desligamentosMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesDesligamentos").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchPediuContaMes()
{
    let fecha = document.querySelector(".pediuContaMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/pediuContaMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesPediuConta").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchSemRenovacaoMes()
{
    let fecha = document.querySelector(".semRenovacaoMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/SemRenovacaoMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesSemRenovacao").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchJustaCausaMes()
{
    let fecha = document.querySelector(".justaCausaMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/justaCausaMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesJustaCausacao").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchRescisaoMes()
{
    let fecha = document.querySelector(".rescisaoMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/rescisaoMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesRescisao").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchINSSMes()
{
    let fecha = document.querySelector(".INSSMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/INSSMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesINSS").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}

function fntSearchMaternidadeMes()
{
    let fecha = document.querySelector(".maternidadeMes").value;
    if(fecha == "")
    {
        swal("", "Selecione mês e ano", "error");
        return false;
    }
    divLoading.style.display = "flex";
    let  request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let  ajaxUrl = base_url+'/Dashboard/maternidadeMes';
    let  formData = new FormData();
    formData.append('fecha', fecha);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function()
    {
        if(request.readyState != 4) return;
        if(request.status == 200)
        {
            $("#graficaMesMaternidade").html(request.responseText);
            divLoading.style.display = "none";
            return false;
        }
    }
}
