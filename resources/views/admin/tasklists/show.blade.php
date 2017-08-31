@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header" v-text="tasklist"></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Task
            </a>
        </div>
        <div class="panel panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in tasks">
                            <td v-text="task.order"></td>
                            <td v-text="task.name"></td>
                            <td v-text="task.details"></td>
                            <td v-text="task.created_at"></td>
                            <td v-text="task.updated_at"></td>
                            <td>
                                <a :href="'/admin/tasks/' + task.id + '/edit'" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button :data-id="task.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
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
            el: '#app',
            data: {
                url: '',
                tasklist: '',
                tasks: [],
            },
            methods: {
                handleDelete(target) {
                    console.log(target)
                    axios.delete(route('api.tasks.destroy', target))
                        .then(response => this.getTasks());
                },
                getTaskListId() {
                    let path = window.location.pathname
                    this.url = /\d/.exec(path)
                },
                getTasks() {
                    axios.get(route('api.tasklists.show', this.url))
                        .then(response => {
                                this.tasklist = response.data.name
                                this.tasks = response.data.tasks
                        });
                }
            },
            created() {
                this.getTaskListId()
                this.getTasks()
            }
        });
    });
</script>
@stop
