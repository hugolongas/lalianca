@extends('admin.layouts.master', ['body_class' => 'activitats'])
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
@stop
@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="options-menu">
        <a type="button" class="btn btn-outline-dark" href="{{ route('admin.activitats.create') }}">Crear Activitat</a>
    </div>
    <div class="table-cont">
        <table id="activitats-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>títol</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Preu</th>
					<th>Url artícle</th>
                    <th>Url compra</th>
                    <th>Portada</th>
                    <th>Publicar/Despublicar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>títol</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Preu</th>
					<th>Url artícle</th>
                    <th>Url compra</th>
                    <th>Portada</th>
                    <th>Publicar/Despublicar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop
@push('scripts')
    <script>
        $(function() {
            datatable = $('#activitats-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.activitats') }}',
                scrollX: true,
                searching: true,
                ordering: true,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'time'
                    },
                    {
                        data: 'price'
                    },
					{
						data:'url'
					},
                    {
                        data: 'buy_url'
                    },
                    {
                        data: 'img_cover'
                    },
                    {
                        data: null
                    },
                    {
                        data: 'edit'
                    },
                    {
                        data: null,
                        defaultContent: '<button class="btn btn-outline-secondary" accion="eliminar">Eliminar</button>'
                    }

                ],
                columnDefs: [{
                        targets: [0],
                        visible: false,
                        searchable: false
                    },
                    {
                        targets: [6],
                        render: function(data) {
                            var url = data;
                            return '<a href="'+url+'" target="_blank" style="color:black">'+url+'</a>';
                        }
                    },
                    {
				targets: [7],
				render: function(data)
				{
					var img = data;                    
					var src = '{{asset('storage/media')}}/'+img;
					return '<img class="img-fluid" style="width: 100px;" src="'+src+'"></img>';
				}
			},
                    {
                        targets: [8],
                        render: function(data) {
                            var published = data['published'];
                            var id = data['id'];
                            if (published) {
                                return '<button class="btn btn-outline-danger" accion="despublicar" >Despublicar</button>';
                            } else {
                                return '<button class="btn btn-outline-success" accion="publicar" >Publicar</button>';
                            }
                        }
                    }
                ]
            });

            $('#activitats-table tbody').on('click', 'button', function(ev) {
                var data = datatable.row($(this).parents('tr')).data();
                var accion = $(this).attr("accion");
                switch (accion) {
                    case "eliminar": {
                        if (confirm("Seguro que vols eliminar l'activitat")) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var id = data["id"];
                            var url = '{{ route('admin.activitats.delete', 'id') }}';
                            url = url.replace('id', id);
                            $.ajax({
                                url: url,
                                type: 'POST',
                                success: function() {
                                    $('#activitats-table').DataTable().ajax.reload();
                                    var alert =
                                        "<div id='custom-alert' class='alert alert-danger'>Activitat eliminada</div>";
                                    $("#content").prepend(alert);
                                    setTimeout(function() {
                                        $('#custom-alert').remove();
                                    }, 5000);
                                }
                            });
                        }
                        break;
                    }
                    case "publicar": {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var id = data["id"];
                        var url = '{{ route('admin.activitats.publish', 'id') }}';
                        url = url.replace('id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            success: function(resp) {
                                alert =
                                    "<div id='custom-alert' class='alert alert-warning'>Activitat publicada</div>";
                                $("#content").prepend(alert);
                                $('#activitats-table').DataTable().ajax.reload();
                                setTimeout(function() {
                                    $('#custom-alert').remove();
                                }, 5000);
                            }
                        });
                        break;
                    }
                    case "despublicar": {
						$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var id = data["id"];
                        var url = '{{ route('admin.activitats.unpublish', 'id') }}';
                        url = url.replace('id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            success: function(resp) {
                                alert =
                                    "<div id='custom-alert' class='alert alert-warning'>Activitat publicada</div>";
                                $("#content").prepend(alert);
                                $('#activitats-table').DataTable().ajax.reload();
                                setTimeout(function() {
                                    $('#custom-alert').remove();
                                }, 5000);
                            }
                        });
                        break;
                    }
                }
            });
        });
    </script>
@endpush
