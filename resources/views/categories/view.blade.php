@extends('layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Clients</li>
                                <li class="breadcrumb-item active">View all transaction</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">All transactions of {{ $client->name }} {{ $client->surname }}
                        </h4>
                            <div class="table-responsive">
                                    <table id="datatable" class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="align-middle">Name</th>
                                                <th class="align-middle">Order date</th>
                                                <th class="align-middle">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->name }} {{ $item->surname }}</td>
                                                    <td>{{ Carbon\Carbon::parse($item->order_date)->format('d.m.Y') }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection