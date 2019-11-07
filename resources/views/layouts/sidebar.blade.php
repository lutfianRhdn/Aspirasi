@php    
    use App\Menu;
@endphp
<div class="sidebar-wrapper bg-light">
    <div class="sidebar-heading pr-5">
        DASHBOARD
    </div>

    <div class="dropdown-divider border-dark"></div>
    
    <div class="list-group list-group-flush sidebar-menu mt-4">
        

        <!-- menu -->
        @php 
            $menus = Menu::with('subMenus')->orderBy('menu', 'ASC')->get();
        @endphp

        @foreach($menus as $menu)
        <a href="#submenu{{ $menu->id }}" data-toggle="collapse" aria-expanded="false" class="sidebar-item m" >
            <div class="d-flex w-100 justify-content-start align-items-center">        
                <span><i class="fas {{ $menu->icon }} mr-2"></i></span>
                <span class="menu-collapsed"> {{ $menu->menu }} </span>
            </div>
        </a>
                   
        <div id='submenu{{ $menu->id }}' class="collapse sidebar-submenu sm ">
            
            <!-- sub menu -->
            @foreach( $menu->subMenus as $subMenu)
            <a href="{{ route($subMenu->url) }}" class="list-group-item list-group-item-action px-5 s-m ">
                <span class="menu-collapsed">{{ $subMenu->sub_menu}}</span>
            </a>
            @endforeach
        </div>
        @endforeach

    </div>
</div>


<script type="text/javascript">
    $(function() {
        $(".m").click(function() {
            let subMenu = $(this).attr('href');
          
            // remove classes from all
            $(".sm").removeClass("show");
            $(".m").removeClass("active");
            // add class to the one we clicked
            $(this).addClass("show");
            $(this).addClass("active");
        });
});
</script>