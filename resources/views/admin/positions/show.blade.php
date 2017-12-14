@extends('admin.layout')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Position</h1>

    <div class="panel panel-default">
        <div class="panel panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
							<th>Name</th>
							<th>Acronym</th>
							<th>Color</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $position['name'] }}</td>
                            <td>{{ $position['acronym'] }}</td>
                            <td><span class="badge" style="background-color: {{ $position['color'] }}">{{ $position['color'] }}</span></td>
                            <td>{{ $position['created_at'] }}</td>
                            <td>{{ $position['updated_at'] }}</td>
                            <td>
                                <a href="{{ route('positions.edit', ['id' => $position['id']]) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Task Lists</h3>

    <div class="panel panel-default">
        <div class="panel panel-body">

            <div class="col-md-4">
                <div class="table">
                    <table class="table table-striped">
                        <tbody>
                            <tr v-for="(tasklist, index) in assignedTasklists" :key="tasklist.id">
                                <td v-text="tasklist.id"></td>
                                <td v-text="tasklist.name"></td>
                                <td>
                                    <a :href="'/admin/tasklists/' + tasklist.id" class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button @click="handleDetach(tasklist.id, index)" class="btn btn-xs btn-default">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <select v-model="selectedOpt" class="form-control" @change="handleAttach(selectedOpt.id)">
                        <option v-for="tasklist in tasklists" :key="tasklist.id" :value="tasklist" v-text="tasklist.name"></option>
                    </select>
                </form>
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
                position: _.last( window.location.pathname.split('/') ),
                assignedTasklists: [],
                tasklists: [],
                selectedOpt: ''
            },
            methods: {
                handleDetach(target, index) {
                    axios.delete('/api/positions/' + this.position + '/detach/' + target)
                        .then(response => this.assignedTasklists.splice(index, 1))

                    this.selectedOpt = '';
                },
                handleAttach() {
                    axios.put('/api/positions/' + this.position + '/attach/' + this.selectedOpt.id)
                        .then(response => this.assignedTasklists.push({ id: this.selectedOpt.id, name: this.selectedOpt.name }))
                },
                getTaskLists() {
                    axios.get('/api/tasklists')
                        .then(response => this.tasklists = response.data);
                },
                getTaskListAssignments() {
                    axios.get('/api/positions/' + this.position + '/tasklists')
                        .then(response => this.assignedTasklists = response.data);
                }           
            },
            created() {
                this.getTaskLists();
                this.getTaskListAssignments();
            }
        });
    });
</script>
@stop
