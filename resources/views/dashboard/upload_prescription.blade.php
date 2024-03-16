@extends('site.layouts.layout')

@section('content')



<div class="login-area">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-6">

                <div class="local-login-area">

                    <h1>Prescription Upload</h1>

                    <div class="login-text">

                        <span>Upload your prescription</span>

                    </div>

                    <form method="post" action="{{url('/upload-prescription')}}" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <input type="file" name="prescription" class="form-control btn btn-primary">
                        @if ($errors->has('prescription'))
                            <span class="text-danger">{{ $errors->first('prescription') }}</span>
                        @endif

                        <div style="margin-top: 10px"></div>

                        <div class="col-md-6 padd-less-btn">

                            <button>Upload</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection