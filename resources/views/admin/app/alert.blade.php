@if(session('success'))
    <div class="position-fixed end-0 bottom-0 m-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ph ph-check-circle"></i> {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(isset($success))
    <div class="position-fixed end-0 bottom-0 m-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ph ph-check-circle"></i> {!! $success !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="position-fixed end-0 bottom-0 m-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ph ph-x-circle"></i> {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(isset($error))
    <div class="position-fixed end-0 bottom-0 m-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ph ph-x-circle"></i> {!! $error !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif($errors->any())
    <div class="position-fixed end-0 bottom-0 m-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <div><i class="ph ph-x-circle"></i>  {{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div id="dynamic-alerts" class="position-fixed end-0 bottom-0 m-3"></div>