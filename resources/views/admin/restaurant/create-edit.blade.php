@extends('admin.layout.master')

@section('title', request()->segment(3) == 'create' ? 'Create Restaurant' : 'Edit Restaurant')

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
                            Restaurant
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

                            {{--Image--}}
                            <form method="post" action="../{{ request()->segment(3) == 'create' ? 'admin/restaurant' : 'admin/restaurant/' . $restaurant->id}}" enctype="multipart/form-data">
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
                                             class="thumbnail circle" data-toggle="tooltip"
                                             title="Click to change the image" data-placement="bottom"
                                             src="{{ asset('') }}{{ request()->segment(3) != 'create' ? '../front/data-images/restaurants/' . $restaurant->image : '../dashboard/assets/images/add-image-icon.jpg' }}" alt="Avatar">
                                        <input name="image" type="file" onchange="changeImg(this)"
                                               class="image form-control-file" style="display: none;" value="{{ old('image') ?? $restaurant->image ?? ''}}">
                                        <input type="hidden" name="image_old" value="{{ $restaurant->image ?? ''}}">
                                        <small class="form-text text-muted">
                                            {{ isset($restaurant->image) ? 'Look at it, it looks great! (Click on the image to change)' : 'No images, upload them! (Click on the image to change)' }}
                                        </small>
                                    </div>
                                </div>

                                {{--Name--}}
                                <div class="position-relative row form-group">
                                    <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="name" id="name" placeholder="Name" type="text"
                                               class="form-control" value="{{ old('name') ?? $restaurant->name ?? ''}}">
                                    </div>
                                </div>

                                {{--Address--}}
                                <div class="position-relative row form-group">
                                    <label for="email"
                                           class="col-md-3 text-md-right col-form-label">Address</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="address" id="Address" placeholder="Address"
                                               class="form-control" value="{{ old('address') ?? $restaurant->address ?? '' }}">
                                    </div>
                                </div>

                                {{--Description--}}
                                <div class="position-relative row form-group">
                                    <label for="description"
                                           class="col-md-3 text-md-right col-form-label">Description</label>
                                    <div class="col-md-9 col-xl-8">
                                    <textarea required name="description" id="description">
                                        {{ old('description') ?? $restaurant->description ?? ''}}
                                    </textarea>
                                    </div>
                                </div>

                                {{--button--}}
                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="{{ asset('') }}admin/restaurant/" class="border-0 btn btn-outline-danger mr-1">
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


    {{-- ckeditor --}}
    <script src="{{ asset('') }}https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        /*CKEDITOR.replace('description');*/
        // CKEDITOR.config.height = 100; //pixels wide.
    </script>

    <script>
        /*CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html',
            filebrowserUploadUrl: '../plugins/ckfinder_php_3.5.1.1/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });*/

        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html',
            filebrowserImageBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html?type=Flash',
            filebrowserUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Flash'
        });

        //https://ckeditor.com/docs/ckfinder/ckfinder3/#!/guide/dev_ckeditor
    </script>

@endsection
