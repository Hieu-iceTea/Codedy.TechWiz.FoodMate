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
                        Feedback
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

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{ request('search') }}"
                                       placeholder="Search By Email" class="form-control">
                                <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp;
                                            Search
                                        </button>
                                    </span>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <td class="text-center text-muted">#{{ $feedback->id }}</td>
                                    <td >{{ $feedback->name ?? '' }}</td>
                                    <td class="text-center">{{ $feedback->email }}</td>
                                    <td class="text-center">
                                        @if(strlen($feedback->message) > 50)
                                            {{ substr($feedback->message, 0, 50)  . ' ...' }}
                                        @else
                                            {{ $feedback->message }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $feedback->rating }}</td>
                                    <td class="text-center">
                                        <a href="{{ asset('') }}{{ url()->current() . '/' . $feedback->id }}"
                                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation"
                             class="flex items-center justify-between">
                            <div class="flex justify-between flex-1 sm:hidden">
                                            <span
                                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                                « Previous
                                            </span>

                                <a href="{{ asset('') }}#page=2"
                                   class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next »
                                </a>
                            </div>
                        </nav>
                        {{ $feedbacks -> links() }}

                        @if(count($feedbacks) < 1)
                            <div class="text-center font-weight-bold my-3" style="font-size: 120%">
                                Data not found
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
