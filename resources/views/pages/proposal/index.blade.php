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
                                                            <th></th>
                                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($proposalData as $key => $proposal)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $proposal['recipient']['NAMA'] }}</td>
                                                                <td>{{ $proposal['recipient']['NIK'] }}</td>
                                                                <td>{{ $proposal['proposal']['disabilitas'] }}</td>
                                                                <td>{{ $proposal['proposal']['programBansos'] }}</td>
                                                                <td>{{ $proposal['recipient']['STATUS DTKS'] }}</td>
                                                                <td>
                                                                    <a href="{{ route('proposal.detail', $proposal['id']) }}" class="btn btn-primary p-2">
                                                                        Detail
                                                                    </a>
                                                                </td>
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
