


<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.enterprise.accueil')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon nav-icon" data-eva="grid-outline"></i>
            <span >Accueil</span>
            {{-- <div class="arrow-down"></div> --}}
        </a>                                 
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
            <i class="icon nav-icon" data-eva="archive-outline"></i>
            <span data-key="t-apps">Apps</span>
            <div class="arrow-down"></div>
        </a>
        <div class="dropdown-menu" aria-labelledby="topnav-pages">

            <a href="apps-calendar.html" class="dropdown-item" data-key="t-calendar">Calendar</a>
            <a href="apps-chat.html" class="dropdown-item" data-key="t-chat">Chat</a>
            <a href="apps-file-manager.html" class="dropdown-item" data-key="t-filemanager">File Manager</a>


            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button">
                    <span data-key="t-ecommerce">Ecommerce</span>
                    <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                    <a href="ecommerce-products.html" class="dropdown-item" data-key="t-products">Products</a>
                    <a href="ecommerce-product-detail.html" class="dropdown-item" data-key="t-product-detail">Product Detail</a>
                    <a href="ecommerce-orders.html" class="dropdown-item" data-key="t-orders">Orders</a>
                    <a href="ecommerce-customers.html" class="dropdown-item" data-key="t-customers">Customers</a>
                    <a href="ecommerce-cart.html" class="dropdown-item" data-key="t-cart">Cart</a>
                    <a href="ecommerce-checkout.html" class="dropdown-item" data-key="t-checkout">Checkout</a>
                    <a href="ecommerce-shops.html" class="dropdown-item" data-key="t-shops">Shops</a>
                    <a href="ecommerce-add-product.html" class="dropdown-item" data-key="t-add-product">Add Product</a>
                </div>
            </div>

            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button">
                    <span data-key="t-email">Email</span>
                    <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-email">
                    <a href="email-inbox.html" class="dropdown-item" data-key="t-inbox">Inbox</a>
                    <a href="email-read.html" class="dropdown-item" data-key="t-read-email">Read Email</a>
                    <div class="dropdown">
                        <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email-templates" role="button">
                            <span data-key="t-email-templates">Templates</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email-templates">
                            <a href="email-template-basic.html" class="dropdown-item" data-key="t-basic-action">Basic Action</a>
                            <a href="email-template-alert.html" class="dropdown-item" data-key="t-alert-email">Alert Email</a>
                            <a href="email-template-billing.html" class="dropdown-item" data-key="t-bill-email">Billing Email</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-invoices" role="button">
                    <span data-key="t-invoices">Invoices</span>
                    <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-invoices">
                    <a href="invoices-list.html" class="dropdown-item" data-key="t-invoice-list">Invoice List</a>
                    <a href="invoices-detail.html" class="dropdown-item" data-key="t-invoice-detail">Invoice Detail</a>
                </div>
            </div>

            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-projects" role="button">
                    <span data-key="t-projects">Projects</span>
                    <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-projects">
                    <a href="projects-grid.html" class="dropdown-item" data-key="t-p-grid">Projects Grid</a>
                    <a href="projects-list.html" class="dropdown-item" data-key="t-p-list">Projects List</a>
                    <a href="projects-create.html" class="dropdown-item" data-key="t-create-new">Create New</a>
                </div>
            </div>

            <div class="dropdown">
                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-contact" role="button">
                    <span data-key="t-contacts">Contacts</span>
                    <div class="arrow-down"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                    <a href="contacts-grid.html" class="dropdown-item" data-key="t-user-grid">User Grid</a>
                    <a href="contacts-list.html" class="dropdown-item" data-key="t-user-list">User List</a>
                    <a href="contacts-profile.html" class="dropdown-item" data-key="t-user-profile">Profile</a>
                </div>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.role.enterprise.index')}}" id="topnav-components" role="button">
            <i class="mdi mdi-account-circle"></i>
            <span>Connexion</span>
        </a>

    </li> --}}

</ul>