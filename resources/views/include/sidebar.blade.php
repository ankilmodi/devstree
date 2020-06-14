<aside class="main-sidebar">
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MANAGEMENT</li>            
            <li><a href="{{ route('subcategoryList') }}"><i class="fa fa-circle-o"></i>Category Module</a></li>
            <li><a href="{{ route('productList') }}"><i class="fa fa-circle-o"></i>Product Module</a></li>
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i>  Logout
		    </a>	
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    		{{ csrf_field() }}
			</form>
		</li>
     </ul>
    </section>

</aside>
