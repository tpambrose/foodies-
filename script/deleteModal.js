$(document).ready(function () {
    $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data)
        $('#deleteid').val(data[0]);
    
       
    })
} )