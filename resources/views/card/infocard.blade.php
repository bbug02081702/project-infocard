@extends('layout.admin')
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <h1 class="text-center mb-4">Danh sach the</h1>

    <div class="container mb-5">
        <a href="/add-infocard" type="button" class="btn btn-success">Them</a>
         {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
                <form action="/infocard" method="get">
                    <input type="search" id="" name="search" placeholder="search for..." class="form-control" aria-describedby="passwordHelpInline">
                </form>
            </div>

            
            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-info">Xuat PDF</a>
            </div>
            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-success">Xuat Excel</a>
            </div>

            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Chen du lieu
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chen file excel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dong</button>
                                <button type="submit" class="btn btn-primary">Luu thay doi</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="row mb-5">
            @if($message = Session::get('Thongbao'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endif
            <table class="table" >
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">NameCard</th>
                            <th scope="col">PhotoCard</th>
                            <th scope="col">WalletCard</th>
                            <th scope="col">QrcodeCard</th>
                            <th col="col">AddressCard</th>
                            <th col="col">Created_at</th>
                            <th col="col">Updated_at</th>
                            <th col="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $no =1;
                        @endphp
                        @foreach($data as $index => $row)
                        <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{$row->NameCard}}</td>
                                <td>
                                    <img src="{{asset('photocreate/'.$row->PhotoCard)}}" style="width: 56px;" alt="">
                                </td>
                                <td>{{$row->WalletCard}}</td>  
                                <td>{{$row->QrcodeCard}}</td>
                                <td>{{$row->AddressCard}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{$row->updated_at}}</td>
                                <td>
                                    <a href="/view-infocard/{{$row->id}}" type="button" class="btn btn-warning">View</a>
                                    <!-- <a href="/delete-infocard/{{$row->id}}" type="button" class="btn btn-danger">Delete</a > -->
                                    <a href="#" type="button" class="btn btn-danger delete" data-id="{{$row->id}}" data-name-card="{{$row->NameCard}}">Delete</a >
                                    <a href="/edit-infocard/{{$row->id}}" type="button" class="btn btn-info">Edit</a >
                                <td>  
                        </tr> 
                        @endforeach           
                    </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- nhung link sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>

    $('.delete').click(function(){
        var infocard = $(this).attr('data-id');
        var datanamecard = $(this).attr('data-name-card')
        swal
            ({
                title: "Bạn có chắc không?",
                text: "Khi đã xóa, bạn sẽ không thể khoi phuc id: "+ datanamecard +" ",
                icon: "Cảnh báo",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    //du lieu them vao
                    window.location = "/delete-infocard/" + infocard + ""
                    swal("Bùm! Tập tin tưởng tượng của bạn đã bị xóa!", {
                    icon: "Thành công",
                    });
                } else {
                    swal("Du lieu của bạn an toàn!");
                }
            });
    });
           
  </script>
  <script>
    @if(Session::has('Thongbao'))
    toastr.success("{{Session::get('Thongbao')}}")
    @endif
 
  </script>
@endpush