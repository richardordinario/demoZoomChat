@extends('layouts.views.master')
@section('content')
<h1 class="text-muted font-weight-bold">
    Subject Management
    <span class="btn btn-info float-right btn_subjectModal">New Subject</span>
</h1>

<nav aria-label="breadcrumb bg-none">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Subject Management</li>
</ol>
</nav>

<div class="row mt-5">
    @foreach($datas as $data)
    <div class="col-md-3">
        <div class="card">
            <div class="card-header pb-0">
                <p>{{$data->subject_code}}
                <span class="text-danger float-right font-weight-bold del_subject" id="{{$data->id}}">
                <i class="nav-icon fas fa-trash"></i>
                </span>
                <span class="mr-2 text-info float-right font-weight-bold edit_subject" id="{{$data->id}}">
                <i class="nav-icon fas fa-edit"></i>
                </span>
                </p>
            </div>
            <div class="card-body">
            {{ $data->subject_description }}
            </div>
            <div class="card-footer">
            {{$data->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
    @endforeach
</div>

<nav class="mt-3">
  <ul class="pagination">
  {{$datas->links()}}
  </ul>
</nav>


<div class="modal fade" id="subjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">New Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="subject_form">
        <div class="form-group">
            <label for="">Subject Code</label>
            <input type="text" class="form-control scode" name="scode">
        </div>
        <div class="form-group">
            <label for="">Subject Description</label>
            <input type="text" class="form-control sdesc" name="sdesc">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary sub_create">Create </button>
        <div class="spinner-border text-primary d-none sub_loading" role="status"> </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger ">
        <h5 class="modal-title font-weight-bold">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center text-muted">Are you sure you want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger sub_delete">Yes</button>
        <div class="spinner-border text-danger d-none subd_loading" role="status"> </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
