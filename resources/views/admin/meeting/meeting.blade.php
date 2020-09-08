@extends('layouts.views.master')
@section('content')
<h1 class="text-muted font-weight-bold">
    Meeting Management
    <span class="btn btn-info float-right btn_meetingModal">Create Meeting</span>
</h1>

<nav aria-label="breadcrumb bg-none">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Meeting Management</li>
</ol>
</nav>

<div class="row mt-5">
    <div class="col-md-12 mx-auto">
        <div class="card">
          <div class="card-body">
            <table id="meeting_table" class="table table-bordered table-hover">
              <thead>
                  <tr>
                    <th>Action</th>
                    <th>Meeting id</th>
                    <th>Topic</th>
                    <th>Agenda</th>
                    <th>Timezone</th>
                    <th>Time</th>
                    <th>Created</th>
                  </tr>
              </thead>
              <tbody id="meeting_content">
                  @if($meetings)
                      @foreach($meetings as $item)
                          <tr>
                            <td>
                              <div class="btn-group">
                                <a class="btn btn-success start-meeting" href="{{$item['join_url']}}" target="_blank">Start</a>
                                <button class="btn btn-info edit-meeting" id="{{$item['id']}}">Edit</button>
                                <button class="btn btn-danger delete-meeting" id="{{$item['id']}}">Delete</button>
                              </div>
                            </td>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['topic']}}</td>
                            <td>{{$item['agenda']}}</td>
                            <td>{{$item['timezone']}}</td>
                            <td>{{$item['start_time']}}</td>
                            <td>{{$item['created_at']}}</td>
                          </tr>
                      @endforeach
                  @endif
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="meetingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Create Meeting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="meeting_form">
        <div class="form-group">
            <label for="">Meeting Topic</label>
            <input type="text" class="form-control scode" name="scode" id="topic">
        </div>
        <div class="form-group">
            <label for="">Start Date Time</label>
            <input type="datetime-local" class="form-control scode" name="start_time" id="start_time" value="2020-09-08T23:35:19.000Z">
        </div>
        <div class="form-group">
            <label for="">Agenda</label>
            <textarea name="agenda" id="agenda" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary meeting_create">Create </button>
        <div class="spinner-border text-primary d-none sub_loading" role="status"> </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection