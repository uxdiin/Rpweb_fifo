@include('layouts.base')
<html>
    <link rel="stylesheet" href="{{asset('plugins/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    
    <head></head>
    <body class = "card-body">
        <div class="container">
            <table class="table table-notifications">
                <thead>
                    <tr>
                        <td>Message</td>
                        <td>Barang</td>
                        <td></td>
                        <!-- <td>Foto</td> -->
                        <td>Penemu</td>
                    </tr>
                </thead>
            </table>
        </div>
    </body> 
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('plugins/dataTables.js')}}"></script>    
    <script src="{{asset('plugins/dataTables.bootstrap4.js')}}"></script>    
    <script>
        $('.table-notifications').DataTable({
            ajax:{
                url:'{{route('users.Notificationslist')}}',
                dataSrc:''
            },
            columns:[
                {data:'message'},
                {data:'item_name'},
                {data:'item_photo'},
                {data:'pengirim'},
            ],
            columnDefs:[
                {
                    targets: 2,
                    render:function(data){
                        storage = '{{asset('storage/')}}'+'/';
                        return '<img class = "rounded-circle "width="150" height="150" src="'+storage+''+data+'">';
                    }
                }
            ],
            'bSort': false,
            'searching':false, 
            'paging':false,
            'info':false,
        });
    </script>  

</html>