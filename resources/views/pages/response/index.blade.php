@extends('layouts.app')

@section('content')
    <!-- Body Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="shortcode-html">
                                        <!-- Table Striped Rows -->
                                        <div class="container">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Pengusul</th>
                                                            <th>NIK</th>
                                                            <th>Disabilitas</th>
                                                            <th>Program Bansos</th>
                                                            <th>Status DTKS</th>
                                                            {{-- <th></th> --}}
                                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($responseData as $key => $response)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $response['recipient']['NAMA'] }}</td>
                                                                <td>{{ $response['recipient']['NIK'] }}</td>
                                                                <td>{{ $response['recipient']['KECAMATAN'] }}</td>
                                                                <td>{{ $response['recipient']['KABUPATEN'] }}</td>
                                                                <td class="">
                                                                    @if ($response['response']['statusKelayakan'])
                                                                        <p class="text-success fw-bold fs-11 m-0">Layak</p>
                                                                    @else
                                                                       <p class="text-danger fw-bold fs-11 m-o">Layak</p>
                                                                    @endif
                                                                </td>
                                                                {{-- <td>
                                                                    <a href="{{ route('response.detail', $response['id']) }}"
                                                                        class="btn btn-primary p-2">
                                                                        Detail
                                                                    </a>
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Table Striped Rows -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
