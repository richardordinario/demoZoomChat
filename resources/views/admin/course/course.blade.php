@extends('layouts.views.master')
@section('content')
<h1 class="text-muted font-weight-bold">
    Course Management
    <span class="btn btn-info float-right btn_courseModal">New Course</span>
</h1>

<nav aria-label="breadcrumb bg-none">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Course Management</li>
</ol>
</nav>

<div class="row mt-5">
    @foreach($datas as $data)
    <div class="col-md-3">
        <div class="card">
            <div class="card-header pb-0">
                <p>{{$data->course_code}}
                <span class="text-danger float-right font-weight-bold del_course" id="{{$data->id}}">
                <i class="nav-icon fas fa-trash"></i>
                </span>
                <span class="mr-2 text-info float-right font-weight-bold edit_course" id="{{$data->id}}">
                <i class="nav-icon fas fa-edit"></i>
                </span>
                </p>
            </div>
            <div class="card-body">
            {{ $data->course_description }}
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


<div class="modal fade" id="courseModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="course_form">
        <div class="form-group">
            <label for="">Course Code</label>
            <input type="text" class="form-control ccode" name="ccode">
        </div>
        <div class="form-group">
            <label for="">Course Description</label>
            <input type="text" class="form-control cdesc" name="cdesc">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn_create">Create </button>
        <div class="spinner-border text-primary d-none btn_loading" role="status"> </div>
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
        <button type="submit" class="btn btn-danger btn_delete">Yes</button>
        <div class="spinner-border text-danger d-none delete_loading" role="status"> </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
