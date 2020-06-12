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
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                  
                                   
                                    <div class="row form-group">
                                        
                                        <div class="col-12 col-md-12">
                                            <div id="password"></div>
                                            <div id="as'+i+'" v-for="item in list_Type.link_list" class="mt-3">
                                                <div v-if="item.check ==  0">
                                                    <hr>
                                                <p class=" fa fa-trash-o anhquy" attr_data="'+ i +'"  @click="removeLink(item)">  Xóa tất cả form link đang nhập</p>
                                                
                                                <div>
                                                    <div class="row">
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Link gốc hay update<span style="color: red;">*</span></p> 
                                                        </div>
                                                         <div class="col-12 col-md-10 mt-1">
                                                            <select class="form-control" v-model="item.type">
                                                                <option value="0">Chọn loại link</option>
                                                                <option value="1">Link Gốc</option>
                                                                <option value="2">Link Update</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Loại link nào<span style="color: red;">*</span></p> 
                                                        </div>
                                                        <div class="col-12 col-md-10 mt-1">
                                                            <select class="form-control" v-model="item.type_link">
                                                                <option value="0">Chọn link</option>
                                                                <option v-for="prod in list_link" v-bind:value="prod.id" >@{{prod.link}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1">
                                                            <p>Game này đã có link chưa<span style="color: red;">*</span></p> 
                                                        </div>
                                                         <div class="col-12 col-md-10 mt-1">
                                                            <select class="form-control" v-model="item.havelink">
                                                                <option value="0">----SELECT----</option>
                                                                <option value="1">GAME CÓ LINK</option>
                                                                <option value="2">GAME CHƯA CÓ LINK</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1" v-if="item.havelink == 1 || item.havelink == 2">
                                                            <p>Tiêu đề(h1)</p> 
                                                        </div>
                                                        <div class="col-10 col-md-9 mt-1" v-if="item.havelink == 1 || item.havelink == 2">
                                                            <input placeholder="Nhập tiêu chính" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.title"> 
                                                        </div>
                                                        <div class="col-2 col-md-2 mt-1" v-if="item.havelink == 1 || item.havelink == 2">
                                                            <p v-if="item.havelink == 1" >Mô tả link tải</p> 
                                                            <p v-if="item.havelink == 2" >Nguyên nhân chưa có link<span style="color: red;">*</span></p> 
                                                        </div>
                                                        <div class="col-10 col-md-9 mt-1" v-if="item.havelink == 2">
                                                            <input placeholder="Nhập mô tả" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.reason_havelink"> 
                                                        </div>
                                                        <div class="col-10 col-md-9 mt-1" v-if="item.havelink == 1 ">
                                                            <input placeholder="Nhập mô tả" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="item.link"> 
                                                        </div>
                                                        {{-- <div class="col-2 col-md-1 mt-1" v-if="item.havelink == 1">
                                                            <p class=" fa fa-trash-o anhquy" attr_data="'+ i +'"  @click="removeLink(item)"></p>
                                                        </div> --}}
                                                    </div>
                                                    <div  v-if="item.havelink == 1">
                                                        <div v-for="(prod,index) in item.list" class="mt-1">
                                                            <div class="row" v-if="prod.check == 0">
                                                                <div class="col-2 col-md-2 mt-1">
                                                                    <p>Link @{{index + 1}}</p> 
                                                                </div>
                                                                <div class="col-10 col-md-9 mt-1">
                                                                    <input  placeholder="Nhập link" type="text" name="link[]" class="form-control" id="row'+i+'" v-model="prod.link">
                                                                </div>
                                                                <div class="col-2 col-md-1 mt-1">
                                                                    <p class=" fa fa-trash-o child" attr_data="'+ i +'" @click="removeFormLink(item.list,prod)"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <p class="btn btn-danger add-form-child" attr_data="'+ i +'" v-on:click="addchildform(item.list)" v-if="item.havelink == 1">Thêm form link</p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="btn btn-danger add-form" v-on:click="addform">Thêm form nhập</p>
                                        
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
                    
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
    <style>
        p.fa-trash-o{
            font-size: 25px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
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
                data:[
                ],
                listTagName:[],
                tag:JSON.parse(sort_by),
                list_link:JSON.parse(listType),
                list_Type:JSON.parse(list_Type)
            },
            mounted(){
                this.list_Type.link_list.forEach(item => {
                    Vue.set(item, "check", 0);
                    item.list.forEach(item => {
                        Vue.set(item, "check", 0);
                    });
                });
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
                    var index = list.find((prod => prod === item))
                    index.check = 1
                },
                removeTag(name){
                   var find = this.listTagName.indexOf(name)
                   this.tag.push(name)
                   this.listTagName.splice(find,1)
                },
                removeLink(item){
                    Swal.fire({
                        title: 'Thông báo',
                        text:'Bạn có muốn xóa?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#41bb29',
                        cancelButtonColor: '#f36f21',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Không',
                        }).then((result) => {
                            if (result.value) {
                                var index = this.list_Type.link_list.find((prod => prod === item))
                                index.check = 1
                            }
                        })
                    
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
                        havelink:0,
                        id_product: this.list_Type.id,
                        link: "",
                        list:[
                            {
                                link : '',
                                check:0
                            },
                        ],
                        check:0
                    }
                    this.list_Type.link_list.push(haha)
                    console.log(this.list_Type)
                },
                addchildform(item){
                    var link = {
                        link : '',
                        check:0
                    }
                    item.push(link)
                },
                send(item){
                    console.log(this.list_Type)
                    var vm = this
                    var token =$("input[name='_token']").val();  
                    $.ajax({
                        type: 'POST',
                        url: "https://toplinkvip.com/admin/games/editlink/"+this.list_Type.id,
                        data: {
                            "_token":token,
                            'listTagName' : vm.list_Type
                        },
                        dataType: 'json',
                    }).done(function(json) {
                        swal('success', 'Thêm thành công', 'success')
                    }).fail(function(data){
                        swal('error', 'Kiểm tra lại thông tin vừa nhập', 'error')
                    });;
                }
            }
        })
    </script>
@endsection

    
