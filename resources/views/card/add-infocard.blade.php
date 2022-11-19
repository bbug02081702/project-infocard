@extends('layout.admin')

@section('content')
<body>
<br>
    <h1 class="text-center mb-5 mt-5">Them danh sach the</h1>

    <div class="container mb-5">
        <!-- <button type="button" class="btn btn-success">Success</button> -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insert-infocard" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="NameCard" class="form-label">Card Name</label>
                                <input type="text" name="NameCard" class="form-control" id=" >
                                @error('NameCard')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Walletcard" class="form-label">Card Wallet</label>
                                <input type="text" name="WalletCard"class="form-control" id="">
                                @error('WalletCard')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="QrcodeCard" class="form-label">Card Qrcode</label>
                                <input type="text" name="QrcodeCard" class="form-control" id=" >
                            </div>
                            <div class="mb-3">
                                <label for="AddressCard" class="form-label">Card Address</label>
                                <input type="text" name="AddressCard" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="PhotoCard" class="form-label">Card Photo</label>
                                <input type="file" name="PhotoCard" class="form-control" id="">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Hoan tat</button>
                            <a href="/infocard" type="button" class="btn btn-success">Tro ve</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>