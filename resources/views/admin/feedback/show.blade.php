@extends('admin.layout.master')

@section('title', 'Feedback')

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
                        Contact
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="{{ url()->current() . '/edit'}}" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                    <span>Edit</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" action="{{ url()->current() . '/' }}">
                    @csrf
                    @method('DELETE')
                    <button class="nav-link btn" type="submit"
                            onclick="return confirm('Do you really want to delete this item?')">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                        <span>Delete</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $feedback->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $feedback->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Message</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $feedback->message }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Main -->

@endsection
