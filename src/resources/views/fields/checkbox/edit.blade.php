<div class="row">
    <div class="col-sm-6">
        <div class="form-group @if ($errors->has($attribute)) has-error @endif">
            <label class="control-label" for="{{ $attribute }}">
                {{ $attributeTitle }}
                @if (isset($field['required'])) 
                <span title="" data-placement="right" data-toggle="tooltip" data-original-title="This field is required">*</span>
                @endif
                @if(isset($field['tooltip']))
                <span title="" data-placement="right" data-toggle="tooltip" class="badge bg-black" data-original-title="{{ $field['tooltip'] }}">?</span>
                @endif
            </label>

            <div class="col-sm-12">            
                @if(isset($options) && count($options) > 0)
                    @foreach ($options as $value => $option)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <p>
                                <input type="checkbox"
                                        value="{{ ($value === 0 && count($options) === 1) ? 1 : $value }}"
                                        name="{{ $attribute }}{{ (count($options) > 1 ? '[]' : '') }}"
                                        @if (
                                                (is_scalar($oldValue) && $oldValue == $value)
                                            ||
                                                (is_array($oldValue) && array_key_exists($value, $oldValue))
                                            )
                                            checked="checked" @endif
                                        >
                                {{ $option }}
                            </p>
                        </div>
                    @endforeach

                    @if(isset($field['help']))
                    <div class="col-sm-12">
                        <p class="help-block">{!! $field['help'] !!}</p>
                    </div>
                    @endif
                @else 
                    <div class="callout callout-warning">
                        <strong>
                        No options available for {{ $attributeTitle }}!
                        </strong>
                    </div>
                @endif
            </div>
            
            @if ($errors->has($attribute))
                <p class="help-block">
                    <strong>{{ $errors->first($attribute) }}</strong>
                </p>
            @endif
        </div>
    </div>
</div>
