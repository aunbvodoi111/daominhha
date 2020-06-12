@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Danh sách User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Danh sách User</a></li>
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
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <input type="text" name="" id="" class="keyup form-control" placeholder="Tìm kiếm">
                        <div class="card-body" id="table_data">
                          @include('Admin.Users.pagination_data')
                          
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
      $(document).on('click', '.sw', function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.all'+id).hide();
            $('.al'+id).show();
            link(id,type)
        });
        $(document).on('click', '.sww', function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.al'+id).hide();
            $('.all'+id).show();
            link(id,type)
        });
        $(document).on('click', '.swt', function() { 
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.allt'+id).hide();
            $('.alt'+id).show();
            link(id,type)
        });
        $(document).on('click', '.swwt', function() { 
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.alt'+id).hide();
            $('.allt'+id).show();
            link(id,type)
        });
        
        $(document).on('click', '.testfb', function() { 
            var id = $(this).attr('attr_id');
            $('.at').hide();
        });
        $(document).on('click', '.testfb', function() { 
            var id = $(this).attr('attr_id');
            $('.att'+id).show();
        });
    function link(id,type){
        var token =$("input[name='_token']").val(); 
        $.ajax({
            url:'https://toplinkvip.com/change_status_user',
            type:'post',
            dataType: 'json',
            data:{"_token":token,"id":id, "type":type},
        }).done(function(json) {
            
        })
    }

    $(document).on('click', '.at', function() {
            var id = $(this).attr('attr_id');
            var token =$("input[name='_token']").val(); 
            var fb = $('.fb'+id).val()
        $.ajax({
            url:'https://toplinkvip.com/admin/user/update_fb',
            type:'post',
            dataType: 'json',
            data:{"_token":token,"id":id, "fb":fb},
        }).done(function(json) {
          $('.att'+id).hide();
          swal('success','Cập nhật thành công','success')
        })
            
        });
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

<script>
  $(document).ready(function(){
  
   $(document).on('click', '.pagination a', function(event){
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
   });
  
   function fetch_data(page)
   {
    $.ajax({
     url:"https://toplinkvip.com/admin/user/pagination/fetch_data?page="+page,
     success:function(data)
     {
      $('#table_data').html(data);
     }
    });
   }

   $(".keyup").keyup(function(){
      var keyword = $(this).val()
      $.ajax({
      url:"https://toplinkvip.com/admin/user/pagination/search/"+keyword,
      success:function(data)
      {
        $('#table_data').html(data);
      }
      });
  });
   
   
  });
  </script>
@endsection
