 <template>
    <div class="wrapper" >
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light ml-3">Myan Learn</span>
    </a>
    <div class="sidebar" style="height:700px">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <Link :href="route('admin#myProfilePage')" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                My Profile
              </p>
            </Link>
          </li>

          <li class="nav-item">
            <Link :href="route('admin#categoryPage')" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Category
              </p>
            </Link>
          </li>

          <li class="nav-item">
            <a href="pizza.html" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
                Pizza
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="user.html" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="order.html" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="carrier.html" class="nav-link">
              <i class="fas fa-biking"></i>
              <p>
                Carrier
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>



  </div>

</template>

<script>


import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link},

    props:{
        data:Object
    }

}
</script>

<style>

</style>
