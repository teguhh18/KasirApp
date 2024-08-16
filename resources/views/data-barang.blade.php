@extends('layouts.app')
@section('h1', 'Data Barang')
@section('breadcrumb', 'Data Barang')
@section('title', 'Data Barang')

@section('content')
    <!-- Memanggil Livewire Component -->
    @livewire('barang')
@endsection
