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
                  <legend class="text-center">Add Category</legend>
                </div>

                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form @submit.prevent="submit" class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-lg-2 col-form-label">Course Name</label>
                          <div class="col-sm-10 mt-2">
                            <input type="text" class="form-control rounded" v-model="createForm.courseName"  id="inputName" placeholder="Enter course name" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputCount" class="col-sm-2 col-form-label">Course Count</label>
                          <div class="col-sm-10 mt-2">
                            <input type="number" class="form-control rounded" v-model="createForm.courseCount"  id="inputCount" placeholder="Enter course count">
                          </div>
                        </div>



                        <div class="form-group row">
                          <label for="feed" class="col-sm-2 col-form-label">Course Feeds</label>
                          <div class="col-sm-10 mt-2">
                           <input type="text"  class="form-control rounded" v-model="createForm.courseFeeds" placeholder="Enter course feed">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="feed" class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-10 ">
                           <input type="date" v-model="createForm.date" class="form-control rounded">
                          </div>
                        </div>


                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Create</button>
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

  data(){
    return {
        createForm:{
            courseName:"",
            courseCount:"",
            courseFeeds:"",
            date:""
        }
    }
  },

  methods:{
    submit(){
        this.$inertia.post(`/category/add`,this.createForm);
    }
  }


}
</script>

<style>

</style>
