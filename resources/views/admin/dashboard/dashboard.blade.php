@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Dashboard" />

    <div class="min-h-[calc(100vh-80px)] rounded-2xl border border-gray-200 bg-white px-4 py-6 sm:px-6 lg:px-10">

        <div class="flex flex-col gap-8">

            {{-- ===== KPI CARDS ===== --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                {{-- Card --}}
                <div class="flex flex-col justify-between h-24 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">
                        Total Inputan Ulang Tahun
                    </p>
                    <p class="text-2xl font-semibold text-gray-800 text-right">
                        {{ $ulangTahun }}
                    </p>
                </div>


                <div class="flex flex-col justify-between h-24 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">
                        Jumlah Pengumuman
                    </p>
                    <p class="text-2xl font-semibold text-gray-800 text-right">
                        {{ $pengumuman }}
                    </p>
                </div>

                <div class="flex flex-col justify-between h-24 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">
                        Total Struktur Organisasi
                    </p>
                    <p class="text-2xl font-semibold text-gray-800 text-right">
                        {{ $struktur }}
                    </p>
                </div>


            </div>




        </div>
    </div>
@endsection
