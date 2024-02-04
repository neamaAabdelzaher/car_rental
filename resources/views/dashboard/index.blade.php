@extends('layouts.dashboard.parent')
@section('page-title', 'Dashboard')
@section('title', 'Dashboard')
@section('content')

    <div class="x_content">
        <div class="row">

            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered border border-danger" style="width:100%">
                        <thead class="bg-info text-light">
                            <tr>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Active</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->title }}</td>
                                    <td>{{ $car->price }}</td>
                                    <td>{{ $car->is_active ? 'Yes' : 'No' }}</td>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="x_content mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered border border-danger"
                                style="width:100%">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>Category Name</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>


                                            <td>{{ $category->category_name }}</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    @endsection
