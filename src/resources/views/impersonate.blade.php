@if(!Session::has(config('impersonate_user.session_key')) && backpack_user()->canImpersonateOthers() && $entry->canBeImpersonated())
    <form class="d-inline-block" method="post" action="{{ url($crud->route . '/impersonate-user/' . $entry->getKey()) }}">
        @csrf
        <button type="submit" class="btn btn-sm btn-link">
            <i class="la la-unlock me-1"></i> {{ __('impersonate_user::messages.btn_impersonate') }}
        </button>
    </form>
@elseif(Session::has(config('impersonate_user.session_key')) && backpack_user()->id === $entry->getKey())
    <form class="d-inline-block" method="post" action="{{ url($crud->route . '/exit-impersonated-user') }}">
        @csrf
        <button type="submit" class="btn btn-sm btn-link">
            <i class="la la-lock {{ config('impersonate_user.btn_exit_custom_class') }}"></i> {{ __('impersonate_user::messages.btn_exit_impersonated') }}
        </button>
    </form>
@endif
