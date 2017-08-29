@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Positions</h3>

            <!-- <ul class="list-group"> -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('positions.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Position
                    </a>
                </div>
                <div class="panel panel-body">
                    <div id="app" class="table-responsive">
                        <table id="positions" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Acronym</th>
                                    <th>Color</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="position in positions">
                                    <td v-text="position.id"></td>
                                    <td v-text="position.name"></td>
                                    <td v-text="position.acronym"></td>
                                    <td><span class="badge" :style="{ backgroundColor: position.color }" v-text="position.color"></span></td>
                                    <td v-text="position.created_at"></td>
                                    <td v-text="position.updated_at"></td>
                                    <td>
                                        <a :href="'/positions/' + position.id + '/edit'" class="btn btn-xs btn-default">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button :data-id="position.id" @click="handleDelete($event.target.dataset.id)" class="btn btn-xs btn-default">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script src="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        new Vue({
            el: '#app',
            data: {
                positions: [],
            },
            methods: {
                handleDelete(target) {
                    axios.delete(route('api.positions.destroy', target))
                        .then(response => this.getPositions());
                },
                getPositions() {
                    axios.get(route('api.positions.index'))
                        .then(response => this.positions = response.data);
                }

            },
            created() {
                this.getPositions();
            }
        });

        // $('#positions').DataTable();
    });
</script>
@endsection
