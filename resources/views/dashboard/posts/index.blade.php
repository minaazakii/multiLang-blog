@extends('dashboard.layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Posts
    </div>
    <div class="card-block">
        <table class="table table-striped" id="posts_table">
            <thead>
                <tr>
                    <th style="text-align: right">Id</th>
                    <th style="text-align: right">Title</th>
                    <th style="text-align: right">Category</th>
                    <th style="text-align: right"> content</th>
                    <th style="text-align: right"> small Desc</th>
                    <th style="text-align: right"> tags</th>
                    <th style="text-align: right"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>



  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dashboard.category.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this category
                <input type="hidden" id="id" name="id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    var table = $('#posts_table').DataTable({
        processing: true,
        serverSide: true,
        order:[
            [0, 'desc']
        ],
        ajax:"{{ route('dashboard.posts.datatables') }}",
        columns:[
            {
                data:'id',
                name:'id'
            },
            {
                data:'title',
                name:'title'

            },
            {
                data:'category',
                name:'category'

            },
            {
                data:'smallDesc',
                name:'smallDesc'
            },
            {
                data:'content',
                name:'content'
            },
            {
                data:'tags',
                name:'tags'
            },
            {
                data:'action',
                name:'action'
            },
        ]
    });
    });


    $('#posts_table tbody').on('click','#deletebtn',function(e)
    {
        var id = $(this).data('id');
        console.log(id);
        $('#deleteModal #id').val(id);
    });

</script>
@endpush
