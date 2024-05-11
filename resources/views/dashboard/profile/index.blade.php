@extends('layouts.master')

@section('page-icon')
<i class="fa-regular fa-address-card"></i>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6 col-lg-6">
                                <!-- Info Block -->
                                <div class="block">
                                    <!-- Info Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Friend Request"><i class="fa fa-plus"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Hire"><i class="fa fa-briefcase"></i></a>
                                        </div>
                                        <h2>About <strong>John Doe</strong> <small>• <i class="fa fa-file-text text-primary"></i> <a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Download Bio in PDF">Bio</a></small></h2>
                                    </div>
                                    <!-- END Info Title -->

                                    <!-- Info Content -->
                                    <table class="table table-borderless table-striped">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%;"><strong>Info</strong></td>
                                                <td>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non.</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Founder</strong></td>
                                                <td><a href="javascript:void(0)">Company Inc</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Education</strong></td>
                                                <td><a href="javascript:void(0)">University Name</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Projects</strong></td>
                                                <td><a href="javascript:void(0)" class="label label-danger">168</a></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Best Skills</strong></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="label label-info">HTML</a>
                                                    <a href="javascript:void(0)" class="label label-info">CSS</a>
                                                    <a href="javascript:void(0)" class="label label-info">Javascript</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Info Content -->
                                </div>
                                <!-- END Info Block -->

    </div>

    <div class="col-md-6 col-lg-6">
                                        <!-- Friends Block -->
                                <div class="block">
                                    <!-- Friends Title -->
                                    <div class="block-title">
                                        <h2>New <strong>Friends</strong> <small>• <a href="javascript:void(0)">{{ $users->count() }}</a></small></h2>
                                    </div>
                                    <!-- END Friends Title -->

                                    <!-- Friends Content -->
                                    <div class="row text-center">
                                     @forelse ($users as $user)
                                           <div class="col-xs-4 col-sm-3 col-lg-2 block-section">
                                               <a href="javascript:void(0)">
                                                   <img class="w-[50px] h-[50px] rounded-full object-cover" src="{{ asset('uploads/profile_image') }}/{{ $user->picture }}" alt="{{ $user->picture }}" class="img-circle" data-toggle="tooltip" title="" data-original-title="{{ $user->firstname }}">
                                               </a>
                                           </div>
                                     @empty
                                           <div class="col-xs-4 col-sm-3 col-lg-2 block-section">
                                               <a href="javascript:void(0)">
                                                   <img src="img/placeholders/avatars/avatar13.jpg" alt="image" class="img-circle" data-toggle="tooltip" title="" data-original-title="Username">
                                               </a>
                                           </div>
                                     @endforelse
                                    </div>
                                    <!-- END Friends Content -->
                                </div>
                                <!-- END Friends Block -->
    </div>
</div>

@endsection
