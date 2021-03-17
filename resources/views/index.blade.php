@extends('layouts.app')
@section('content')

<a href="javascript:void(0)" id="createNewNotes" class="btn btn-lg btn-secondary fw-bold align-star border-white bg-white">Create Todo's</a>
<table class="table text-white data-table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Date Created</th>
            <th scope="col">Recently Updates at</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@include('layouts.modal')
@endsection

@push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
@endpush
