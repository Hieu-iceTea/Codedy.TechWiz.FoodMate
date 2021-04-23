@extends('admin.layout.master')

@section('title', 'Order')

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
                        Order
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
                        <form method="post" enctype="multipart/form-data">
                            <div class="position-relative row form-group">
                                <label for="image"
                                       class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;"
                                         class="thumbnail rounded-circle" data-toggle="tooltip"
                                         title="Click to change the image" data-placement="bottom"
                                         src="assets/images/_default-user.png" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                           class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="">
                                    <small class="form-text text-muted">
                                        Click on the image to change
                                    </small>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                       class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="description" id="description"
                                           placeholder="Description" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                    Company Name
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="company_name" id="company_name"
                                           placeholder="Company Name" type="text" class="form-control"
                                           value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="country"
                                       class="col-md-3 text-md-right col-form-label">Country</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="country" id="country" placeholder="Country"
                                           type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                    Street Address
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="street_address" id="street_address"
                                           placeholder="Street Address" type="text" class="form-control"
                                           value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                    Postcode Zip
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="postcode_zip" id="postcode_zip"
                                           placeholder="Postcode Zip" type="text" class="form-control"
                                           value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                    Town City
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="town_city" id="town_city" placeholder="Town City"
                                           type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone"
                                       class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="phone" id="phone" placeholder="Phone" type="tel"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level"
                                       class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="level" id="level" class="form-control">
                                        <option value="">-- Level --</option>
                                        <option value=0>
                                            Host
                                        </option>
                                        <option value=1>
                                            Admin
                                        </option>
                                        <option value=2>
                                            Client
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="#" class="border-0 btn btn-outline-danger mr-1">
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
