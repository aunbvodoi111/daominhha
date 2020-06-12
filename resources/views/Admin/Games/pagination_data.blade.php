<table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
<thead>
    <tr>
    <th>id</th>
    <th>Tên Games</th>
    <th>Email</th>
    <th>Kích thước</th>
    <th>Số Part</th>
    <th>Lượt Xem</th>
    <th>Ảnh</th>
    <th>Ngày Post</th>
    <th>Xử lý</th>
    </tr>
</thead>
<tbody>
@foreach ($data as $items)
    <tr>
    <td>{{$items->id}}</td>
    <td>{{$items->Name}}</td>
    <td>{{$items->Email}}</td>
    <td>{{$items->KichThuoc}}</td>
    <td>{{$items->SoPart}}</td>
    <td>{{$items->SoLuotXem}}</td>
    <td>
        @if ($items->AnhMini != "")
            <img width="150px" height="100px" src="{{$items->AnhMini}}">
        @else
            <img width="150px" height="100px" src="{{$items->AnhChinh}}">
        @endif
    </td>
    <td>{{date('d-m-Y', strtotime($items->created_at))}}</td>
    <td>
        <a href="{{asset('admin/games/sua/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Sửa</button></a>
        <a href="{{asset('admin/games/editlink/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Sửa Link</button></a>
        <a href="{{asset('admin/games/xoa/'.$items->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
    </td>
    </tr>
@endforeach
</tbody>
</table>
{!! $data->links() !!}