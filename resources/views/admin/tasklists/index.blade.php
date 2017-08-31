@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Task Lists</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('admin.tasklists.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Task List
            </a>
        </div>
        <div class="panel panel-body">
            <div class="table-responsive">
                <table id="tasklists" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="tasklist in tasklists">
                            <td v-text="tasklist.id"></td>
                            <td v-text="tasklist.name"></td>
                            <td v-text="tasklist.created_at"></td>
                            <td v-text="tasklist.updated_at"></td>
                            <td>
                                <a :href="'/admin/tasklists/' + tasklist.id" class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a :href="'/admin/tasklists/' + tasklist.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="tasklist.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script>
    $(document).ready( function () {
        new Vue({
            el: '#tasklists',
            data: {
                tasklists: [],
            },
            methods: {
                handleDelete(target) {
                    console.log(target);
                    axios.delete(route('api.tasklists.destroy', target))
                        .then(response => this.getTaskLists());
                },
                getTaskLists() {
                    axios.get(route('api.tasklists.index'))
                        .then(response => this.tasklists = response.data);
                }

            },
            created() {
                this.getTaskLists();
            }
        });
    });
</script>
@stop
