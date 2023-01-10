<template>

    <AdminLayout></AdminLayout>

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
                <div v-if="$page.props.flash.failMessage" class="alert alert-danger p-3 m-3" role="alert">
                    {{ $page.props.flash.failMessage }}
                </div>

                <div v-if="$page.props.flash.notSameMessage" class="alert alert-danger p-3 m-3" role="alert">
                    {{ $page.props.flash.notSameMessage }}
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form @submit.prevent="submit" class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 mt-2 col-form-label">Old Password</label>
                          <div class="col-sm-10 mt-3">
                            <input type="text" class="form-control rounded"  id="inputName" v-model="passwordForm.oldPassword" placeholder="Enter you Old Password" >
                            <small class="text-danger">{{ errors.oldPassword }}</small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 mt-2 col-form-label">New Password</label>
                          <div class="col-sm-10 mt-3">
                            <input type="text" class="form-control rounded"  id="inputEmail" v-model="passwordForm.newPassword"   placeholder="Enter your New Password ">
                            <small class="text-danger">{{ errors.newPassword }}</small>
                          </div>
                        </div>


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Change</button>
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
export default {
  components: { AdminLayout },


  props:{
    password:String,
    user_data:Object,
    errors:Object
  },

  data(){
    return {
       passwordForm:{
        newPassword:"",
        oldPassword:""
       }
    }
  },

  methods:{
    submit(){
        this.$inertia.post(`/updateProfilePassword/${this.user_data.id}`,this.passwordForm)


    }
  }

}
</script>

<style>

</style>
