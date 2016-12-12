        <div class="users-ribbon">
        	<div class="col-xs-6">
        		<div class="username">
        			Welcome : 
                                @if(\Auth::guard('user')->check())
                                <b>{{ \Auth::guard('user')->user()->name }}</b>
                                @elseif(\Auth::guard('guest')->check())
                                <b>{{ \Auth::guard('guest')->user()->email }}</b>
                                @else
                                <b>Guest</b>
                                @endif
        		</div>
        	</div>
        	<div class="col-xs-6">
        		<div class="logout">
                                @if(\Auth::guard('user')->check())
                                <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a>
                                @elseif(\Auth::guard('guest')->check())
                                <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a>
                                @else
                                <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Login</a>
                                @endif
        		</div>
        	</div>
        </div>