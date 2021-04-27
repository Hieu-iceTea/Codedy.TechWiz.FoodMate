@extends('admin.layout.master')

@section('title', 'Category')

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
                        Category
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

                        <form method="post" action="../{{ request()->segment(3) == 'create' ? 'admin/category' : 'admin/category/' . $category->id }}" enctype="multipart/form-data">
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
                                         src="{{ asset('') }}{{ isset($category->image) ? '../front/data-images/categories/' . $category->image : '../dashboard/assets/images/add-image-icon.jpg' }}" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                           class="image form-control-file" style="display: none;" value="{{ old('image') ?? $category->image ?? ''}}">
                                    <input type="hidden" name="image_old" value="{{ $category->image ?? '' }}">
                                    <small class="form-text text-muted">
                                        {{ isset($caetgory->image) ? 'Look at it, it looks great! (Click on the image to change)' : 'No images, upload them! (Click on the image to change)' }}
                                    </small>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                           class="form-control" value="{{ old('name') ?? $category->name ?? '' }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ asset('') }}admin/category" class="border-0 btn btn-outline-danger mr-1">
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
