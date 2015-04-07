<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            @if(Auth::check())
            <div class="pull-left image">
                {{ HTML::image($user->gravatar, null, ['class' => 'img-circle']) }}
            </div>
            <div class="pull-left info">
                <p>{{{ $user->username }}}</p>

                <a href="{{ URL::to('/logout') }}">
                    {{ HTML::faicon('fa-sign-out') }}
                    <span>{{ Lang::get('common.logout') }}</span>
                </a>
            </div>
            @else
            <div class="pull-left image">
                {{ HTML::image("https://www.gravatar.com/avatar/", null, ['class' => 'img-circle']) }}
            </div>
            <div class="pull-left info">
                <p>Hello, Guest</p>
                <a href="{{ URL::to('/login') }}">
                    {{ HTML::faicon('fa-sign-in') }}
                    <span>{{ Lang::get('common.login') }}</span>
                </a>
            </div>
            @endif
        </div>

        {{ Former::open()->method('GET')
                ->route('player.listing')
                ->type('raw')
                ->class('sidebar-form')
                ->id('psearch') }}
            <div class="input-group">
                {{ Former::text('player')->placeholder(Lang::get('common.nav.extras.psearch.placeholder')) }}
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        {{ Former::close() }}

        @include('layout.navigation')
    </section>
</aside>
