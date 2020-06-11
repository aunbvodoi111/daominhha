@extends('Admin.Layout.master')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

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
                                <strong>Thêm Games</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/games/them')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Tag thể loại</label></div>
                                        <div class="col-12 col-md-9">
                                            <strong v-for="item in listTagName">
                                                <a href="javascript:void(0)"><button type="button" class="btn btn-outline-success" @click="removeTag(item)">@{{item.Name}}</button></a>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Games</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên games" class="form-control" v-model="game.Name"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Thể loại</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="TheLoai" placeholder="Nhập tên thể loại" class="form-control" v-model="game.TheLoai"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kích thước</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="KichThuoc" placeholder="Nhập kích thước file games" class="form-control" v-model="game.KichThuoc"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số Part</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="SoPart" placeholder="Nhập số part games" class="form-control" v-model="game.SoPart"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Series</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Series" placeholder="Nhập Series games" class="form-control" v-model="game.Series"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Email" placeholder="Nhập Email" class="form-control" v-model="game.Email"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="MoTa" placeholder="Nhập mô tả" class="form-control" v-model="game.MoTa"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Avatar</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Avatar" placeholder="url Avatar" class="form-control" v-model="game.Avatar"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh chính</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhChinh" placeholder="url ảnh chính" class="form-control" v-model="game.AnhChinh"></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 1</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu1" placeholder="url ảnh phụ 1" class="form-control" v-model="game.AnhPhu1"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 2</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu2" placeholder="url ảnh phụ 2" class="form-control" v-model="game.AnhPhu2"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 3</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu3" placeholder="url ảnh phụ 3" class="form-control" v-model="game.AnhPhu3"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 4</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu4" placeholder="url ảnh phụ 4" class="form-control" v-model="game.AnhPhu4"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh Mini</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhMini" placeholder="url ảnh Mini" class="form-control" v-model="game.AnhMini"></div>
                                    </div>
                                    <div class="row form-group">
                                        
                                        <div class="col-12 col-md-12">
                                            <div id="password"></div>
                                            <div id="as'+i+'" v-for="item in data" class="mt-3">
                                                <hr>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Link gốc hay crack?</p> 
                                                        </div>
                                                         <div class="col-12 col-md-10 mt-1">
                                                            <select class="form-control" v-model="item.type">
                                                                <option value="0">Chọn loại link</option>
                                                                <option value="1">Link game gốc</option>
                                                                <option value="2">Link game Crack</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Loại link nào?</p> 
                                                        </div>
                                                        <div class="col-12 col-md-10">
                                                            <select class="form-control" v-model="item.typelink">
                                                                <option value="0">Chọn link</option>
                                                                <option v-for="prod in list_Type" v-bind:value="prod.id" >@{{prod.link}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Mô tiêu đề link là gi?</p> 
                                                        </div>
                                                        <div class="col-10 col-md-9 mt-1">
                                                            <input placeholder="Nhập tiêu ch" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.titleMain"> 
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Mô tả link tải</p> 
                                                        </div>
                                                        <div class="col-10 col-md-9 mt-1">
                                                            <input placeholder="Nhập tiêu đề" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.title"> 
                                                        </div>
                                                        <div class="col-2 col-md-1 mt-1">
                                                            <p class=" fa fa-trash-o anhquy" attr_data="'+ i +'"  @click="removeLink(item)"></p>
                                                        </div>
                                                    </div>
                                                    <div v-for="prod in item.childLink" class="mt-1">
                                                        <div class="row">
                                                            <div class="col-2 col-md-2 mt-1">
                                                                <p>Nhập link tải về</p> 
                                                            </div>
                                                            <div class="col-10 col-md-9 mt-1">
                                                                <input  placeholder="Nhập link" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="prod.link">
                                                            </div>
                                                            <div class="col-2 col-md-1 mt-1">
                                                                <p class=" fa fa-trash-o child" attr_data="'+ i +'" @click="removeFormLink(item.childLink,prod)"></p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <p class="btn btn-danger add-form-child" attr_data="'+ i +'" v-on:click="addchildform(item.childLink)">Thêm form link</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="btn btn-danger add-form" v-on:click="addform">Thêm form nhập</p>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Cập nhật</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="CapNhat" value="Co" class="form-check-input" v-model="game.CapNhat">Có
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="CapNhat" value="Khong" class="form-check-input" checked="">Không
                                                    </label>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                        <div class="col-12 col-md-9"><textarea name="GioiThieu" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor" ></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                        <div class="col-12 col-md-9"><textarea name="GioiThieu" id="textarea-input " rows="9" placeholder="Content..." class="form-control" v-model="game.GioiThieu"></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                        <div class="col-12 col-md-9"><textarea name="NoiDung" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor"></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                        <div class="col-12 col-md-9"><textarea name="GioiThieu" id="textarea-input " rows="9" placeholder="Content..." class="form-control" v-model="game.NoiDung"></textarea></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" v-on:click="send">
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
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Danh sách thể loại</strong>
                            </div>
                            <div class="card-body card-block" v-if="(tag.length) > 0">
                                <a href="javascript:void(0)" v-for="(item, index) in tag" :key="index">
                                    <button type="button" class="btn btn-outline-success" @click="addTag(item)">@{{ item.Name }}</button>
                                </a>
                            </div>                           
                        </div>
                        
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        </div>

@endsection
@section('script')
    <script type="text/javascript">
        var list_Type = '{!! json_encode($listType) !!}';
        var sort_by = '{!! json_encode($theloai) !!}'; 
    </script>
    
    <script>
        var app_cart = new Vue({
            el:'#obj',
            data:{
                game:{
                    dem: 0,
                    Name : '',
                    TheLoai : '',
                    KichThuoc : '',
                    KichThuoc : '',
                    SoPart : '',
                    MoTa : '',
                    Series : '',
                    Email : '',
                    Avatar : '',
                    AnhChinh : '',
                    AnhPhu1 : '',
                    AnhPhu2 : '',
                    AnhPhu3 : '',
                    AnhPhu4 : '',
                    AnhMini : '',
                    NoiDung : '',
                    GioiThieu : '',
                    CapNhat:'',
                },
                data:[
                ],
                listTagName:[],
                tag:JSON.parse(sort_by),
                list_Type:JSON.parse(list_Type)
            },
            mounted(){
                
            },
            methods:{
                addTag(item){
                    var find = this.listTagName.indexOf(item)
                    var index = this.tag.indexOf(item)
                    this.tag.splice(index,1)
                    if(find == -1){
                        this.listTagName.push(item)
                    }
                },
                removeFormLink(list,item){
                    var index = list.indexOf(item)
                    list.splice(index,1)
                },
                removeTag(name){
                   var find = this.listTagName.indexOf(name)
                   this.tag.push(name)
                   this.listTagName.splice(find,1)
                },
                removeLink(item){
                   var find = this.data.indexOf(item)
                   console.log(item)
                   this.data.splice(find,1)
                },
                keymonitor(){
                    alert(1)
                },
                // getCkeditor(){
                //     CKEDITOR.replace('editor');
                // },
                addform(){
                    var haha = {
                        title : '',
                        titleMain :'',
                        typelink:0,
                        type:0,
                        childLink:[]
                    }
                    this.data.push(haha)
                },
                addchildform(item){
                    var link = {
                        link : '',
                    }
                    item.push(link)
                },
                send(item){
                    var vm = this
                    var token =$("input[name='_token']").val();  
                    $.ajax({
                        type: 'POST',
                        url: "admin/games/them",
                        data: {
                            "_token":token,
                            'game': vm.game,
                            'data': vm.data,
                            'listTagName' : vm.listTagName
                        },
                        dataType: 'json',
                    }).done(function(json) {
                        swal('success', 'Thêm thành công', 'success')
                        window.open('http://localhost:8000/admin/games/themdetail/'+json.id, '_blank');
                    }).fail(function(data){
                        swal('error', 'Kiểm tra lại thông tin vừa nhập', 'error') 
                    });
                }
            }
        })
    </script>
@endsection
