<template>
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
        <draggable :list="tasks" :options="{ animation: 200 }" :element="'tbody'" @change="update">
            <tr v-for="(task, index) in tasks" :key="task.id">
                <td v-text="task.order"></td>
                <td v-text="task.name"></td>
                <td v-text="task.details"></td>
                <td v-text="task.created_at"></td>
                <td v-text="task.updated_at"></td>
                <td>
                    <a :href="'/admin/tasks/' + task.id + '/edit'" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button :data-id="task.id" @click="handleDelete(task.id, index)" class="btn btn-xs btn-default">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        </draggable>
    </table>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: ['tasks'],

        data() {
            return {
                url: ''
            }
        },

        methods: {
            update() {
                this.tasks.map((task, index) => {
                    task.order = index + 1
                })

                axios.put('/api/tasks/update', {
                    tasks: this.tasks
                }).then((response) => {
                    console.log(response)
                })
            }           
        }
    }
</script>
