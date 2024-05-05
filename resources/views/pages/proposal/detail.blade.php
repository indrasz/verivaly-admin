@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Nama
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['NAMA'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                NIK
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['NIK'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Alamat
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['ALAMAT'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Tanggal Lahir
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['TANGGAL LAHIR'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Umur
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['UMUR'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Desa
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['DESA'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Kabupaten
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['KABUPATEN'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Kecamatan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['KECAMATAN'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Bansos
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['BANSOS'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Status DTKS
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $recipientData['STATUS DTKS'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card box-margin">
                                <div class="card-body">
                                    {{-- <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Nama Lengkap
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['namaLengkap'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3"> --}}
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                NIK
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['nik'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                No KK
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['noKK'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Tempat Tangal Lahir
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span
                                                class="font-14">{{ $individualData['tempatLahir'], $individualData['tanggalLahir'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Jenis Kelamin
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['jenisKelamin'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Jenis Pekerjaan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['jenisPekerjaan'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Status Perkawinan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['statusPerkawinan'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Pendidikan Terakhir
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['pendidikanTerakhir'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Kelurahan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['kelurahan'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Kecamatan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['kecamatan'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Lingkungan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $individualData['lingkungan'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah memiliki tempat berteduh tetap sehari hari?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question1'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah kepala keluarga atau pengurus keluarga masih berkerja?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question2'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah pengeluaran pangan lebih besar (> 70%) dari total pengeluaran?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question3'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah tempat tinggal sebagian besar berlantai tanah dan/atau plesteran?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question4'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah tempat tinggal memiliki fasilitas buang air kecil / besar sendiri?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question5'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah target survey tinggal bersama anggota keluarga yang lain?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question6'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah pernah khawatir atau pernah tidak makan dalam setahun terakhir?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question7'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah ada pengeluaran untuk pakaian selama 1 (satu) tahun terakhir?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question8'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah tempat tinggal sebagian besar berdinding bambu / kawat / kayu?

                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question9'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Apakah sumber penerangan berasal dari listrik dengan daya 450V atau bukan
                                                listrik?
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $surveyData['question10'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Program Bansos yang diajukan
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $proposalData['programBansos'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Disabilitas
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $proposalData['disabilitas'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Tanggal Hamil
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $proposalData['tanggalHamil'] }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Status Orang Tua
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $proposalData['statusOrangTua'] }}</span>
                                        </div>
                                    </div>

                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14 mb-0">
                                                Koordinat Rumah
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="font-14">{{ $proposalData['mapsLatitude'], $proposalData['mapsLongitude'] }}</span>
                                        </div>
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
