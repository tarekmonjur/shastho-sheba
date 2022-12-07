@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/categories/view')}}">Manage Medicine Category</a></li>
        @if(canAccess("categories/create"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/categories/create')}}"> Create Medicine Category</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("categories/edit"))?true:false;
    $delete = (canAccess("categories/delete"))?true:false;
    ?>

    <div class="box">
        <table class="table table-bordered table-striped table-responsive">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Feature</th>
                <th>Top</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $depth=0;
            $i=0;
            function category($categories, $depth, $edit, $delete, $i)
            {
                foreach($categories as $category)
                { $depth++; $i++;
                    ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            {{ str_repeat('|-- ', $depth).$category->category_name}}
                        </td>
                        <td>{{$category->category_slug}}</td>
                        <td>
                            @if($category->is_feature == 'yes')
                                <span class="label label-success">YES</span>
                            @else
                                <span class="label label-danger">NO</span>
                            @endif
                        </td>
                        <td>
                            @if($category->is_top == 'yes')
                                <span class="label label-success">YES</span>
                            @else
                                <span class="label label-danger">NO</span>
                            @endif
                        </td>
                        <td>
                            @if($category->category_status == 'active')
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            @if($category->id != 1 && $category->id != 2)
                            <div class="btn-group">
                                @if($edit == true)
                                    <a class="btn btn-sm btn-primary btn-xs" href="{{url('categories/edit/'.$category->id)}}">Edit</a>
                                @endif
                                @if($delete == true)
                                    <a onclick="return confirmAction('delete', 'Are you sure delete this category?', '{{url('categories/delete/'.$category->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                                @endif
                            </div>
                            @endif
                        </td>
                    </tr>
                    <?php
                    if($category->childRecursive){
                        $i = category($category->childRecursive, $depth, $edit, $delete, $i);
                    }
                    $depth--;
                }
                return $i;
            }
            category($categories, $depth, $edit, $delete, $i);
            ?>
            </tbody>

            <tfoot>
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="80px">Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
