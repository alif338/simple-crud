$(document).ready(function() {
    get_notes_data();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function get_notes_data() {

        $.ajax({
            url: root_url,
            type: 'GET',
            data: {}
        }).done(function(data) {
            table_data_row(data.data);
        });
    }

    function table_data_row(data) {
        var rows = '';
        var timeCreated = '';
        var timeUpdated = '';
        var recentUpdates = '';

        $.each(data, function(key, value) {
            timeUpdated = value.updated_at.slice(0, 19).replace("T", " ");
            var now = new Date($.now()).toISOString();
            now = now.slice(0, 19).replace("T", " ");
            recentUpdates = (new Date(now) - new Date(timeUpdated)) / 1000;

            if (recentUpdates < 24 * 3600) {
                if (recentUpdates < 3600) {
                    if (recentUpdates < 60) {
                        recentUpdates = 'about ' + recentUpdates + ' second ago';
                    } else {
                        recentUpdates = 'about ' + Math.floor(recentUpdates / 60) + ' minutes ago';
                    }
                } else {
                    recentUpdates = 'about ' + Math.floor(recentUpdates / 3600) + ' hours ago';
                }
            } else {
                recentUpdates = Math.floor(recentUpdates / (24 * 3600)) + ' days ago';
            }

            rows = rows + '<tr>';
            rows = rows + '<td>' + value.id + '</td>';
            rows = rows + '<td>' + value.title + '</td>';
            rows = rows + '<td>' + value.description + '</td>';
            rows = rows + '<td>' + value.created_at.slice(0, 19).replace("T", " ") + '</td>';
            rows = rows + '<td>' + recentUpdates + '</td>';
            rows = rows + '<td data-id="' + value.id + '">' +
                '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-info" id="editNotes" data-id="' + value.id + '" data-toggle="modal" data-target="#modal-id">Edit Notes</a>' +
                '<a class="btn btn-danger" id="deleteNotes" data-id="' + value.id + '">Delete</a>' +
                '</div>' +
                '</td>' +
                '</tr>';
        });

        $("tbody").html(rows);
    }

    $("body").on("click", "#createNewNotes", function(data) {
        data.preventDefault;
        $('#sampleCrudModal').html("Create note");
        $('#submit').val("Create note");
        $('#modal-id').modal('show');
        $('#notes_id').val('');
        $('#notesdata').trigger("reset");

    });

    $('body').on('click', '#submit', function(event) {
        event.preventDefault();
        var id = $("#notes_id").val();
        var title = $("#title").val();
        var description = $("#description").val();

        if (description == "" || title == "") {
            if (title == "") {
                $("#form-validation").html("This is required");
            } else {
                $("#form-validation").html("");
            }

            if (description == "") {
                $("#form-validation2").html("This is required");
            } else {
                $("#form-validation2").html("");
            }

            return false;
        } else {
            $("#form-validation").html("");
            $("#form-validation2").html("");
        }

        $.ajax({
            url: store,
            type: "POST",
            data: {
                id: id,
                title: title,
                description: description
            },
            dataType: 'json',
            success: function() {

                $('#notesdata').trigger("reset");
                $('#modal-id').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    showConfirmButton: false,
                    timer: 1500
                });
                get_notes_data();
            },
            error: function(data) {
                console.log('Error......');
            }
        });
    });

    //Edit modal window
    $('body').on('click', '#editNotes', function(event) {

        event.preventDefault();
        var id = $(this).data('id');

        $.get(store + '/' + id + '/edit', function(data) {

            $('#sampleCrudModal').html("Edit note");
            $('#submit').val("Edit note");
            $('#modal-id').modal('show');
            $('#notes_id').val(data.data.id);
            $('#title').val(data.data.title);
            $('#description').val(data.data.description);
        });
    });

    //DeleteCompany
    $('body').on('click', '#deleteNotes', function(event) {
        if (!confirm("Apakah Anda ingin meneruskan?")) {
            return false;
        }

        event.preventDefault();
        var id = $(this).attr('data-id');

        $.ajax({
            url: store + '/' + id,
            type: 'DELETE',
            data: {
                id: id
            },
            success: function(response) {

                Swal.fire(
                    'Remind!',
                    'Notes deleted successfully!',
                    'success'
                );
                get_notes_data();
            }
        });
        return false;
    });

});
