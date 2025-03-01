@extends('layouts.adminTemplate')

@section('cmscontent')

<!-- DataTable -->
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
.dataTables_wrapper { padding: 25px 15px; }
</style>

<!-- Content -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-md-12">

    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">USERS</h6>
      </div>
      <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Picture</th>
            <th class="text-center">Name</th>
            <th class="text-center">Authority</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTableUser').DataTable();
  });
</script>

@stop
