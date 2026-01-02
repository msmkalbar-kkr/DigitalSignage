@extends('layouts.app')

@section('title', 'Ulang Tahun')
@section('content')
    <x-common.page-breadcrumb pageTitle="Struktur Organisasi" />
    <div
        class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] 
        xl:px-10 xl:py-12 text-center">
        {{-- <div class="mx-auto w-full max-w-[630px] bg-amber-50"> --}}
        <div id="tambah" class="flex justify-end w-full pb-8">
            <x-button class="bg-[#364878]" onclick="window.location='{{ route('admin.struktur.create') }}'">
                Tambah
            </x-button>

        </div>
        <table id="wajib-table" class="display nowrap w-full">
            <thead>
                <tr>
                    <th></th> <!-- control -->
                    <th>No</th> <!-- DT_RowIndex -->
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>


        </table>




    </div>
@endsection
@push('scripts')
    @include('admin.master.struktur.js.index')
@endpush
