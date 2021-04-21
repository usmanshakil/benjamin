@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Invite User</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{route('inviteUser')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Enter Subject</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Enter Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Enter Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-12">
                        
                            <input type="submit" class="btn btn-info btn-sm" value="Send Invitation" name="send_inv">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
