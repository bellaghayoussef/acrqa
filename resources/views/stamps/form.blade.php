

<div class="form-group col-12 {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">{{ trans('stamps.image') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="image" id="image" class="hidden">
                </span>
            </label>
           
        </div>

        @if (isset($stamp->image) && !empty($stamp->image))
            <div class="input-group input-width-input">
                 <img src="{{ asset($stamp->image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
               
            </div>
        @endif
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group  col-6 {{ $errors->has('header') ? 'has-error' : '' }}">
    <label for="header" class="col-md-2 control-label">{{ trans('stamps.header') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="header" id="header" class="hidden">
                </span>
            </label>
           
        </div>

        @if (isset($stamp->header) && !empty($stamp->header))
            <div class="input-group input-width-input">
                 <img src="{{ asset($stamp->header) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
               
            </div>
        @endif
        {!! $errors->first('header', '<p class="help-block">:message</p>') !!}
    </div>
</div>






<div class="form-group  col-6 {{ $errors->has('footer') ? 'has-error' : '' }}">
    <label for="footer" class="col-md-2 control-label">{{ trans('stamps.footer') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="footer" id="footer" class="hidden">
                </span>
            </label>
           
        </div>

        @if (isset($stamp->footer) && !empty($stamp->footer))
            <div class="input-group input-width-input">
                 <img src="{{ asset($stamp->footer) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
               
            </div>
        @endif
        {!! $errors->first('footer', '<p class="help-block">:message</p>') !!}
    </div>
</div>


