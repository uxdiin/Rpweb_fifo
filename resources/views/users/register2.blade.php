@include('layouts.base')
<div clas="card-body">
    <div class="container">
        <h1> Complete Your Regestration</h1> 
        <form class="form-group" method="POST" action="{{route('users.complete')}}" enctype="multipart/form-data">
            @csrf
            <label class="col-md-4 col-form-label text-md-left" for="phone"> No HP </label>
            <input class="form-control col-md-6" type="number" name="phone" required>
            <br>
            <div class="custom-file col-md-6">        
                    <label for="avatar" class="custom-file-label">Avatar</label>              
                    <input type="file" class="custom-file-input" name="avatar" id="avatar" required>                                                           
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-outline-primary" style="border-radius: 24px">Next</button>
        </form>    
    </div>
</div>