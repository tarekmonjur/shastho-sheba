@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/medicines/view')}}">Manage Medicines</a></li>
        <li class="active"><a href="#">Edit Medicine</a></li>
        @if(canAccess("medicines/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('medicines/view')}}"> View Medicines</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('medicines/edit/'.$medicine->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_code') ? ' has-error' : '' }}">
                                    <label for="medicine_code">Medicine Code 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control" readonly name="medicine_code" value="{{$medicine->medicine_code}}" placeholder="Enter Medicine Code">
                                    @if($errors->has('medicine_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('medicine_name') ? ' has-error' : '' }}">
                                    <label for="medicine_name">Medicine Name 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" id="medicine_name" class="form-control medicine_slug" name="medicine_name" value="{{ $medicine->medicine_name }}" placeholder="Enter Medicine Name">
                                    @if($errors->has('medicine_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_type') ? ' has-error' : '' }}">
                                    <label for="medicine_type">Medicine Type 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <select class="form-control select2" name="medicine_type">
                                        <option value="">--- Select Medicine Type ---</option>
                                        @foreach($medicineTypes as $medicineType)
                                            <option value="{{$medicineType->id}}" @if($medicine->medicine_type_id == $medicineType->id) selected @endif>{{$medicineType->type_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('medicine_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_category') ? ' has-error' : '' }}">
                                    <label for="medicine_category">Medicine Category 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <select class="form-control select2" name="medicine_category">
                                        <option value="">--- Select Medicine Category ---</option>
                                        <?php $depth=0; function category($medicineCategories, $depth, $medicine){ foreach($medicineCategories as $category){ $depth++;?>
                                        <option value="{{$category->id}}" @if($medicine->medicine_category_id == $category->id) selected @endif>{{str_repeat('|-- ', $depth).$category->category_name}}</option>
                                        <?php if($category->childRecursive){ category($category->childRecursive, $depth, $medicine);} $depth--; } } category($medicineCategories, $depth, $medicine);?>
                                    </select>
                                    @if ($errors->has('medicine_category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_manufacturer') ? ' has-error' : '' }}">
                                    <label for="medicine_manufacturer">Medicine Manufacturer 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <select class="form-control select2" name="medicine_manufacturer">
                                        <option value="">--- Select Medicine Manufacturer ---</option>
                                        @foreach($medicineCompanies as $medicineCompany)
                                            <option value="{{$medicineCompany->id}}" @if($medicine->medicine_manufacturer_id == $medicineCompany->id) selected @endif>{{$medicineCompany->medicine_company_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('medicine_manufacturer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_manufacturer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_generic') ? ' has-error' : '' }}">
                                    <label for="medicine_generic">Medicine Generic 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <select class="form-control select2" name="medicine_generic">
                                        <option value="">--- Select Medicine Generic ---</option>
                                        @foreach($medicineGenerics as $medicineGeneric)
                                            <option value="{{$medicineGeneric->id}}" @if($medicine->medicine_generic_id == $medicineGeneric->id) selected @endif>{{$medicineGeneric->generic_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('medicine_generic'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_generic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_price') ? ' has-error' : '' }}">
                                    <label for="medicine_price">Medicine Price 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control" name="medicine_price" value="{{ $medicine->medicine_price }}" placeholder="Enter Medicine Price">
                                    @if ($errors->has('medicine_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_unit_per_box') ? ' has-error' : '' }}">
                                    <label for="medicine_unit_per_box">Medicine Unit per Box 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control" name="medicine_unit_per_box" value="{{ $medicine->medicine_unit_per_box }}" placeholder="Enter Medicine Unit per Box">
                                    @if ($errors->has('medicine_unit_per_box'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_unit_per_box') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_unit_per_strip') ? ' has-error' : '' }}">
                                    <label for="medicine_unit_per_strip">Medicine Unit per Strip 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control" name="medicine_unit_per_strip" value="{{ $medicine->medicine_unit_per_strip }}" placeholder="Enter Medicine Unit per Strip">
                                    @if ($errors->has('medicine_unit_per_strip'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_unit_per_strip') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_power') ? ' has-error' : '' }}">
                                    <label for="medicine_power">Medicine Power 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" id="medicine_power" class="form-control medicine_slug" name="medicine_power" value="{{ $medicine->medicine_power }}" placeholder="Enter Medicine power">
                                    @if ($errors->has('medicine_power'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_power') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_manufacture_date') ? ' has-error' : '' }}">
                                    <label for="medicine_manufacture_date">Medicine Manufacture Date 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control datepicker" name="medicine_manufacture_date" value="{{ $medicine->medicine_manufacture_date }}" placeholder="Enter Medicine Manufacture Date">
                                    @if ($errors->has('medicine_manufacture_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_manufacture_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_expiry_date') ? ' has-error' : '' }}">
                                    <label for="medicine_expiry_date">Medicine Expiry Date 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" class="form-control datepicker" name="medicine_expiry_date" value="{{ $medicine->medicine_expiry_date }}" placeholder="Enter Medicine Expiry Date">
                                    @if ($errors->has('medicine_expiry_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_expiry_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicine_image') ? ' has-error' : '' }}">
                                    <label for="medicine_image">Medicine Image</label>
                                    <input type="file" class="form-control" name="medicine_image" placeholder="Enter Medicine Image">
                                    @if ($errors->has('medicine_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img src="{{$medicine->mediumPhoto}}" alt="" width="80px">
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('medicine_is_new') ? ' has-error' : '' }}">
                                    <label for="medicine_is_new">Is New Medicine? 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <div>
                                        <input type="radio" name="medicine_is_new" value="yes" class="flat-green" @if($medicine->medicine_is_new == 'yes') checked @endif>
                                        <strong>Yse New</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="medicine_is_new" value="no" class="flat-red" @if($medicine->medicine_is_new == 'no') checked @endif>
                                        <strong>Not New</strong>
                                    </div>
                                    @if ($errors->has('medicine_is_new'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_is_new') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('medicine_is_active') ? ' has-error' : '' }}">
                                    <label for="medicine_is_new">Is Active Medicine? 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <div>
                                        <input type="radio" name="medicine_is_active" value="yes" class="flat-green" @if($medicine->medicine_is_active == 'yes') checked @endif>
                                        <strong>Yse Active</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="medicine_is_active" value="no" class="flat-red" @if($medicine->medicine_is_active == 'no') checked @endif>
                                        <strong>No Inactive</strong>
                                    </div>
                                    @if ($errors->has('medicine_is_active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_is_active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_slug') ? ' has-error' : '' }}">
                                    <label for="medicine_slug">Medicine Slug 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <input type="text" id="medicine_slug" class="form-control" name="medicine_slug" value="{{ $medicine->medicine_slug }}" placeholder="Enter Medicine Slug">
                                    @if ($errors->has('medicine_slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_stock') ? ' has-error' : '' }}">
                                    <label for="medicine_is_new">In Stock Available? 
                                        <!-- <span class="text-danger">*</span> -->
                                    </label>
                                    <div>
                                        <input type="radio" name="medicine_stock" value="yes" class="flat-green" @if($medicine->medicine_stock == 'yes') checked @endif>
                                        <strong>Yse Available</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="medicine_stock" value="no" class="flat-red" @if($medicine->medicine_stock == 'no') checked @endif>
                                        <strong>Not Available</strong>
                                    </div>
                                    @if ($errors->has('medicine_stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_side_effect') ? ' has-error' : '' }}">
                                    <label for="medicine_side_effect">Medicine Side Effect </label>
                                    <textarea class="form-control" name="medicine_side_effect" placeholder="Enter Medicine Side Effect">{{$medicine->medicine_side_effect}}</textarea>
                                    @if ($errors->has('medicine_side_effect'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_side_effect') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_description') ? ' has-error' : '' }}">
                                    <label for="medicine_description">Medicine Description </label>
                                    <textarea id="medicine_description" class="form-control" name="medicine_description" placeholder="Enter Medicine Description">{{$medicine->medicine_description}}</textarea>
                                    @if ($errors->has('medicine_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_cashback') ? ' has-error' : '' }}">
                                    <label for="medicine_cashback">Medicine CashBack </label>
                                    <textarea class="form-control" name="medicine_cashback" placeholder="Enter Medicine CashBack">{{$medicine->medicine_cashback}}</textarea>
                                    @if ($errors->has('medicine_cashback'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_cashback') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('medicine_note') ? ' has-error' : '' }}">
                                    <label for="medicine_note">Medicine Note </label>
                                    <textarea id="medicine_note" class="form-control" name="medicine_note" placeholder="Enter Medicine Note">{{$medicine->medicine_note}}</textarea>
                                    @if ($errors->has('medicine_note'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Medicine</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function toSlug(name, power, showId) {
        var name_slug =  name.toLowerCase().replace(/-+/g, '').replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        var power_slug =  power.toLowerCase().replace(/-+/g, '').replace(/\s+/g, '').replace(/[^a-z0-9-]/g, '');
        var slug = name_slug+'-'+power_slug;
        document.getElementById(showId).value = slug;
    }

    $(document).on("keyup",".medicine_slug",function () {
        var name = $("#medicine_name").val();
        var power = $("#medicine_power").val();
        toSlug(name, power, 'medicine_slug');
    });

</script>
@endpush
