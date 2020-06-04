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
                                <strong>Sửa Games</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/games/sua/'.$games->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Tag thể loại</label></div>
                                        <div class="col-12 col-md-9">
                                            <strong v-for="item in list_Type.games_tag">
                                                <a href="javascript:void(0)"><button type="button" class="btn btn-outline-success" @click="removeTag(item)">@{{item.tag_theloai.Name}}</button></a>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Games</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên games" class="form-control" v-model="list_Type.Name" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Thể loại</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="TheLoai" placeholder="Nhập tên thể loại" class="form-control" v-model="list_Type.TheLoai" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kích thước</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="KichThuoc" placeholder="Nhập kích thước file games" class="form-control" v-model="list_Type.KichThuoc" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số Part</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="SoPart" placeholder="Nhập số part games" class="form-control" v-model="list_Type.SoPart" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Series</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Series" placeholder="Nhập Series games" class="form-control" v-model="list_Type.Series" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Email" placeholder="Nhập Email" class="form-control" v-model="list_Type.Email" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="MoTa" placeholder="Nhập mô tả" class="form-control" v-model="list_Type.MoTa" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Avatar</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Avatar" placeholder="url Avatar" class="form-control" v-model="list_Type.Avatar" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh chính</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhChinh" placeholder="url ảnh chính" class="form-control" v-model="list_Type.AnhChinh" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 1</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu1" placeholder="url ảnh phụ 1" class="form-control" v-model="list_Type.AnhPhu1" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 2</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu2" placeholder="url ảnh phụ 2" class="form-control" v-model="list_Type.AnhPhu2" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 3</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu3" placeholder="url ảnh phụ 3" class="form-control" v-model="list_Type.AnhPhu3" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 4</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu4" placeholder="url ảnh phụ 4" class="form-control" v-model="list_Type.AnhPhu4" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh Mini</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhMini" placeholder="url ảnh Mini" class="form-control" v-model="list_Type.AnhMini" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Link google</label></div>
                                        <div class="col-12 col-md-9">
                                            <div id="password"></div>
                                            <div id="as'+i+'" v-for="item in list_Type.link_list" class="mt-3">
                                                <hr>
                                                <div>
                                                    <div class="row">
                                                         <div class="col-12 col-md-12">
                                                            <select class="form-control" v-model="item.type">
                                                                <option value="0">Chọn loại link</option>
                                                                <option value="1">Link game gốc</option>
                                                                <option value="2">Link game Crack</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-12">
                                                            <select class="form-control" v-model="item.type_link">
                                                                <option value="0">Chọn link</option>
                                                                <option v-for="prod in list_link" v-bind:value="prod.id" >@{{prod.link}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-10 col-md-11">
                                                            <input placeholder="Nhập tiêu chinh" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.title"> 
                                                        </div>
                                                        <div class="col-10 col-md-11">
                                                            <input placeholder="Nhập tiêu đề" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.link"> 
                                                        </div>
                                                        <div class="col-2 col-md-1">
                                                            <p class=" fa fa-trash-o anhquy" attr_data="'+ i +'"  @click="removeLink(item)"></p>
                                                        </div>
                                                    </div>
                                                    <div v-for="prod in item.list" class="mt-1">
                                                        <div class="row">
                                                            <div class="col-10 col-md-11">
                                                                <input  placeholder="Nhập link" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="prod.link">
                                                            </div>
                                                            <div class="col-2 col-md-1">
                                                                <p class=" fa fa-trash-o child" attr_data="'+ i +'" @click="removeFormLink(item.childLink,prod)"></p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <p class="btn btn-danger add-form-child" attr_data="'+ i +'" v-on:click="addchildform(item.list)">Thêm form link</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="btn btn-danger add-form" v-on:click="addform">Thêm form nhập</p>
                                        <p class="btn btn-danger add-form" v-on:click="send">send</p>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                        <div class="col-12 col-md-9"><textarea name="GioiThieublod" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->GioiThieu}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                    <div class="col-12 col-md-9"><textarea name="GioiThieu"  rows="9" placeholder="Content..." class="form-control " v-model="list_Type.GioiThieu">{{$games->GioiThieu}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                        <div class="col-12 col-md-9"><textarea name="NoiDung" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->NoiDung}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Link Games</label></div>
                                        <div class="col-12 col-md-9"><textarea name="LinkGame" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->LinkGame}}</textarea></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Sửa
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
                                <strong>Sửa Tag</strong>
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
        var list_Type = '{!! json_encode($games) !!}';
        var sort_by = '{!! json_encode($theloai) !!}'; 
        var listType = '{!! json_encode($listType) !!}';
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
                    GioiThieu:''
                },
                data:[
                ],
                listTagName:[],
                tag:JSON.parse(sort_by),
                list_link:JSON.parse(listType),
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
                        title: "",
                        titleMain :'',
                        type_link:"2",
                        type:0,
                        id_product: this.list_Type.id,
                        link: "",
                        list:[]
                    }
                    this.list_Type.link_list.push(haha)
                    console.log(this.list_Type)
                },
                addchildform(item){
                    console.log(item)
                    var link = {
                        link : '',
                    }
                    item.push(link)
                },
                send(item){
                    console.log(this.list_Type)
                    var vm = this
                    var token =$("input[name='_token']").val();  
                    $.ajax({
                        type: 'POST',
                        url: "admin/games/sua/"+this.list_Type.id,
                        data: {
                            "_token":token,
                            'listTagName' : vm.list_Type
                        },
                        dataType: 'json',
                    }).done(function(json) {
                        
                    });
                }
            }
        })
    </script>
@endsection

    
