<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin.getProduct')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Danh sách sản phẩm
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('admin.getContact')}}">Liên hệ</a>
                                    <a class="nav-link" href="{{route('admin.getBill')}}">Đơn hàng</a>
                                    <a class="nav-link" href="{{route ('admin.getCustomer')}}">Khách hàng</a>
                                    <a class="nav-link" href="{{route ('admin.getPersonnal')}}">Nhân viên</a>
                                    <a class="nav-link" href="{{route ('admin.getSlide')}}">Banner</a>
                                </nav>
                            </div>
                            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Loại sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> --}}
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
        
                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <a class="nav-link" href="{{route ('admin.getUser')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Người dùng
                            </a>
                            <a class="nav-link" href="{{route ('admin.getProductType')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Danh mục
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
</div>