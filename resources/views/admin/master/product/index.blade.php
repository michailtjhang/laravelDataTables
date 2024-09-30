@extends('layouts.admin')
@section('css')
    <!-- ======================== datatable ========================= -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <div class="card">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Product</li>
            </ol>
        </nav>
        <div class="card-body">
            <div class="table-responsive">

                @include('_message')
                <a href="{{ route('product.create') }}" class="btn btn-success mb-2 btn-sm">Tambah Daftar
                    Product</a>
                <table id="dataTable" class="table table-bordered table-hover table-stripped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>No Product</th>
                            <th>Nama Product</th>
                            <th>Harga Satuan</th>
                            <th class="text-left">Stok Product</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data['product']) == 0)
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($data['product'] as $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->id_product }}</td>
                                    <td>{{ $row->name_product }}</td>
                                    <td>Rp. {{ number_format($row->harga_satuan, 0, ',', '.') }}</td>
                                    <td class="text-left">{{ $row->stok_product }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete('{{ route('product.destroy', $row->id) }}', '{{ $row->name_product }}')">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>

                                        <script>
                                            function confirmDelete(deleteUrl, productName) {
                                                Swal.fire({
                                                    title: "Are you sure?",
                                                    text: `You won't be able to revert this! This will delete ${productName}.`,
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Yes, delete it!"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = document.createElement('form');
                                                        form.method = 'POST';
                                                        form.action = deleteUrl;

                                                        var csrfToken = document.createElement('input');
                                                        csrfToken.type = 'hidden';
                                                        csrfToken.name = '_token';
                                                        csrfToken.value = '{{ csrf_token() }}';
                                                        form.appendChild(csrfToken);

                                                        var methodField = document.createElement('input');
                                                        methodField.type = 'hidden';
                                                        methodField.name = '_method';
                                                        methodField.value = 'DELETE';
                                                        form.appendChild(methodField);

                                                        document.body.appendChild(form);
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

    <!-- Additional JS for DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js">
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#dataTable').DataTable({

        //     });
        // });
        new DataTable('#dataTable', {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            layout: {
                topStart: 'buttons'
            }
        });
    </script>
@endsection
