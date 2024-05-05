@extends('layouts.app')

@section('content')
    <!-- Body Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-xl">
                                <!-- Card -->
                                <div class="card box-margin">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="text-uppercase font-14">
                                                    Total Penerima Bansos
                                                </h6>

                                                <!-- Heading -->
                                                <span class="font-24 text-dark mb-0">
                                                    {{ $totalRecipients }}
                                                </span>
                                            </div>

                                            <div class="col-auto">
                                                <!-- Icon -->
                                                <div class="icon">
                                                    <img src="/assets/img/bg-img/icon-10.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-xl">
                                <!-- Card -->
                                <div class="card box-margin">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="font-14 text-uppercase">
                                                    Total Pengusul
                                                </h6>
                                                <!-- Heading -->
                                                <span class="font-24 text-dark mb-0">
                                                    {{ $totalProposals }}
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Icon -->
                                                <div class="icon">
                                                    <img src="/assets/img/bg-img/icon-9.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-xl">
                                <!-- Card -->
                                <div class="card box-margin">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="font-14 text-uppercase">
                                                    Total Tanggapan
                                                </h6>
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col-auto">
                                                        <!-- Heading -->
                                                        <span class="font-24 text-dark mr-2">
                                                            {{ $totalResponses }}
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <!-- Icon -->
                                                <div class="icon">
                                                    <img src="/assets/img/bg-img/icon-11.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <div class="card bg-boxshadow full-height">
                                <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                                    <div class="widgets-card-title">
                                        <h5 class="card-title mb-0">Total Pendataan</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="proposalPieChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 mb-3">
                            <div class="card bg-boxshadow full-height">
                                <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                                    <div class="widgets-card-title">
                                        <h5 class="card-title mb-0">Total Pendataan</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="dailyDataBarChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- <form action="{{ route('convert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="json_file">Pilih File Excel:</label>
                                    <input type="file" class="form-control-file" id="json_file" name="json_file">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload & Convert</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data total proposal dan total response
        var totalProposals = <?php echo $totalProposals; ?>;
        var totalResponses = <?php echo $totalResponses; ?>;

        // Inisialisasi pie chart
        var ctx = document.getElementById('proposalPieChart').getContext('2d');
        var proposalPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Total Pengusul', 'Total Tanggapan'],
                datasets: [{
                    label: 'Pengusul vs Tanggapan',
                    data: [totalProposals, totalResponses],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Merah
                        'rgba(54, 162, 235, 0.6)', // Biru
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        // Data per hari untuk proposal dan response (contoh)
        var dailyProposalData = <?php echo json_encode($proposalData); ?>;
        var dailyResponseData = <?php echo json_encode($responseData); ?>;

        // Inisialisasi grafik batang
        var ctx = document.getElementById('dailyDataBarChart').getContext('2d');
        var dailyDataBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(dailyProposalData), // Menggunakan kunci tanggal sebagai label
                datasets: [{
                    label: 'Proposal',
                    data: Object.values(dailyProposalData), // Mengambil nilai proposal
                    backgroundColor: 'rgba(255, 99, 132, 0.6)', // Warna merah
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Response',
                    data: Object.values(dailyResponseData), // Mengambil nilai response
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna biru
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
