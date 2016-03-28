<div class="row">
    <div class="col-sm-6">
        <div class="form-group @if ($errors->has($attribute)) has-error @endif">
            <label class="control-label" for="{{ $attribute }}">
                @if ($errors->has($attribute))
                    <i class="fa fa-times-circle-o"></i>
                @endif
                {{ $attributeTitle }}
                @if (isset($options['required'])) 
                    <span title="" data-placement="right" data-toggle="tooltip" data-original-title="This field is required">*</span>
                @endif
                @if(isset($options['tooltip']))
                    <span title="" data-placement="right" data-toggle="tooltip" class="badge bg-black" data-original-title="{{ $options['tooltip'] }}">?</span>
                @endif
            </label>
            
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text"
                        name="{{ $attribute }}"
                        id="{{ $attribute }}"
                        data-mask="" 
                        data-inputmask="'alias': '{{ (isset($options['inputmask']) ? $options['inputmask'] : '') }}'"
                        class="form-control focus.inputmask"
                        value="{{ oldValue ) }}">
            </div>
            
            @if(isset($options['help']))
                <p class="help-block">{!! $options['help'] !!}</p>
            @endif
            
            @if ($errors->has($attribute))
                <p class="help-block">
                    {{ $errors->first($attribute) }}
                </p>
            @endif
        </div>
    </div>
</div>

@section('enqueued-js')
    <script>
    $(function () {
        $("#{{ $attribute }}").inputmask("{{ (isset($options['inputmask']) ? $options['inputmask'] : '') }}", {"placeholder": "{{ (isset($options['inputmask']) ? $options['inputmask'] : '') }}"});
    });
    </script>
@append
