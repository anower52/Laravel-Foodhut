@extends('layouts.app')

@section('title','Slider')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Contact Message</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Send At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->subject}}</td>
                                        <td>{{$contact->created_at}}</td>
                                        <td>
                                            <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-info btn-sm">
                                                <i class="material-icons"> details</i>
                                            </a>
                                            <form method="post" id="delete-form-{{ $contact->id }}" action="{{route('contact.destroy',$contact->id)}}"
                                            style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="
                                                    if(confirm('Are You Sure? You Want To delete?'))
                                                        {
                                                           event.preventDefault();
                                                           document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                        }
                                                    else {
                                                                event.preventDefault();
                                                         }
                                                    "><i class="material-icons">delete</i></button>
                                        </td>
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

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
    {!! Toastr::message() !!}
    @endpush