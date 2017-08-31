<template>
    <div class="custom-actions">
        <button class="ui btn btn-xs btn-default" @click="itemAction('view-item', rowData, rowIndex)"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="ui btn btn-xs btn-default" @click="itemAction('view-item', rowData, rowIndex)"><i class="glyphicon glyphicon-trash"></i></button>
    </div>
</template>

<script>
export default {
    props: {
        rowData: {
            type: Object,
            required: true
        },
        rowIndex: {
            type: Number
        }
    },
    methods: {
        itemAction (action, data, index) {
            console.log('custom-actions: ' + action, data.name, index)
        }
    }
}
</script>

<style>
    .custom-actions button.ui.button {
        padding: 8px 8px;
    }
    .custom-actions button.ui.button > i.icon {
        margin: auto !important;
    }
</style>
