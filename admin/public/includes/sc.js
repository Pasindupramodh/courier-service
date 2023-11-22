$(function() {
    $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "print", "colvis", {
                extend: 'excelHtml5',
                title: 'Admins'
            },
            {
                extend: 'pdfHtml5',
                title: 'Admins'
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

})

var recipient;
$('#exampleModal1').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    recipient = button.data('whatever');
    var modal = $(this);
    modal.find('.modal-body #id_delete').text( recipient);
})


$("#exampleModal1").on( "click", "#del", function() {
    const id = recipient.split("-")[0];
    var f = new FormData();
            f.append("id",id);
            
            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    if (t.includes('successfully')) {
                        window.location.reload();
                    } else {
                        msg("danger", t);
                    }
                }
            }
            r.open("POST", "deleteAdminProcess.php", true);
            r.send(f);
 });

$('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    const myArray = recipient.split("_");
    modal.find('.modal-body input#id').val(myArray[0]);
    modal.find('.modal-body input#fname').val(myArray[1]);
    modal.find('.modal-body input#lname').val(myArray[2]);
    modal.find('.modal-body input#email').val(myArray[4]);
    modal.find('.modal-body input#nic').val(myArray[3]);
    modal.find('.modal-body input#mobile').val(myArray[5]);
    modal.find('.modal-body input#bday').val(myArray[7]);

    if (myArray[6].includes("Female")) {
        modal.find('.modal-body input#female').prop("checked", true);
    } else {
        modal.find('.modal-body input#male').prop("checked", true);
    }
    modal.find('.modal-body input#address1').val(myArray[8]);
    modal.find('.modal-body input#address2').val(myArray[9]);
    modal.find('.modal-body input#address3').val(myArray[10]);
    modal.find('.modal-body select#admin_type').val(myArray[11]);
})