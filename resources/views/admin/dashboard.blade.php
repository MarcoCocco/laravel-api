@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-secondary m-4 text-center">
            {{ __('Dashboard') }}
        </h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">Ciao, {{ Auth::user()->name }}!</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __("Hai effettuato l'accesso all'area amministrativa.") }}
                    </div>
                    
                    <div class="text-center p-4">
                        <p><a href="{{ route('admin.projects.index') }}">Vai alla lista dei Progetti</a></p>
                        <p><a href="{{ route('admin.types.index') }}">Vai alla lista di tutte le tipologie di un progetto</a></p>
                        <p><a href="{{ route('admin.technologies.index') }}">Vai alla lista di tutte le tecnologie di un progetto</a></p>
                        <p class="pt-3">Oppure</p>
                        <a href="{{ url('/') }}">Torna alla Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
