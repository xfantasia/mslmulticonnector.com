
    
    <!--########## TEXTAREA ##########-->
    <div class="form-group">
        <label>{{$label}}</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
          </div>
          <textarea class="form-control" name="{{$name}}" rows="3" value="{{$value}}" placeholder="{{$placeholder}}" {{$required}}>{{$value}}</textarea>
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->
