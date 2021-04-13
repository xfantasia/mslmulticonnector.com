  <!---------- FLASH ALERT MESSAGE STARTS ---------->
  <div class="container">
    @if ($message = Session::get('success'))
        <div class="round alert alert-success alert-block" id="messagex">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif 

    @if ($message = Session::get('failed'))
        <div class="round alert alert-warning alert-block" id="messagex">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif

    <!--form process alert all message-->    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        //hide alert message
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 6000);
    </script>
</div>
<!---------- ALERT MESSAGE ENDS ---------->