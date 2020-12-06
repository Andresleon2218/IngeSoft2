@extends('layouts.app')

@section('logueado')
<div class="container">
    <div class="row justify-content-center">
        <div class="x_title">
           <a>
           @if (session('status'))
                        < class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </>
                    @endif
                    {{ __('Logueado') }}
           </a>
           
                            
              
    </div>
</div>
@endsection
