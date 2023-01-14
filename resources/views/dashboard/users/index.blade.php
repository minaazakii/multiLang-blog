@extends('dashboard.layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Users
    </div>
    <!-- Button trigger modal -->

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dashboard.user.delete') }}" method="POST">
            @csrf
            @method('delete')
            <div class="modal-body">
                Are you Sure You want to delete this user?
                <input type="hidden" name="id" id="id" >
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <div class="card-block">
        <table class="table table-striped" id="users_table">
            <thead>
                <tr>
                    <th style="text-align: right">Id</th>
                    <th style="text-align: right">Username</th>
                    <th style="text-align: right">Email</th>
                    <th style="text-align: right">Role</th>
                    <th style="text-align: right"></th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    var table = $('#users_table').DataTable({
        processing: true,
        serverSide: true,
        order:[
            [0, 'desc']
        ],
        ajax:"{{ route('dashboard.users.datatables') }}",
        columns:[
            {
                data:'id',
                name:'id'
            },
            {
                data:'name',
                name:'name'
            },
            {
                data:'email',
                name:'email'
            },
            {
                data:'status',
                name:'status'
            },
            {
                data:'action',
                name:'action'
            },
        ]
    });
    });


    $('#users_table tbody').on('click','#deletebtn',function(e)
    {
        var id = $(this).data('id');
        console.log(id);
        $('#deleteModal #id').val(id);
    });

</script>


@endpush
