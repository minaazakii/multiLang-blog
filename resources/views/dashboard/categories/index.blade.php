@extends('dashboard.layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Striped Table
    </div>
    <div class="card-block">
        <table class="table table-striped" id="categories_table">
            <thead>
                <tr>
                    <th style="text-align: right">Id</th>
                    <th style="text-align: right">Parent</th>
                    <th style="text-align: right">Title</th>
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
    var table = $('#categories_table').DataTable({
        processing: true,
        serverSide: true,
        order:[
            [0, 'desc']
        ],
        ajax:"{{ route('dashboard.categories.datatables') }}",
        columns:[
            {
                data:'id',
                name:'id'
            },
            {
                data:'parentRow',
                name:'parentRow'
            },
            {
                data:'title',
                name:'title'
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
