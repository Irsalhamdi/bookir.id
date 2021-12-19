@extends('frontend.main_master')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.sidebar');

                <div class="col-md-2"></div>

                <div class="col-md-6">
                    <div class="card">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>
    
@endsection