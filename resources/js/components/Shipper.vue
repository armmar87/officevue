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
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Register At</th>
                                    <th>Modify</th>
                                </tr>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{user.id}}</td>
                                    <td>{{user.name + ' '+ user.last_name | upText}}</td>
                                    <td>{{user.phone_number}}</td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.created_at | myDate}}</td>
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
                    <form @submit.prevent="createUser">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>{{lang.get('messages.name')}}</label>
                                <input v-model="form.name" type="text" name="name" :placeholder="lang.get('messages.name')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>{{lang.get('messages.last_name')}}</label>
                                <input v-model="form.last_name" type="text" name="last_name" :placeholder="lang.get('messages.last_name')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }">
                                <has-error :form="form" field="last_name"></has-error>
                            </div>

                            <div class="form-group">
                                <label>{{lang.get('messages.phone_number')}}</label>
                                <input v-model="form.phone_number" type="text" name="phone_number" :placeholder="lang.get('messages.phone_number')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('phone_number') }">
                                <has-error :form="form" field="phone_number"></has-error>
                            </div>

                            <div class="form-group">
                                <label>{{lang.get('messages.email')}}</label>
                                <input v-model="form.email" type="email" name="email" :placeholder="lang.get('messages.email')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>

                            <div class="form-group">
                                <label>{{lang.get('messages.password')}}</label>
                                <input v-model="form.password" type="password" name="password" :placeholder="lang.get('messages.password')"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            <div class="form-group">
                                <select v-model="form.user_type" name="user_type" id="user_type" class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('user_type') }">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="shipper">Shipper</option>
                                </select>
                                <has-error :form="form" field="password"></has-error>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                users: {},
                form: new Form({
                    name: '',
                    last_name: '',
                    phone_number: '',
                    email: '',
                    password: '',
                    user_type: '',
                    remember: false
                })
            }
        },
        methods: {
            loadUsers(){

                axios.get('user').then(({ data }) => (this.users = data.data));
            },
            createUser () {
                this.$Progress.start();
                this.form.post('user').then(({ data }) => { console.log(data) });

                toast({
                    type: 'success',
                    title: 'Created in successfully',
                });
                $('#myModal').modal('hide');
                this.$Progress.finish();
            }
        },
        created() {
            this.loadUsers();
            // setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
