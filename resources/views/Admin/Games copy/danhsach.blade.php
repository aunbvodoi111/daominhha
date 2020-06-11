@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách games</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh sách games</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
        
                <div class="col-md-12">
                    @if (session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                    @endif
                    @if (session('loi'))
                      <div class="alert alert-danger">
                          {{session('loi')}}
                      </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
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
                            @foreach ($games as $items)
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
                                  <a href="{{asset('admin/games/xoa/'.$items->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
      
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
@section('script')
  <script type="text/javascript">
    function xoa(){
      var test = confirm('Bạn có chắc chắn muốn xóa');
      if(test){
        return true;
      }
      else{
        return false;
      }
    }
  </script>
@endsection
