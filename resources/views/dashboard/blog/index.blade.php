@extends('layouts.master')


@section('page-icon')
<i class="fa-brands fa-blogger"></i>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <!-- Horizontal table Block -->
        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Tag</strong> Lists,</h2>
                            </div>

                            <div class="table-responsive">
                                <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer">

                                    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
                                    <thead>
                                        <tr role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 58px;">ID</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending" style="width: 112px;">Title</th><th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Subscription: activate to sort column ascending" style="width: 211px;">Category</th><th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 134px;">Actions</th></tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($blogs as $blog)
                                            <tr role="row" class="odd">
                                                <td class="text-center sorting_1">{{ $blogs->firstItem() + $loop->index }}</td>

                                                <td><a href="javascript:void(0)">{{$blog->title}}</a></td>
                                                <td><span class="label label-info">{{$blog->onecategory->title}}</span></td>
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
                                <div class="row"><div class="col-sm-5 hidden-xs"><div class="dataTables_info" id="example-datatable_info" role="status" aria-live="polite"><strong>1</strong>-<strong>10</strong> of <strong>60</strong></div></div><div class="col-sm-7 col-xs-12 clearfix flex justify-end">{{ $blogs->links() }}</div>
                                {{-- {{ $tags->links() }} --}}
                                {{-- {{ $tags->links() }} --}}
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
                <h2><strong>Create New Blog</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('blog.create')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Blog Name</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="title" class="form-control @error('title') border-red-400 @enderror" placeholder="Enter Title..">
                        @error('title')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Blog Slug</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="slug" class="form-control @error('slug') border-red-400 @enderror" placeholder="Enter Slug..">
                        @error('slug')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Blog Description</label>
                    <div class="col-md-9">
                        {{-- <input type="text" id="example-hf-email" name="slug" class="form-control @error('slug') border-red-400 @enderror" placeholder="Enter Slug..">
                        @error('slug')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror --}}
                        <textarea id="default" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-select">Blog Categories</label>
                    <div class="col-md-9">
                        <select id="example-select" name="category_id" class="form-control" size="1">
                            <option value="0">Please select</option>
                           @foreach ($caregories as $category)
                             <option value="{{ $category->id }}">#{{ $loop->index + 1 }} {{ $category->title }}</option>
                           @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Blog Tags</label>
                    <div class="col-md-9">
                        @foreach ($tags as $tag)
                            <div class="checkbox">
                                <label for="example-checkbox1">
                                    <input type="checkbox" id="example-checkbox1" name="tag_id[]" value="{{ $tag->id }}"> {{ $tag->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Blog Image</label>
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

<script>
 tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>


@endsection
