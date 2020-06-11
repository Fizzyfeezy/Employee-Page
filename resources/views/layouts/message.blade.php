@if (isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span>There are errors in your form </span>
        <ul type="disc">                        
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('attendees'))
    <div class="alert alert-primary alert-dismissable fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('attendees') }}
    </div>
@endif

@if(session('admin'))
    <div class="alert alert-primary alert-dismissable fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('admin') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('error') }}
    </div>
@endif

@if(session('message'))
    <div class="alert alert-info alert-dismissable fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('message') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissable fade show">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('success') }}
    </div>
@endif