
@if(auth()->user()->role == 1)
<li class="side-menus {{ (Request::segment(2)=='profile') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('seller.profile')}}">
        <i class=" fas fa-user"></i><span>Profile</span>
    </a>
</li>

<li class="side-menus {{ (Request::segment(1)=='seller' && Request::segment(2)=='rateChart') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('seller.rateChart.index')}}">
    <i class="fas fa-rupee-sign"></i><span>Rate Chart</span>
    </a>
</li>
@endif

@if(auth()->user()->role == 2)
<li class="side-menus {{ (Request::segment(1)=='buyer' && (Request::segment(2)=='sellerList'|| Request::segment(2)=='sellerProfile'))? 'active' : '' }}">
    <a class="nav-link" href="{{route('buyer.rateChart')}}">
        <i class=" fas fa-user"></i><span>Seller List</span>
    </a>
</li>
@endif


