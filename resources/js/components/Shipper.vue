<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shipper Table</h3>

                        <div class="card-tools">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Add <i class="fa fa-plus"></i></button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Last Name</th>
                                    <th>Phone number</th>
                                    <th>Modify</th>
                                </tr>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs remove">
                                            <i class="fa fa-trash"></i>
                                        </a>
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


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label>@lang('messages.name')</label>
                                <input v-model="form.name" type="text" name="name" placeholder="@lang('messages.name')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Create</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    name: '',
                    last_name: '',
                    email: '',
                    password: '',
                    user_type: '',
                    remember: false
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
