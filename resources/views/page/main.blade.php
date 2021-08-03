@extends('layout.master', ['title' => 'Yoshinoya'])

@section('head')
    
    <!-- SB Admin Template -->
    <link href="{{ asset('styles/sb-admin.css?v=').time() }}" rel="stylesheet">
    
    <!-- DataTable-->
    <link href="{{ url('datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <style>
        .font-20 {
            font-size: 20px;
        }
        .english-img {
            height: 240px;            
            background-image: url("{{ url('img/bg-yoshinoya.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            margin-bottom: 40px;
        }
        .english-img h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 1.25rem;
            width: 100%;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    @if(Auth::check())
        <div class="text-right">Welcome {{ auth()->user()->email }}</div>
        <br />
    @endif
    <div>
        <table class="table table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="greybox">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
            @php ($num = 1)
            @php ($waitingverif = 0)
            @foreach ($response as $post)
                <tr>
                    <td>
                        {{ $num }}
                    </td>
                    <td>
                        {{ $post['title'] }}
                    </td>
                    <td>
                        {{ $post['body'] }}
                    </td>
                    <td>
                        
                        <a class="btn btn-outline-info p-1 comment-modal mb-1" href="#" data-id="{{ $post['id'] }}">
                            <small>Show Comment</small>
                        </a>
                    </td>
                </tr>
                @php ($num++)
            @endforeach
            </tbody>
        </table>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="commentModal">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Comments</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <table class="table table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="greybox">
                        <tr>
                            <th>Name (email)</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody id="comment-body">
                    </tbody>
                </table>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>

            <input  type="submit" class="btn btn-primary" id="sendsubmit" value="Ya">
            </div>

        </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

@section('bottom')
<!-- DataTable-->
<script src="{{ url('datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('datatables/dataTables.bootstrap4.js') }}"></script>

<script>
$(document).ready(function (){
    var table = $('#dataTable').DataTable();
    
    $('#dataTable').on('click', '.comment-modal', function(){
        var id =  $(this).data('id');
        console.log(id);
        
        $.ajax({
            type: 'GET',
            url: 'https://jsonplaceholder.typicode.com/posts/'+id+'/comments',
            success: function(datas)
            {
                console.log(datas);
                // document.getElementById("comment-body").innerHTML += "<h3>This is the text which has been inserted by JS</h3>";
                datas.forEach(function(data){
                    // console.log(data);
                    document.getElementById("comment-body").innerHTML += "<tr><td>"+data['name']+"<br/>("+data['email']+")</td><td>"+data['body']+"</td></tr>";
                    
                    $('#commentModal').modal('show');
                });
            },
            error:function() {
                alert("Error!");
            }
        });
    });
});
</script>
@endsection