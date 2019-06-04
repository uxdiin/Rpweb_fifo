{{-- <center><h1>
    Ganbatte Onii-chan<br>
    Kyaa ^.^
</h1></center> --}}
@include('layouts.base')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="{{asset('bootstrap/css_table/bootstrap.css')}}"> -->
    <link rel="stylesheet" href="{{asset('plugins/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    
        
    <title>Item</title>
</head>     
<div class="notif">
        <br>
        <br>
</div>
      
<body>    
    <div class="container" >
        <div class="add" style="display:none">   
            <form id="add-new" method="POST" enctype="multipart/form-data">
             @csrf         
            <td>Nama</td>
            <td>:</td>
            <td><input class="form-control nama" type="text" name="nama" style="border-radius:24px"></td>                
            <td> Code : </td>
            <td><input type="text" class="form-control code" name="custom_input" style="border-radius:24px"></td>
            <td> Avatar :</td>
            <td>
                <div class="custom-file">        
                   <label for="avatar" class="custom-file-label">Avatar</label>              
                       <input type="file" class="custom-file-input avatar" name="avatar" id="avatar">                                                
                    </div>
             </td>
            <td> Categories : </td>
            <td>
                <select multiple class="form-control select_category" style="border-radius:24px">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                </select>    
           </td>
           <br>
            <button type="submit" class="btn btn-outline-primary btn-save" style="border-radius:24px">Add</button>
            </form>
            <br>
            <br>
        </div>        
    </div>
    
    <div class="container">
        <button class="btn btn-outline-primary btn-show" style="display:block">Add More</button>        
        <button class="btn btn-outline-primary btn-hide" style="display:none">Hide</button>
        <br>
        <br>
        <div>
            <table class="table table-user">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Code</td>
                        <td>Photo</td>
                        <td>Action</td>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
                $('.btn-show').on('click',function(){
                    // alert('lol');
                    $('.add').css('display','block');
                    $('.btn-show').css('display','none');
                    $('.btn-hide').css('display','block');
                })
                $('.btn-hide').on('click',function(){
                    // alert('lol');
                    $('.add').css('display','none');
                    $('.btn-show').css('display','block');
                    $('.btn-hide').css('display','none');
                })
                
        </script>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="Edit" id="exampleModalLabel">Item Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="item-update" method="POST" enctype="multipart/form-data">
                         @csrf         
                        <input type="text" hidden readonly class="tf_id" name="id">
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" class=" form-control item_name" name="nama"></td>
                        <td>Code :</td>
                        <td><input type="text" class=" form-control new_code" name="custom_input"></td>
                        <td> Avatar :</td>
                        <td>
                            <div class="custom-file">        
                                    <label for="avatar" class="custom-file-label">Avatar</label>              
                                    <input type="file" class="custom-file-input" name="avatar" id="avatar">                  
                                                                     
                            </div>
                        </td>
                        <td> Categories : </td>
                        <td>
                            <select multiple class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>    
                        
                        </td>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 24px">Close</button>
                        <button type="submit" class="btn btn-primary btn-update" style="border-radius: 24px" >Save changes</button>
                    </div>
                    </form>
                    <script src="{{asset('jquery/jquery-3.4.1.min.js')}}"></script>
                    <script type="text/javascript">
                        var new_name;
                        $('.table-user').on( 'click', 'tr', function () {
                            new_name=tableUser.row(this).data().nama;
                            var new_code=tableUser.row(this).data().code;
                            var id=tableUser.row(this).data().number;
                            $('.new_code').val(new_code);
                            $('.item_name').val(new_name);
                            $('.tf_id').val(id);
                        });

                        
                        // alert(new_name);
                        // console.log(new_name);
                        
                    </script>
                    <script type="text/javascript">
                        $('#item-update').on('submit',function(){
                            // console.log('lol');
                            event.preventDefault();
                            $.ajax({
                                url:'{{route('items.edit')}}',
                                type:'POST',
                                dataType:'JSON',
                                data:new FormData(this),
                                contentType:false,
                                cache:false,
                                processData:false,
                                // {id:$('.tf_id').val(),nama:$('.item_name').val(),custom_input:$('.new_code').val(),id_category:$('.select_category').val(),_token:'{{csrf_token()}}'},
                                success:function(data){
                                    $('.notif').html('<div class="alert alert-success"><dt>'+data.message+'</dt></div></div>');
                                    $('.table-user').DataTable().ajax.reload();
                                    setTimeout(2000);
                                },
                                error:function(data){
                                    $('.notif').html('<div class="alert alert-danger"><dt>'+data.message+'</dt></div></div>');
                                    // alert('lol');
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        
</div>
</html>
</body>

        <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
        <!-- <script src="{{asset('jquery/jquery-3.4.1.min.js')}}"></script> -->
        <script src="{{asset('plugins/dataTables.js')}}"></script>    
        <script src="{{asset('plugins/dataTables.bootstrap4.js')}}"></script>    

        <script type="text/javascript">
            var tableUser = $('.table-user').DataTable({
                ajax:{
                    url:'{{route('items.list')}}',
                    dataSrc:''
                },
                columns:[
                    {data:'number'},
                    {data:'nama'},
                    {data:'code'},
                    {data:'photo'},
                    {data:'action'},
                    
                ],
                columnDefs: [
                    { 
                        targets: 3,
                        render: function(data) {
                            storage = '{{asset('storage/')}}'+'/';
                            return '<img class = "rounded-circle "width="150" height="150" src="'+storage+''+data+'">';
                        }
                    }   
                    ]
                
                
            });
        </script>
        
        
        <script type="text/javascript">
            $('#add-new').on('submit', function(){
                event.preventDefault();
                $.ajax({
                    url:'{{route('items.save')}}',
                    type:'POST',
                    dataType:'JSON',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    // {nama:$('.nama').val(),custom_input:$('.code').val(),id_category:$('.select_category').val(),avatar:$('.avatar').val(),_token:'{{csrf_token()}}'},
                    success:function(data){
                        $('.notif').html('<div class="alert alert-success"><dt>'+data.message+'</dt></div></div>');
                        $('.table-user').DataTable().ajax.reload();
                        setTimeout(2000);
                    },
                    error:function(data){
                        $('.notif').html('<div class="alert alert-danger"><dt>'+data.message+'</dt></div></div>');
                        // alert('lol');
                    }
                });
            });
        </script>

        <script>
            // $('.btn-edit').on('click',function(){
            //     console.log('cool');
            // })
                
                $('.table-user').on( 'click', 'tr', function () {
                    console.log(tableUser.row(this).data());
                    id = tableUser.row(this).data().number;
                    $('.btn-destroy').on('click',function(){    
                        
                        $.ajax({
                            url:'{{route('items.delete')}}',
                            type:'DELETE',
                            dataType:'JSON',
                            data:{id:id,_token:'{{csrf_token()}}'},
                            success:function(data){
                                $('.notif').html('<div class="alert alert-success"><dt>'+data.message+'</dt></div></div>');
                                $('.table-user').DataTable().ajax.reload();
                                setTimeout(2000);
                            },
                            error:function(data){
                                $('.notif').html('<div class="alert alert-danger"><dt>'+data.message+'</dt></div></div>');
                                // alert('lol');
                            }
                        });
                    });
                    $('.btn-found').on('click',function(){
                        $.ajax({
                            url:'{{route('users.lost')}}',
                            type:'POST',
                            dataType:'JSON',
                            data:{
                                id:$('.tf_id').val(),nama:$('.item_name').val(),_token:'{{csrf_token()}}'
                            },
                            success:function(data){
                                $('.notif').html('<div class="alert alert-success"><dt>'+data.message+'</dt></div></div>');
                                $('.table-user').DataTable().ajax.reload();
                        
                            },
                            error:function(data){
                                $('.notif').html('<div class="alert alert-danger"><dt>'+data.message+'</dt></div></div>');
                                    
                            }
                        })
                    })
                });
            
        </script>
        <script type="text/javascript">
            
        </script>