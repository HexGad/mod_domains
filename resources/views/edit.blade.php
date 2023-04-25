@extends('dashboard.layouts.base')
@section('toolbar')
    @include('dashboard.layouts.components.toolbar',[
        'title' => 'Domains',
        'breadcrumbs' => [
            ['title'=> 'Home', 'url' => url('/dashboard/')],
            ['title'=> 'Domains', 'url' => route('dashboard.domains.index')],
            ['title'=> 'Edit Domains'],
        ]
    ])
@endsection

@push('styles')
    {{ module_vite('domains', 'resources/assets/sass/app.scss') }}
@endpush


@section('content')
    <div id="app">
        <edit :domain-data="{{json_encode($domain)}}"></edit>
    </div>
@endsection

@push('scripts')
    {{ module_vite('domains', 'resources/assets/js/app.js') }}
@endpush
