@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
    <x-common.page-breadcrumb pageTitle="Tambah Pengumuman" />

    <div
        class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 
        dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

        <!-- Title -->
        <h5 class="text-2xl font-semibold mb-6">
            Data Pengumuman
        </h5>

        <!-- Form Container -->
        <div class="flex flex-col gap-6 w-full h-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Row 1 -->
                <div class="flex flex-col">
                    <x-form.date-picker name="tanggal" label="Tanggal" id="tgl" placeholder="Pilih tanggal" />
                </div>
                <div class="flex flex-col">
                    <label for="waktu" class="mb-1 font-medium text-gray-700">Waktu</label>
                    {{-- <x-input id="waktu" name="waktu" class="p-2 w-full" /> --}}
                    {{-- <x-form.time-picker name="jam" label="Jam Mulai" value="{{ $dataAwal->jamMulai ?? '' }}" /> --}}
                    <x-form.time-picker id="waktu" name="waktu" value="" />


                </div>


            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="tempat" class="mb-1 font-medium text-gray-700">Tempat</label>
                    <x-input id="tempat" name="tempat" class="p-2 w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="agenda" class="mb-1 font-medium text-gray-700">Agenda</label>
                    <x-input id="agenda" name="agenda" class="p-2 w-full bg" />
                </div>
            </div>

            <!-- Row 3 -->
            <div class="flex flex-col">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Keterangan
                </label>
                <textarea id="keterangan" placeholder="Masukkan keterangan" type="text" rows="6"
                    class="dark:bg-dark-900  w-full rounded-lg border
                     px-4 py-2.5 text-sm text-gray-800
                      placeholder:text-gray-400 focus:ring-2 focus:outline-hidden
                    dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>

            </div>



        </div>
        <div class="w-full flex justify-end pt-4">
            <x-button id="tambah" class="bg-[#364878] ">
                Tambah
            </x-button>
        </div>


    </div>
@endsection

@push('scripts')
    @include('admin.master.pengumuman.js.create')
@endpush
