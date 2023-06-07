@extends('layouts.app')

@section('template_title')
    {{ $pokemon->name ?? "{{ __('Show') Pokemon" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pokemon</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pokemon.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pokemon:</strong>
                            {{ $pokemon->pokemon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
