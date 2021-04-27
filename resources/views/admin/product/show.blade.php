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

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="../{{ '../admin/product/' . $product->id . '/edit'}}" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                    <span>Edit</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form class="d-inline" action="{{ url()->current() }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn nav-link"
                            type="submit" data-toggle="tooltip" title="Delete"
                            data-placement="bottom"
                            onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                        <span class="ml-1"> Delete</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    <img style="height: 200px;" class="" data-toggle="tooltip"
                                         title="Avatar" data-placement="bottom"
                                         src="../front/data-images/products/{{$product->image}}" alt="Avatar">
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$product->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                Category
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$product->category->name}}</p>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Restaurant</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$product->restaurant->name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <p>${{$product->price}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Ingredients</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$product->ingredients}}</p>
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="country"
                                   class="col-md-3 text-md-right col-form-label">Country</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$product->country}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                Description</label>
                            <div class="col-md-9 col-xl-8">
                                {!!$product->description!!}
                            </div>
                        </div>
                        <a class="nav-link btn" type="submit" href="../admin/product/">

                            <span>Back</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
