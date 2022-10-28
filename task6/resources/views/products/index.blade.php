@extends('layouts.parent')


@section('title', 'all products')

@section('css')

    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')


<div class="col-12">

    <div class="card">
        <!-- /.card-header -->

        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name_En</th>
                        <th>Name_An</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Creation Date</th>
                        <th>Last Update Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                        <tr>
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->name_en }} </td>
                            <td> {{ $product->name_ar }} </td>
                            <td> {{ $product->price }} </td>
                            <td @class([

                                    'text-center',
                                    'text-danger'=> $product->quantity == 0,
                                    'text-warning'=>$product->quantity > 0 && $product->quantity < 5,
                                    'text-success'=> $product->quantity >= 5
                                    ])>{{ $product->quantity }}

                            </td>
                            <td @class([

                                'text-danger'=> $product->status == 0,
                                'text-success'=> $product->status == 1
                                ])>{{ $product->status == 1 ? 'Active' : 'Not Active' }}

                            </td>
                            <td> {{ $product->created_at }} </td>
                            <td> {{ $product->updated_at }} </td>
                            <td>

                                <a href="{{ route('dashboard.products.edit', $product->id) }}"class="btn btn-outline-success">Edit</a>

                                <form action="{{route('dashboard.products.delete', $product->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" > Delete </button>
                                </form>



                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- /.card-body -->

    </div>
</div>

@endsection


@section('js')


<!-- DataTables  & Plugins -->

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

@endsection

