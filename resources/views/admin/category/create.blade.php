@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/categories/view')}}">Manage Medicine Categories</a></li>
        <li class="active"><a href="#">Create Medicine Category</a></li>
        @if(canAccess("categories/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('categories/view')}}"> View Medicine Categories</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('categories/create')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_category_type') ? ' has-error' : '' }}">
                                    <label for="medicine_category_type">Medicine Category Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="medicine_category_type" id="medicine_category_type">
                                        <?php $depth=0; function category($categories, $depth){ foreach($categories as $category){ $depth++;?>
                                        <option value="{{$category->id}}" @if(old('medicine_category_type') == $category->id) selected @endif>{{str_repeat('|-- ', $depth).$category->category_name}}</option>
                                        <?php if($category->childRecursive){ category($category->childRecursive, $depth);} $depth--; } } category($categories, $depth);?>
                                    </select>
                                    @if ($errors->has('medicine_category_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_category_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_category_name') ? ' has-error' : '' }}">
                                    <label for="medicine_category_name">Medicine Category Name <span class="text-danger">*</span></label>
                                    <input type="text" onkeyup="toSlug(this.value)" class="form-control" name="medicine_category_name" value="{{ old('medicine_category_name') }}" placeholder="Enter Medicine Category Name">
                                    @if ($errors->has('medicine_category_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_category_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_category_slug') ? ' has-error' : '' }}">
                                    <label for="medicine_category_slug">Medicine Category Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="medicine_category_slug" class="form-control" name="medicine_category_slug" value="{{ old('medicine_category_slug') }}" placeholder="Enter Medicine Category Slug">
                                    @if ($errors->has('medicine_category_slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_category_slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('category_status') ? ' has-error' : '' }}">
                                    <label for="category_status">Category Status <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="category_status" value="active" class="flat-green" checked>
                                        <strong>Active</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="category_status" value="inactive" class="flat-red">
                                        <strong>Inactive</strong>
                                    </div>
                                    @if ($errors->has('category_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('is_feature') ? ' has-error' : '' }}">
                                    <label for="is_feature">Is Feature Category? <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="is_feature" value="yes" class="flat-green" checked>
                                        <strong>Yse Feature</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="is_feature" value="no" class="flat-red">
                                        <strong>Not Feature</strong>
                                    </div>
                                    @if ($errors->has('is_feature'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_feature') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('is_top') ? ' has-error' : '' }}">
                                    <label for="is_top">Show Top Right Side? <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="is_top" value="yes" class="flat-green">
                                        <strong>Yse Show Top Right Side</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="is_top" value="no" class="flat-red" checked>
                                        <strong>Not Show Top Right Side</strong>
                                    </div>
                                    @if ($errors->has('is_top'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_top') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('category_image_box') ? ' has-error' : '' }}">
                                    <label for="category_image_box">Category Image for Box<span class="text-danger">*</span> ( size : 200 x 200 )</label>
                                    <input type="file" class="form-control" name="category_image_box">
                                    @if ($errors->has('category_image_box'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_image_box') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('category_image_top_banner') ? ' has-error' : '' }}">
                                    <label for="category_image_top_banner">Category Image for Top Banner ( size : 1920 x 350 )</label>
                                    <input type="file" class="form-control" name="category_image_top_banner">
                                    @if($errors->has('category_image_top_banner'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_image_top_banner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('category_image_banner') ? ' has-error' : '' }}">
                                    <label for="category_image_banner">Category Image for Banner ( size : 745 x 135 )</label>
                                    <input type="file" class="form-control" name="category_image_banner">
                                    @if ($errors->has('category_image_banner'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_image_banner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create Medicine Category</button>
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
        document.getElementById('medicine_category_slug').value = slug;
    }

</script>
@endpush
