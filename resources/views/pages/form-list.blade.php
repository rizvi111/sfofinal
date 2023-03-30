@extends('admin')

@section('content')

            <!-- End breadcum -->
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <div class="title-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Date & time</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>IP Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($form_list->sortByDesc('created_at') as $flist)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $flist->created_at->format('Y-m-d H:i:s') }}</td>
        <td>{{ $flist->fname .' '. $flist->sname }}</td>
        <td>{{ $flist->email }}</td>
        <td>{{ $flist->phone }} @if($flist->mobile), {{ $flist->mobile }}@endif</td>
        <td>{{ $flist->ip_address }}</td>
        <td><a class="btn btn-primary" href="{{ route('form.view', $flist->id) }}"><i class="nav-icon fa fa-eye"></i></a></td>
    </tr>
@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection