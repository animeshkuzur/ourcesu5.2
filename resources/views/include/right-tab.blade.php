<!-----------------right --pannel---------------->
<div class="col-md-3 righttab">
        <div class="">
        <a href="{{ url('/login') }}">
            <div class="right-tab">
                <div class="right-tab-icon">
                    <img src="{{ URL::asset('images/account.png') }}" class="img-responsive" align="left">
                </div>
                <div class="right-tab-title">My Account</div>
            </div>
        </a>
        </div>
   
    
        <div class="">
        <a href="{{ url('/vault') }}">
            <div class="right-tab">
                <div class="right-tab-icon">
                    <img src="{{ URL::asset('images/quick.png') }}" class="img-responsive" align="left">
                </div>
                <div class="right-tab-title">My Vault</div>
            </div>
        </a>
        </div>

        <div class="">
        <a href="{{ url('/payment') }}">
            <div class="right-tab">
                <div class="right-tab-icon">
                    <img src="{{ URL::asset('images/payment.png') }}" class="img-responsive" align="left">
                </div>
                <div class="right-tab-title">My Payments</div>
            </div>
        </a>
        </div>

    <div class="panel panel-default"> 
        <ul class="list-group accordion">
            <!--<li class="list-group-item tab">
                
                <div class="row" id="dropdown-detail-10">
                    <div class="col-xs-10 cesutab">
                        <img src="{{ URL::asset('images/account.png') }}" class="img-responsive cesutab"> My Account Login
                    </div>
                </div>
               
            </li>
            <li class="list-group-item tab">
                <div class="row" id="dropdown-detail-11">
                    <div class="col-xs-10 cesutab">
                        <img src="{{ URL::asset('images/payment.png') }}" class="img-responsive cesutab"> Make a Payment
                    </div>
                </div>
                
            </li>-->
            <li class="list-group-item tab">
                <div class="row" id="dropdown-detail-12">
                    <div class="col-xs-10 cesutab">
                       <img src="{{ URL::asset('images/quick.png') }}" class="img-responsive cesutab"> Quick Access
                    </div>
                    <div class="col-xs-2"><img src="{{ URL::asset('images/plus.png') }}" class="img-reponsive">
                    </div>
                </div>
                <div id="detail-12">
                   <div class="tab-submenu">
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Know Your Bill</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Know Your Bill</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Know Your Bill</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Know Your Bill</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Know Your Bill</p> 
                    </div>
                    
                </div>
            </li>
            <li class="list-group-item tab">
                <div class="row" id="dropdown-detail-13">
                    <div class="col-xs-10 cesutab">
                       <img src="{{ URL::asset('images/faqs.png') }}" class="img-responsive cesutab">Popular Faqs
                    </div>
                    <div class="col-xs-2"><img src="{{ URL::asset('images/plus.png')}}" class="img-reponsive">
                    </div>
                </div>
                <div id="detail-13">
                   <div class="tab-submenu">
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Customer Service</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Customer Service</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Customer Service</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Customer Service</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Customer Service</p> 
                    </div>
                    
                </div>
            </li>
            <li class="list-group-item tab">
                <div class="row" id="dropdown-detail-14">
                    <div class="col-xs-10 cesutab">
                       <img src="{{ URL::asset('images/ask.png') }}" class="img-responsive cesutab">Ask a Question
                    </div>
                    <div class="col-xs-2"><img src="{{ URL::asset('images/plus.png') }}" class="img-reponsive"></div>
                </div>
                <div id="detail-14">
                   <div class="tab-submenu">
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Manage Your Connection</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Manage Your Connection</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Manage Your Connection</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Manage Your Connection</p>
                    <p class="cesu-tab"><img src="{{ URL::asset('images/leftmenu-electry.png') }}" class="img-responsive cesutab"> Manage Your Connection</p> 
                    </div>
                    
                </div>
            </li>
        </ul>
	</div>
</div>