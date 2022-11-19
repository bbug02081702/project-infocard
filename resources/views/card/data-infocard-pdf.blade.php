<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data list info card pdf</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>


</head>
<body>
    <h1>Data list info card</h1>
    <table id="customers">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">NameCard</th>
            <th scope="col">PhotoCard</th>
            <th scope="col">WalletCard</th>
            <th scope="col">QrcodeCard</th>
            <th col="col">AddressCard</th>
                           
        </tr>
            @php
            $no =1;
            @endphp
            @foreach($data as $row)
        <tr>
            <td scope="row">{{$no++}}</td>
            <td>{{$row->NameCard}}</td>
            <td>
                <img src="{{asset('photocreate/'.$row->PhotoCard)}}" style="width: 56px;" alt="">
            </td>
            <td>{{$row->WalletCard}}</td>  
            <td>{{$row->QrcodeCard}}</td>
            <td>{{$row->AddressCard}}</td>
            </tr> 
            @endforeach                    
    </table>
</body>
</html>