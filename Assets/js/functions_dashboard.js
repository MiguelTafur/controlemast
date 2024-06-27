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
            document.querySelector("#datosUsuariosD").innerHTML = arrUsuarios;

        }

        divLoading.style.display = "none";
        return false;
    }
}

function fntSearchUsuariosID()
{
    let fecha = document.querySelector("#fechaUsuariosI").value;
    if(fecha == "")
    {
        swal("", "Selecione uma data", "error");
        return false;
    }

    //divLoading.style.display = "flex";
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
            document.querySelector("#datosUsuariosID").innerHTML = arrUsuarios;

        }

        divLoading.style.display = "none";
        return false;
    }
}

/********** EQUIPAMENTOS ***********/
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
