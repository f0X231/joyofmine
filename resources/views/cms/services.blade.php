@extends('layouts.adminTemplate')

@section('cmscontent')

<!-- DataTable -->
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- Content -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Services</h6>
      </div>
      <table class="table table-bordered" id="dataTableServices" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Picture</th>
            <th class="text-center">Title</th>
            <th class="text-center">Show</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($services as $key => $item)
            <tr>
              <td class="text-center">{{($key+1)}}</td>
              <td class="text-center"><img src="{{$item['thumbnail']['th']}}" height="150" width="auto" /></td>
              <td>{{$item['title']['th']}}</td>
              <td class="text-center">{{$item['status']}}</td>
              <td class="text-center">
                <a href="{{ URL::to('service/edit', [$item['id'], $item['title']['th']]) }}">E</a>
              </td>
              <td class="text-center">
                <a href="{{ URL::to('service/delete', [$item['id'], $item['title']['th']]) }}">D</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTableServices').DataTable();
  });
</script>

@stop
