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
                {{csrf_field()}}
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
                            <strong class="card-title">Link gốc</strong>
                        </div>
                        <div class="card-body">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
                            <thead>
                              <tr>
                                <th>id</th>
                                <th>Link Games</th>
                                
                                <th>Xử lý</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($list_Type as $items)
                              <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->link}}</td>
                                
                                <td>
                                    <img src="images/sw.png" class="sw all{{$items->id}}" attr_id="{{$items->id}}" attr_type="1" @if($items->link_ori == 1) style="display:none;" @endif>
                                    <img src="images/sww.png" class="sww al{{$items->id}}" attr_id="{{$items->id}}" attr_type="1" @if($items->link_ori == 0) style="display:none;" @endif>
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
                            <strong class="card-title">Link phụ</strong>
                        </div>
                        <div class="card-body">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered" style="text-align: center;">
                            <thead>
                              <tr>
                                <th>id</th>
                                <th>Link Games</th>
                                
                                <th>Xử lý</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($list_Type as $items)
                              <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->link}}</td>
                                
                                <td>
                                    <img src="images/sw.png" class="swt allt{{$items->id}}" attr_id="{{$items->id}}" attr_type="2" @if($items->status == 1) style="display:none;" @endif>
                                    <img src="images/sww.png" class="swwt alt{{$items->id}}" attr_id="{{$items->id}}" attr_type="2"  @if($items->status == 0) style="display:none;" @endif>
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
        <style>
            img{
                width: 80px;
            }
        </style>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
        $('.sw').click(function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.all'+id).hide();
            $('.al'+id).show();
            link(id,type)
        });
        $('.sww').click(function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.al'+id).hide();
            $('.all'+id).show();
            link(id,type)
        });
        $('.swt').click(function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.allt'+id).hide();
            $('.alt'+id).show();
            link(id,type)
        });
        $('.swwt').click(function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.alt'+id).hide();
            $('.allt'+id).show();
            link(id,type)
        });
    });
    function link(id,type){
        var token =$("input[name='_token']").val(); 
        $.ajax({
            url:'/change_status_link',
            type:'post',
            dataType: 'json',
            data:{"_token":token,"id":id, "type":type},
        }).done(function(json) {
            
        })
    }
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