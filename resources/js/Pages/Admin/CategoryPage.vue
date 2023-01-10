<template>

    <AdminLayout></AdminLayout>

  <div class="content-wrapper">



<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <Link href="/category/addPage" class="btn btn-sm btn-outline-dark">Add Category</Link>
            </h3>



            <div class="card-tools m-2">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
            <div v-if="$page.props.flash.categoryCreateSuccess"  class="alert alert-success p-3 m-3" role="alert">
                        {{$page.props.flash.categoryCreateSuccess}}
            </div>


            <div v-if="$page.props.flash.categoryDelete" class="alert alert-danger p-3 m-3" role="alert">
                       {{ $page.props.flash.categoryDelete }}
            </div>

            <div v-if="$page.props.flash.categoryUpdate" class="alert alert-info p-3 m-3" role="alert">
                        {{ $page.props.flash.categoryUpdate }}
            </div>


          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th> Category Id</th>
                  <th>Course Category Name</th>
                  <th>Course Count</th>
                  <th>Course Feed</th>
                  <th>Open Course Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody v-for="category in categoryData" :key="category.id">
                <tr>
                  <td>{{ category.id }}</td>
                  <td>{{ category.category_name }} </td>
                  <td>{{ category.course_count }}</td>
                  <td>{{ category.course_feeds }}</td>
                  <td>{{ category.date }}</td>
                  <td>
                    <Link :href="route('admin#categoryUpdatePage',category.id)" class="btn btn-sm bg-dark text-white mr-2"><i class="fas fa-edit"></i></Link>
                    <Link  @click="deleteCategory(category.id)" class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></Link>
                  </td>
                </tr>





              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</template>

<script>
import AdminLayout from './layout/AdminLayout.vue'
import { Link } from '@inertiajs/inertia-vue3';
export default {
  components: { AdminLayout ,Link },

  props:{
    categoryData:Array
  },


  methods:{
    deleteCategory(id){
        this.$inertia.delete(`/category/delete/${id}`);

    }
  }



}
</script>

<style>

</style>
