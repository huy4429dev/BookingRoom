{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Duyệt bài')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Lịch sử duyệt bài</h1>
    <!-- Button trigger modal add news -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddContact">
        <i class="fas fa-plus"></i>
    </button> -->

    <!-- Modal -->
</div>
@stop

@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Bài đăng </th>
                      <th>Thời gian</th>
                      <th>Tài khoản</th>
                      <th>Người duyệt</th>
                      <th>Phí duyệt</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!$orders->isEmpty())
                        @foreach($orders as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->motel->title}}</td>
                          <td>{{date('d-m-yy',strtotime($value->created_at))}}</td>
                          <td><span class="tag tag-success">{{$value->motel->user->email}}</span></td>
                          <td>{{$value->user->email}}</td>
                          <td>{{$value->total}}</td>
                        </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="card-footer clearfix">
                {{$orders->links()}}
              </div>
 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')

@stop