@extends('layouts.master')


@section('page-icon')
<i class="fa-solid fa-icons"></i>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <!-- Horizontal table Block -->
        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Categories</strong> Lists,</h2>
                            </div>

                            <div class="table-responsive">
                                <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer">

                                    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
                                    <thead>
                                        <tr role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 58px;">ID</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 90px;"><i class="gi gi-user"></i></th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending" style="width: 112px;">Title</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Subscription: activate to sort column ascending" style="width: 211px;">Slug</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 134px;">Actions</th></tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <tr role="row" class="odd">
                                                <td class="text-center sorting_1">{{ $loop->index + 1 }}</td>
                                                <td class="text-center"><img class="w-20 h-20 rounded-full object-cover" src="{{ asset('uploads/category') }}/{{$category->image}}" alt="avatar" class="img-circle"></td>
                                                <td><a href="javascript:void(0)">{{$category->title}}</a></td>
                                                <td><span class="label label-info">{{$category->slug}}</span></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                        <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="example-datatable_info" role="status" aria-live="polite"><strong>1</strong>-<strong>10</strong> of <strong>60</strong></div></div><div class="col-sm-7 col-xs-12 clearfix flex justify-end">{{ $categories->links() }}</div>
                            </div>
                            </div>
                            </div>
                        </div>

        <!-- END Horizontal table Block -->
    </div>


    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Create New Category</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('category.create')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Category Name</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="title" class="form-control @error('title') border-red-400 @enderror" placeholder="Enter Title..">
                        @error('title')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Category Slug</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="slug" class="form-control @error('slug') border-red-400 @enderror" placeholder="Enter Slug..">
                        @error('slug')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Category Image</label>
                    <div class="col-md-9">
                        <input type="file" id="example-hf-email" onchange="document.querySelector('#previewImg').src = window.URL.createObjectURL(this.files[0])" name="image" class="form-control @error('image') border-red-400 @enderror">
                            <div class="flex justify-center my-5">
                                <img id="previewImg" src="{{ asset('backend_assets') }}/img/placeholders/avatars/avatar2.jpg" class=" flex justify-center object-fill w-[150px] h-[150px] rounded-[4px]">
                            </div>
                        @error('image')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> UPDATE</button>
                    </div>
                </div>
            </form>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
    </div>

</div>

<style>
    .pagination{
        margin: 0px 0px !important;
    }
    .pagination li span{
        border-radius: 10px !important;
    }
</style>

@endsection
