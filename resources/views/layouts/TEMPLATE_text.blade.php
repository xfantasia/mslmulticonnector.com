@props([
  'label' => '',
  'name' => '',
  'value' => '',
  'placeholder' => ''
])
     
     <!--TEXT -->
      <div class="form-group">
        <label>{{$label}}</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
          </div>
          <input type="text" name="{{$name}}" value="{{$value}}" class="form-control" placeholder="{{$placeholder}}">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->