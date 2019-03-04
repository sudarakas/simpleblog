@if(count($errors))

    <div class="form-group">
        <div class="alert alert-danger">
            <b>Please fix the following errors before submit the form</b>
            <hr>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><p>{{$error}}</p></li>
                @endforeach
            </ul>
        </div>

    </div>

@endif