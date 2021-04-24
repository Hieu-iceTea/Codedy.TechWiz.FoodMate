@extends('admin.layout.master')

@section('title', 'Product')

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
                        Product
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="../{{ request()->segment(3) == 'create' ? 'admin/product' : 'admin/product/' . $product->id }}" enctype="multipart/form-data">
                            @csrf

                            @if(request()->segment(3) != 'create')
                                @method('PUT')
                            @endif

                            <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap overflow-auto" id="image">

                                    <li class="d-inline-block" id="add-image-icon">
                                        <img id="thumbnail" style="height: 150px; cursor: pointer;" class="thumbnail"
                                             data-toggle="tooltip" title="Click to add image"
                                             data-placement="bottom" src="{{ request()->segment(3) != 'create' ? '/front/data-images/products/'.$product->image : 'assets/images/add-image-icon.jpg'}}"
                                             alt="Add Image">
                                        <input name="image" id="image" type="file" onchange="changeImg(this)"
                                               class="image form-control-file" style="display: none;">

                                        <input type="hidden" name="image_old" value="{{$product->image ?? ''}}">
                                        <small class="form-text text-muted">
                                            {{ isset($product->image) ? 'Look at it, it looks great! (Click on the image to change)' : 'No images, upload them! (Click on the image to change)' }}
                                        </small>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id"
                                   class="col-md-3 text-md-right col-form-label">Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="name" id="name" placeholder="Name" type="text"
                                       class="form-control" value="{{ old('name') ?? $product->name ?? '' }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id"
                                   class="col-md-3 text-md-right col-form-label">Category</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="product_category_id" id="product_category_id" class="form-control">
                                    <option value=" {{$product->category->id ?? ''}}">
                                        {{$product->category->name ?? ''}}
                                    </option>
                                    {{$i = 1}}
                                    @foreach($categories ?? '' as $category)
                                        @if($product->category->name ??'' != $category->name)
                                    <option value="{{++$i}}">
                                        {{$category->name}}
                                    </option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>

                            <div class="position-relative row form-group">
                                <label for="restaurant_id"
                                       class="col-md-3 text-md-right col-form-label">Restaurant</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="restaurant_id" id="restaurant_id" class="form-control">
                                        <option value="{{$product->restaurant->id ?? ''}}">{{$product->restaurant->name ?? ''}}</option>
                                        {{$i = 0}}
                                        @foreach($restaurants ?? '' as $restaurant)
                                            @if($product->restaurant->name ?? '' != $restaurant)
                                            <option value="{{++$i}}">
                                                {{$restaurant->name ??''}}
                                            </option>
                                                @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        <div class="position-relative row form-group">
                            <label for="price"
                                   class="col-md-3 text-md-right col-form-label">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="price" id="price"
                                       placeholder="$ Price" type="text" class="form-control" value="{{ old('price') ?? $product->price ?? '' }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="discount"
                                   class="col-md-3 text-md-right col-form-label">Ingredients</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="ingredients" id="ingredients"
                                       placeholder="ingredients" type="text" class="form-control" value="{{ old('ingredients') ?? $product->ingredients ?? '' }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty"
                                   class="col-md-3 text-md-right col-form-label">Country</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="country" id="country"
                                       placeholder="country" type="text" class="form-control" value="{{ old('country') ?? $product->country ?? '' }}">
                            </div>
                        </div>
                            {{--Description--}}
                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea required name="description" id="description">
                                        {{ old('description') ?? $product->description ?? ''}}
                                    </textarea>
                                </div>
                            </div>
                        <div class="position-relative row form-group">
                            <label for="featured"
                                   class="col-md-3 text-md-right col-form-label">Feature</label>

                            @if($product->featured ?? '')

                            <div class="form-check ml-3 mr-3">
                                <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault1" value="1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="featured" value="0" id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>

                            @else
                                <div class="form-check ml-3 mr-3">
                                    <input class="form-check-input" type="radio" name="featured" value="1" id="flexRadioDefault1" value="" >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="featured" value="0" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        No
                                    </label>
                                </div>

                            @endif

                        </div>


                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="../admin/product" class="border-0 btn btn-outline-danger mr-1">
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
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
