@include('layouts.base')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FIFo</title>
</head>
<body>
    <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 ">Input Code</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">
            <input type="text" class="form-control tf-code" style="border-radius: 24px; background-color: silver; " >
        </h2>
        <a class="btn btn-secondary btn-found" style="border-radius:24px">Found</a>
      </div>
    </div>
  </header>
</body>
<script type="text/javascript">
    $('.btn-found').on('click',function(){
        $.ajax({
            url:'{{route('users.founded')}}',
            type:'POST',
            dataType:'JSON',
            data:{
                code:$('.tf-code').val(),_token:'{{csrf_token()}}',
            },
            success:function(data){
                alert(data.message);
            },
            error:function(data){
                alert(data.message);
            },
        })
    })    
        
</script>
</html>