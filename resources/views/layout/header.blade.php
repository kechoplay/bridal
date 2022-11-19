<header class="navbar-header">
    <div class="navbar-container-xs">
        <div class="navbar-row">
            <div class="navbar-logo">
                <a class="brand" href="/"><img src="/images/lamnhistudio.jpg" alt="Lamnhi Bridal" class="logo-img"></a>
            </div>
            <div class="navbar-toggle-search">
                <form role="search" method="get" class="header-search-form closed" action="/">
                    <button type="submit" class="search-submit"><span class="theia-search"></span></button>
                    <label>
                        <span>Search for:</span>
                        <input type="search" class="search-field" value="" name="s" required>
                    </label>
                </form>
            </div>
            <div class="navbar-toggle-menu">
                <button class="btn btn-txt" type="button" data-toggle="collapse" data-target="#collapse-menu" aria-expanded="false" aria-controls="collapse-menu">
                    <div class="toggle-line"></div>
                    <div class="toggle-line"></div>
                    <div class="toggle-line"></div>
                </button>
            </div>
        </div>
    </div>
    <div class="navbar-menu collapse" id="collapse-menu">
        <div class="navbar-menu-container">
            <ul id="menu-main-menu" class="nav nav-primary"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-75"><a href="/bridal-product/">bộ váy cưới</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="/special-product/">bộ váy đặc biệt</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="/new-product/">Sản phẩm mới</a></li>
            </ul>                    <ul id="menu-supra-left" class="nav nav-supra-left"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157"><a href="/shop/">Shop sản phẩm</a></li>
            </ul>                    <ul id="menu-supra-right" class="nav nav-supra-right"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-158"><a href="/contact/">Liên Hệ</a></li>
            </ul>          </div>
    </div>
    <div class="navbar-container-lg">
        <div class="navbar-row">
            <nav class="navbar-supra navbar-supra-left">
                <ul id="menu-supra-left-1" class="nav nav-supra-left"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157"><a href="/shop/">Shop sản phẩm</a></li>
                </ul>        </nav>
            <nav class="navbar-supra navbar-supra-right">
                <form role="search" method="get" class="header-search-form closed" action="/">
                    <button type="submit" class="search-submit"><span class="theia-search"></span></button>
                    <label>
                        <span>Search for:</span>
                        <input type="search" class="search-field" value="" name="s" required>
                    </label>
                </form>
                <ul id="menu-supra-right-1" class="nav nav-supra-right"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-158"><a href="/contact/">Liên Hệ</a></li>
                </ul>        </nav>
            <div class="navbar-logo">
                <a class="brand" href="/"><img src="/images/logo.svg" alt="Lamnhi Bridal" class="logo-img"></a>
            </div>
            <nav class="navbar-primary">
                <div class="navbar-logo">
                    <a class="brand" href="/"><img src="/images/logo.svg" alt="Lamnhi Bridal" class="logo-img"></a>
                </div>
                <ul id="menu-main-menu-1" class="nav nav-primary"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-75"><a href="/bridal-product/">bộ váy cưới</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="/special-product/">bộ váy đặc biệt</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="/new-product/">Sản phẩm mới</a></li>
                    @if(!empty(auth()->guard('customers')->user()->name))
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="/order/history">Đơn hàng đã mua</a></li>
                    @endif
                </ul>                <form role="search" method="get" class="header-search-form closed" action="/">
                    <button type="submit" class="search-submit"><span class="theia-search"></span></button>
                    <label>
                        <span>Search for:</span>
                        <input type="search" class="search-field" value="" name="s" required>
                    </label>
                </form>
            </nav>
        </div>
    </div>
</header>
