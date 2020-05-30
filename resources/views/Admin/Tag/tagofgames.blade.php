@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Chỉnh sửa Tag</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Chỉnh sửa Tag</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
              <div style="margin-bottom: 20px;">
                <a href="{{asset('admin/tag/themtag/'.$games->id)}}"><button type="button" class="btn btn-primary">Thêm tag</button></a>
              </div>
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
                                <th>Tag Name</th>
                                <th>Tên Games</th>
                                <th>Thể loại</th>
                                <th>Xử lý</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($tagOfGames as $items)
                              <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->TagName}}</td>
                                <td>{{$items->tag_games->Name}}</td>
                                <td>{{$items->tag_theloai->Name}}</td>
                                <td>
                                  <a href="{{asset('admin/tag/xoatag/'.$items->id.'/'.$games->id)}}" onclick="return xoa()"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Xóa</button></a>
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
