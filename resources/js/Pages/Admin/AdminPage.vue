<template>

    <AdminLayout :data="data"></AdminLayout>

     <div class="content-wrapper" style="height:650px">
    <section class="content">

      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">User Profile</legend>
                </div>
                <div v-if="$page.props.flash.successMessage" class="alert alert-success p-3 m-3" role="alert">
                    {{ $page.props.flash.successMessage }}
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control rounded" v-model="userData.name" id="inputName" placeholder="Name" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control rounded" v-model="userData.email" id="inputEmail" placeholder="Email">
                          </div>
                        </div>



                        <div class="form-group row">
                          <label for="address" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                           <textarea name="" v-model="userData.address" class="form-control" id="" cols="20" rows="5"></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <Link :href="route('admin#passwordPage',data.id)">Change Password</Link>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Submit</button>
                          </div>
                        </div>
                      </form>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>
    </div>

</template>

<script>
import AdminLayout from './layout/AdminLayout.vue'
import { Link } from '@inertiajs/inertia-vue3';
export default {
  components: { AdminLayout ,Link },

  props:{
    data:Object
  },

  data(){
    return {
        userData:{
            name:this.data.name,
            email:this.data.email,
            address:this.data.address
        }
    }
  }

}
</script>

<style>

</style>
