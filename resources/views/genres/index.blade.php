@extends('layouts.app')
@section('title', 'Manage Genre | MovieApp')

@section('content')
    {{-- CREATE GENRE --}}
    @include('genres.create')

    <div class="container mt-5">
        <div class="col-md-7 bg-light rounded p-3">
            {{-- HEADER --}}
            <h3 class="text-dark">Manage Genres</h3>
            <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni facere, consectetur
                maiores maxime laborum</p>
            <hr>
            
            {{-- TABLE --}}
            <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#createGenreModal"><i
                    class="uil uil-plus-circle me-1"></i>Buat Genre</a>
            @if (session('success_msg'))
                <div class="alert alert-success mt-3">{{ session('success_msg') }}</div>
            @endif
            <table class="table table-success table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Genre</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $genre->title }}</td>
                            <td>
                                <a href="{{ route('editGenre', $genre->id) }}" class="text-primary"><i class="uil uil-edit"></i></a>
                                <a href="" class="text-danger" onclick="event.preventDefault();document.getElementById('delete-form').submit()">
                                    <i class="uil uil-trash-alt"></i>
                                    <form action="{{ route('deleteGenre', $genre->id) }}" method="POST" id="delete-form" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
