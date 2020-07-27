<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel AJAX CRUD</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <!-- Custom styles for this template -->
</head>

<body style="margin-top: 60px" class="container">

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#btn-add').click(function () {
            $('#btn-save').val("add");
            $('#modalFormData').trigger("reset");
            $('#linkEditorModal').modal('show');
        });

        $('.open-modal').click(function () {
            var id = $(this).val();
            $.get('links/'+id,function (data) {
                $('#link_id').val(data.id);
                $('#link').val(data.url);
                $('#description').val(data.description);
                $('#btn-save').val("update");
                $('#linkEditorModal').modal('show');
            } )

        });

        $("#btn-save").click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var state = $(this).val();
            var id = $('#link_id').val();
            var url = $('#link').val();
            var description = $('#description').val();
            var link = {
                'url' : url,
                'description' : description
            }
            var method_link;
            var ajaxUrl;
            if (state == 'add'){
                method_link = 'POST';
                ajaxUrl ='/links';
            }else{
                method_link = 'PUT';
                ajaxUrl ='/links/' + id
                console.log(ajaxUrl);
            }


            $.ajax({
                    url: ajaxUrl,
                    method: method_link,
                    data: link,
                    dataType: 'json',
                    success: function (data) {
                      var link =  '<tr id="link' + data.id + '"><td>' + data.id + '</td><td>' + data.url + '</td><td>' + data.description + '</td>';
                        link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                        link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                        if (method_link == 'POST') {
                            $("#links-list").append(link);
                        }else{
                            $('#link'+id).replaceWith(link);
                        }
                        $('#linkEditorModal').modal('hide');
                    },
                    error: function (data) {
                        console.log('ER', data);
                    }
                })
    });

        $(".delete-link").click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            var id = $(this).val();
            $.ajax({
                url: "/links/"+id,
                method: 'DELETE',
                success: function (data) {
                    $('#link'+id).remove();
                },
                error: function (data) {
                    console.log('ER', data);
                }
            })
        })
    });

</script>
</body>
</html>
