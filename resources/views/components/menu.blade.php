<div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
    <!-- Main Menu -->
        <div class="side-menu-container">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#"> Dashboard</a></li>

                <!-- Dropdown-->
                <li class="panel panel-default" id="dropdown">
                    <a data-toggle="collapse" href="#dropdown-lvl1">
                     Master <span class="caret"></span>
                    </a>

                    <!-- Dropdown level 1 -->
                    <div id="dropdown-lvl1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('master.kategori-index') }}">Kategori Produk</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li><a href="{{ route('produk.index') }}"> Produk</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>