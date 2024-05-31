// let tableReceber;
// let rowTable = "";
// let divLoading = document.querySelector("#divLoading");

// document.addEventListener('DOMContentLoaded', function(){
//     iniciarApp();
// });

// function iniciarApp() {
//     fntTablaReceber();
//     //fntCrearControleEntrega();
    
// }

// // Tabela dos recebimentos
// function fntTablaReceber() {
//     tableReceber = $('#tableReceber').dataTable({
//         "aProcessing":true,
//         "aServerSide":true,
//         "language": {
//             "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
//         },
//         "ajax":{
//             "url": " "+base_url+"/Receber/getReceber",
//             "dataSrc":""
//         },
//         "columns":[
//             {"data":"matricula"},
//             {"data":"nombres"},
//             {"data":"equipamento"},
//             {"data":"status"},
//             {"data":"fechaRegistro"},
//             {"data":"options"}
//         ],
//         "resonsieve":"true",
//         "bDestroy": true,
//         "iDisplayLength": 20,
//         "order":[[0,"desc"]]  
//     });
// }