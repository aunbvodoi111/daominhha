<table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
    <thead>
      <tr>
        <th>id</th>
        <th width="100px">Tên User</th>
        <th width="100px">Email</th>
        <th>Số lần f12</th>
        <th>Kích hoạt mail</th>
        <th>Quyền</th>
        <th>UserOnline</th>
        <th>Link Facebook</th>
        <th>Nguyên nhân khóa</th>
        <th>Active</th>
        <th>Xử lý</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $items)
      <tr>
        <td width="100px">{{$items->id}}</td>
        <td width="100px">{{$items->name}}</td>
        <td>{{$items->email}}</td>
        <td>{{$items->check_f12}}</td>
        <td>
          @if($items->active_mail == 0)
            <strong style="color:black">Chưa</strong>
          @else
            <strong style="color:red">Có</strong>
          @endif
        </td>
        <td>
          @if($items->role == 3)
            <strong style="color:red">Admin</strong>
          @else
            Member
          @endif
        </td>
        <td>
          @if($items->isOnline())
              Online
          @endif</td>
        <td><input class="form-control testfb fb{{$items->id}}" attr_id="{{$items->id}}" value="{{$items->facebook}}"/> <button class="btn btn-success at mt-2 att{{$items->id}}" attr_id="{{$items->id}}">Đồng ý</button></td>
        <td>{{$items->reason}}</td>
        <td>
            <img src="images/sw.png" class="sw all{{$items->id}}" attr_id="{{$items->id}}" attr_type="1" @if($items->active == 0) style="display:none;" @endif>
            <img src="images/sww.png" class="sww al{{$items->id}}" attr_id="{{$items->id}}" attr_type="1" @if($items->active == 1) style="display:none;" @endif>
        </td>
        <td>
          <a href="{{asset('admin/user/sua/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Sửa</button></a>
          <a href="{{asset('admin/user/ipuser/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;IP</button></a>
          <a href="{{asset('admin/user/xoa/'.$items->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {!! $data->links() !!}

  <style>
      .at{
          display: none;
      }
  </style>