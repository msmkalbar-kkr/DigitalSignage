@extends('layouts.app')

@section('title', 'Struktur Organisasi')

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
                    <x-input id="nama" name="nama" class="p-2 w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="nip" class="mb-1 font-medium text-gray-700">NIP</label>
                    <x-input id="nip" name="nip" class="p-2 w-full bg" />
                </div>
            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="nor" class="mb-1 font-medium text-gray-700">Jabatan</label>
                    <x-form.form-elements.simple-select id="jabatan" name="jabatan">
                        <option selected disabled value="">Pilih Jabatan</option>
                        <option value="Kepala Badan" data-kode="KB">Kepala Badan</option>
                        <option value="Sekretariat" data-kode="S">Sekretariat</option>
                        <option value="Sekretariat 2" data-kode="S2">Sekretariat 2</option>
                        <option value="Kepala Jabatan Fungsional" data-kode="KJ">Kepala Jabatan Fungsional</option>
                        <option value="Kepala Bidang Anggaran" data-kode="KBA">Kepala Bidang Anggaran</option>
                        <option value="Kepala Bidang Penatausahaan" data-kode="KBP">Kepala Bidang Penatausahaan</option>
                        <option value="Kepala Bidang Akuntansi & Pelaporan" data-kode="KBAP">Kepala Bidang Akuntansi &
                            Pelaporan</option>
                        <option value="Kepala Bidang Pengelolaan Aset Daerah" data-kode="KBPAD">Kepala Bidang Pengelolaan
                            Aset Daerah</option>

                    </x-form.form-elements.simple-select>
                    <x-input id="kode" name="kode" class="p-2 w-full hidden" />

                </div>


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
    @include('admin.master.struktur.js.create')
@endpush
