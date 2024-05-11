@extends('layouts.master')

@section('page-icon')
<i class="fa-solid fa-wrench"></i>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>First Name Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.firstname')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">First Name</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="firstname" class="form-control @error('firstname') border-red-400 @enderror" placeholder="Enter Name..">
                        @error('firstname')
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


    {{--  lastname --}}
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Last Name Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.lastname')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Last Name</label>
                    <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="lastname" class="form-control @error('lastname') border-red-400 @enderror" placeholder="Enter Name..">
                        @error('lastname')
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
<div class="row">
    {{-- email --}}
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>E-mail Address Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.email')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">E-mail</label>
                    <div class="col-md-9">
                        <input type="email" id="example-hf-email" name="lastname" class="form-control @error('email') border-red-400 @enderror" placeholder="Enter Email..">
                        @error('email')
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
    {{-- password --}}
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Password Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.password')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Current Password</label>
                    <div class="col-md-9">
                        <input type="password" id="example-hf-email" name="current_password" class="form-control @error('current_password') border-red-400 @enderror" placeholder="Enter Current Password..">
                        @error('current_password')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">New Password</label>
                    <div class="col-md-9">
                        <input type="password" id="example-hf-email" name="password" class="form-control @error('password') border-red-400 @enderror" placeholder="Enter New Password..">
                        @error('password')
                            <span class="help-block text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Password Confirmation</label>
                    <div class="col-md-9">
                        <input type="password" id="example-hf-email" name="password_confirmation" class="form-control" placeholder="Enter Confirmation..">
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

<div class="row">
    <div class="col-md-6">
            <!-- Horizontal Form Block -->
            <div class="block">
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><strong>Profile Picture Update</strong> Form</h2>
                </div>
                <!-- END Horizontal Form Title -->

                <div class="block full">
                    <!-- Dropzone Title -->
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="gi gi-cogwheel"></i></a>
                        </div>
                        <h2><strong>{{ auth()->user()->firstname }}</strong> <small>Drag and Drop files</small></h2>
                    </div>
                    <!-- END Dropzone Title -->
                    <form action="{{route('setting.update.picture')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">upload</label>
                        <div class="col-md-9">
                            <input type="file" onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])" id="example-hf-email" name="picture" class="form-control @error('picture') border-red-400 @enderror">
                            <div class="flex justify-center my-5">
                                <img id="previewImg" src="{{ asset('backend_assets') }}/img/placeholders/avatars/avatar2.jpg" class=" flex justify-center object-fill w-[150px] h-[150px] rounded-[4px]">
                            </div>
                            @error('picture')
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

                </div>
            </div>
            <!-- END Horizontal Form Block -->
        </div>

         <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Biodata Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.biodata')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Biodata</label>
                    <div class="col-md-9">
                        <textarea rows="6" id="example-hf-email" name="biodata" class="form-control @error('biodata') border-red-400 @enderror"></textarea>
                        @error('biodata')
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


<div class="row">
{{-- contact --}}
        <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Contact/Phone Number Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.contact')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Contact</label>
                        <div class="col-md-9">
                        <input type="tel" id="example-hf-email" name="contact" class="form-control @error('contact') border-red-400 @enderror">
                        @error('contact')
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

      {{-- title --}}
    <div class="col-md-6">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Designation Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.title')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Title</label>
                        <div class="col-md-9">
                        <input type="text" id="example-hf-email" name="title" class="form-control @error('title') border-red-400 @enderror">
                        @error('title')
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

<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" data-original-title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Address Update</strong> Form</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <form action="{{route('setting.update.address')}}" method="post" class="form-horizontal form-bordered">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">House Address</label>
                    <div class="col-md-9">
                        <textarea rows="8" id="example-hf-email" name="address" class="form-control @error('address') border-red-400 @enderror"></textarea>
                        @error('address')
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




@endsection
