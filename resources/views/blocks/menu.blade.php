<div id="sidebar-menu">
    <ul class="metismenu list-unstyled" id="side-menu"> 
        <li>
            <a href="{{ route('home') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Home</span>
            </a>
        </li>

        <li>
            <a href="{{ route('categories') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Categories</span>
            </a>
        </li>

        <li>
            <a href="{{ route('brands') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Brands</span>
            </a>
        </li>

        <li>
            <a href="{{ route('products') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Products</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="{{ route('json') }}" class="waves-effect">
                <i class="fa fa-info"></i>
                <span key="t-dashboards">JSON DATA</span>
            </a>
        </li>
    </ul>
</div>