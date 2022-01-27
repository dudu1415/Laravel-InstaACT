<nav class="navbar navbar-light fixed-top bg-white border-bottom">
    <div class="container-fluid" style="width:900px; max-width: 100%;">
        <div class="navbar-header"> 
            <img src="{{asset('images/logo.png')}}" width="100">
        </div>

        <div class="navbar-nav flex-row">
            <a class="nav-link me-3" href="/posts/create">  {{--//margen da direita 'me-3'--}}
                <i class="bi bi-plus-square fs-3"> </i>{{--iconei do botaõ--}}
            </a>

            <a class="nav-link me-3" href="/posts/notifications">  {{--//margen da direita 'me-3'--}}
                <i class="bi bi-heart fs-3"> </i>{{--iconei do botaõ--}}
            </a>

            <a class="nav-link me-3" href="/users/config">  {{--//margen da direita 'me-3'--}}
                <i class="bi bi-person-circle fs-3"> </i>  {{--iconei do botaõ--}}
            </a>

        </div>
    </div>
</nav>