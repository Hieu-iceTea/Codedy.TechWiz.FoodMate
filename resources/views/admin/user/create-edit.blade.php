@extends('admin.layout.master')

@section('title', 'User')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        User
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="../{{ request()->segment(3) == 'create' ? 'admin/user' : 'admin/user/' . $user->id }}" enctype="multipart/form-data">
                            @csrf

                            @if(request()->segment(3) != 'create')
                                @method('put')
                            @endif

                            @include('components.errors')
                            @include('components.notifications')

                            <div class="position-relative row form-group">
                                <label for="image"
                                       class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;"
                                         class="thumbnail rounded-circle" data-toggle="tooltip"
                                         title="Click to change the image" data-placement="bottom"
                                         src="{{ isset($user->image) ? '../front/data-images/user/' . $user->image : '../dashboard/assets/images/add-image-icon.jpg' }}" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                           class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="">
                                    <small class="form-text text-muted">
                                        {{ isset($user->image) ? 'Look at it, it looks great! (Click on the image to change)' : 'No images, upload them! (Click on the image to change)' }}
                                    </small>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="user_name" class="col-md-3 text-md-right col-form-label">User Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="user_name" id="user_name" placeholder="User_name" type="text"
                                           class="form-control" value="{{ old('user_name') ?? $user->user_name ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                       class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                           class="form-control" value="{{ old('email') ?? $user->email ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password"
                                       class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Password" type="password"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="password_confirmation"
                                       class="col-md-3 text-md-right col-form-label">Confirm Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password_confirmation" id="password_confirmation"
                                           placeholder="Confirm Password" type="password"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="level" id="level" class="form-control">
                                        <option>-- Level --</option>

                                        @foreach(\App\Utilities\Constant::$user_levels as $user_level)
                                            <option
                                                value = {{ array_search($user_level, \App\Utilities\Constant::$user_levels) }}
                                                {{ (old('level') ?? $user->level ?? '') == array_search($user_level, \App\Utilities\Constant::$user_levels) ? 'selected' : '' }}>
                                                {{ $user_level }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>



                            <div class="position-relative row form-group">
                                <label for="gender" class="col-md-3 text-md-right col-form-label">Gender</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="gender" id="gender" class="form-control">
                                        <option>-- Gender --</option>
                                        <option
                                            value="1" {{ (old('gender') ?? $user->gender ?? '') == 1 ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option
                                            value="2" {{ (old('gender') ?? $user->gender ?? '') == 2 ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="first_name" class="col-md-3 text-md-right col-form-label">
                                    First Name
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="first_name" id="first_name"
                                           placeholder="First_name" type="text" class="form-control"
                                           value="{{ old('first_name') ?? $user->first_name ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="last_name"
                                       class="col-md-3 text-md-right col-form-label">Last Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="last_name" id="last_name" placeholder="Last_name" type="tel"
                                           class="form-control" value="{{ old('last_name') ?? $user->last_name ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone "
                                       class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="phone " id="phone " placeholder="Phone " type="tel"
                                           class="form-control" value="{{ old('phone') ?? $user->phone ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="city"
                                       class="col-md-3 text-md-right col-form-label">City</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="city" id="city" placeholder="City" type="tel"
                                           class="form-control" value="{{ old('city') ?? $user->city ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="street"
                                       class="col-md-3 text-md-right col-form-label">Street</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="street" id="street" placeholder="Street" type="tel"
                                           class="form-control" value="{{ old('street') ?? $user->street ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="active" class="col-md-3 text-md-right col-form-label">Status</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="active" id="active" type="checkbox" value=1
                                               {{ (old('active') ?? $user->active ?? '') == 1 ? 'checked' : '' }}
                                               class="form-check-input">
                                        <label for="active" class="form-check-label">Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="../#" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                            class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
