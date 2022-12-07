@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/companies/view')}}">Manage Medicine Company</a></li>
        <li class="active"><a href="#">Edit Medicine Company</a></li>
        @if(canAccess("companies/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('companies/view')}}"> View Medicine Company</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('companies/edit/'.$company->id)}}">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_company_name') ? ' has-error' : '' }}">
                                    <label for="medicine_company_name">Medicine Company Name <span class="text-danger">*</span></label>
                                    <input type="text" onkeyup="toSlug(this.value)" class="form-control" name="medicine_company_name" value="{{ $company->medicine_company_name }}" placeholder="Enter Medicine Company Name">
                                    @if ($errors->has('medicine_company_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('medicine_company_slug') ? ' has-error' : '' }}">
                                    <label for="medicine_company_slug">Medicine Company Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="medicine_company_slug" class="form-control" name="medicine_company_slug" value="{{ $company->medicine_company_slug }}" placeholder="Enter Medicine Company Slug">
                                    @if ($errors->has('medicine_company_slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_company_slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_company_status') ? ' has-error' : '' }}">
                                    <label for="medicine_company_status">Medicine Company Status <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="medicine_company_status" value="active" class="flat-green" @if($company->medicine_company_status == 'active') checked @endif>
                                        <strong>Active</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="medicine_company_status" value="inactive" class="flat-red" @if($company->medicine_company_status == 'inactive') checked @endif>
                                        <strong>Inactive</strong>
                                    </div>
                                    @if ($errors->has('medicine_company_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_company_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_company_address') ? ' has-error' : '' }}">
                                    <label for="medicine_company_address">Medicine Company Address</label>
                                    <textarea class="form-control" name="medicine_company_address" placeholder="Enter Medicine Company Address">{{ $company->medicine_company_address }}</textarea>
                                    @if ($errors->has('medicine_company_address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('medicine_company_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add Medicine Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function toSlug(value) {
        var slug =  value.toLowerCase().replace(/-+/g, '').replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        document.getElementById('medicine_company_slug').value = slug;
    }

</script>
@endpush
