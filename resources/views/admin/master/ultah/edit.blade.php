@extends('layouts.app')

@section('title', 'Pegawai Ultah')

@section('content')
    <x-common.page-breadcrumb pageTitle="Tambah Pegawai Ultah" />

    <div
        class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 
        dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

        <!-- Title -->
        <h5 class="text-2xl font-semibold mb-6">
            Data Pegawai
        </h5>

        <!-- Form Container -->
        <div class="flex flex-col gap-6 w-full h-auto">

            <!-- Row 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="nama" class="mb-1 font-medium text-gray-700">Nama</label>
                    <x-input id="nama" name="nama" class="p-2 w-full" value="{{ $dataAwal->nama }}" />
                </div>

                <div class="flex flex-col">
                    <label for="nip" class="mb-1 font-medium text-gray-700">NIP</label>
                    <x-input id="nip" name="nip" class="p-2 w-full bg" value="{{ $dataAwal->nip }}" />
                    <x-input id="id" name="id" class="p-2 w-full bg" value="{{ $dataAwal->id }}" hidden />
                </div>
            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <x-form.date-picker name="tanggal" label="Tanggal Lahir" id="tgl" placeholder="Pilih tanggal"
                        defaultDate="{{ $dataAwal->tanggalLahir }}" />
                </div>
                <div class="flex flex-col">
                    <label for="jabatan" class="mb-1 font-medium text-gray-700">jabatan</label>
                    <x-input id="jabatan" name="jabatan" class="p-2 w-full bg" value="{{ $dataAwal->jabatan }}" />
                </div>


            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="flex flex-col">
                    <label for="foto" class="mb-1 font-medium text-gray-700">foto</label>
                    <x-input id="foto" name="foto" class="p-2 w-full bg" type="file" />
                </div>


                <img id="preview-foto"
                    class="mt-3 w-32 h-32 object-cover rounded border {{ $dataAwal->foto ? '' : 'hidden' }}"
                    src="{{ $dataAwal->foto ? asset('storage/' . $dataAwal->foto) : '' }}" />

            </div>


        </div>
        <div class="w-full flex justify-end pt-4">
            <x-button id="tambah" class="bg-[#364878] ">
                Ubah
            </x-button>
        </div>


    </div>
@endsection

@push('scripts')
    @include('admin.master.ultah.js.edit')
@endpush
