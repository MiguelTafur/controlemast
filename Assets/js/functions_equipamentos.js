let tableEquipamentos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp() {
    fntTablaEquipamentos();
    //fntCrearEquipamento();
}

function fntTablaEquipamentos() {
    tableEquipamentos = $('#tableEquipamentos').dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Equipamentos/getEquipamentos",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombre"},
            {"data":"marca"},
            {"data":"codigo"},
            {"data":"lacre"},
            {"data":"status"},
            {"data":"options"}
        ],
        
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order":[[0,"desc"]]  
    });
}