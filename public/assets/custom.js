$(document).ready(function (){
    $('#employeetable').dataTable( {
        "searching": true
    } );
    $('#managetable').dataTable( {
        "searching": true
    } );
    $('#itemkitstable').dataTable( {
        "searching": true
    } );
    $('#table').dataTable( {
        "searching": true,
        'pagination':false
    } );
    $('#inventory').dataTable( {
        "searching": true,
        'pagination':true
    } );
    $('#supplier').dataTable( {
        "searching": true,
        'pagination':true
    } );
    // $('#inventory').DataTable(function(){
    //     pagination:true;
    // });


});
