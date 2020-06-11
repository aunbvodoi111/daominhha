@extends('Admin.Layout.master')

@section('content')

<div id="obj">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-8">
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>  
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <strong>Thêm Detail</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/games/themdetail/'.$games->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                    <div class="col-12 col-md-9"><textarea name="GioiThieu" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor" >{{$games->GioiThieu}}</textarea></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                        <div class="col-12 col-md-9"><textarea name="NoiDung" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->NoiDung}}</textarea></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" v-on:click="send">
                                            <i class="fa fa-dot-circle-o"></i> Thêm
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        </div>

@endsection
@section('script')

@endsection
