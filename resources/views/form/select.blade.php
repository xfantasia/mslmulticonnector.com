      <!--SELECT ELEMENT -->
      <div class="form-group">
        <label>{{$label}}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
          </div>
        <select name='{{$name}}' class="form-control" {{$required}}>
          {{$options}}
        </select>
      </div>
      </div>