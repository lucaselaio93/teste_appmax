
<!------ Include the above in your HEAD tag ---------->
<style>
    .nav-side-menu {
  overflow: auto;
  font-family: verdana;
  font-size: 18px;
  font-weight: 200;
  background-color: #d9dadf;
  position: fixed;
  top: 0px;
  width: 300px;
  height: 100%;
  color: #000;
}
.nav-side-menu .brand {
  background-color: #c2c3c8;
  line-height: 50px;
  display: block;
  text-align: center;
  font-size: 18px;
}
.nav-side-menu .toggle-btn {
  display: none;
}
.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
}
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
  font-family: FontAwesome;
  content: "\f078";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  float: right;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #94959b;
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #94959b;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0px;
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #94959b;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: FontAwesome;
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
}
.nav-side-menu li {
  padding-left: 0px;
  border-left: 3px solid #d9dadf;
  border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #000;
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #94959b;
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff;
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
.menu-content a{
    padding-left: 10%;
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
body {
  margin: 0px;
  padding: 0px;
}

</style>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">
    <div class="brand">Menu Administrativo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">

                <li  data-toggle="collapse" data-target="#estoque" class="collapsed">
                  <a href="#"><i class="fa fa-truck fa-lg" aria-hidden="true"></i>   Estoques <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="estoque">
                    <li><a href="{{ route('stock-add') }}">Cadastrar</a></li>
                    <li><a href="{{ route('stock-show') }}">Listar</a></li>
                    <li><a href="{{ route('stock-select-drop') }}">Baixa de produtos</a></li>
                    <li><a href="{{ route('stock-select-add') }}">Entrada de produtos</a></li>
                    <li><a href="{{ route('stock-product-vinculate') }}">Vincular produto</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#produto" class="collapsed">
                  <a href="#"><i class="fa fa-tag fa-lg"></i>   Produtos <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="produto">
                    <li><a href="{{ route('product-add') }}">Cadastrar</a></li>
                    <li><a href="{{ route('product-show') }}">Listar</a></li>
                    
                </ul>
            </ul>
     </div>
</div>