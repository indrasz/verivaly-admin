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
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>NIK</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Status DTKS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recipients as $index => $recipient)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $recipient['NAMA'] }}</td>
                                                            <td>{{ $recipient['NIK'] }}</td>
                                                            <td>{{ $recipient['TANGGAL LAHIR'] }}</td>
                                                            <td>{{ $recipient['ALAMAT'] }}</td>
                                                            <td>{{ $recipient['STATUS DTKS'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
